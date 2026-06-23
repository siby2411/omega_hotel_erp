<?php

class HotelController {

    /* ================= DATABASE ================= */
    private function db() {
        return new PDO(
            "mysql:host=127.0.0.1;dbname=hotel_omega;charset=utf8",
            "root",
            "",
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]
        );
    }

    /* ================= VIEW ENGINE ================= */
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
        ];

        return $this->view('dashboard/index', compact('stats'));
    }

    /* ================= CHAMBRES ================= */
    public function chambres() {
        $data = $this->db()->query("SELECT * FROM chambres")->fetchAll();
        return $this->view('chambres/liste', ['chambres' => $data]);
    }

    public function chambres_create() {
        return $this->view('chambres/create');
    }

    /* ================= CLIENTS ================= */
    public function clients() {
        $data = $this->db()->query("SELECT * FROM clients")->fetchAll();
        return $this->view('clients/liste', ['clients' => $data]);
    }

    public function clients_create() {
        return $this->view('clients/create');
    }

    /* ================= RESERVATIONS ================= */
    public function reservations() {
        $data = $this->db()->query("SELECT * FROM reservations")->fetchAll();
        return $this->view('reservations/liste', ['reservations' => $data]);
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
        $data = $this->db()->query("SELECT * FROM factures")->fetchAll();
        return $this->view('hotel/factures', ['factures' => $data]);
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
        $data = $this->db()->query("SELECT * FROM personnel")->fetchAll();
        return $this->view('hotel/personnel', ['staff' => $data]);
    }

    public function personnel_create() {
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

    /* ================= CHARGES ================= */
    public function charges() {
        $data = $this->db()->query("SELECT * FROM charges")->fetchAll();
        return $this->view('hotel/charges', ['charges' => $data]);
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

        $pdo = $this->db();

        $revenus = $pdo->query("SELECT COALESCE(SUM(montant_total),0) FROM factures")->fetchColumn();
        $charges = $pdo->query("SELECT COALESCE(SUM(montant),0) FROM charges")->fetchColumn();

        $benefice = $revenus - $charges;

        return $this->view('hotel/etat_financier', [
            'revenus' => $revenus,
            'charges' => $charges,
            'benefice' => $benefice
        ]);
    }
}
