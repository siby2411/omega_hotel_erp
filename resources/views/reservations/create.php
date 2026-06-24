<h2>Réservation</h2>

<form method="POST" action="?url=reservations_store">

<select name="client_id" class="form-control mb-2">
<?php foreach($clients as $c): ?>
<option value="<?= $c['id'] ?>">
<?= $c['code_client'] ?> - <?= $c['nom'] ?> <?= $c['prenom'] ?>
</option>
<?php endforeach; ?>
</select>

<select name="chambre_id" class="form-control mb-2">
<?php foreach($chambres as $ch): ?>
<option value="<?= $ch['id'] ?>">
<?= $ch['numero'] ?> - <?= $ch['type'] ?>
</option>
<?php endforeach; ?>
</select>

<input type="date" name="date_arrivee" class="form-control mb-2">
<input type="date" name="date_depart" class="form-control mb-2">

<button class="btn btn-success">Valider</button>
</form>
