<h2>💬 Messagerie ERP</h2>

<form method="POST" action="?url=send_message">
    <input name="receiver_id" class="form-control" placeholder="Destinataire ID">
    <br>
    <textarea name="message" class="form-control" placeholder="Message"></textarea>
    <br>
    <button class="btn btn-primary">Envoyer</button>
</form>

<hr>

<?php
$pdo = (new HotelController())->db();
$msg = $pdo->query("SELECT * FROM messages ORDER BY id DESC")->fetchAll();

foreach ($msg as $m) {
    echo "<div class='card p-2 m-2'>💬 {$m['message']}</div>";
}
?>
