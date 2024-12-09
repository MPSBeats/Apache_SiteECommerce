<?php

class CommandesController
{

    private $prix_total;
    private $status;

    public function __construct($prix_total, $status)
    {
        $this->prix_total = $prix_total;
        $this->status = $status;
    }

    public function getPrix_total()
    {
        return $this->prix_total;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setPrix_total($prix_total)
    {
        $this->prix_total = $prix_total;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

}
