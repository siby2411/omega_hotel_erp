<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>OMEGA ERP HOTEL</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
    background:linear-gradient(135deg,#0f172a,#1e293b);
    color:white;
}

.navbar{
    background:#111827;
}

.card{
    background:rgba(255,255,255,.08);
    border-radius:20px;
    border:none;
}

.btn-omega{
    background:#e11d48;
    color:white;
}

.btn-omega:hover{
    background:#be123c;
}

</style>

</head>
<body>

<nav class="navbar navbar-dark px-4">
    <span class="navbar-brand">
        🏨 OMEGA INFORMATIQUE CONSULTING
    </span>

    <div>
        <a href="?url=dashboard" class="btn btn-light btn-sm">
            Dashboard
        </a>

        <a href="?url=chambres" class="btn btn-light btn-sm">
            Chambres
        </a>

        <a href="?url=clients" class="btn btn-light btn-sm">
            Clients
        </a>

        <a href="?url=reservations" class="btn btn-light btn-sm">
            Réservations
        </a>

        <a href="?url=factures" class="btn btn-warning btn-sm">
            Factures
        </a>

        <a href="?url=paiements" class="btn btn-success btn-sm">
            Paiements
        </a>

        <a href="?url=personnel" class="btn btn-info btn-sm">
            Personnel
        </a>

        <a href="?url=paie" class="btn btn-secondary btn-sm">
            Paie
        </a>

        <a href="?url=messagerie" class="btn btn-primary btn-sm">
            Messagerie
        </a>

    </div>
</nav>

<div class="container mt-5">

    <div class="text-center mb-4">
        <h1>🏨 HOTEL ERP 2026</h1>
        <p>Gestion hôtelière professionnelle - OMEGA CONSULTING</p>
    </div>

    <div class="row g-4">

        <div class="col-md-3">
            <div class="card p-3 text-center">
                <h5>🛏 Chambres</h5>

                <a href="?url=chambres"
                   class="btn btn-omega">
                   Liste
                </a>

                <a href="?url=chambres_create"
                   class="btn btn-success mt-2">
                   Ajouter
                </a>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card p-3 text-center">
                <h5>👥 Clients</h5>

                <a href="?url=clients"
                   class="btn btn-omega">
                   Liste
                </a>

                <a href="?url=clients_create"
                   class="btn btn-success mt-2">
                   Ajouter
                </a>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card p-3 text-center">
                <h5>📅 Réservations</h5>

                <a href="?url=reservations"
                   class="btn btn-omega">
                   Liste
                </a>

                <a href="?url=reservations_create"
                   class="btn btn-success mt-2">
                   Ajouter
                </a>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card p-3">
                <h5>💳 Facturation</h5>

                <a href="?url=factures"
                   class="btn btn-warning">
                   Liste
                </a>

                <a href="?url=factures_create"
                   class="btn btn-success mt-2">
                   Ajouter
                </a>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card p-3">
                <h5>💰 Paiements</h5>

                <a href="?url=paiements"
                   class="btn btn-success">
                   Liste
                </a>

                <a href="?url=paiements_create"
                   class="btn btn-primary mt-2">
                   Ajouter
                </a>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card p-3">
                <h5>👨‍💼 Personnel</h5>

                <a href="?url=personnel"
                   class="btn btn-info">
                   Liste
                </a>

                <a href="?url=personnel_create"
                   class="btn btn-success mt-2">
                   Ajouter
                </a>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card p-3">
                <h5>🧾 Paie</h5>

                <a href="?url=paie"
                   class="btn btn-secondary">
                   Bulletins
                </a>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card p-3">
                <h5>💬 Messagerie</h5>

                <a href="?url=messagerie"
                   class="btn btn-primary">
                   Ouvrir
                </a>
            </div>
        </div>

    </div>

</div>

</body>
</html>
