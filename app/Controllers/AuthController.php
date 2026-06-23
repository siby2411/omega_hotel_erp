<?php

require_once __DIR__ . '/../../core/Controller.php';

class AuthController extends Controller {

    public function login() {
        $this->view('auth/login');
    }

    public function doLogin() {
        session_start();

        $user = $_POST['username'] ?? '';
        $pass = $_POST['password'] ?? '';

        if ($user === "admin" && $pass === "admin123") {
            $_SESSION['user'] = $user;
            header("Location: /dashboard");
        } else {
            echo "Login incorrect";
        }
    }

    public function logout() {
        session_destroy();
        header("Location: /login");
    }
}
