<?php
require_once 'BaseController.php';

class PersonnelController extends BaseController {

    public function personnel_index() {
        $personnel = $this->db()->query("SELECT * FROM personnel")->fetchAll();
        return $this->view('hotel/personnel_liste', ['personnel' => $personnel]);
    }

    public function personnel_create() {
        return $this->view('hotel/personnel_create');
    }

    // Nouvelle méthode pour enregistrer l'employé
    public function personnel_store() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $sql = "INSERT INTO personnel (nom, prenom, poste) VALUES (?, ?, ?)";
            $stmt = $this->db()->prepare($sql);
            
            // Le code_employe sera généré automatiquement par le TRIGGER
            $stmt->execute([
                $_POST['nom'],
                $_POST['prenom'],
                $_POST['poste']
            ]);

            header('Location: ?url=personnel_index');
            exit;
        }
    }
}
