<?php

class Router
{
    public function resolve()
    {
        $controller = new HotelController();
        // On récupère l'url, par défaut 'dashboard'
        $url = $_GET['url'] ?? 'dashboard';

        // Nettoyage : permet d'éviter les erreurs si l'url contient des slashs ou autres
        $method = str_replace('-', '_', $url);

        if (method_exists($controller, $method)) {
            return $controller->$method();
        }

        http_response_code(404);
        echo "Page introuvable : " . htmlspecialchars($method);
    }
}
