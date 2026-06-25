<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="text-white">☕ Gestion du Stock Resto</h2>
    <a href="?url=resto_produits_create" class="btn btn-primary">➕ Nouveau Produit</a>
</div>

<div class="card p-3 bg-dark text-white">
    <table class="table table-dark table-hover">
        <thead>
            <tr>
                <th>Produit</th>
                <th>Catégorie</th>
                <th>Prix (FCFA)</th>
                <th>Stock</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($produits as $p): ?>
            <tr>
                <td><?= htmlspecialchars($p['nom']) ?></td>
                <td><?= htmlspecialchars($p['categorie']) ?></td>
                <td><?= number_format($p['prix'], 0, ',', ' ') ?></td>
                <td>
                    <span class="badge <?= $p['stock'] < 5 ? 'bg-danger' : 'bg-success' ?>">
                        <?= $p['stock'] ?>
                    </span>
                </td>
                <td><button class="btn btn-sm btn-outline-warning">Modifier</button></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
