<?php
require_once __DIR__ . '/../app/Controllers/CollaborationController.php';

class Router {
    public function resolve() {
        $url = $_GET['url'] ?? 'dashboard';

        // 1. Gestion des routes RESTO
        if (strpos($url, 'resto_') === 0) {
            $controller = new RestoController();
            $method = str_replace('resto_', '', $url);
        } 
        // 2. Gestion des routes COLLABORATION (Nouveau)
        elseif (strpos($url, 'collab_') === 0) {
            $controller = new CollaborationController();
            $method = $url; // On garde tout le nom (ex: collab_index)
        } 
        // 3. Gestion des routes HOTEL
        else {
            $controller = new HotelController();
            $method = $url;
        }

        // Vérification de l'existence de la méthode
        if (method_exists($controller, $method)) {
            return $controller->$method();
        } else {
            die("Erreur 404 : La méthode '$method' n'existe pas dans le contrôleur " . get_class($controller));
        }
    }
}
