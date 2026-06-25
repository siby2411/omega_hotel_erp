<?php
class RestoModel {
    private $db;
    public function __construct($db) { $this->db = $db; }

    public function allProducts() {
        return $this->db->query("SELECT * FROM resto_produits ORDER BY id DESC")->fetchAll();
    }

    public function addProduct($data) {
        $sql = "INSERT INTO resto_produits (nom, categorie, prix, stock) VALUES (?, ?, ?, ?)";
        return $this->db->prepare($sql)->execute([$data['nom'], $data['categorie'], $data['prix'], $data['stock']]);
    }
}
