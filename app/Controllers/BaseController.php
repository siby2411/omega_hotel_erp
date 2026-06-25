<?php
class BaseController {
    protected function db() {
        return new PDO("mysql:host=localhost;dbname=hotel_omega;charset=utf8", "root", "", [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }

    protected function view($path, $data = []) {
        extract($data);
        
        // Construction du chemin absolu depuis la racine
        $viewFile = __DIR__ . "/../../resources/views/$path.php";
        $layoutFile = __DIR__ . "/../../resources/views/layouts/app.php";

        if (!file_exists($viewFile)) {
            die("Erreur : Le fichier de vue '$path.php' est introuvable à : " . $viewFile);
        }

        ob_start();
        require $viewFile;
        $content = ob_get_clean();

        if (!file_exists($layoutFile)) {
            die("Erreur : Le layout est introuvable à : " . $layoutFile);
        }
        
        require $layoutFile;
    }
}
