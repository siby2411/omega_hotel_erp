<?php
require_once 'BaseController.php';

class CollaborationController extends BaseController {

    // --- MESSAGERIE ---
    
public function collab_index() {
    $messages = $this->db()->query("SELECT * FROM messages ORDER BY date_envoi DESC")->fetchAll();
    // Modification ici : le fichier est dans 'hotel/messagerie.php'
    return $this->view('hotel/messagerie', ['messages' => $messages]);
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
    // Méthode unique pour le planning
   


 public function collab_planning() {
        $data = $this->db()->query("SELECT p.*, e.nom, e.prenom FROM planning_personnel p JOIN personnel e ON p.employe_code = e.code_employe")->fetchAll();
        return $this->view('hotel/messagerie', ['messagerie' => $data]);
    }





    public function gestion_caisse() {
        $caisse = $this->db()->query("SELECT * FROM caisse_resto ORDER BY date_service DESC")->fetchAll();
        return $this->view('hotel/caisse', ['caisse' => $caisse]);
    }
}
