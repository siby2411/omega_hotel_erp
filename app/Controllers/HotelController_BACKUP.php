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
            INSERT INTO factures (reservation_id, montant_total)
            VALUES (?, ?)
        ");

        $stmt->execute([
            $_POST['reservation_id'],
            $_POST['montant_total']
        ]);

        header("Location: ?url=factures");
        exit;
    }

    /* ================= PDF FACTURE ================= */
    public function facture_pdf() {

        require_once __DIR__ . '/../Services/FacturePDF.php';

        $id = $_GET['id'] ?? null;
        if (!$id) die("ID facture manquant");

        $stmt = $this->db()->prepare("SELECT * FROM factures WHERE id=?");
        $stmt->execute([$id]);
        $facture = $stmt->fetch();

        if (!$facture) die("Facture introuvable");

        FacturePDF::generate($facture);
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
        return $this->view('hotel/personnel');
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
        return $this->view('hotel/charges');
    }

    public function createCharge() {
        return $this->view('hotel/charges_create');
    }

    public function storeCharge() {
        $stmt = $this->db()->prepare("INSERT INTO charges (libelle, montant) VALUES (?, ?)");
        $stmt->execute([$_POST['libelle'], $_POST['montant']]);
        header("Location: ?url=charges");
        exit;
    }

    /* ================= ETATS FINANCIERS ================= */
    public function etatFinancier() {
        return $this->view('hotel/etat_financier');
    }

    /* ================= MESSAGERIE ================= */
    public function messagerie() {
        return $this->view('hotel/messagerie');
    }

    /* ================= ANALYTICS ================= */
    public function analytics() {
        return $this->view('hotel/analytics');
    }
}

public function dashboard() {

    $db = $this->db();

    $stats = [
        'chambres' => $db->query("SELECT COUNT(*) FROM chambres")->fetchColumn(),
        'clients' => $db->query("SELECT COUNT(*) FROM clients")->fetchColumn(),
        'reservations' => $db->query("SELECT COUNT(*) FROM reservations")->fetchColumn(),
        'factures' => $db->query("SELECT COUNT(*) FROM factures")->fetchColumn(),
    ];

    return $this->view('dashboard/index', compact('stats'));
}

/* ================= PAIEMENTS ================= */
public function paiements() {
    return $this->view('hotel/paiements');
}

public function createPaiement() {
    return $this->view('hotel/paiements_create');
}

/* ================= PERSONNEL ================= */
public function personnel_create() {
    return $this->view('hotel/personnel_create');
}

public function paie() {
    return $this->view('hotel/paie');
}

public function charges() {
    return $this->view('hotel/charges');
}

public function etatFinancier() {
    return $this->view('hotel/etat_financier');
}

public function messagerie() {
    return $this->view('hotel/messagerie');
}

public function facture_pdf() {
    require_once __DIR__ . '/../Services/FacturePDF.php';

    $id = $_GET['id'] ?? null;

    if (!$id) {
        die("ID facture manquant");
    }

    $stmt = $this->db()->prepare("SELECT * FROM factures WHERE id=?");
    $stmt->execute([$id]);
    $facture = $stmt->fetch();

    if (!$facture) {
        die("Facture introuvable");
    }

    FacturePDF::generate($facture);
}

}

/* ================= PERSONNEL LISTE ================= */
public function personnel() {

    $db = $this->db();

    $staff = $db->query("SELECT * FROM personnel")->fetchAll();

    return $this->view('hotel/personnel', compact('staff'));
}

/* ================= FACTURES ================= */
public function factures() {

    $data = $this->db()->query("SELECT * FROM factures ORDER BY id DESC")->fetchAll();

    return $this->view('hotel/factures', ['factures' => $data]);
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
        0,
        0,
        $_POST['montant_total']
    ]);

    header("Location: ?url=factures");
    exit;
}
