<h2>🧾 Nouvelle Facture</h2>

<form method="POST" action="?url=factures_store">

    <label>Réservation (Client + Code + Chambre)</label>

    <select name="reservation_id" class="form-control" required>

        <?php foreach($reservations as $r): ?>
            <option value="<?= $r['id'] ?>">
                <?= $r['code_client'] ?> -
                <?= $r['nom'] ?> <?= $r['prenom'] ?> -
                Chambre <?= $r['chambre'] ?> -
                <?= $r['prix_total'] ?> FCFA
            </option>
        <?php endforeach; ?>

    </select>

    <br>

    <button class="btn btn-success">
        Générer Facture
    </button>

</form>
