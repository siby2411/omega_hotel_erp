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

    /* ================= DASHBOARD FIX ================= */
    public function dashboard() {

        $db = $this->db();

        $stats = [
            'chambres' => $db->query("SELECT COUNT(*) FROM chambres")->fetchColumn(),
            'clients' => $db->query("SELECT COUNT(*) FROM clients")->fetchColumn(),
            'reservations' => $db->query("SELECT COUNT(*) FROM reservations")->fetchColumn(),
            'factures' => $db->query("SELECT COUNT(*) FROM factures")->fetchColumn()
        ];

        return $this->view('dashboard/index', compact('stats'));
    }
