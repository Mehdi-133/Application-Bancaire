<?php

require_once __DIR__ . "/../app/config/database.php";
require_once __DIR__ . "/../app/models/Client.php";
require_once __DIR__ . "/../app/models/Compte.php";
require_once __DIR__ . "/../app/models/CompteEpargne.php";
require_once __DIR__ . "/../app/models/CompteCourant.php";
require_once __DIR__ . "/../repositories/client_repos.php";
require_once __DIR__ . "/../repositories/compte_repos.php";



$clientRepo = new ClientRepository();
$repo = new CompteRepository( );



// if ($repo->createCompte(23, "soo7zzq", "courant", 0)) {
//     echo "Compte  created\n";
// } else {
//     echo "Failed to create compte\n";
// }



// $deleted = $repo->deleteCompte(4);

// if ($deleted) {
//     echo "Compte deleted successfully";
// } else {
//     echo "Cannot delete compte (id invalid or solde not zero)";
// }







// $repo->create(1, "EP001", "epargne", 500);

// $compte = $repo->getById(1);
// if ($compte) {
//     $nouveauSolde = $compte['solde'] + 50;
//     $repo->updateSolde($compte['id'], $nouveauSolde);
// }

// $repo->deleteIfSoldeZero(2);


// $repo = new CompteRepository();
// $comptes = $repo->getCompteByid(3);

// // foreach ($comptes as $compte) {
// //     echo $compte['numero'] . " | " .
// //          $compte['type_compte'] . " | " .
// //          $compte['sold'] . "";
// // }

// print_r($comptes);




// $client2 = new Client("App", "ali2@gmail.com");
// if ($clientRepo->create($client2)) {
//     echo "Client created successfully\n";
// } else {
//     echo "Failed to create client\n";
// }

// if ($clientRepo->update(24, "Ali Updated", "ali22@gmail.com")) {
//     echo "Client updated\n";
// } else {
//     echo "Update failed\n";
// }

// if ($clientRepo->delete(1)) {
//     echo "Client deleted\n";
// } else {
//     echo "Delete failed\n";
// }

// $clients = $clientRepo->getAll();
// foreach ($clients as $each ) {
//     echo  $each->getId() . " " . $each ->getName() . " - " . $each->getEmail() . "<br>";
// }

// $c = $clientRepo->getById(17);
// if ($c) {
//     echo $c->getName() . "\n";
// }



// $compte = new CompteCourant(1, "E001", -500);

// if ($compte->deposer(50)) {
//     echo "Deposit OK\n";
// } else {
//     echo "Deposit refused\n";
// }

// if ($compte->retirer(200)) {
//     echo "Withdraw OK\n";
// } else {
//     echo "Withdraw refused\n";
// }

// $client = new Client("Mehdi", "mehdikarbitou@gmail.com");

// $compte1 = new CompteEpargne( 19, "4545kk", 555);
// $compte1->getSolde();

// print_r($compte1);

// $clientRepository = new ClientRepository();



// $client2 = new Client("ghjhj fgchjbknl,gvhjb", "dfgchjbn,kl");


// $clientRepository = new ClientRepository();
// $clientRepository->create($client2);
// $clientRepository->delete(1);

// print_r($clientRepository->getAll());
// $client1 = new Client("ayoube", "ayoubekarbitou@gmail.com");

// $client8 = new Client("amine aa", "amine@gmail.com");

// $clientRepository = new ClientRepository();
// // Create client
// $clientRepository->update(6 , "llokiii", "lookii@gmail.com");

//  $client = $clientRepository->getById(-8);
//  print_r($client);


// foreach ($clients as $client) {
//     echo $client->getId() . "<br>";
// }




// Update client
// $clientRepository->update($client8->getId(), "Amine Updated", "amine_updated@gmail.com");

// Get client by ID
// $clientFromDB = $clientRepository->getById($client8->getId());
// print_r($clientFromDB);

// // Get all clients
// $allClients = $clientRepository->getAll();
// print_r($allClients);

// // Delete client
// $clientRepository->delete($client8->getId());
