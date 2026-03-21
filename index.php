<?php

// Autoloader (si tu en as un, sinon à adapter)
spl_autoload_register(function ($class) {
    $baseDir = __DIR__ . '/';

    $file = $baseDir . str_replace('\\', '/', $class) . '.php';

    if (file_exists($file)) {
        require $file;
    }
});

// Récupérer la page demandée
$page = $_GET['page'] ?? '/';

// Appeler le routeur
use Services\Router;

$router = new Router($page);
$router->getController();