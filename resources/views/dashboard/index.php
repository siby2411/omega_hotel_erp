<h1>📊 Tableau de bord OMEGA ERP</h1>

<div style="display:grid;grid-template-columns:repeat(4,1fr);gap:15px">

<div class="card p-3">
<h4>🛏 Chambres</h4>
<h2><?= $stats['chambres'] ?></h2>
<a href="?url=chambres">Voir</a><br>
<a href="?url=chambres_create">➕ Ajouter</a>
</div>

<div class="card p-3">
<h4>👥 Clients</h4>
<h2><?= $stats['clients'] ?></h2>
<a href="?url=clients">Voir</a><br>
<a href="?url=clients_create">➕ Ajouter</a>
</div>

<div class="card p-3">
<h4>📅 Réservations</h4>
<h2><?= $stats['reservations'] ?></h2>
<a href="?url=reservations">Voir</a><br>
<a href="?url=reservations_create">➕ Ajouter</a>
</div>

<div class="card p-3">
<h4>🧾 Factures</h4>
<h2><?= $stats['factures'] ?? 0 ?></h2>
<a href="?url=factures">Voir</a><br>
<a href="?url=factures_create">➕ Ajouter</a>
</div>

</div>

<hr>

<div class="card p-3 mt-4">
<h4>📈 Activité récente</h4>
<p>ERP opérationnel ✔</p>
</div>
