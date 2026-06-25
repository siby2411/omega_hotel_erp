<?php
require_once 'BaseController.php';

class CollaborationController extends BaseController {

    // --- MESSAGERIE ---
    public function collab_index() {
        $monCode = $_SESSION['user_code'] ?? 'DIMO767001';

        $sql = "SELECT m.*, e.nom as exp_nom
                FROM messages m
                JOIN personnel e ON m.expediteur_code = e.code_employe
                WHERE m.destinataire_code = ? OR m.expediteur_code = ?
                ORDER BY date_envoi DESC";

        $messages = $this->db()->prepare($sql);
        $messages->execute([$monCode, $monCode]);

        return $this->view('hotel/messagerie', ['messages' => $messages->fetchAll()]);
    }

    public function envoyer_message() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $expediteur = $_POST['expediteur'] ?? 'ADMIN';
            $sql = "INSERT INTO messages (expediteur_code, destinataire_code, objet, contenu) VALUES (?, ?, ?, ?)";
            $this->db()->prepare($sql)->execute([
                $expediteur,
                $_POST['destinataire'],
                $_POST['objet'],
                $_POST['contenu']
            ]);
            header('Location: ?url=collab_index');
            exit;
        }
    }

    // --- PLANNING & AGENDA ---
    public function collab_planning() {
        $sql = "SELECT p.*, e.nom, e.prenom
                FROM planning_personnel p
                JOIN personnel e ON p.employe_code = e.code_employe";

        $data = $this->db()->query($sql)->fetchAll();
        return $this->view('hotel/planning', ['planning' => $data]);
    }

    public function collab_save_planning() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $sql = "INSERT INTO planning_personnel (employe_code, date_debut, type_rotation) VALUES (?, ?, ?)";
            $this->db()->prepare($sql)->execute([
                $_POST['employe_code'], $_POST['date_debut'], $_POST['type_rotation']
            ]);
            header('Location: ?url=collab_planning');
            exit;
        }
    }

    // --- AJOUT AU PLANNING ---
    public function collab_create_planning() {
        $personnel = $this->db()->query("SELECT code_employe, nom, prenom FROM personnel")->fetchAll();
        return $this->view('hotel/planning_create', ['personnel' => $personnel]);
    }

    // --- GESTION CAISSE ---
    public function collab_gestion_caisse() {
        $caisse = $this->db()->query("SELECT * FROM caisse_resto ORDER BY date_service DESC")->fetchAll();
        return $this->view('hotel/caisse', ['caisse' => $caisse]);
    }

} // <--- Cette accolade ferme correctement la classe CollaborationController
