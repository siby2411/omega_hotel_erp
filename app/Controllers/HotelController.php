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

    private function view($path, $data = []) {
        extract($data);
        require __DIR__ . "/../../resources/views/$path.php";
    }

    /* ================= DASHBOARD ================= */
    public function dashboard() {
        return $this->view('dashboard/index');
    }

    /* ================= CHAMBRES ================= */
    public function chambres() {
        $chambres = $this->db()->query("SELECT * FROM chambres")->fetchAll();
        return $this->view('chambres/liste', compact('chambres'));
    }

    public function chambres_create() {
        return $this->view('chambres/create');
    }

    /* ================= CLIENTS ================= */
    public function clients() {
        $clients = $this->db()->query("SELECT * FROM clients")->fetchAll();
        return $this->view('clients/liste', compact('clients'));
    }

    public function clients_create() {
        return $this->view('clients/create');
    }

    /* ================= RESERVATIONS ================= */
    public function reservations() {
        $reservations = $this->db()->query("SELECT * FROM reservations")->fetchAll();
        return $this->view('reservations/liste', compact('reservations'));
    }

    public function createReservation() {
        return $this->view('reservations/create');
    }

    public function storeReservation() {

        $pdo = $this->db();

        $prix = $pdo->prepare("SELECT prix_nuit FROM chambres WHERE id=?");
        $prix->execute([$_POST['chambre_id']]);
        $prix = $prix->fetchColumn();

        $d1 = new DateTime($_POST['date_arrivee']);
        $d2 = new DateTime($_POST['date_depart']);
        $nuits = $d2->diff($d1)->days;

        $total = $prix * $nuits;

        $stmt = $pdo->prepare("
            INSERT INTO reservations
            (client_id, chambre_id, date_arrivee, date_depart, nb_nuits, prix_total)
            VALUES (?, ?, ?, ?, ?, ?)
        ");

        $stmt->execute([
            $_POST['client_id'],
            $_POST['chambre_id'],
            $_POST['date_arrivee'],
            $_POST['date_depart'],
            $nuits,
            $total
        ]);

        header("Location: ?url=reservations");
        exit;
    }

    /* ================= FACTURES ================= */
    public function factures() {
        $factures = $this->db()->query("SELECT * FROM factures")->fetchAll();
        return $this->view('hotel/factures', compact('factures'));
    }

    /* ================= PAIEMENTS ================= */
    public function paiements() {
        return $this->view('hotel/paiements');
    }

    public function createPaiement() {
        return $this->view('hotel/paiements_create');
    }

    /* ================= PERSONNEL ================= */
    public function personnel() {
        $staff = $this->db()->query("SELECT * FROM personnel")->fetchAll();
        return $this->view('hotel/personnel');
    }

    public function createPersonnel() {
        return $this->view('hotel/personnel_create');
    }

    /* ================= PAIE ================= */
    public function paie() {
        return $this->view('hotel/paie');
    }

    /* ================= MESSAGERIE ================= */
    public function messagerie() {
        return $this->view('hotel/messagerie');
    }
}
