<?php

class HotelController
{
    /* ================= DATABASE ================= */
    private function db()
    {
        static $pdo = null;

        if ($pdo === null) {
            $pdo = new PDO(
                "mysql:host=127.0.0.1;dbname=hotel_omega;charset=utf8",
                "root",
                "",
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                ]
            );
        }

        return $pdo;
    }

    /* ================= VIEW WRAPPER (IMPORTANT DESIGN) ================= */
    private function view($path, $data = [])
    {
        extract($data);

        ob_start();
        require __DIR__ . "/../../resources/views/" . $path . ".php";
        $content = ob_get_clean();

        require __DIR__ . "/../../resources/views/layouts/app.php";
    }

    /* ================= DASHBOARD ================= */
    public function dashboard()
    {
        return $this->view('dashboard/index');
    }

    /* ================= FACTURES ================= */
    public function factures()
    {
        $data = $this->db()->query("
            SELECT f.*, c.nom, c.prenom, c.code_client
            FROM factures f
            JOIN clients c ON c.id = f.client_id
            ORDER BY f.id DESC
        ")->fetchAll();

        return $this->view('hotel/factures', ['factures' => $data]);
    }

    public function factures_create()
    {
        $reservations = $this->db()->query("
            SELECT r.id, r.prix_total, c.nom, c.prenom, c.code_client
            FROM reservations r
            JOIN clients c ON c.id = r.client_id
        ")->fetchAll();

        return $this->view('hotel/factures_create', compact('reservations'));
    }

    public function factures_store()
    {
        $pdo = $this->db();

        $stmt = $pdo->prepare("
            SELECT client_id, chambre_id, prix_total
            FROM reservations
            WHERE id = ?
        ");

        $stmt->execute([$_POST['reservation_id']]);
        $r = $stmt->fetch();

        if (!$r) {
            die("Réservation introuvable");
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
    public function paiements()
    {
        $data = $this->db()->query("
            SELECT p.*, f.montant_total
            FROM paiements p
            JOIN factures f ON f.id = p.facture_id
            ORDER BY p.id DESC
        ")->fetchAll();

        return $this->view('hotel/paiements', ['paiements' => $data]);
    }

    public function paiements_create()
    {
        $factures = $this->db()->query("
            SELECT f.id, f.montant_total, c.nom, c.prenom
            FROM factures f
            JOIN clients c ON c.id = f.client_id
        ")->fetchAll();

        return $this->view('hotel/paiements_create', compact('factures'));
    }

    public function paiements_store()
    {
        $this->db()->prepare("
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

    /* ================= RH ================= */
    public function paie()
    {
        $data = $this->db()->query("SELECT * FROM paie ORDER BY id DESC")->fetchAll();
        return $this->view('hotel/paie', ['paie' => $data]);
    }

    public function personnel()
    {
        $data = $this->db()->query("SELECT * FROM personnel ORDER BY id DESC")->fetchAll();
        return $this->view('hotel/personnel', ['personnel' => $data]);
    }

    public function charges()
    {
        return $this->view('hotel/charges');
    }

    public function messagerie()
    {
        return $this->view('hotel/messagerie');
    }
}
