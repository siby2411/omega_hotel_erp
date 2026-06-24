<?php

class Router {

    public function resolve() {

        $url = $_GET['url'] ?? 'dashboard';

        $controller = new HotelController();

        switch ($url) {

            /* ================= DASHBOARD ================= */
            case 'dashboard':
            case '':
                return $controller->dashboard();

            /* ================= CHAMBRES ================= */
            case 'chambres':
                return $controller->chambres();

            case 'chambres_create':
                return $controller->chambres_create();

            /* ================= CLIENTS ================= */
            case 'clients':
                return $controller->clients();

            case 'clients_create':
                return $controller->clients_create();

            /* ================= RESERVATIONS ================= */
            case 'reservations':
                return $controller->reservations();

            case 'reservations_create':
                return $controller->reservations_create();

            /* ================= FACTURES ================= */
            case 'factures':
                return $controller->factures();

            case 'factures_create':
                return $controller->factures_create();

            case 'factures_store':
                return $controller->factures_store();

            /* ================= PAIEMENTS ================= */
            case 'paiements':
                return $controller->paiements();

            case 'paiements_create':
                return $controller->paiements_create();

            case 'paiements_store':
                return $controller->paiements_store();

            /* ================= RH ================= */
            case 'paie':
                return $controller->paie();

            case 'personnel':
                return $controller->personnel();

            /* ================= FINANCES ================= */
            case 'charges':
                return $controller->charges();

            /* ================= COMMUNICATION ================= */
            case 'messagerie':
                return $controller->messagerie();

            /* ================= DEFAULT ================= */
            default:
                http_response_code(404);
                echo "Page introuvable : " . htmlspecialchars($url);
                return;
        }
    }
}
