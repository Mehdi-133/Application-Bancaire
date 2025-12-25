<?php

require_once __DIR__ . "/../app/models/Compte.php";
require_once __DIR__ . "/../app/config/database.php";

class CompteRepository
{

    private $pdo;

    public function __construct()
    {
        $db = new db();
        $this->pdo = $db->connect();
    }

    
}
