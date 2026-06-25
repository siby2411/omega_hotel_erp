<?php

require_once __DIR__ . '/../core/Router.php';
require_once __DIR__ . '/../app/Controllers/HotelController.php';


require_once __DIR__ . '/../app/Controllers/RestoController.php'; 


$router = new Router();
$router->resolve();
