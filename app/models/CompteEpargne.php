<?php

require_once __DIR__ . "/Compte.php";

class CompteEpargne extends Compte
{
    public function __construct(int $client_id, string $numero, float $sold = 0) {
        parent::__construct($client_id, $numero, "epargne", $sold);
    }

    public function deposer(float $amount): bool
    {
        if ($amount <= 0) {
            return false;
        }

        $this->sold += $amount;
        return true;
    }

    public function retirer(float $amount): bool
    {
        if ($amount <= 0) {
            return false;
        }

        if ($amount > $this->sold) {
            return false;
        }

        $this->sold -= $amount;
        return true;
    }
}
