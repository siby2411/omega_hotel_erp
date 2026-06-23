<!DOCTYPE html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<title>Clients</title>
</head>

<body class="bg-light">

<div class="container mt-4">

<h2>👤 Gestion Clients</h2>

<!-- FORMULAIRE -->
<form method="POST" action="/?url=clients_create" class="card p-3 mb-4">
    <input name="nom" class="form-control mb-2" placeholder="Nom">
    <input name="prenom" class="form-control mb-2" placeholder="Prénom">
    <input name="telephone" class="form-control mb-2" placeholder="Téléphone">
    <button class="btn btn-primary">Ajouter Client</button>
</form>

<!-- LISTE -->
<table class="table table-bordered">
<tr>
<th>ID</th><th>Nom</th><th>Prénom</th><th>Téléphone</th>
</tr>

<?php foreach ($clients as $c): ?>
<tr>
<td><?= $c['id'] ?></td>
<td><?= $c['nom'] ?></td>
<td><?= $c['prenom'] ?></td>
<td><?= $c['telephone'] ?></td>
</tr>
<?php endforeach; ?>

</table>

</div>

</body>
</html>
