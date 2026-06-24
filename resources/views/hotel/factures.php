<div class="card p-4">

<h2>🧾 Gestion des Factures</h2>

<div class="mb-3">

<a href="?url=factures_create" class="btn btn-success">
➕ Nouvelle Facture
</a>

</div>

<table class="table table-dark table-striped table-hover">

<thead>
<tr>
<th>ID</th>
<th>Réservation</th>
<th>Client</th>
<th>Chambre</th>
<th>Montant</th>
<th>Statut</th>
<th>Date</th>
<th>PDF</th>
</tr>
</thead>

<tbody>

<?php foreach($factures as $f): ?>

<tr>

<td><?= $f['id'] ?></td>

<td>#<?= $f['reservation_id'] ?></td>

<td>
CLI<?= str_pad($f['client_id'],4,'0',STR_PAD_LEFT) ?>
</td>

<td>
<?= $f['chambre_id'] ?>
</td>

<td>
<?= number_format($f['montant_total'],0,',',' ') ?>
FCFA
</td>

<td>

<?php if(($f['statut'] ?? 'Impayée')=='Payée'): ?>

<span class="badge bg-success">
Payée
</span>

<?php else: ?>

<span class="badge bg-danger">
Impayée
</span>

<?php endif; ?>

</td>

<td>
<?= $f['date_creation'] ?? '' ?>
</td>

<td>

<a
class="btn btn-sm btn-primary"
href="?url=facture_pdf&id=<?= $f['id'] ?>">
PDF
</a>

</td>

</tr>

<?php endforeach; ?>

</tbody>

</table>

</div>
