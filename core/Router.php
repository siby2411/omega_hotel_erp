<?php
class Router {
    public function resolve() {
        $url = $_GET['url'] ?? 'dashboard';
        
        // 1. Gestion des routes RESTO (Préfixe resto_)
        if (strpos($url, 'resto_') === 0) {
            $controller = new RestoController();
            $method = str_replace('resto_', '', $url);
        } else {
            // 2. Gestion des routes HOTEL (Par défaut)
            $controller = new HotelController();
            $method = $url;
        }

        // Vérification de l'existence de la méthode
        if (method_exists($controller, $method)) {
            return $controller->$method();
        } else {
            die("Erreur 404 : La méthode '$method' n'existe pas dans le contrôleur.");
        }
    }
}
