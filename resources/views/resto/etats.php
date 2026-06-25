<div class="card p-4 bg-dark text-white">
    <h3>📈 État Financier Resto - <?= $periode ?></h3>
    <table class="table table-dark">
        <tr><td>Total Revenus</td><td><?= number_format($stats['revenu'] ?? 0, 0) ?> FCFA</td></tr>
        <tr><td>Nombre Commandes</td><td><?= $stats['nb_commandes'] ?? 0 ?></td></tr>
    </table>
</div>
