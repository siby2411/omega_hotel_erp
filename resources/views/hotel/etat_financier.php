<div class="card p-4">

<h2>📊 États Financiers ERP</h2>

<div class="row">

<div class="col-md-4">
<div class="card p-3 bg-success text-white">
<h4>Revenus</h4>
<h2><?= number_format($revenus,0,',',' ') ?> FCFA</h2>
</div>
</div>

<div class="col-md-4">
<div class="card p-3 bg-danger text-white">
<h4>Charges</h4>
<h2><?= number_format($charges,0,',',' ') ?> FCFA</h2>
</div>
</div>

<div class="col-md-4">
<div class="card p-3 bg-primary text-white">
<h4>Bénéfice</h4>
<h2><?= number_format($benefice,0,',',' ') ?> FCFA</h2>
</div>
</div>

</div>

<hr>

<div class="alert alert-info mt-3">

Prochaine étape :

✔ Revenus du jour

✔ Revenus du mois

✔ Charges du jour

✔ Charges du mois

✔ États financiers par période

</div>

</div>
