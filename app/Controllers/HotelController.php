<?php

class HotelController {

    private function db() {
        return new PDO(
            "mysql:host=127.0.0.1;dbname=hotel_omega;charset=utf8",
            "root",
            "",
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
        );
    }

    private function view($view, $data = []) {
        extract($data);
        ob_start();
        require __DIR__ . "/../../resources/views/$view.php";
        $content = ob_get_clean();
        require __DIR__ . "/../../resources/views/layouts/app.php";
    }

    public function dashboard() {
        return $this->view('dashboard/index');
    }

    public function chambres() {
        $chambres = $this->db()->query("SELECT * FROM chambres")->fetchAll();
        return $this->view('chambres/liste', compact('chambres'));
    }

    public function createChambre() {
        return $this->view('chambres/create');
    }

    public function clients() {
        $clients = $this->db()->query("SELECT * FROM clients")->fetchAll();
        return $this->view('clients/liste', compact('clients'));
    }

    public function createClient() {
        return $this->view('clients/create');
    }

    public function reservations() {
        $reservations = $this->db()->query("
            SELECT r.*, c.nom, ch.numero
            FROM reservations r
            JOIN clients c ON r.client_id=c.id
            JOIN chambres ch ON r.chambre_id=ch.id
        ")->fetchAll();

        return $this->view('reservations/liste', compact('reservations'));
    }

    public function createReservation() {
        $clients = $this->db()->query("SELECT id, nom FROM clients")->fetchAll();
        $chambres = $this->db()->query("SELECT id, numero FROM chambres")->fetchAll();

        return $this->view('reservations/create', compact('clients','chambres'));
    }

    public function storeReservation() {

        $pdo = $this->db();

        $chambre = $pdo->prepare("SELECT prix_nuit FROM chambres WHERE id=?");
        $chambre->execute([$_POST['chambre_id']]);
        $prix = $chambre->fetchColumn();

        $date1 = new DateTime($_POST['date_arrivee']);
        $date2 = new DateTime($_POST['date_depart']);
        $nuits = $date1->diff($date2)->days;

        $total = $prix * $nuits;

        // RESERVATION
        $stmt = $pdo->prepare("
            INSERT INTO reservations
            (client_id, chambre_id, date_arrivee, date_depart, nb_nuits, prix_total, statut)
            VALUES (?, ?, ?, ?, ?, ?, 'Confirmée')
        ");

        $stmt->execute([
            $_POST['client_id'],
            $_POST['chambre_id'],
            $_POST['date_arrivee'],
            $_POST['date_depart'],
            $nuits,
            $total
        ]);

        $reservation_id = $pdo->lastInsertId();

        // FACTURE AUTO
        $pdo->prepare("
            INSERT INTO factures
            (reservation_id, client_id, chambre_id, montant_total)
            VALUES (?, ?, ?, ?)
        ")->execute([
            $reservation_id,
            $_POST['client_id'],
            $_POST['chambre_id'],
            $total
        ]);

        header("Location: ?url=reservations");
        exit;
    }

    public function factures() {
        $factures = $this->db()->query("SELECT * FROM factures ORDER BY id DESC")->fetchAll();
        return $this->view('hotel/factures', compact('factures'));
    }
}
