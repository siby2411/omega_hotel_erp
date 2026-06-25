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

    public function dashboard() {
        $pdo = $this->db();
        $stats = [
            'chambres' => $pdo->query("SELECT COUNT(*) FROM chambres")->fetchColumn(),
            'clients' => $pdo->query("SELECT COUNT(*) FROM clients")->fetchColumn(),
            'reservations' => $pdo->query("SELECT COUNT(*) FROM reservations")->fetchColumn(),
            'factures' => $pdo->query("SELECT COUNT(*) FROM factures")->fetchColumn(),
        ];
        return $this->view('dashboard/index', $stats);
    }

    // --- CHAMBRES ---
    public function chambres() {
        $data = $this->db()->query("SELECT * FROM chambres ORDER BY id DESC")->fetchAll();
        return $this->view('chambres/liste', ['chambres' => $data]);
    }
    public function chambres_create() { return $this->view('hotel/chambres_create'); }

    // --- CLIENTS ---
    public function clients() {
        $data = $this->db()->query("SELECT * FROM clients ORDER BY id DESC")->fetchAll();
        return $this->view('clients/liste', ['clients' => $data]);
    }
    public function clients_create() { return $this->view('hotel/clients_create'); }

    // --- RESERVATIONS ---
    public function reservations() {
        $data = $this->db()->query("SELECT r.*, c.nom, ch.numero FROM reservations r JOIN clients c ON c.id = r.client_id JOIN chambres ch ON ch.id = r.chambre_id ORDER BY r.id DESC")->fetchAll();
        return $this->view('reservations/liste', ['reservations' => $data]);
    }
    public function reservations_create() {
        $clients = $this->db()->query("SELECT id, nom, prenom FROM clients")->fetchAll();
        $chambres = $this->db()->query("SELECT id, numero FROM chambres")->fetchAll();
        return $this->view('hotel/reservations_create', ['clients' => $clients, 'chambres' => $chambres]);
    }

    // --- FACTURATION ---
    public function factures() {
        $data = $this->db()->query("SELECT f.*, c.nom FROM factures f JOIN clients c ON c.id = f.client_id")->fetchAll();
        return $this->view('hotel/factures', ['factures' => $data]);
    }
    public function factures_create() { return $this->view('hotel/factures_create'); }

    // --- FINANCES ---
    public function paiements() {
        $data = $this->db()->query("SELECT * FROM paiements")->fetchAll();
        return $this->view('paiements/liste', ['paiements' => $data]);
    }
    public function charges() { return $this->view('hotel/charges'); }
    
    public function etat_financier() {
        $periode = $_GET['periode'] ?? date('Y-m-d');
        $pdo = $this->db();
        $stmt = $pdo->prepare("SELECT SUM(montant) as total FROM paiements WHERE DATE(date_paiement) = ?");
        $stmt->execute([$periode]);
        $revenus = $stmt->fetch()['total'] ?? 0;
        return $this->view('hotel/etat_financier', ['revenus' => $revenus, 'periode' => $periode]);
    }

    // --- MOTEUR DE RECHERCHE DE DISPONIBILITÉ ---
    public function disponibilite() {
        $chambres = [];
        if (isset($_GET['date_arrivee']) && isset($_GET['date_depart'])) {
            $arrivee = $_GET['date_arrivee'];
            $depart = $_GET['date_depart'];
            $sql = "SELECT * FROM chambres WHERE id NOT IN (
                SELECT chambre_id FROM reservations 
                WHERE NOT (date_depart <= :arrivee OR date_arrivee >= :depart)
                AND statut != 'Annulée'
            )";
            $stmt = $this->db()->prepare($sql);
            $stmt->execute(['arrivee' => $arrivee, 'depart' => $depart]);
            $chambres = $stmt->fetchAll();
        }
        return $this->view('hotel/disponibilite', ['chambres' => $chambres]);
    }

    // --- RH ---
    public function personnel() {
        $data = $this->db()->query("SELECT * FROM personnel")->fetchAll();
        return $this->view('hotel/personnel', ['personnel' => $data]);
    }
    public function paie() {
        $data = $this->db()->query("SELECT * FROM paie")->fetchAll();
        return $this->view('hotel/paie', ['paie' => $data]);
    }

    // --- COMMUNICATION ---
    public function messagerie() { return $this->view('hotel/messagerie'); }
}
