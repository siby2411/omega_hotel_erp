<h2>Clients</h2>

<a href="?url=clients_create" class="btn btn-success mb-3">Ajouter Client</a>

<table class="table table-dark">
<tr>
<th>ID</th><th>Code</th><th>Nom</th><th>Prénom</th><th>Téléphone</th>
</tr>

<?php foreach($clients as $c): ?>
<tr>
<td><?= $c['id'] ?></td>
<td><?= $c['code_client'] ?></td>
<td><?= $c['nom'] ?></td>
<td><?= $c['prenom'] ?></td>
<td><?= $c['telephone'] ?></td>
</tr>
<?php endforeach; ?>
</table>
