<?php
require_once 'BaseController.php';

class LoginController extends BaseController {
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $code = $_POST['code'];
            
            // Vérifier si le code existe en base
            $stmt = $this->db()->prepare("SELECT * FROM personnel WHERE code_employe = ?");
            $stmt->execute([$code]);
            $user = $stmt->fetch();

            if ($user) {
                session_start();
                $_SESSION['user_code'] = $user['code_employe'];
                header('Location: ?url=dashboard');
            } else {
                echo "Code employé invalide.";
            }
        } else {
            return $this->view('login');
        }
    }
}
