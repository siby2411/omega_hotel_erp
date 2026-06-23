<?php

class Controller
{
    public function view($view, $data = [])
    {
        extract($data);

        $viewFile = __DIR__ . "/../resources/views/$view.php";
        $layoutFile = __DIR__ . "/../resources/views/layouts/app.php";

        if (!file_exists($viewFile)) {
            die("VIEW INTROUVABLE: $viewFile");
        }

        ob_start();
        require $viewFile;
        $content = ob_get_clean();

        require $layoutFile;
    }
}
