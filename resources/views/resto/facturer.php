<div class="card p-4 bg-dark text-white">
    <h3>🧾 Nouvelle Facture Resto</h3>
    <form method="POST" action="?url=resto_store_facture">
        <div id="items-container">
            <div class="row item-row mb-3">
                <div class="col-6">
                    <label>Produit</label>
                    <select name="produits[]" class="form-control" required>
                        <?php foreach($produits as $p): ?>
                            <option value="<?= $p['id'] ?>">[<?= $p['code'] ?>] <?= $p['nom'] ?> - <?= $p['prix'] ?> FCFA</option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-4">
                    <label>Quantité</label>
                    <input type="number" name="quantites[]" class="form-control" value="1" min="1" required>
                </div>
            </div>
        </div>
        <button type="button" onclick="ajouterLigne()" class="btn btn-secondary btn-sm">➕ Ajouter un produit</button>
        <button type="submit" class="btn btn-success">Valider la Facture</button>
    </form>
</div>

<script>
function ajouterLigne() {
    const container = document.getElementById('items-container');
    const nouvelleLigne = container.querySelector('.item-row').cloneNode(true);
    container.appendChild(nouvelleLigne);
}
</script>
