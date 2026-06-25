<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="text-white">🏨 Plan d'Occupation des Chambres</h2>
    <a href="?url=chambres_create" class="btn btn-primary">➕ Ajouter une chambre</a>
</div>

<?php foreach ($chambresParEtage as $etage => $chambres): ?>
    <h4 class="text-secondary border-bottom border-secondary pb-2 mb-3">🏢 Étage <?= htmlspecialchars($etage) ?></h4>
    <div class="row">
        <?php foreach ($chambres as $c): ?>
            <div class="col-md-3 mb-3">
                <div class="card bg-dark text-white shadow-sm p-3 h-100">
                    <div class="d-flex justify-content-between">
                        <strong>Chambre <?= htmlspecialchars($c['numero']) ?></strong>
                        <span class="badge <?= ($c['statut'] == 'Disponible') ? 'bg-success' : 'bg-danger' ?>">
                            <?= htmlspecialchars($c['statut']) ?>
                        </span>
                    </div>
                    <p class="mb-0 small"><?= htmlspecialchars($c['type']) ?> - <?= number_format($c['prix_nuit'], 0) ?> FCFA</p>
                    
                    <div class="mt-3 d-flex gap-2">
                        <a href="?url=chambres_edit&id=<?= $c['id'] ?>" class="btn btn-sm btn-outline-warning">✏️</a>
                        <a href="?url=chambres_delete&id=<?= $c['id'] ?>" 
                           class="btn btn-sm btn-outline-danger" 
                           onclick="return confirm('Confirmer la suppression de la chambre <?= $c['numero'] ?> ?')">🗑️</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php endforeach; ?>
