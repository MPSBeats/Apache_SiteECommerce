<?php

namespace App\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Type;

class CoreController 
{
    /**
     * Fonction qui permet d'afficher la vue
     * $viewData = les données que je veux récupérer dans ma vue
     */
    public function show($viewName, $viewData = [])
    {
        $absoluteURL = $_SERVER['BASE_URI'];
        global $router;
        $typeModel = new Type();
        $types = $typeModel->findAll();

        $categoryModel = new Category();
        $categories = $categoryModel->findAll();

        $brandModel = new Brand();
        $brands = $brandModel->findAll();


        require_once __DIR__ . "/../views/partials/header.tpl.php";
        require_once __DIR__ . "/../views/$viewName.tpl.php";
        require_once __DIR__ . "/../views/partials/footer.tpl.php";
    }
}