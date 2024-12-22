<?php
require_once __DIR__ . "/../vendor/autoload.php";

use App\Controllers\CatalogController;
use App\Controllers\MainController;

$router = new AltoRouter();

$router->setBasePath($_SERVER['BASE_URI']);


$router->addRoutes(array( 
    array('GET','/', [
        'controller' => MainController::class,
        'action' => 'home'
    ], 'home'),
    array('GET','/mentions-legales', [
        'controller' => MainController::class,
        'action' => 'legalMentions'
    ], 'legal-mentions'),
    array('GET','/catalogue/categorie/[i:id]', [
        'controller' => CatalogController::class,
        'action' => 'category'
    ], 'catalog-category'),
    array('GET','/catalogue/type/[i:id]', [
        'controller' => CatalogController::class,
        'action' => 'type'
    ], 'catalog-type'),
    array('GET','/catalogue/marque/[i:id]', [
        'controller' => CatalogController::class,
        'action' => 'brand'
    ], 'catalog-brand'),
    array('GET','/catalogue/produit/[i:id]', [
        'controller' => CatalogController::class,
        'action' => 'product'
    ], 'catalog-product'),
    array('GET','/catalogue/categorie/cart', [
        'controller' => CatalogController::class,
        'action' => 'cart'
    ], 'cart'),
    array('GET','/test', [
        'controller' => MainController::class,
        'action' => 'test'
    ])
  ));


$match = $router->match();

if ($match != false) {
    $controllerToUse = $match['target']['controller'];
    $methodToUse = $match['target']['action'];
   
    $controller = new $controllerToUse();

    $controller->$methodToUse($match['params']);
}
