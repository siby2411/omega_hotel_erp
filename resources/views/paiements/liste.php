<h2>💳 Paiements</h2>

<a href="?url=paiements_create" class="btn btn-success">Nouveau paiement</a>

<table class="table table-dark mt-3">
<tr>
<th>ID</th><th>Client</th><th>Montant</th><th>Statut</th>
</tr>

<?php foreach($paiements as $p): ?>
<tr>
<td><?= $p['id'] ?></td>
<td><?= $p['nom'] ?> <?= $p['prenom'] ?></td>
<td><?= $p['montant'] ?></td>
<td><?= $p['statut'] ?></td>
</tr>
<?php endforeach; ?>
</table>
