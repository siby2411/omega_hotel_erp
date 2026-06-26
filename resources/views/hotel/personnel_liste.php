resources/views/hotel/personnel_liste.php    

       <div class="card bg-dark text-white p-4">                       <h3>👥 Liste du Personnel</h3>                              

<table class="table table-dark table-striped mt-3">
    <thead>
        <tr><th>Code</th><th>Nom</th><th>Prénom</th><th>Poste</th></tr>
    </thead>
    <tbody>
        <?php foreach($personnel as $p): ?>
        <tr>
            <td><?= $p['code_employe'] ?? 'N/A' ?></td>
            <td><?= $p['nom'] ?></td>
            <td><?= $p['prenom'] ?></td>
            <td><?= $p['poste'] ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</div>
