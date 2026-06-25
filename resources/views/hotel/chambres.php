<div class="card p-3">
    <h3>🛏 Liste des chambres</h3>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Numéro</th>
                <th>Type</th>
                <th>Prix</th>
                <th>Statut</th>
            </tr>
        </thead>

        <tbody>
        <?php if (!empty($chambres)): ?>
            <?php foreach ($chambres as $c): ?>
                <tr>
                    <td><?= $c['id'] ?></td>
                    <td><?= $c['numero'] ?></td>
                    <td><?= $c['type'] ?></td>
                    <td><?= $c['prix_nuit'] ?? $c['prix'] ?> FCFA</td>
                    <td>
                        <?php if ($c['statut'] == 'Disponible'): ?>
                            <span class="badge bg-success">Disponible</span>
                        <?php elseif ($c['statut'] == 'Occupée'): ?>
                            <span class="badge bg-danger">Occupée</span>
                        <?php else: ?>
                            <span class="badge bg-warning text-dark"><?= $c['statut'] ?></span>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="5" class="text-center">Aucune chambre</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>
</div>
