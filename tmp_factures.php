public function factures()
{
    $pdo = $this->db();

    $factures = $pdo->query("
        SELECT f.*, c.nom, c.prenom
        FROM factures f
        JOIN clients c ON c.id = f.client_id
        ORDER BY f.id DESC
    ")->fetchAll();

    return $this->view('factures/liste', compact('factures'));
}

public function genererNumeroFacture()
{
    return 'FAC-' . date('Y') . '-' . rand(10000,99999);
}
