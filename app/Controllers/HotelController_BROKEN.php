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
        $clients = $this->db()->query("SELECT * FROM clients ORDER BY id DESC")->fetchAll();
        return $this->view('clients/liste', compact('clients'));
    }

    public function clients_create() {
        return $this->view('clients/create');
    }

    public function clients_store() {

        $pdo = $this->db();
        $pdo->beginTransaction();

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

        $pdo->commit();

        header("Location: ?url=clients");
        exit;
    }

    /* ================= PAIEMENTS (FIX PAGE 500) ================= */
    public function paiements() {

        $data = $this->db()->query("
            SELECT p.*, f.montant_total, c.nom, c.prenom
            FROM paiements p
            JOIN factures f ON f.id = p.facture_id
            JOIN clients c ON c.id = f.client_id
            ORDER BY p.id DESC
        ")->fetchAll();

        return $this->view('paiements/liste', ['paiements' => $data]);
    }

}

/* ================= FACTURES ================= */
public function factures() {

    $data = $this->db()->query("
        SELECT f.*, c.nom, c.prenom, c.code_client
        FROM factures f
        JOIN clients c ON c.id = f.client_id
        ORDER BY f.id DESC
    ")->fetchAll(PDO::FETCH_ASSOC);

    return $this->view('hotel/factures', [
        'factures' => $data
    ]);
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

/* ================= FACTURES STORE ================= */
public function factures_store() {

    $pdo = $this->db();

    $stmt = $pdo->prepare("
        SELECT client_id, chambre_id, prix_total
        FROM reservations
        WHERE id = ?
    ");

    $stmt->execute([$_POST['reservation_id']]);
    $r = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$r) {
        die("❌ Réservation introuvable");
    }

    $pdo->prepare("
        INSERT INTO factures (reservation_id, client_id, chambre_id, montant_total)
        VALUES (?, ?, ?, ?)
    ")->execute([
        $_POST['reservation_id'],
        $r['client_id'],
        $r['chambre_id'],
        $r['prix_total']
    ]);

    header("Location: ?url=factures");
    exit;
}

/* ================= PAIEMENTS ================= */
public function paiements() {

    $data = $this->db()->query("
        SELECT p.*, f.montant_total, c.nom, c.prenom
        FROM paiements p
        JOIN factures f ON f.id = p.facture_id
        JOIN clients c ON c.id = f.client_id
        ORDER BY p.id DESC
    ")->fetchAll(PDO::FETCH_ASSOC);

    return $this->view('paiements/liste', [
        'paiements' => $data
    ]);
}

/* ================= PAIEMENTS CREATE ================= */
public function paiements_create() {

    $factures = $this->db()->query("
        SELECT f.id, f.montant_total, c.nom, c.prenom, c.code_client
        FROM factures f
        JOIN clients c ON c.id = f.client_id
        ORDER BY f.id DESC
    ")->fetchAll(PDO::FETCH_ASSOC);

    return $this->view('paiements/create', [
        'factures' => $factures
    ]);
}

/* ================= PAIEMENTS STORE ================= */
public function paiements_store() {

    $pdo = $this->db();

    $pdo->prepare("
        INSERT INTO paiements (facture_id, montant, mode_paiement, date_paiement)
        VALUES (?, ?, ?, NOW())
    ")->execute([
        $_POST['facture_id'],
        $_POST['montant'],
        $_POST['mode_paiement']
    ]);

    header("Location: ?url=paiements");
    exit;
}

