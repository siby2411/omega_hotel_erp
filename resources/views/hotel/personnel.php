<div class="card p-4">

<h2>👨‍💼 Gestion du Personnel</h2>

<div class="mb-3">

<a
href="?url=personnel_create"
class="btn btn-success">

➕ Ajouter Employé

</a>

</div>

<table class="table table-dark table-striped table-hover">

<thead>

<tr>
<th>ID</th>
<th>Nom</th>
<th>Prénom</th>
<th>Téléphone</th>
<th>Poste</th>
<th>Salaire Base</th>
<th>Date Embauche</th>
</tr>

</thead>

<tbody>

<?php foreach($staff as $s): ?>

<tr>

<td><?= $s['id'] ?></td>

<td><?= $s['nom'] ?></td>

<td><?= $s['prenom'] ?></td>

<td><?= $s['telephone'] ?></td>

<td><?= $s['poste'] ?></td>

<td>
<?= number_format($s['salaire_base'],0,',',' ') ?>
FCFA
</td>

<td><?= $s['date_embauche'] ?></td>

</tr>

<?php endforeach; ?>

</tbody>

</table>

</div>
