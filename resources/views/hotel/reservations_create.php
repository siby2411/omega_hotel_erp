<h2>Nouvelle Réservation</h2>

<form method="post" action="/?url=reservations/store">

    <select name="client_id" class="form-control mb-2">
        <?php foreach($clients as $c): ?>
            <option value="<?= $c['id'] ?>">
                <?= $c['nom'] ?>
            </option>
        <?php endforeach; ?>
    </select>

    <select name="chambre_id" class="form-control mb-2">
        <?php foreach($chambres as $ch): ?>
            <option value="<?= $ch['id'] ?>">
                <?= $ch['numero'] ?>
            </option>
        <?php endforeach; ?>
    </select>

    <input name="date_arrivee" type="date" class="form-control mb-2">
    <input name="date_depart" type="date" class="form-control mb-2">
    <input name="prix_total" class="form-control mb-2">

    <button class="btn btn-success">Réserver</button>
</form>
