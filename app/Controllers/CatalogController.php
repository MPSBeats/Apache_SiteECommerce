<?php

namespace App\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Type;


class CatalogController extends CoreController
{
    /**
     * Affiche la page Catégories
     */
    public function category($params)
    {

        $id_category = $params['id'];
        $categoryModel = new Category;
        $category = $categoryModel->find($id_category);

        $productModel = new Product();
        $products = $productModel->findByCategory($id_category);

        $this->show('category', [
            'categoryId' => $params['id'],
            'category' => $category,
            'products' => $products // tous les produits en fonctiond ela catégorie
        ]);
    }

    /**
     * Show list of products attached to a type
     *
     * @param [type] $params => valeurs dynamique passées à l'url (id)
     */
    public function type($params)
    {
        $id_type = $params['id'];

        $typeModel = new Type();
        $type = $typeModel->find($id_type);
        $productModel = new Product();

        $products = $productModel->findByType($id_type);

        $this->show('type', [
            'typeId' => $params['id'],
            'type' => $type,
            'products' => $products
        ]);
    }

    /**
     * Show list of products attached to a brand
     *
     * @param [type] $params => valeurs dynamique passées à l'url (id)
     */
    public function brand($params)
    {
        $id_brand = $params['id'];

        // Je créer un objet Brand pour afficher le nom de la marque
        $brandModel = new Brand();
        $brand = $brandModel->find($id_brand);

        $productModel = new Product();

        $products = $productModel->findByBrand($id_brand);

        $this->show('brand', [
            'brandId' => $params['id'],
            'brand' => $brand,
            'products' => $products
        ]);
    }

    /**
     * Show detail of a product by his id
     *
     * @param [type] $params => valeurs dynamique passées à l'url (id), on les envoie dans index.php et on les intercepte ici
     */
    public function product($params)
    {

        $productModel = new Product();
        $product = $productModel->find($params['id']);

        $this->show('product', [
            'productId' => $params['id'],
            'product' => $product
        ]);
    }
}