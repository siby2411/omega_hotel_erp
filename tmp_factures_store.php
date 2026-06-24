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
