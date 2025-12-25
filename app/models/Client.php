<?php

require_once  __DIR__  .  "/../../repositories/client_repos.php";



class Client extends ClientRepository 
{
    private ?int $id;
    private string $nom;
    private string $email;

    public function __construct(string $nom, string $email, ?int $id = null)
    {
        $this->setName($nom);
        $this->setEmail($email);
        $this->id = $id;
    }


    public function setId($id){
        $this->id = $id;
    }
    public function getId(): ?int
    {
        return $this->id;
    }
    
    public function getName(): string
    {
        return $this->nom;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setName(string $nom): void
    {
        if (strlen($nom) < 3) {
            echo "Name must contain at least 3 characters";
        }
        $this->nom = $nom;
    }

    public function setEmail(string $email): void
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "Invalid email address";
        }
        $this->email = $email;
    }
}
