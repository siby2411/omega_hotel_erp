<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>👥 Liste des Clients</h2>
    <a href="?url=clients_create" class="btn btn-primary">➕ Ajouter un client</a>
</div>

<div class="card p-3">
    <table class="table table-dark table-hover">
        <thead>
            <tr>
                <th>ID</th><th>Code</th><th>Nom</th><th>Prénom</th><th>Téléphone</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($clients as $c): ?>
            <tr>
                <td><?= $c['id'] ?></td>
                <td><?= $c['code_client'] ?></td>
                <td><?= $c['nom'] ?></td>
                <td><?= $c['prenom'] ?></td>
                <td><?= $c['telephone'] ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
