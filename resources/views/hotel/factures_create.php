<div class="card p-4">
    <h4>🧾 Nouvelle Facture</h4>

    <form method="POST" action="?url=factures_store">

        <label>Réservation</label>
        <select name="reservation_id" class="form-control" required>
            <option value="">-- Choisir une réservation --</option>

            <?php foreach($reservations as $r): ?>
                <option value="<?= $r['id'] ?>">
                    <?= $r['nom'] ?> <?= $r['prenom'] ?>
                    (<?= $r['code_client'] ?>)
                    - Chambre <?= $r['chambre'] ?>
                    - <?= $r['prix_total'] ?> FCFA
                </option>
            <?php endforeach; ?>

        </select>

        <br>

        <button class="btn btn-primary">Créer facture</button>
    </form>
</div>
