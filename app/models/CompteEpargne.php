<?php

require_once __DIR__ . "/Compte.php";

class CompteEpargne extends Compte
{
    public function __construct(
        int $client_id,
        string $numero,
        float $sold = 0
    ) {
        parent::__construct($client_id, $numero, "epargne", $sold);
    }

    public function deposer(float $amount): void
    {
        if ($amount > 0) {
            $this->sold += $amount;
        }
        else{
            echo "invalid deposit";
        }
    }

    public function retirer(float $amount): void
    {
        if ($amount <= $this->sold) {
            echo "invalid withdraw you dont have that much of money ";
        }

        if ($amount <= 0) {
           echo "return the operation ";
        }
        $this->sold -= $amount;
    }
}
