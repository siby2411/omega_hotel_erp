<h2>🧾 Nouvelle Facture</h2>

<form method="POST" action="?url=factures_store">

    <div class="mb-3">
        <label>Réservation</label>
        <select name="reservation_id" class="form-control">
            <?php foreach($reservations as $r): ?>
                <option value="<?= $r['id'] ?>">
                    Réservation #<?= $r['id'] ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="mb-3">
        <label>Montant total</label>
        <input name="montant_total" class="form-control" required>
    </div>

    <button class="btn btn-success">
        Créer facture
    </button>

</form>
