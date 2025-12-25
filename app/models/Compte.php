<?php

require_once  "/../repositories/client_repos.php";

abstract class Compte extends CompteRepository{


    

    protected int $client_id;
    protected string $numero;
    protected float $sold;
    protected string $type_compte;


    public function __construct(int $client_id, string $numero, string $type_compte, float $sold = 0)
    {
        parent::__construct();
        $this->client_id = $client_id;
        $this->numero = $numero;
        $this->type_compte = $type_compte;
        $this->sold = $sold;

    }

    public function getSolde(): float
    {
        return $this->sold;
    }

    abstract public function deposer(float $montant): void;
    abstract public function retirer(float $montant): void;
}


