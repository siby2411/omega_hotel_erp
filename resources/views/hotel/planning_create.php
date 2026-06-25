<div class="card bg-dark text-white p-4 shadow">
    <h3>➕ Ajouter une rotation au Planning</h3>
    <form action="?url=collab_save_planning" method="POST">
        <div class="mb-3">
            <label class="form-label">Sélectionner l'Employé</label>
            <select name="employe_code" class="form-select bg-secondary text-white" required>
                <?php foreach($personnel as $e): ?>
                    <option value="<?= $e['code_employe'] ?>">
                        <?= $e['nom'] ?> <?= $e['prenom'] ?> (<?= $e['code_employe'] ?>)
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Date et Heure</label>
            <input type="datetime-local" name="date_debut" class="form-control bg-secondary text-white" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Type de Rotation</label>
            <input type="text" name="type_rotation" class="form-control bg-secondary text-white" placeholder="ex: Service Caisse / Resto" required>
        </div>
        <button type="submit" class="btn btn-primary w-100">Enregistrer dans l'Agenda</button>
    </form>
</div>
