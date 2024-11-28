<?php

require_once __DIR__ . '/../controllers/MainController.php';

$router = new AltoRouter();

// Calcul automatique de la base path (en incluant /public)
$basePath = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/');
$router->setBasePath($basePath);

// Routes
$router->map('GET', '/', 'MainController#home', 'home');
$router->map('GET', '/catalogue', 'MainController#catalogue', 'catalogue');
$router->map('GET', '/login', 'MainController#login', 'login');
$router->map('GET', '/register', 'MainController#register', 'register');
$router->map('GET', '/panier', 'MainController#panier', 'panier');
$router->map('GET', '/infos', 'MainController#infos', 'infos');

// Retourne l'objet router
return $router;
