<?php
require_once __DIR__ . '/../app/Controllers/CollaborationController.php';
require_once __DIR__ . '/../app/Controllers/HotelController.php';
require_once __DIR__ . '/../app/Controllers/RestoController.php';
require_once __DIR__ . '/../app/Controllers/PersonnelController.php';
require_once __DIR__ . '/../app/Controllers/LoginController.php';

class Router {
    public function resolve() {
        $url = $_GET['url'] ?? 'dashboard';

        // 0. Gestion spécifique du Login
        if ($url === 'login') {
            $controller = new LoginController();
            $method = 'login';
        }
        // 1. Gestion des routes RESTO
        elseif (strpos($url, 'resto_') === 0) {
            $controller = new RestoController();
            $method = $url;
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
