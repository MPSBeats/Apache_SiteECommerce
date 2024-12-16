<?php

class InvenrivateController
{

    private $taille;
    private $stock;

    public function __construct($taille, $stock)
    {
        $this->taille = $taille;
        $this->stock = $stock;
    }

    public function getTaille()
    {
        return $this->taille;
    }

    public function getStock()
    {
        return $this->stock;
    }

    public function setTaille($taille)
    {
        $this->taille = $taille;
    }

    public function setStock($stock)
    {
        $this->stock = $stock;
    }


}
