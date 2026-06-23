public function messagerie()
{
    $pdo = $this->db();

    $messages = $pdo->query("
        SELECT * FROM messages ORDER BY id DESC
    ")->fetchAll();

    return $this->view('messagerie/liste', compact('messages'));
}
