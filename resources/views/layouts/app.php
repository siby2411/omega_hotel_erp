<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>OMEGA HOTEL ERP</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #0f172a;
            color: white;
        }

        .navbar {
            background: #111827;
        }

        .card {
            border: 0;
            border-radius: 15px;
            background: #1e293b;
            color: white;
        }

        .btn-omega {
            background: #38bdf8;
            color: black;
            font-weight: bold;
        }

        a { text-decoration: none; }
    </style>
</head>

<body>

<nav class="navbar navbar-dark px-3">
    <a class="navbar-brand" href="?url=dashboard">🏨 OMEGA ERP</a>

    <div>
        <a class="btn btn-sm btn-light" href="?url=dashboard">Dashboard</a>

        <a class="btn btn-sm btn-light" href="?url=chambres">Chambres</a>
        <a class="btn btn-sm btn-light" href="?url=chambres_create">➕</a>

        <a class="btn btn-sm btn-light" href="?url=clients">Clients</a>
        <a class="btn btn-sm btn-light" href="?url=clients_create">➕</a>

        <a class="btn btn-sm btn-light" href="?url=reservations">Réservations</a>
        <a class="btn btn-sm btn-light" href="?url=reservations_create">➕</a>

        <!-- 🔥 AJOUT FACTURES -->
        <a class="btn btn-sm btn-warning" href="?url=factures">Factures 💳</a>
    </div>
</nav>

<div class="container mt-4">
    <?= $content ?>
</div>

</body>
</html>
