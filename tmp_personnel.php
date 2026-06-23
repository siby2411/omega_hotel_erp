public function personnel()
{
    $pdo = $this->db();
    $personnel = $pdo->query("SELECT * FROM personnel")->fetchAll();

    return $this->view('personnel/liste', compact('personnel'));
}

public function createPersonnel()
{
    return $this->view('personnel/create');
}

public function storePersonnel()
{
    $pdo = $this->db();

    $stmt = $pdo->prepare("
        INSERT INTO personnel (nom, poste, salaire)
        VALUES (?, ?, ?)
    ");

    $stmt->execute([
        $_POST['nom'],
        $_POST['poste'],
        $_POST['salaire']
    ]);

    header("Location: ?url=personnel");
    exit;
}
