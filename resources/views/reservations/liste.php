<!DOCTYPE html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<title>Réservations</title>
</head>

<body class="bg-light">

<div class="container mt-4">

<h2>📅 Gestion des Réservations</h2>

<!-- FORMULAIRE -->
<form method="POST" action="/?url=reservations_create" class="card p-3 mb-4">

    <input name="client" class="form-control mb-2" placeholder="Nom client">
    <input name="chambre" class="form-control mb-2" placeholder="Chambre">
    <input name="date_arrivee" class="form-control mb-2" placeholder="Date arrivée">
    <input name="date_depart" class="form-control mb-2" placeholder="Date départ">

    <button class="btn btn-success">Créer réservation</button>
</form>

<!-- TABLE -->
<table class="table table-bordered">
<tr>
<th>ID</th><th>Client</th><th>Chambre</th><th>Arrivée</th><th>Départ</th>
</tr>

<?php foreach ($reservations as $r): ?>
<tr>
<td><?= $r['id'] ?></td>
<td><?= $r['client_id'] ?></td>
<td><?= $r['chambre_id'] ?></td>
<td><?= $r['date_arrivee'] ?></td>
<td><?= $r['date_depart'] ?></td>
</tr>
<?php endforeach; ?>

</table>

</div>

</body>
</html>
