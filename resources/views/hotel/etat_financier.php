<div class="container">
    <h2 class="mb-4">📊 États Financiers</h2>
    
    <form method="GET" action="?" class="row g-3 card p-3 mb-4 bg-dark text-white">
        <input type="hidden" name="url" value="etat_financier">
        <div class="col-md-8">
            <input type="date" name="periode" class="form-control" value="<?= $periode ?>" required>
        </div>
        <div class="col-md-4">
            <button type="submit" class="btn btn-primary w-100">Voir les revenus</button>
        </div>
    </form>

    <div class="card p-4 text-center">
        <h3>Revenus encaissés le <?= date('d/m/Y', strtotime($periode)) ?></h3>
        <h1 class="display-3 text-success"><?= number_format($revenus, 0, ',', ' ') ?> FCFA</h1>
    </div>
</div>
