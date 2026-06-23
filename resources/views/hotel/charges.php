<div class="card p-4">
    <h3>💸 Charges courantes</h3>

    <a href="?url=charges_create" class="btn btn-success mb-3">➕ Ajouter charge</a>

    <table class="table table-dark">
        <tr>
            <th>ID</th>
            <th>Libellé</th>
            <th>Montant</th>
        </tr>

        <?php foreach ($charges as $c): ?>
        <tr>
            <td><?= $c['id'] ?></td>
            <td><?= $c['libelle'] ?></td>
            <td><?= $c['montant'] ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>
