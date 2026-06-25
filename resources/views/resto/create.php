<div class="card p-4 bg-dark text-white">
    <h3 class="mb-4">➕ Ajouter/Approvisionner un Produit</h3>
    <form method="POST" action="?url=resto_produits_store">
        <div class="mb-3">
            <label>Nom du produit</label>
            <input type="text" name="nom" class="form-control" required>
        </div>
        <div class="row">
            <div class="col-md-4">
                <label>Catégorie</label>
                <select name="categorie" class="form-control">
                    <option>Boisson</option>
                    <option>Plat</option>
                    <option>Café</option>
                </select>
            </div>
            <div class="col-md-4">
                <label>Prix</label>
                <input type="number" name="prix" class="form-control" required>
            </div>
            <div class="col-md-4">
                <label>Stock Initial</label>
                <input type="number" name="stock" class="form-control" required>
            </div>
        </div>
        <button type="submit" class="btn btn-success mt-3">Enregistrer</button>
    </form>
</div>
