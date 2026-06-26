     


     <?php                         require_once 'BaseController.php';                                                        class CollaborationController extends BaseController {

    // --- MESSAGERIE ---     


 
    public function collab_index() {
        $personnel = $this->db()->query("SELECT code_employe, nom, prenom FROM personnel")->fetchAll();

        // Utilisation de LEFT JOIN et COALESCE pour éviter de perdre les messages
        $sql = "SELECT m.*, COALESCE(e.nom, 'Système/Inconnu') as exp_nom 
                FROM messages m
                LEFT JOIN personnel e ON m.expediteur_code = e.code_employe
                ORDER BY m.date_envoi DESC";
        
        $messages = $this->db()->query($sql)->fetchAll();

        return $this->view('hotel/messagerie', [
            'messages' => $messages,
            'personnel' => $personnel
        ]);
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


public function collab_envoyer_message() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Vérification stricte de la session
            if (!isset($_SESSION['user_code'])) {
                die("Erreur : Vous devez être connecté pour envoyer un message.");
            }

            $sql = "INSERT INTO messages (expediteur_code, destinataire_code, objet, contenu) VALUES (?, ?, ?, ?)";
            $this->db()->prepare($sql)->execute([
                $_SESSION['user_code'],
                $_POST['destinataire'],
                $_POST['objet'],
                $_POST['contenu']
            ]);
            
            header('Location: ?url=collab_index');
            exit;
        }
    }
    
  




}




















