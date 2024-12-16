<?php

namespace App\Models;

use App\Utils\Database;
use PDO; // on utilise la classe PDO dont le namespace a été défini

class Product extends CoreModel
{
    private $name;
    private $description;
    private $picture;
    private $price; 
    private $status;
    private $brand_id;  
    private $category_id;   
    private $type_id;

    /**
     * Récupère toutes les catégories (table category) depuis la bdd
     * Retourne une liste d'objet (instances de la classe Category => le model ou on est)
     */
    public function findAll()
    {
        $sql = "SELECT * FROM product";
        $pdo = Database::getPDO();
        $pdoStatement = $pdo->query($sql);
        $products = $pdoStatement->fetchAll(PDO::FETCH_CLASS, Product::class);

        return $products;
    }

    /**
     * Récupère une seul categorie en fonction de son id
     * Retourne un objet (une instance de la classe Category => le model ou on est)
     */
    public function find($id)
    {
        // Ici on créer la requete SQL qui va récupérer le product en fonction de son id
        $sql = "SELECT * FROM product WHERE id = ".$id;

        // Ici $pdo est un objet de la classe Databse (Utils/Database.php)
        // $pdo va me permettre d'executer mes requetes sql
        $pdo = Database::getPDO();

        // ici j'execute ma requete sql ($sql) et je stock le resultat de cette requete dans $pdoStatement
        $pdoStatement = $pdo->query($sql);

        // Je veux récuperer UN objet Product, PDO le fait pour moi => fetchObject (fetch qu'une seule fois + converti en objet de la classe 'Product' donc le model Product)
        $product = $pdoStatement->fetchObject(Product::class);

        return $product;
    }

    /**
     * Récupère toutes les catégories qui ont un home_order > 0 et rangés dans l'ordre de home_order
     */
    public function findAllForHomePage()
    {
        $sql = "SELECT * FROM category WHERE home_order > 0 ORDER BY home_order";
        $pdo = Database::getPDO();
        $pdoStatement = $pdo->query($sql);
        $categories = $pdoStatement->fetchAll(PDO::FETCH_CLASS, Category::class);

        return $categories;
    }


    public static function findByType($type_id)
    {
        $sql = "SELECT * FROM product WHERE type_id = :type_id";
        $pdo = Database::getPDO();
        $pdoStatement = $pdo->prepare($sql);

        if (!$pdoStatement->execute([':type_id' => $type_id])) {
            print_r($pdoStatement->errorInfo());
            return [];
        }

        $products = $pdoStatement->fetchAll(PDO::FETCH_CLASS, Product::class);

        return $products;
    }

    public function findByCategory($category_id)
    {
        $sql = "SELECT * FROM product WHERE category_id = :category_id";
        $pdo = Database::getPDO();
        $pdoStatement = $pdo->prepare($sql);

        if (!$pdoStatement->execute([':category_id' => $category_id])) {
            print_r($pdoStatement->errorInfo());
            return [];
        }

        $products = $pdoStatement->fetchAll(PDO::FETCH_CLASS, Product::class);

        return $products;
    }

    

    public function findByBrand($brand_id)
    {
        $sql = "SELECT * FROM product WHERE brand_id = :brand_id";
        $pdo = Database::getPDO();
        $pdoStatement = $pdo->prepare($sql);
    
        if (!$pdoStatement->execute([':brand_id' => $brand_id])) {
            print_r($pdoStatement->errorInfo());
            return [];
        }
    
        $products = $pdoStatement->fetchAll(PDO::FETCH_CLASS, Product::class);
    
        return $products;
    }

    /**
     * Get the value of name
     */
    public function getName()
    {
        return $this->name;
    }


    /**
     * Set the value of name
     *
     * @return  self
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Get the value of description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Get Picture
     *
     * @return void
     */
    public function getPicture()
    {
        return $this->picture;
    }

    /**
    * Set the value of picture
    *
    * @return self
    */ 
    public function setPicture($picture)
    {
        $this->picture = $picture;
    }

    /**
     * Get the value of price
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set the value of price
     *
     * @return  self
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * Get the value of status
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of status
     *
     * @return  self
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * Get the value of brand_id
     */
    public function getBrand_id()
    {
        return $this->brand_id;
    }

    /**
     * Set the value of brand_id
     *
     * @return  self
     */
    public function setBrand_id($brand_id)
    {
        $this->brand_id = $brand_id;
    }

    /**
     * Get the value of category_id
     */
    public function getCategory_id()
    {
        return $this->category_id;
    }

    /**
     * Set the value of category_id
     *
     * @return  self
     */
    public function setCategory_id($category_id)
    {
        $this->category_id = $category_id;
    }

    /**
     * Get the value of type_id
     */
    public function getType_id()
    {
        return $this->type_id;
    }

    /**
     * Set the value of type_id
     *
     * @return  self
     */
    public function setType_id($type_id)
    {
        $this->type_id = $type_id;
    }



}
