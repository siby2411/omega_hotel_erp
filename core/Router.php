<?php
require_once __DIR__ . '/../app/Controllers/HotelController.php';

class Router {

    public function resolve() {

        $url = $_GET['url'] ?? 'dashboard';
        $controller = new HotelController();

        switch ($url) {

            case 'dashboard':
                return $controller->dashboard();

            case 'chambres':
                return $controller->chambres();

            case 'chambres_create':
                return $controller->createChambre();

            case 'clients':
                return $controller->clients();

            case 'clients_create':
                return $controller->createClient();

            case 'reservations':
                return $controller->reservations();

            case 'reservations_create':
                return $controller->createReservation();

            case 'reservations_store':
                return $controller->storeReservation();

            case 'factures':
                return $controller->factures();

            default:
                http_response_code(404);
                echo "404 - PAGE INTROUVABLE";
        }
    }
}
