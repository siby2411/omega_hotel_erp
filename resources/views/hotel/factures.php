<h2>🧾 Factures</h2>

<!-- ACTION BAR -->
<div class="mb-3">
    <a href="?url=factures_create" class="btn btn-success">
        ➕ Ajouter Facture
    </a>
</div>

<!-- TABLE -->
<table class="table table-dark table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Réservation</th>
            <th>Montant</th>
            <th>Statut</th>
            <th>Date</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($factures as $f): ?>
        <tr>
            <td><?= $f['id'] ?></td>
            <td><?= $f['reservation_id'] ?></td>
            <td><?= $f['montant_total'] ?> FCFA</td>
            <td>Impayée</td>
            <td><?= $f['created_at'] ?? '' ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
