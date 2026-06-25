<?php
require_once __DIR__ . '/../app/Controllers/CollaborationController.php';
require_once __DIR__ . '/../app/Controllers/HotelController.php';
require_once __DIR__ . '/../app/Controllers/RestoController.php';
require_once __DIR__ . '/../app/Controllers/PersonnelController.php';

class Router {
    public function resolve() {
        $url = $_GET['url'] ?? 'dashboard';

        // 1. Gestion des routes RESTO
        if (strpos($url, 'resto_') === 0) {
            $controller = new RestoController();
            $method = $url; // On garde le nom complet pour correspondre aux méthodes
        }
        // 2. Gestion des routes COLLABORATION
        elseif (strpos($url, 'collab_') === 0) {
            $controller = new CollaborationController();
            $method = $url;
        }
        // 3. Gestion des routes PERSONNEL
        elseif (strpos($url, 'personnel_') === 0) {
            $controller = new PersonnelController();
            $method = $url;
        }
        // 4. Gestion des routes HOTEL (Default)
        else {
            $controller = new HotelController();
            $method = $url;
        }

        // Exécution de la méthode
        if (method_exists($controller, $method)) {
            return $controller->$method();
        } else {
            die("Erreur 404 : La méthode '$method' n'existe pas dans le contrôleur " . get_class($controller));
        }
    }
}
