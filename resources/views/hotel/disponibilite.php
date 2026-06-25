<div class="container-fluid">
    <h2 class="text-white mb-4">🔍 Recherche de Disponibilité</h2>
    
    <form method="GET" action="?" class="row g-3 card p-3 mb-4 bg-dark text-white">
        <input type="hidden" name="url" value="disponibilite">
        <div class="col-md-5">
            <label>Date d'arrivée</label>
            <input type="date" name="date_arrivee" class="form-control" value="<?= $_GET['date_arrivee'] ?? '' ?>" required>
        </div>
        <div class="col-md-5">
            <label>Date de départ</label>
            <input type="date" name="date_depart" class="form-control" value="<?= $_GET['date_depart'] ?? '' ?>" required>
        </div>
        <div class="col-md-2 d-flex align-items-end">
            <button type="submit" class="btn btn-success w-100">Rechercher</button>
        </div>
    </form>

    <?php if (isset($_GET['date_arrivee'])): ?>
    <div class="row">
        <?php foreach ($chambres as $c): ?>
            <div class="col-md-3 mb-3">
                <div class="card bg-success text-white p-3">
                    <h5>Chambre <?= $c['numero'] ?></h5>
                    <p><?= $c['type'] ?> - <?= $c['prix_nuit'] ?> FCFA</p>
                    <a href="?url=reservations_create&chambre_id=<?= $c['id'] ?>" class="btn btn-light btn-sm">Réserver</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>
</div>
