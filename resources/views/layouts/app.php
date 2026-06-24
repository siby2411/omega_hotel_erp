<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>OMEGA ERP HOTEL 5★</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body { background:#0b1220; color:white; }

.sidebar {
    width:260px;
    height:100vh;
    position:fixed;
    background:#0f172a;
    padding:20px;
}

.main { margin-left:270px; padding:20px; }

a { display:block; color:white; padding:6px; text-decoration:none; }

a:hover { background:#1e293b; border-radius:6px; }

.card { background:#1e293b; border-radius:12px; }
</style>
</head>

<body>

<div class="sidebar">
<h3>🏨 OMEGA ERP</h3>

<a href="?url=dashboard">📊 Dashboard</a>
<a href="?url=chambres">🛏 Chambres</a>
<a href="?url=clients">👥 Clients</a>
<a href="?url=reservations">📅 Réservations</a>
<a href="?url=factures">🧾 Factures</a>
<a href="?url=paiements">💰 Paiements</a>
<a href="?url=personnel">👨‍💼 Personnel</a>
<a href="?url=paie">🧾 Paie</a>
<a href="?url=charges">💸 Charges</a>
<a href="?url=etat_financier">📊 États financiers</a>
<a href="?url=messagerie">💬 Messagerie</a>

</div>

<div class="main">
<?= $content ?>
</div>

</body>
</html>
