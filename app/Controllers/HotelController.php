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

        $viewFile = __DIR__ . "/../../resources/views/$path.php";
        $layoutFile = __DIR__ . "/../../resources/views/layouts/app.php";

        ob_start();
        require $viewFile;
        $content = ob_get_clean();

        require $layoutFile;
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

    /* ================= FACTURES ================= */
    public function factures() {
        $factures = $this->db()->query("SELECT * FROM factures")->fetchAll();
        return $this->view('hotel/factures', compact('factures'));
    }

    /* ================= PAIEMENTS ================= */
    public function paiements() {
        return $this->view('hotel/paiements');
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

    /* ================= MESSAGERIE ================= */
    public function messagerie() {
        return $this->view('hotel/messagerie');
    }
}
