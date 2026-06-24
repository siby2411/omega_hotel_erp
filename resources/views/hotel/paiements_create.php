<div class="card p-4">
    <h3>💳 Nouveau Paiement</h3>

    <form method="POST" action="?url=paiements_store">

        <label>Facture</label>
        <select name="facture_id" class="form-control" required>
            <option value="">-- Choisir une facture --</option>

            <?php foreach($factures as $f): ?>
                <option value="<?= $f['id'] ?>">
                    <?= $f['nom'] ?> <?= $f['prenom'] ?>
                    (<?= $f['code_client'] ?>)
                    - <?= $f['montant_total'] ?> FCFA
                </option>
            <?php endforeach; ?>
        </select>

        <br>

        <label>Montant</label>
        <input type="number" name="montant" class="form-control" required>

        <br>

        <label>Mode paiement</label>
        <select name="mode_paiement" class="form-control">
            <option>Espèce</option>
            <option>Carte</option>
            <option>Virement</option>
        </select>

        <br>

        <button class="btn btn-primary">Valider paiement</button>

    </form>
</div>
