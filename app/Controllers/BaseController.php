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
        ob_start();
        require __DIR__ . "/../../resources/views/$path.php";
        $content = ob_get_clean();
        require __DIR__ . "/../../resources/views/layouts/app.php";
    }
}
