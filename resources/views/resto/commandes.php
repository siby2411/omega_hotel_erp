<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="text-white">🧾 Commandes Restauration</h2>
</div>

<div class="card p-3 bg-dark text-white">
    <table class="table table-dark table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Table</th>
                <th>Total</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($commandes)): ?>
                <?php foreach($commandes as $c): ?>
                <tr>
                    <td><?= htmlspecialchars($c['id']) ?></td>
                    <td>Table <?= htmlspecialchars($c['numero']) ?></td>
                    <td><?= number_format($c['total'], 0, ',', ' ') ?> FCFA</td>
                    <td><?= htmlspecialchars($c['date_commande']) ?></td>
                </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="4" class="text-center">Aucune commande enregistrée.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
