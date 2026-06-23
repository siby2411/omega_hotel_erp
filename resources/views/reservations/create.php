<h2>➕ Nouvelle Réservation</h2>

<form method="POST" action="?url=reservations_store">

    <div class="mb-3">
        <label>Client</label>
        <select name="client_id" class="form-control" required>
            <?php foreach($clients as $c): ?>
                <option value="<?= $c['id'] ?>"><?= $c['nom'] ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="mb-3">
        <label>Chambre</label>
        <select name="chambre_id" class="form-control" required>
            <?php foreach($chambres as $ch): ?>
                <option value="<?= $ch['id'] ?>"><?= $ch['numero'] ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="mb-3">
        <label>Date arrivée</label>
        <input type="date" name="date_arrivee" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Date départ</label>
        <input type="date" name="date_depart" class="form-control" required>
    </div>

    <button class="btn btn-primary">Valider réservation</button>

</form>
