public function paiements()
{
    $pdo = $this->db();
    $paiements = $pdo->query("
        SELECT p.*, c.nom, c.prenom
        FROM paiements p
        JOIN clients c ON c.id = p.client_id
        ORDER BY p.id DESC
    ")->fetchAll();

    return $this->view('paiements/liste', compact('paiements'));
}

public function createPaiement()
{
    $pdo = $this->db();
    $clients = $pdo->query("SELECT id, nom, prenom FROM clients")->fetchAll();

    return $this->view('paiements/create', compact('clients'));
}

public function storePaiement()
{
    $pdo = $this->db();

    $stmt = $pdo->prepare("
        INSERT INTO paiements (client_id, montant, methode, statut)
        VALUES (?, ?, ?, 'Payé')
    ");

    $stmt->execute([
        $_POST['client_id'],
        $_POST['montant'],
        $_POST['methode']
    ]);

    header("Location: ?url=paiements");
    exit;
}
