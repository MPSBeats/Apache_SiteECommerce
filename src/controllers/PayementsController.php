<?php

class PayementsController
{

    private $date;
    private $montant;
    private $method;
    private $status;

    public function __construct($date, $montant, $method, $status)
    {
        $this->date = $date;
        $this->montant = $montant;
        $this->method = $method;
        $this->status = $status;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function getMontant()
    {
        return $this->montant;
    }

    public function getMethod()
    {
        return $this->method;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setDate($date)
    {
        $this->date = $date;
    }

    public function setMontant($montant)
    {
        $this->montant = $montant;
    }

    public function setMethod($method)
    {
        $this->method = $method;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

}
