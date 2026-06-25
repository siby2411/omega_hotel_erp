<?php
require_once 'BaseController.php';

class RestoController extends BaseController {

    public function index() {
        $produits = $this->db()->query("SELECT * FROM resto_produits ORDER BY id DESC")->fetchAll();
        return $this->view('resto/index', ['produits' => $produits]);
    }

    public function produits_create() {
        return $this->view('resto/create');
    }

    public function produits_store() {
        $sql = "INSERT INTO resto_produits (nom, categorie, prix, stock) VALUES (?, ?, ?, ?)";
        $stmt = $this->db()->prepare($sql);
        $stmt->execute([$_POST['nom'], $_POST['categorie'], $_POST['prix'], $_POST['stock']]);
        header('Location: ?url=resto_index');
        exit;
    }

    public function commandes() {
        $sql = "SELECT r.*, t.numero FROM resto_commandes r 
                JOIN resto_tables t ON t.id = r.table_id 
                ORDER BY r.id DESC";
        $commandes = $this->db()->query($sql)->fetchAll();
        return $this->view('resto/commandes', ['commandes' => $commandes]);
    }



public function etats_financiers() {
    $periode = $_GET['periode'] ?? date('Y-m'); // Par défaut mois actuel
    $sql = "SELECT SUM(total) as revenu, COUNT(id) as nb_commandes 
            FROM resto_commandes 
            WHERE DATE_FORMAT(date_commande, '%Y-%m') = ?";
    $stats = $this->db()->prepare($sql);
    $stats->execute([$periode]);
    $resultat = $stats->fetch();
    
    return $this->view('resto/etats', ['stats' => $resultat, 'periode' => $periode]);
}









}
