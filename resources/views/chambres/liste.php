<div class="d-flex justify-content-between align-items-center mb-4">
    <h3>🏢 Plan d'Occupation des Chambres</h3>
    <a href="?url=chambres_create" class="btn btn-primary">➕ Ajouter une chambre</a>
</div>

<div class="row">
    <?php foreach($chambresParEtage as $chambre): ?>
    <div class="col-md-3">
        <div class="card bg-secondary text-white mb-3 shadow">
            <div class="card-body">
                <h5 class="card-title">Chambre <?= htmlspecialchars($chambre['numero']) ?></h5>
                <p class="card-text">Prix : <?= number_format($chambre['prix'], 0, ',', ' ') ?> FCFA</p>
                <div class="btn-group">
                    <a href="#" class="btn btn-sm btn-warning">✏️</a>
                    <a href="#" class="btn btn-sm btn-danger">🗑️</a>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>
