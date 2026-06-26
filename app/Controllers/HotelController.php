<?php

class HotelController {

    private function db() {
        return new PDO("mysql:host=localhost;dbname=hotel_omega;charset=utf8", "root", "", [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }

    public function view($path, $data = []) {
        extract($data);
        ob_start();
        require __DIR__ . "/../../resources/views/$path.php";
        $content = ob_get_clean();
        require __DIR__ . "/../../resources/views/layouts/app.php";
    }

    // --- DASHBOARD CORRIGÉ ---
    public function dashboard() {
        $chambres = $this->db()->query("SELECT COUNT(*) FROM chambres")->fetchColumn();
        $clients = $this->db()->query("SELECT COUNT(*) FROM clients")->fetchColumn();
        $reservations = $this->db()->query("SELECT COUNT(*) FROM reservations")->fetchColumn();
        $factures = $this->db()->query("SELECT COUNT(*) FROM factures")->fetchColumn();

        return $this->view('dashboard/index', [
            'chambres' => $chambres,
            'clients' => $clients,
            'reservations' => $reservations,
            'factures' => $factures
        ]);
    }

    // --- CHAMBRES ---
    public function chambres() {
        $data = $this->db()->query("SELECT * FROM chambres ORDER BY etage DESC, numero ASC")->fetchAll();
        return $this->view('chambres/liste', ['chambresParEtage' => $data]);
    }
    public function chambres_create() { return $this->view('hotel/chambres_create'); }

    // --- CLIENTS ---
    public function clients() { return $this->view('clients/liste', ['clients' => $this->db()->query("SELECT * FROM clients")->fetchAll()]); }
    public function clients_create() { return $this->view('hotel/clients_create'); }

    // --- RÉSERVATIONS ---
    public function reservations() { return $this->view('reservations/liste', ['reservations' => $this->db()->query("SELECT * FROM reservations")->fetchAll()]); }
    public function reservations_create() { return $this->view('hotel/reservations_create'); }

    // --- FACTURATION ---
    public function factures() { return $this->view('hotel/factures', ['factures' => $this->db()->query("SELECT * FROM factures")->fetchAll()]); }
    public function factures_create() { return $this->view('hotel/factures_create'); }

    // --- FINANCE ---
    public function paiements() { return $this->view('paiements/liste', ['paiements' => $this->db()->query("SELECT * FROM paiements")->fetchAll()]); }
    public function charges() { return $this->view('hotel/charges'); }
    public function etat_financier() { return $this->view('hotel/etat_financier'); }

    // --- RH & COMMUNICATION ---
    public function paie() { return $this->view('hotel/paie'); }
    public function messagerie() { return $this->view('hotel/messagerie'); }

    // --- DISPONIBILITÉ ---
    public function disponibilite() { return $this->view('hotel/disponibilite'); }

    // --- PERSONNEL ---
    public function personnel() {
        $data = $this->db()->query("SELECT * FROM personnel")->fetchAll();
        return $this->view('hotel/personnel', ['personnel' => $data]);
    }

    public function finance_global() {
        $data = $this->db()->query("SELECT SUM(montant) as total_revenu FROM paiements")->fetch();
        return $this->view('hotel/finance_global', ['total' => $data['total_revenu']]);
    }

    // --- MODIFICATION CHAMBRES ---
    public function chambres_edit() {
        $id = $_GET['id'] ?? null;
        $stmt = $this->db()->prepare("SELECT * FROM chambres WHERE id = ?");
        $stmt->execute([$id]);
        $chambre = $stmt->fetch();
        return $this->view('hotel/chambres_edit', ['chambre' => $chambre]);
    }

    public function chambres_update() {
        $sql = "UPDATE chambres SET numero = ?, prix = ?, statut = ? WHERE id = ?";
        $this->db()->prepare($sql)->execute([
            $_POST['numero'], $_POST['prix'], $_POST['statut'], $_POST['id']
        ]);
        header('Location: ?url=chambres');
        exit;
    }
}
