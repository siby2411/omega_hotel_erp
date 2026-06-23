public function paie()
{
    $pdo = $this->db();

    $paie = $pdo->query("
        SELECT p.*, pr.nom, pr.poste
        FROM paie p
        JOIN personnel pr ON pr.id = p.personnel_id
        ORDER BY p.id DESC
    ")->fetchAll();

    return $this->view('paie/liste', compact('paie'));
}
