<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Personnel</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body{
background:linear-gradient(135deg,#0f172a,#1e293b);
color:white;
}
.card{
background:rgba(255,255,255,.08);
border:none;
border-radius:20px;
}
</style>

</head>
<body>

<div class="container mt-5">

<div class="card p-4">

<h2>👨‍💼 Personnel</h2>

<a href="?url=personnel_create"
class="btn btn-success mb-3">
➕ Ajouter Employé
</a>

<table class="table table-dark table-striped">

<tr>
<th>ID</th>
<th>Nom</th>
<th>Fonction</th>
<th>Salaire</th>
</tr>

<?php foreach($staff as $s): ?>

<tr>
<td><?= $s['id'] ?></td>
<td><?= $s['nom'] ?? '' ?></td>
<td><?= $s['fonction'] ?? '' ?></td>
<td><?= $s['salaire'] ?? 0 ?></td>
</tr>

<?php endforeach; ?>

</table>

</div>

</div>

</body>
</html>
