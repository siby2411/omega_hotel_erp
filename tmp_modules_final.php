/* =========================
   CHAMBRES CREATE
========================= */
public function createChambre()
{
    return $this->view('chambres/create');
}

/* =========================
   CLIENTS CREATE
========================= */
public function createClient()
{
    return $this->view('clients/create');
}

/* =========================
   RESERVATIONS CREATE
========================= */
public function createReservation()
{
    $pdo = $this->db();

    $clients = $pdo->query("SELECT id, nom, prenom FROM clients")->fetchAll();
    $chambres = $pdo->query("SELECT id, numero FROM chambres")->fetchAll();

    return $this->view('reservations/create', compact('clients','chambres'));
}

/* =========================
   FACTURES
========================= */
public function factures()
{
    $pdo = $this->db();

    $factures = $pdo->query("SELECT * FROM factures ORDER BY id DESC")->fetchAll();

    return $this->view('factures/liste', compact('factures'));
}

/* =========================
   PAIEMENTS
========================= */
public function paiements()
{
    $pdo = $this->db();

    $paiements = $pdo->query("
        SELECT * FROM paiements ORDER BY id DESC
    ")->fetchAll();

    return $this->view('paiements/liste', compact('paiements'));
}

public function createPaiement()
{
    $pdo = $this->db();

    $clients = $pdo->query("SELECT id, nom, prenom FROM clients")->fetchAll();

    return $this->view('paiements/create', compact('clients'));
}

/* =========================
   PERSONNEL
========================= */
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

/* =========================
   PAIE
========================= */
public function paie()
{
    $pdo = $this->db();
    $paie = $pdo->query("SELECT * FROM paie")->fetchAll();

    return $this->view('paie/liste', compact('paie'));
}

/* =========================
   MESSAGERIE
========================= */
public function messagerie()
{
    $pdo = $this->db();
    $messages = $pdo->query("SELECT * FROM messages ORDER BY id DESC")->fetchAll();

    return $this->view('messagerie/liste', compact('messages'));
}
