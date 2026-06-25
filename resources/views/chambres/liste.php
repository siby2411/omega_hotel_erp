<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="text-white">🏨 Plan d'Occupation des Chambres</h2>
    <a href="?url=chambres_create" class="btn btn-primary"> ➕ Ajouter une chambre</a>
</div>

<?php if (empty($chambresParEtage)): ?>
    <div class="alert alert-info">Aucune chambre enregistrée dans la base de données.</div>
<?php else: ?>
    <?php foreach ($chambresParEtage as $etage => $chambres): ?>
        <div class="mb-5">
            <h4 class="text-secondary border-bottom border-secondary pb-2 mb-3">🏢 Étage <?= htmlspecialchars($etage) ?></h4>
            <div class="row">
                <?php foreach ($chambres as $c): ?>
                    <?php 
                        // Définition de la couleur et du lien selon le statut
                        $isAvailable = ($c['statut'] == 'Disponible');
                        $color = $isAvailable ? 'bg-success' : 
                                 (($c['statut'] == 'Occupée') ? 'bg-danger' : 'bg-warning');
                        $link = $isAvailable ? "?url=reservations_create&chambre_id=" . $c['id'] : "#";
                    ?>
                    <div class="col-md-3 mb-3">
                        <a href="<?= $link ?>" class="text-decoration-none">
                            <div class="card <?= $color ?> text-white shadow-sm p-3 h-100">
                                <div class="d-flex justify-content-between">
                                    <strong>Chambre <?= htmlspecialchars($c['numero']) ?></strong>
                                    <small><?= htmlspecialchars($c['type']) ?></small>
                                </div>
                                <div class="mt-2">
                                    <small>Prix: <?= number_format($c['prix_nuit'], 0, ',', ' ') ?> FCFA</small><br>
                                    <strong><?= htmlspecialchars($c['statut']) ?></strong>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endforeach; ?>
<?php endif; ?>
