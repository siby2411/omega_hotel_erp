<div class="card p-4 bg-dark text-white">
    <h2 class="mb-4">✏️ Modifier la Chambre <?= htmlspecialchars($chambre['numero']) ?></h2>
    
    <form method="POST" action="?url=chambres_update&id=<?= $chambre['id'] ?>">
        <div class="row">
            <div class="col-md-4 mb-3">
                <label>Numéro de chambre</label>
                <input type="text" name="numero" class="form-control" value="<?= htmlspecialchars($chambre['numero']) ?>" required>
            </div>
            <div class="col-md-4 mb-3">
                <label>Type</label>
                <select name="type" class="form-control">
                    <option value="Simple" <?= ($chambre['type'] == 'Simple') ? 'selected' : '' ?>>Simple</option>
                    <option value="Double" <?= ($chambre['type'] == 'Double') ? 'selected' : '' ?>>Double</option>
                    <option value="Suite" <?= ($chambre['type'] == 'Suite') ? 'selected' : '' ?>>Suite</option>
                    <option value="Présidentielle" <?= ($chambre['type'] == 'Présidentielle') ? 'selected' : '' ?>>Présidentielle</option>
                </select>
            </div>
            <div class="col-md-4 mb-3">
                <label>Prix par nuit (FCFA)</label>
                <input type="number" name="prix_nuit" class="form-control" value="<?= htmlspecialchars($chambre['prix_nuit']) ?>" required>
            </div>
        </div>

        <div class="mb-3">
            <label>Statut</label>
            <select name="statut" class="form-control">
                <option value="Disponible" <?= ($chambre['statut'] == 'Disponible') ? 'selected' : '' ?>>Disponible</option>
                <option value="Occupée" <?= ($chambre['statut'] == 'Occupée') ? 'selected' : '' ?>>Occupée</option>
                <option value="Maintenance" <?= ($chambre['statut'] == 'Maintenance') ? 'selected' : '' ?>>Maintenance</option>
            </select>
        </div>

        <div class="d-flex justify-content-between">
            <a href="?url=chambres_liste" class="btn btn-secondary">Annuler</a>
            <button type="submit" class="btn btn-warning text-white">Mettre à jour la chambre</button>
        </div>
    </form>
</div>
