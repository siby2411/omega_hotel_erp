<h1 class="mb-4">📊 Dashboard OMEGA ERP</h1>

<div class="row g-3">

    <div class="col-md-3">
        <div class="card p-3 text-center">
            <h5>🛏 Chambres</h5>
            <h2><?= $stats['chambres'] ?? 0 ?></h2>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card p-3 text-center">
            <h5>👥 Clients</h5>
            <h2><?= $stats['clients'] ?? 0 ?></h2>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card p-3 text-center">
            <h5>📅 Réservations</h5>
            <h2><?= $stats['reservations'] ?? 0 ?></h2>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card p-3 text-center">
            <h5>🧾 Factures</h5>
            <h2><?= $stats['factures'] ?? 0 ?></h2>
        </div>
    </div>

</div>

<hr class="my-4">

<div class="card p-3">
    <h4>📈 Activité récente</h4>

    <ul>
        <li>✔ Système ERP opérationnel</li>
        <li>✔ Gestion chambres active</li>
        <li>✔ Gestion clients active</li>
        <li>✔ Facturation disponible</li>
    </ul>
</div>
