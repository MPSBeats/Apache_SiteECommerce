<?php

class ProduitsController{

    private $nom;
    private $description;
    private $prix;

    public function __construct($nom, $description, $prix)
    {
        $this->nom = $nom;
        $this->description = $description;
        $this->prix = $prix;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getPrix()
    {
        return $this->prix;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function setPrix($prix)
    {
        $this->prix = $prix;
    
    }

}




?>