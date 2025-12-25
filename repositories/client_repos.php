<?php

require_once __DIR__ . "/../app/models/Client.php";
require_once __DIR__ . "/../app/config/database.php";

class ClientRepository
{
    private $pdo;
    private $db;

    public function __construct()
    {
        $this->db = new db();
        $this->pdo = $this->db->connect();
    }




    public function create(Client $client)
    {
        $sql = "INSERT INTO clients (nom, email) VALUES (?, ?)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            $client->getName(),
            $client->getEmail()
        ]);
    }


    
    public function allClient()
    {
        $stmt = $this->pdo->query("SELECT * FROM clients");
        $clients = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $clients[] = new Client(
                $row['nom'],
                $row['email'],
                $row['id']
            );
        }
        return $clients;
    }

}
