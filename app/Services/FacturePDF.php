<?php

use Dompdf\Dompdf;

class FacturePDF {

    public static function generate($facture) {

        $dompdf = new Dompdf();

        $html = "
        <h1>FACTURE OMEGA HOTEL</h1>
        <hr>
        <p>ID: {$facture['id']}</p>
        <p>Montant: {$facture['montant_total']} FCFA</p>
        <p>Date: {$facture['created_at']}</p>
        ";

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        $dompdf->stream('facture_'.$facture['id'].'.pdf', [
            "Attachment" => true
        ]);
    }
}
