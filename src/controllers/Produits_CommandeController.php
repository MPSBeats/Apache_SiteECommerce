<?php

class Produits_CommandeController
{

    private $taille;
    private $quantite;
    private $prix_unitaire;
    private $prix_total;

    public function __construct($taille, $quantite, $prix_unitaire, $prix_total)
    {
        $this->taille = $taille;
        $this->quantite = $quantite;
        $this->prix_unitaire = $prix_unitaire;
        $this->prix_total = $prix_total;
    }

    public function getTaille()
    {
        return $this->taille;
    }

    public function getQuantite()
    {
        return $this->quantite;
    }

    public function getPrix_unitaire()
    {
        return $this->prix_unitaire;
    }

    public function getPrix_total()
    {
        return $this->prix_total;
    }

    public function setTaille($taille)
    {
        $this->taille = $taille;
    }

    public function setQuantite($quantite)
    {
        $this->quantite = $quantite;
    }

    public function setPrix_unitaire($prix_unitaire)
    {
        $this->prix_unitaire = $prix_unitaire;
    }

    public function setPrix_total($prix_total)
    {
        $this->prix_total = $prix_total;
    }

}
