<?php

class CategoriesController
{

    private $nom;
    private $description;

    public function __construct($nom, $description)
    {
        $this->nom = $nom;
        $this->description = $description;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }


}
