<?php

require_once "BaseModel.php";

abstract class Compte extends ClientRepository{


    

    protected int $client_id;
    protected string $numero;
    protected float $solde;
    protected string $type_compte;


    public function __construct(int $client_id, string $numero, string $type_compte, float $solde = 0)
    {
        parent::__construct();
        $this->client_id = $client_id;
        $this->numero = $numero;
        $this->type_compte = $type_compte;
        $this->solde = $solde;

    }

    public function getSolde(): float
    {
        return $this->solde;
    }

    abstract public function deposer(float $montant): void;
    abstract public function retirer(float $montant): void;
}
