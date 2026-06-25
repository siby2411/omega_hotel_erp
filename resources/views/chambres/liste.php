<div class="d-flex justify-content-between align-items-center mb-4">
    <h3>🏢 Plan d'Occupation des Chambres</h3>
    <a href="?url=chambres_create" class="btn btn-primary">➕ Ajouter une chambre</a>
</div>

<div class="row">
    <?php foreach($chambresParEtage as $chambre): ?>
    <div class="col-md-3">
        <div class="card <?= ($chambre['statut'] == 'Libre') ? 'bg-success' : 'bg-secondary' ?> text-white mb-3 shadow">
            <div class="card-body">
                <h5 class="card-title">Chambre <?= htmlspecialchars($chambre['numero']) ?></h5>
                <p>Statut : <?= $chambre['statut'] ?></p>
                
                <?php if($chambre['statut'] == 'Libre'): ?>
                    <a href="?url=reservations_create&chambre_id=<?= $chambre['id'] ?>" class="btn btn-light btn-sm w-100 mb-2">Réserver</a>
                <?php endif; ?>

                <div class="btn-group w-100">
                    <a href="?url=chambres_edit&id=<?= $chambre['id'] ?>" class="btn btn-sm btn-warning">✏️ Modifier</a>
                    <a href="?url=chambres_delete&id=<?= $chambre['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Confirmer ?')">🗑️ Supprimer</a>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>
