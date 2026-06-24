<?php

class Router {

    public function resolve() {

        $c = new HotelController();
        $url = $_GET['url'] ?? 'dashboard';

        switch ($url) {

            /* ================= DASHBOARD ================= */
            case 'dashboard':
                return $c->dashboard();

            /* ================= CLIENTS ================= */
            case 'clients':
                return $c->clients();
            case 'clients_create':
                return $c->clients_create();
            case 'clients_store':
                return $c->clients_store();

            /* ================= CHAMBRES ================= */
            case 'chambres':
                return $c->chambres();
            case 'chambres_create':
                return $c->chambres_create();
            case 'chambres_store':
                return $c->chambres_store();

            /* ================= RESERVATIONS ================= */
            case 'reservations':
                return $c->reservations();
            case 'reservations_create':
                return $c->reservations_create();
            case 'reservations_store':
                return $c->reservations_store();

            /* ================= FACTURES ================= */
            case 'factures':
                return $c->factures();
            case 'factures_create':
                return $c->factures_create();
            case 'factures_store':
                return $c->factures_store();

            /* ================= PAIEMENTS ================= */
            case 'paiements':
                return $c->paiements();
            case 'paiements_create':
                return $c->paiements_create();
            case 'paiements_store':
                return $c->paiements_store();

            /* ================= RH ================= */
            case 'paie':
                return $c->paie();
            case 'personnel':
                return $c->personnel();

            /* ================= EXTRA ================= */
            case 'charges':
                return $c->charges();
            case 'messagerie':
                return $c->messagerie();

            default:
                http_response_code(404);
                echo "Page introuvable";
        }
    }
}
