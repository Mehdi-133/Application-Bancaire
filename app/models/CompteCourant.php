<?php

require_once __DIR__ . "/Compte.php";

class CompteCourant extends Compte
{
    protected float $decouvert = -500;
    protected float $frais = 1;

    public function __construct(int $client_id, string $numero, float $sold = 0)
    {
        parent::__construct($client_id, $numero, "courant", $sold);
    }

    public function deposer(float $amount): bool
    {
        if ($amount <= 0) {
            return false;
        }

        if ($amount <= $this->frais) {
            return false;
        }

        $this->sold += ($amount - $this->frais);
        return true;
    }

    public function retirer(float $amount): bool
    {
        if ($amount <= 0) {
            return false;
        }

        $nouveauSolde = $this->sold - $amount;

        if ($nouveauSolde < $this->decouvert) {
            return false;
        }

        $this->sold = $nouveauSolde;
        return true;
    }
}
