<?php

namespace App\Models;

use App\Utils\Database;
use PDO;

class Brand extends CoreModel
{
    private $name;

    /**
     * Récupère toutes les catégories (table category) depuis la bdd
     * Retourne une liste d'objet (instances de la classe Category => le model ou on est)
     */
    public function findAll()
    {
        $sql = "SELECT * FROM brand";
        $pdo = Database::getPDO();
        $pdoStatement = $pdo->query($sql);
        $brands = $pdoStatement->fetchAll(PDO::FETCH_CLASS, Brand::class);

        return $brands;
    }

    /**
     * Récupère une seul categorie en fonction de son id
     * Retourne un objet (une instance de la classe Category => le model ou on est)
     */
    public function find($id)
    {

        $sql = "SELECT * FROM brand WHERE id = ".$id;

        $pdo = Database::getPDO();

        $pdoStatement = $pdo->query($sql);

        $brand = $pdoStatement->fetchObject(Brand::class);

        return $brand;
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

}