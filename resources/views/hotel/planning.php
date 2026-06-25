<div class="card bg-dark text-white p-4">
    <h3>🗓️ Agenda et Planning du Personnel</h3>
    <table class="table table-dark table-striped mt-3">
        <thead>
            <tr>
                <th>Employé</th>
                <th>Date</th>
                <th>Rotation</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($planning as $p): ?>
            <tr>
                <td><?= $p['prenom'] . ' ' . $p['nom'] ?></td>
                <td><?= $p['date_debut'] ?></td>
                <td><span class="badge bg-info"><?= $p['type_rotation'] ?></span></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
