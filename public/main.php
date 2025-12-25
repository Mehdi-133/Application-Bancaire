<?php

require_once __DIR__ . "/../app/config/database.php";
require_once __DIR__ . "/../app/models/Client.php";
require_once __DIR__ . "/../repositories/client_repos.php";



    $client = new Client("Mehdi", "mehdikarbitou@gmail.com");
    $client1 = new Client("ayoube", "ayoubekarbitou@gmail.com");
    $client4 = new Client("moadeee", "moadeee@gmail.com");
    


    

    $clientRepository = new ClientRepository();

    $clientRepository->create($client4);
    echo "Client created successfully ";

