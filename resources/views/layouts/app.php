<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>OMEGA ERP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-3 col-lg-2 bg-dark text-white p-3 min-vh-100">
                <h4 class="text-primary">OMEGA ERP</h4>
                <hr>
                <ul class="nav flex-column">
                    <li class="nav-item"><a class="nav-link text-white" href="?url=dashboard">📊 Dashboard</a></li>
                    
                    <h6 class="text-secondary mt-3">🛏️ Hôtel & Clients</h6>
                    <li class="nav-item"><a class="nav-link text-white" href="?url=chambres">• Liste Chambres</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="?url=chambres_create">• + Ajouter Chambre</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="?url=disponibilite">• 🔍 Disponibilité</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="?url=clients">• Liste Clients</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="?url=reservations">• Réservations</a></li>
                    
                    <h6 class="text-secondary mt-3">👥 Personnel</h6>
                    <li class="nav-item"><a class="nav-link text-white" href="?url=personnel_index">• Liste Personnel</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="?url=personnel_create">• + Ajouter Employé</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="?url=paie">• 💸 Gestion Paie</a></li>
                    
                    <h6 class="text-secondary mt-3">💬 Collaboration</h6>
                    <li class="nav-item"><a class="nav-link text-white" href="?url=collab_index">• Messagerie</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="?url=collab_planning">• Agenda Planning</a></li>
                    
                    <h6 class="text-secondary mt-3">🍽️ Resto & Stock</h6>
                    <li class="nav-item"><a class="nav-link text-white" href="?url=resto_index">• Stock Produits</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="?url=charges">• 📉 Charges & Dépenses</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="?url=resto_commandes">• Caisse Resto</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="?url=resto_etats_financiers">• États Financiers</a></li>
                </ul>
            </nav>

            <main class="col-md-9 col-lg-10 p-4">
                <?php echo $content; ?>
            </main>
        </div>
    </div>
</body>
</html>
