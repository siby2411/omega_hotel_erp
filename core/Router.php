<?php

class Router
{
    public function resolve()
    {
        $controller = new HotelController();

        $url = $_GET['url'] ?? 'dashboard';

        if (method_exists($controller, $url)) {
            return $controller->$url();
        }

        http_response_code(404);
        echo "Page introuvable : $url";
    }
}
