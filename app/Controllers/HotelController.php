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

        $view = __DIR__ . "/../../resources/views/$path.php";
        $layout = __DIR__ . "/../../resources/views/layouts/app.php";

        ob_start();
        require $view;
        $content = ob_get_clean();

        require $layout;
    }

    /* ================= DASHBOARD ================= */
    public function dashboard() {
        $stats = [
            'chambres' => $this->db()->query("SELECT COUNT(*) FROM chambres")->fetchColumn(),
            'clients' => $this->db()->query("SELECT COUNT(*) FROM clients")->fetchColumn(),
            'reservations' => $this->db()->query("SELECT COUNT(*) FROM reservations")->fetchColumn(),
            'factures' => $this->db()->query("SELECT COUNT(*) FROM factures")->fetchColumn()
        ];

        return $this->view('dashboard/index', compact('stats'));
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

        $nuits = (new DateTime($_POST['date_depart']))
               ->diff(new DateTime($_POST['date_arrivee']))->days;

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
        $factures = $this->db()->query("SELECT * FROM factures ORDER BY id DESC")->fetchAll();
        return $this->view('hotel/factures', compact('factures'));
    }

    public function factures_create() {
        $reservations = $this->db()->query("SELECT * FROM reservations")->fetchAll();
        return $this->view('hotel/factures_create', compact('reservations'));
    }

    public function factures_store() {

        $stmt = $this->db()->prepare("
            INSERT INTO factures (reservation_id, client_id, chambre_id, montant_total)
            VALUES (?, ?, ?, ?)
        ");

        $stmt->execute([
            $_POST['reservation_id'],
            $_POST['client_id'] ?? 0,
            $_POST['chambre_id'] ?? 0,
            $_POST['montant_total']
        ]);

        header("Location: ?url=factures");
        exit;
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
        return $this->view('hotel/personnel', compact('staff'));
    }

    public function personnel_create() {
        return $this->view('hotel/personnel_create');
    }

    /* ================= PAIE ================= */
    public function paie() {
        return $this->view('hotel/paie');
    }

    /* ================= CHARGES ================= */
    public function charges() {
        $charges = $this->db()->query("SELECT * FROM charges")->fetchAll();
        return $this->view('hotel/charges', compact('charges'));
    }

    public function createCharge() {
        return $this->view('hotel/charges_create');
    }

    public function storeCharge() {

        $stmt = $this->db()->prepare("
            INSERT INTO charges (libelle, montant)
            VALUES (?, ?)
        ");

        $stmt->execute([
            $_POST['libelle'],
            $_POST['montant']
        ]);

        header("Location: ?url=charges");
        exit;
    }

    /* ================= ETATS FINANCIERS ================= */
    public function etatFinancier() {

        $revenus = $this->db()->query("SELECT COALESCE(SUM(montant_total),0) FROM factures")->fetchColumn();
        $charges = $this->db()->query("SELECT COALESCE(SUM(montant),0) FROM charges")->fetchColumn();

        return $this->view('hotel/etat_financier', [
            'revenus' => $revenus,
            'charges' => $charges,
            'benefice' => $revenus - $charges
        ]);
    }

    /* ================= MESSAGERIE ================= */
    public function messagerie() {
        return $this->view('hotel/messagerie');
    }
}
