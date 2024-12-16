<?php

namespace App\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Type;

class MainController extends CoreController
{


    /**
     * Affiche la page d'accueil du site
     */
    public function home()
    {
        $categoryModel = new Category();
        $categories = $categoryModel->findAllForHomePage();
        $this->show('home', [
            'categories' => $categories
        ]);
    }

    /**
     * Show legal mentions page
     */
    public function legalMentions()
    {
        $this->show('mentions');
    }
}