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

        $db = $this->db();

        $stats = [
            'clients' => $db->query("SELECT COUNT(*) FROM clients")->fetchColumn(),
            'chambres' => $db->query("SELECT COUNT(*) FROM chambres")->fetchColumn(),
            'reservations' => $db->query("SELECT COUNT(*) FROM reservations")->fetchColumn(),
            'factures' => $db->query("SELECT COUNT(*) FROM factures")->fetchColumn(),
        ];

        return $this->view('dashboard/index', compact('stats'));
    }

    /* ================= CLIENTS ================= */
    public function clients() {
        $clients = $this->db()->query("
            SELECT * FROM clients ORDER BY id DESC
        ")->fetchAll();

        return $this->view('clients/liste', compact('clients'));
    }

    public function clients_create() {
        return $this->view('clients/create');
    }

    public function clients_store() {

        $pdo = $this->db();

        $pdo->prepare("
            INSERT INTO clients (nom, prenom, email, telephone, adresse, ville, pays)
            VALUES (?, ?, ?, ?, ?, ?, ?)
        ")->execute([
            $_POST['nom'],
            $_POST['prenom'],
            $_POST['email'],
            $_POST['telephone'],
            $_POST['adresse'] ?? null,
            $_POST['ville'] ?? null,
            $_POST['pays'] ?? 'Sénégal'
        ]);

        $id = $pdo->lastInsertId();
        $code = 'CLI-' . str_pad($id, 5, '0', STR_PAD_LEFT);

        $pdo->prepare("UPDATE clients SET code_client=? WHERE id=?")
            ->execute([$code, $id]);

        header("Location: ?url=clients");
        exit;
    }

    /* ================= CHAMBRES ================= */
    public function chambres() {
        $data = $this->db()->query("SELECT * FROM chambres")->fetchAll();
        return $this->view('chambres/liste', ['chambres' => $data]);
    }

    /* ================= RESERVATIONS ================= */
    public function reservations() {

        $reservations = $this->db()->query("
            SELECT r.*, c.nom, c.prenom, c.code_client
            FROM reservations r
            JOIN clients c ON c.id = r.client_id
            ORDER BY r.id DESC
        ")->fetchAll();

        return $this->view('reservations/liste', compact('reservations'));
    }

    public function reservations_create() {

        $clients = $this->db()->query("
            SELECT id, nom, prenom, code_client FROM clients
        ")->fetchAll();

        $chambres = $this->db()->query("
            SELECT id, numero, prix_nuit FROM chambres WHERE statut='Disponible'
        ")->fetchAll();

        return $this->view('reservations/create', compact('clients','chambres'));
    }

    public function reservations_store() {

        $pdo = $this->db();

        $prix = $pdo->prepare("SELECT prix_nuit FROM chambres WHERE id=?");
        $prix->execute([$_POST['chambre_id']]);
        $prix = $prix->fetchColumn();

        $d1 = new DateTime($_POST['date_arrivee']);
        $d2 = new DateTime($_POST['date_depart']);
        $nuits = $d2->diff($d1)->days;

        $total = $prix * $nuits;

        $pdo->prepare("
            INSERT INTO reservations
            (client_id, chambre_id, date_arrivee, date_depart, nb_nuits, prix_total)
            VALUES (?, ?, ?, ?, ?, ?)
        ")->execute([
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

        $factures = $this->db()->query("
            SELECT f.*, c.nom, c.prenom, c.code_client
            FROM factures f
            JOIN clients c ON c.id = f.client_id
            ORDER BY f.id DESC
        ")->fetchAll();

        return $this->view('hotel/factures', compact('factures'));
    }

    /* ================= FACTURE CREATE (FIX MENU CLIENT) ================= */
    public function factures_create() {

        $reservations = $this->db()->query("
            SELECT
                r.id,
                r.prix_total,
                c.nom,
                c.prenom,
                c.code_client,
                ch.numero
            FROM reservations r
            JOIN clients c ON c.id = r.client_id
            JOIN chambres ch ON ch.id = r.chambre_id
            ORDER BY r.id DESC
        ")->fetchAll();

        return $this->view('hotel/factures_create', compact('reservations'));
    }

    public function factures_store() {

        $pdo = $this->db();

        $r = $pdo->prepare("
            SELECT client_id, chambre_id, prix_total
            FROM reservations WHERE id=?
        ");

        $r->execute([$_POST['reservation_id']]);
        $data = $r->fetch();

        $pdo->prepare("
            INSERT INTO factures (reservation_id, client_id, chambre_id, montant_total)
            VALUES (?, ?, ?, ?)
        ")->execute([
            $_POST['reservation_id'],
            $data['client_id'],
            $data['chambre_id'],
            $data['prix_total']
        ]);

        header("Location: ?url=factures");
        exit;
    }

    /* ================= PAIEMENTS ================= */
    public function paiements() {
        $data = $this->db()->query("SELECT * FROM paiements")->fetchAll();
        return $this->view('hotel/paiements', ['paiements' => $data]);
    }

}

/* ================= FACTURES CREATE ================= */
public function factures_create() {

    $reservations = $this->db()->query("
        SELECT
            r.id,
            r.prix_total,
            c.nom,
            c.prenom,
            c.code_client,
            ch.numero AS chambre
        FROM reservations r
        JOIN clients c ON c.id = r.client_id
        JOIN chambres ch ON ch.id = r.chambre_id
        ORDER BY r.id DESC
    ")->fetchAll(PDO::FETCH_ASSOC);

    return $this->view('hotel/factures_create', [
        'reservations' => $reservations
    ]);
}
