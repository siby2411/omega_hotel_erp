<h2>💳 Factures</h2>

<table class="table table-dark table-striped mt-3">
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
        <?php
        $pdo = (new HotelController())->db();
        $factures = $pdo->query("SELECT * FROM factures ORDER BY id DESC")->fetchAll();

        foreach ($factures as $f):
        ?>
        <tr>
            <td><?= $f['id'] ?></td>
            <td><?= $f['reservation_id'] ?></td>
            <td><?= number_format($f['montant_total'],2) ?> FCFA</td>
            <td><?= $f['statut'] ?></td>
            <td><?= $f['date_creation'] ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
