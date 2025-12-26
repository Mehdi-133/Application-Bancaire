<?php

require_once __DIR__ . "/../app/models/Compte.php";
require_once __DIR__ . "/../app/config/database.php";

class CompteRepository
{

    private PDO $pdo;

    public function __construct()
    {
        $db = new db();
        $this->pdo = $db->connect();
    }

    public function createCompte(int $client_id , string $numero , string $type_compte , float $sold = 0) :bool
    {
       if ($client_id <= 0 || trim($numero) === "")  {
        return false;
       }

       elseif(!in_array($type_compte , ["courant ", "epargne"])){

        return false;

       }

       $sql = "INSERT INTO comptes (client_id , numero , type_compte , sold) VALUES (:clientid , :numero , :type_cpt , :sold ) " ;
       $stmt = $this->pdo->prepare($sql);
       return  $stmt ->execute([':clientid'=>$client_id ,':numero'=> $numero ,':type_cpt'=> $type_compte,':sold'=> $sold]);

    }


    public function getALLCompte(){

        $stmt = $this->pdo->query("SELECT * FROM comptes");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

        }

    public function getCompteByid($id): ?array {

        if ($id <= 0 ) {
           return null;
        }

        $stmt = $this->pdo->prepare("SELECT * FROM comptes WHERE id = ?");
        $stmt->execute([$id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        return $row ? : null;

    }

    


    
        







    
}
