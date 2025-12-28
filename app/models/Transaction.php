<?php

require_once  __DIR__  .  "/../../repositories/transaction_repos.php";


class Transaction
{
    private ?int $id;
    private float $amount;
    private string $type_operation;
    private int $compte_id;
    private string $date_operation;

    public function __construct(
        float $amount,
        string $type_operation,
        int $compte_id,
        ?int $id = null,
        ?string $date_operation = null
    ) {
        $this->id = $id;
        $this->amount = $amount;
        $this->type_operation = $type_operation;
        $this->compte_id = $compte_id;
        $this->date_operation = $date_operation ?? date("Y-m-d H:i:s");
    }

    public function getAmount(): float
    {
        return $this->amount;
    }

    public function getType(): string
    {
        return $this->type_operation;
    }

    public function getIdCompte(): int
    {
        return $this->compte_id;
    }

    public function getDate(): string
    {
        return $this->date_operation;
    }
}
