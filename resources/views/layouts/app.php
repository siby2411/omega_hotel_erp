<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>OMEGA ERP - Gestion Complète</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .nav-link { transition: 0.3s; }
        .nav-link:hover { color: #0d6efd !important; padding-left: 15px; }
    </style>
</head>
<body class="bg-dark text-white">
    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 bg-black vh-100 p-3 shadow">
                <h4 class="text-primary text-center">OMEGA ERP</h4>
                <hr class="text-secondary">
                <ul class="nav flex-column">
                    <li class="nav-item"><a href="?url=dashboard" class="nav-link text-white">📊 Dashboard</a></li>
                    
                    <h6 class="text-secondary mt-3 text-uppercase small">🛏️ Hôtel & Clients</h6>
                    <li class="nav-item"><a href="?url=chambres" class="nav-link text-white small">• Liste Chambres</a></li>
                    <li class="nav-item"><a href="?url=chambres_create" class="nav-link text-white small">• + Ajouter Chambre</a></li>
                    <li class="nav-item"><a href="?url=clients" class="nav-link text-white small">• Liste Clients</a></li>
                    <li class="nav-item"><a href="?url=clients_create" class="nav-link text-white small">• + Ajouter Client</a></li>
                    <li class="nav-item"><a href="?url=reservations" class="nav-link text-white small">• Liste Réservations</a></li>
                    <li class="nav-item"><a href="?url=reservations_create" class="nav-link text-white small">• + Nouvelle Réservation</a></li>

                    <h6 class="text-secondary mt-3 text-uppercase small">💬 Collaboration</h6>
                    <li class="nav-item"><a href="?url=collab_index" class="nav-link text-white small">• Messagerie</a></li>
                    <li class="nav-item"><a href="?url=collab_planning" class="nav-link text-white small">• Agenda Planning</a></li>

                    <h6 class="text-secondary mt-3 text-uppercase small">🍽️ Resto & Stock</h6>
                    <li class="nav-item"><a href="?url=resto_index" class="nav-link text-white small">• Stock Produits</a></li>
                    <li class="nav-item"><a href="?url=resto_produits_create" class="nav-link text-white small">• + Ajouter Produit</a></li>
                    <li class="nav-item"><a href="?url=collab_gestion_caisse" class="nav-link text-white small">• Caisse Resto</a></li>
                    <li class="nav-item"><a href="?url=resto_etats_financiers" class="nav-link text-white small">• États Financiers</a></li>
                    <li class="nav-item"><a href="?url=finance_global" class="nav-link text-white small">• 💰 État Global</a></li>
                </ul>
            </nav>
            <main class="col-md-10 p-4">
                <?= $content ?? '' ?>
            </main>
        </div>
    </div>
</body>
</html>
