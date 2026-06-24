<h2>💳 Nouveau Paiement</h2>

<form method="POST" action="?url=paiements_store">

    <label>Facture</label>
    <select name="facture_id" class="form-control" required>
        <?php foreach($factures as $f): ?>
            <option value="<?= $f['id'] ?>">
                <?= $f['nom'] ?> <?= $f['prenom'] ?> - <?= $f['montant_total'] ?> FCFA
            </option>
        <?php endforeach; ?>
    </select>

    <label>Montant</label>
    <input type="number" name="montant" class="form-control" required>

    <label>Mode paiement</label>
    <select name="mode_paiement" class="form-control">
        <option>Espèce</option>
        <option>Carte</option>
        <option>Virement</option>
    </select>

    <button class="btn btn-primary mt-2">Valider</button>

</form>
