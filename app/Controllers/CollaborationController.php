<?php
require_once 'BaseController.php';

class CollaborationController extends BaseController {

    // --- MESSAGERIE ---
    public function index() {
        $messages = $this->db()->query("SELECT * FROM messages ORDER BY date_envoi DESC")->fetchAll();
        return $this->view('messagerie/index', ['messages' => $messages]);
    }

    public function envoyer_message() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $sql = "INSERT INTO messages (expediteur_code, destinataire_code, objet, contenu) VALUES (?, ?, ?, ?)";
            $this->db()->prepare($sql)->execute([
                $_POST['expediteur'], $_POST['destinataire'], $_POST['objet'], $_POST['contenu']
            ]);
            header('Location: ?url=collab_index');
        }
    }

    // --- PLANNING & AGENDA ---
    public function planning() {
        $planning = $this->db()->query("SELECT p.*, e.nom, e.prenom FROM planning_personnel p JOIN personnel e ON p.employe_code = e.code_employe")->fetchAll();
        return $this->view('hotel/planning', ['planning' => $planning]);
    }

    public function gestion_caisse() {
        $caisse = $this->db()->query("SELECT * FROM caisse_resto ORDER BY date_service DESC")->fetchAll();
        return $this->view('hotel/caisse', ['caisse' => $caisse]);
    }


public function agenda_donnees() {
    $mois = $_GET['mois'] ?? date('m');
    $annee = $_GET['annee'] ?? date('Y');
    
    // Récupère les plannings du mois
    $sql = "SELECT p.*, e.nom, e.prenom 
            FROM planning_personnel p 
            JOIN personnel e ON p.employe_code = e.code_employe 
            WHERE MONTH(p.date_debut) = ? AND YEAR(p.date_debut) = ?";
    
    $plannings = $this->db()->prepare($sql);
    $plannings->execute([$mois, $annee]);
    return $this->view('hotel/agenda', ['data' => $plannings->fetchAll()]);
}



public function planning() { 
    // Logique pour récupérer les données du planning
    $data = $this->db()->query("SELECT * FROM planning_personnel")->fetchAll();
    return $this->view('hotel/planning', ['planning' => $data]); 
}








}
