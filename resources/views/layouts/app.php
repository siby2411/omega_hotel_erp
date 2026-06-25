<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>OMEGA ERP HOTEL 5★</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background:#0b1220; color:white; }
        .sidebar { width:260px; height:100vh; position:fixed; background:#111827; padding:20px; overflow-y:auto; }
        .sidebar a { display:block; color:white; padding:10px; margin-bottom:6px; text-decoration:none; border-radius:8px; }
        .sidebar a:hover { background:#1f2937; }
        .main { margin-left:270px; padding:20px; }
        .card { background:#1e293b; border-radius:12px; color:white; }
    </style>
</head>
<body>
<div class="sidebar">
    <h3>🏨 OMEGA ERP</h3>
    <a href="?url=dashboard">📊 Dashboard</a>
    <hr>
    <h5>🛏 Chambres</h5>
    <a href="?url=chambres">📋 Liste chambres</a>
    <a href="?url=chambres_create">➕ Ajouter chambre</a>
    <a href="?url=disponibilite">🔍 Rechercher disponibilité</a>
    <hr>
    <h5>👥 Clients</h5>
    <a href="?url=clients">📋 Liste clients</a>
    <a href="?url=clients_create">➕ Ajouter client</a>
    <hr>
    <h5>📅 Réservations</h5>
    <a href="?url=reservations">📋 Liste réservations</a>
    <a href="?url=reservations_create">➕ Ajouter réservation</a>
    <hr>
    <h5>🧾 Facturation</h5>
    <a href="?url=factures">📋 Factures</a>
    <a href="?url=factures_create">➕ Nouvelle facture</a>
    <hr>
    <h5>💰 Finances</h5>
    <a href="?url=paiements">💳 Paiements</a>
    <a href="?url=charges">💸 Charges</a>
    <a href="?url=etat_financier">📊 États financiers</a>
    <hr>
    <h5>👨‍💼 RH</h5>
    <a href="?url=personnel">Personnel</a>
    <a href="?url=paie">Paie</a>
    <hr>
    <h5>💬 Communication</h5>
    <a href="?url=messagerie">Messagerie</a>
</div>
<div class="main"><?= $content ?></div>
</body>
</html>
