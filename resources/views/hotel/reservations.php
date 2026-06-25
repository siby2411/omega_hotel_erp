<div class="card p-3">
    <h3>📅 Liste des réservations</h3>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Client</th>
                <th>Chambre</th>
                <th>Arrivée</th>
                <th>Départ</th>
                <th>Statut</th>
            </tr>
        </thead>

        <tbody>
        <?php if (!empty($reservations)): ?>
            <?php foreach ($reservations as $r): ?>
                <tr>
                    <td><?= $r['id'] ?></td>
                    <td><?= $r['nom'] ?> <?= $r['prenom'] ?></td>
                    <td><?= $r['numero'] ?></td>
                    <td><?= $r['date_arrivee'] ?></td>
                    <td><?= $r['date_depart'] ?></td>
                    <td><?= $r['statut'] ?></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="6" class="text-center">Aucune réservation</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>
</div>
