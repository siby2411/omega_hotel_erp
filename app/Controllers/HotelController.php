<?php

class HotelController {

    /* ================= DATABASE ================= */
    public function db() {
        return new PDO(
            "mysql:host=localhost;dbname=hotel_omega;charset=utf8",
            "root",
            ""
        );
    }

    /* ================= VIEW ================= */
    public function view($view, $data = []) {
        extract($data);

        ob_start();
        require __DIR__ . "/../../resources/views/" . $view . ".php";
        $content = ob_get_clean();

        require __DIR__ . "/../../resources/views/layouts/app.php";
    }

    /* ================= DASHBOARD ================= */
    public function dashboard() {

        $clients = $this->db()->query("SELECT COUNT(*) as t FROM clients")->fetch()['t'];
        $chambres = $this->db()->query("SELECT COUNT(*) as t FROM chambres")->fetch()['t'];
        $reservations = $this->db()->query("SELECT COUNT(*) as t FROM reservations")->fetch()['t'];
        $factures = $this->db()->query("SELECT COUNT(*) as t FROM factures")->fetch()['t'];

        return $this->view('dashboard/index', compact(
            'clients',
            'chambres',
            'reservations',
            'factures'
        ));
    }

    /* ================= CLIENTS ================= */
    public function clients() {
        $data = $this->db()->query("SELECT * FROM clients ORDER BY id DESC")->fetchAll(PDO::FETCH_ASSOC);
        return $this->view('clients/liste', ['clients' => $data]);
    }

    public function clients_create() {
        return $this->view('clients/create');
    }

    public function clients_store() {
        $this->db()->prepare("INSERT INTO clients(nom, prenom, code_client) VALUES (?, ?, ?)")
            ->execute([$_POST['nom'], $_POST['prenom'], $_POST['code_client']]);

        header("Location: ?url=clients");
        exit;
    }

    /* ================= CHAMBRES ================= */
    public function chambres() {
        $data = $this->db()->query("SELECT * FROM chambres ORDER BY id DESC")->fetchAll(PDO::FETCH_ASSOC);
        return $this->view('hotel/chambres', ['chambres' => $data]);
    }

    public function chambres_create() {
        return $this->view('hotel/chambres_create');
    }

    public function chambres_store() {
        $this->db()->prepare("INSERT INTO chambres(numero,type,prix_nuit,statut) VALUES (?,?,?,'Disponible')")
            ->execute([$_POST['numero'], $_POST['type'], $_POST['prix_nuit']]);

        header("Location: ?url=chambres");
        exit;
    }

    /* ================= RESERVATIONS ================= */
    public function reservations() {
        $data = $this->db()->query("
            SELECT r.*, c.nom, c.prenom, ch.numero
            FROM reservations r
            JOIN clients c ON c.id=r.client_id
            JOIN chambres ch ON ch.id=r.chambre_id
        ")->fetchAll(PDO::FETCH_ASSOC);

        return $this->view('hotel/reservations', ['reservations' => $data]);
    }

    public function reservations_create() {
        $clients = $this->db()->query("SELECT * FROM clients")->fetchAll(PDO::FETCH_ASSOC);
        $chambres = $this->db()->query("SELECT * FROM chambres WHERE statut='Disponible'")->fetchAll(PDO::FETCH_ASSOC);

        return $this->view('reservations/create', compact('clients','chambres'));
    }

    public function reservations_store() {
        $this->db()->prepare("INSERT INTO reservations(client_id,chambre_id,prix_total) VALUES (?,?,?)")
            ->execute([$_POST['client_id'], $_POST['chambre_id'], $_POST['prix_total']]);

        header("Location: ?url=reservations");
        exit;
    }

    /* ================= FACTURES ================= */
    public function factures() {
        $data = $this->db()->query("
            SELECT f.*, c.nom, c.prenom
            FROM factures f
            JOIN clients c ON c.id=f.client_id
        ")->fetchAll(PDO::FETCH_ASSOC);

        return $this->view('hotel/factures', ['factures' => $data]);
    }

    public function factures_create() {
        $reservations = $this->db()->query("
            SELECT r.id, r.prix_total, c.nom, c.prenom, c.code_client, ch.numero
            FROM reservations r
            JOIN clients c ON c.id=r.client_id
            JOIN chambres ch ON ch.id=r.chambre_id
        ")->fetchAll(PDO::FETCH_ASSOC);

        return $this->view('hotel/factures_create', compact('reservations'));
    }

    public function factures_store() {
        $stmt = $this->db()->prepare("SELECT * FROM reservations WHERE id=?");
        $stmt->execute([$_POST['reservation_id']]);
        $r = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->db()->prepare("
            INSERT INTO factures(reservation_id,client_id,chambre_id,montant_total)
            VALUES (?,?,?,?)
        ")->execute([$r['id'],$r['client_id'],$r['chambre_id'],$r['prix_total']]);

        header("Location: ?url=factures");
        exit;
    }

    /* ================= PAIEMENTS ================= */
    public function paiements() {
        $data = $this->db()->query("
            SELECT p.*, f.montant_total
            FROM paiements p
            JOIN factures f ON f.id=p.facture_id
        ")->fetchAll(PDO::FETCH_ASSOC);

        return $this->view('paiements/liste', ['paiements'=>$data]);
    }

    public function paiements_create() {
        $factures = $this->db()->query("
            SELECT f.id,f.montant_total,c.nom,c.prenom
            FROM factures f
            JOIN clients c ON c.id=f.client_id
        ")->fetchAll(PDO::FETCH_ASSOC);

        return $this->view('paiements/create', compact('factures'));
    }

    public function paiements_store() {
        $this->db()->prepare("
            INSERT INTO paiements(facture_id,montant,mode_paiement,date_paiement)
            VALUES (?,?,?,NOW())
        ")->execute([
            $_POST['facture_id'],
            $_POST['montant'],
            $_POST['mode_paiement']
        ]);

        header("Location: ?url=paiements");
        exit;
    }

    /* ================= RH ================= */
    public function paie() {
        $data = $this->db()->query("SELECT * FROM paie")->fetchAll(PDO::FETCH_ASSOC);
        return $this->view('hotel/paie', ['paie'=>$data]);
    }

    public function personnel() {
        $data = $this->db()->query("SELECT * FROM personnel")->fetchAll(PDO::FETCH_ASSOC);
        return $this->view('hotel/personnel', ['personnel'=>$data]);
    }

    /* ================= EXTRA ================= */
    public function charges() {
        return $this->view('hotel/charges');
    }

    public function messagerie() {
        return $this->view('hotel/messagerie');
    }
}
