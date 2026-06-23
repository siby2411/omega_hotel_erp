<div class="card p-4">
    <h3>📊 États financiers</h3>

    <div class="row mt-3">

        <div class="col-md-4">
            <div class="card p-3 bg-success text-white">
                <h5>💰 Revenus</h5>
                <h3><?= $revenus ?> FCFA</h3>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card p-3 bg-danger text-white">
                <h5>💸 Charges</h5>
                <h3><?= $charges ?> FCFA</h3>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card p-3 bg-primary text-white">
                <h5>📈 Bénéfice</h5>
                <h3><?= $benefice ?> FCFA</h3>
            </div>
        </div>

    </div>
</div>
