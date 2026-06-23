<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>OMEGA HOTEL ERP 5★</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <style>
        body {
            background: #0b1220;
            color: white;
            font-family: Arial;
        }

        .sidebar {
            width: 260px;
            height: 100vh;
            position: fixed;
            background: #0f172a;
            padding: 20px;
            overflow-y: auto;
        }

        .sidebar h2 {
            font-size: 18px;
            margin-bottom: 20px;
            color: #38bdf8;
        }

        .sidebar a {
            display: block;
            padding: 10px;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            margin-bottom: 5px;
        }

        .sidebar a:hover {
            background: #1e293b;
        }

        .main {
            margin-left: 270px;
            padding: 20px;
        }

        .topbar {
            background: #111827;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .card {
            background: #1e293b;
            border: none;
            border-radius: 15px;
        }

        .kpi {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 15px;
        }

        .kpi .card {
            padding: 15px;
            text-align: center;
        }

        .badge {
            background: #38bdf8;
        }
    </style>
</head>

<body>

<div class="sidebar">
    <h2>🏨 OMEGA ERP</h2>

    <a href="?url=dashboard">📊 Dashboard</a>
    <a href="?url=chambres">🛏 Chambres</a>
    <a href="?url=chambres_create">➕ Ajouter Chambre</a>

    <a href="?url=clients">👥 Clients</a>
    <a href="?url=clients_create">➕ Ajouter Client</a>

    <a href="?url=reservations">📅 Réservations</a>
    <a href="?url=reservations_create">➕ Réservation</a>

    <a href="?url=factures">💳 Factures</a>
    <a href="?url=paiements">💰 Paiements</a>

    <a href="?url=personnel">👨‍💼 Personnel</a>
    <a href="?url=paie">🧾 Paie</a>

    <a href="?url=messagerie">💬 Messagerie</a>
</div>

<div class="main">

    <div class="topbar">
        <h4>🏨 OMEGA HOTEL ERP - Système de gestion 5★</h4>
    </div>

    <?= $content ?>

</div>

</body>
</html>
