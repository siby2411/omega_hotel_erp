<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>OMEGA ERP</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body{
    background: linear-gradient(135deg,#0f172a,#1e293b);
    color:white;
}
.card{
    background:#1e293b;
    border-radius:15px;
    padding:20px;
    text-align:center;
}
.btn{
    margin-top:10px;
}
</style>
</head>

<body>

<div class="container mt-5">

    <h2 class="text-center mb-4">🏨 OMEGA HOTEL ERP 2026</h2>
    <p class="text-center">Gestion hôtelière professionnelle - OMEGA CONSULTING</p>

    <div class="row g-4 mt-4">

        <div class="col-md-4">
            <div class="card">
                <h4>Chambres</h4>
                <a href="/?url=chambres" class="btn btn-light">Accéder</a>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <h4>Réservations</h4>
                <a href="/?url=reservations" class="btn btn-light">Accéder</a>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <h4>Clients</h4>
                <a href="/?url=clients" class="btn btn-light">Accéder</a>
            </div>
        </div>

        <!-- FACTURES -->
        <div class="col-md-4">
            <div class="card">
                <h4>Factures 💳</h4>
                <a href="/?url=factures" class="btn btn-warning">Accéder</a>
            </div>
        </div>

    </div>

</div>

</body>
</html>
