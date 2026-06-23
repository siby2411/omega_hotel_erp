<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>OMEGA HOTEL ERP</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body { background:#0f172a; color:white; }
.navbar { background:#111827; }
.card { background:#1e293b; border:0; border-radius:15px; }
a { color:white; text-decoration:none; }
.btn { margin-right:5px; }
</style>
</head>

<body>

<nav class="navbar px-3">
    <a href="?url=dashboard">🏨 OMEGA ERP</a>

    <div>
        <a href="?url=chambres">Chambres</a>
        <a href="?url=chambres_create">➕</a>

        <a href="?url=clients">Clients</a>
        <a href="?url=clients_create">➕</a>

        <a href="?url=reservations">Réservations</a>
        <a href="?url=reservations_create">➕</a>

        <a href="?url=factures">Factures</a>
        <a href="?url=paiements">Paiements</a>
        <a href="?url=personnel">Personnel</a>
        <a href="?url=paie">Paie</a>
        <a href="?url=messagerie">Messagerie</a>
    </div>
</nav>

<div class="container mt-4">
{{content}}
</div>

</body>
</html>
