<?php

require_once __DIR__ . "/../app/models/Client.php";
require_once __DIR__ . "/../app/config/database.php";

class ClientRepository
{
    private PDO $pdo;

    public function __construct()
    {
        $db = new db();
        $this->pdo = $db->connect();
    }

    public function create(Client $client): bool
    {
        if (trim($client->getName()) === '' ) {
            return false;
        }

        if (!filter_var($client->getEmail(), FILTER_VALIDATE_EMAIL)) {
            return false;
        }

        $sql = "INSERT INTO clients (nom, email) VALUES (?, ?)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            $client->getName(),
            $client->getEmail()
        ]);
    }

    public function update(int $id, string $nom, string $email): bool
    {
        if ($id <= 0 || trim($nom) === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return false;
        }

        $sql = "UPDATE clients SET nom = ?, email = ? WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$nom, $email, $id]);
    }

    public function getAll(): array
    {
        $stmt = $this->pdo->query("SELECT * FROM clients");
        $clients = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $clients[] = new Client($row['nom'], $row['email'], $row['id']);
        }

        return $clients;
    }

    public function getById(int $id): ?Client
    {
        if ($id <= 0) {
            return null;
        }

        $stmt = $this->pdo->prepare("SELECT * FROM clients WHERE id = ?");
        $stmt->execute([$id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        return $row ? new Client($row['nom'], $row['email'], $row['id']) : null;
    }

    public function delete(int $id): bool
    {
        if ($id <= 0) {
            return false;
        }

        $stmt = $this->pdo->prepare("DELETE FROM clients WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
