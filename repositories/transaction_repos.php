<?php

require_once __DIR__ . "/../config/database.php";
require_once __DIR__ . "/../models/Transaction.php";

class TransactionRepository
{
    private PDO $pdo;

    public function __construct()
    {
        $db = new db();
        $this->pdo = $db->connect();
    }

    public function create(Transaction $transaction): bool
    {
        if ($transaction->getAmount() <= 0) {
            return false;
        }

        if (!in_array($transaction->getType(), ["deposit", "withdraw"])) {
            return false;
        }

        $sql = "INSERT INTO transactions (compte_id, type, montant, date_operation)
                VALUES (:compte_id, :type, :amount, :date_op)";

        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([
            ":compte_id" => $transaction->getIdCompte(),
            ":type"      => $transaction->getType(),
            ":montant"   => $transaction->getAmount(),
            ":date_op"   => $transaction->getDate()
        ]);
    }

    public function getByCompte(int $compte_id): array
    {
        if ($compte_id <= 0) {
            return [];
        }

        $stmt = $this->pdo->prepare(
            "SELECT * FROM transactions WHERE compte_id = ? "
        );
        $stmt->execute([$compte_id]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
