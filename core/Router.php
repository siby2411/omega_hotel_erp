<?php

require_once __DIR__ . '/../app/Controllers/HotelController.php';

class Router {

    public function resolve() {

        $url = $_GET['url'] ?? 'dashboard';
        $c = new HotelController();

        switch ($url) {

            case 'dashboard': return $c->dashboard();

            case 'chambres': return $c->chambres();
            case 'chambres_create': return $c->chambres_create();

            case 'clients': return $c->clients();
            case 'clients_create': return $c->clients_create();

            case 'reservations': return $c->reservations();
            case 'reservations_create': return $c->createReservation();
            case 'reservations_store': return $c->storeReservation();

            case 'factures': return $c->factures();
            case 'factures_create': return $c->factures_create();
            case 'factures_store': return $c->factures_store();
            case 'facture_pdf': return $c->facture_pdf();

            case 'paiements': return $c->paiements();
            case 'paiements_create': return $c->createPaiement();

            case 'personnel': return $c->personnel();
            case 'personnel_create': return $c->personnel_create();

            case 'paie': return $c->paie();

            case 'charges': return $c->charges();
            case 'charges_create': return $c->createCharge();
            case 'charges_store': return $c->storeCharge();

            case 'etat_financier': return $c->etatFinancier();

            case 'messagerie': return $c->messagerie();

            case 'analytics': return $c->analytics();

            default:
                http_response_code(404);
                echo "404 - PAGE INTROUVABLE";
        }
    }
}
