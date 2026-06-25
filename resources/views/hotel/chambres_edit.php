<div class="card p-4 bg-secondary text-white">
    <h3>✏️ Modifier Chambre <?= $chambre['numero'] ?></h3>
    <form method="POST" action="?url=chambres_update">
        <input type="hidden" name="id" value="<?= $chambre['id'] ?>">
        
        <div class="mb-3">
            <label>Numéro de chambre</label>
            <input type="text" name="numero" class="form-control" value="<?= $chambre['numero'] ?>" required>
        </div>
        
        <div class="mb-3">
            <label>Prix (FCFA)</label>
            <input type="number" name="prix" class="form-control" value="<?= $chambre['prix'] ?>" required>
        </div>

        <div class="mb-3">
            <label>Statut</label>
            <select name="statut" class="form-control">
                <option value="Libre" <?= $chambre['statut'] == 'Libre' ? 'selected' : '' ?>>Libre</option>
                <option value="Occupée" <?= $chambre['statut'] == 'Occupée' ? 'selected' : '' ?>>Occupée</option>
            </select>
        </div>
        
        <button type="submit" class="btn btn-primary">Mettre à jour</button>
        <a href="?url=chambres" class="btn btn-secondary">Annuler</a>
    </form>
</div>
