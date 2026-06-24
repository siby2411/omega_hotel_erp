<h2>🧾 Factures</h2>

<a href="?url=factures_create" class="btn btn-success mb-3">
➕ Ajouter Facture
</a>

<table class="table table-dark table-striped">
    <tr>
        <th>ID</th>
        <th>Réservation</th>
        <th>Montant</th>
    </tr>

    <?php foreach($factures as $f): ?>
        <tr>
            <td><?= $f['id'] ?></td>
            <td><?= $f['reservation_id'] ?></td>
            <td><?= $f['montant_total'] ?> FCFA</td>
        </tr>
    <?php endforeach; ?>
</table>
