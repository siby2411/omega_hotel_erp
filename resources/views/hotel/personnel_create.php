<div class="card bg-dark text-white p-4">
    <h3>➕ Ajouter un Employé</h3>
    <form action="?url=personnel_store" method="POST">
        <div class="mb-3"><label>Code Employé</label><input type="text" name="code" class="form-control" required></div>
        <div class="mb-3"><label>Nom</label><input type="text" name="nom" class="form-control" required></div>
        <div class="mb-3"><label>Prénom</label><input type="text" name="prenom" class="form-control" required></div>
        <div class="mb-3"><label>Poste</label><input type="text" name="poste" class="form-control" required></div>
        <button type="submit" class="btn btn-primary">Enregistrer</button>
    </form>
</div>
