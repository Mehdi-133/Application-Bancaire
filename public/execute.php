<?php

require_once __DIR__ . "/../repositories/client_repos.php";
require_once __DIR__ . "/../repositories/compte_repos.php";
require_once __DIR__ . "/../repositories/transaction_repos.php";

require_once __DIR__ . "/../app/models/Client.php";
require_once __DIR__ . "/../app/models/Transaction.php";
require_once __DIR__ . "/../app/models/CompteEpargne.php";
require_once __DIR__ . "/../app/models/CompteCourant.php";
require_once __DIR__ . "/../app/models/Transaction.php";



echo "<pre>";

$clientRepo = new ClientRepository();
$compteRepo = new CompteRepository();
$transactionRepo = new TransactionRepository();


echo "client test  <br>"  ;

//create client 
$client = new Client("badr22", "badr2@mail.com");
$create = $clientRepo->create($client);

if ($create == true) {
    echo "Create client : SUCCESS";
} else {
    echo "Create client : FAILED";
}



//get all cleint 
$clients = $clientRepo->getAll();

if ($clients != null && count($clients) > 0) {
    echo "Get all clients : SUCCESS";
    foreach ($clients as $each) {
        echo "ID: " . $each->getId() . 
             " | Name: " . $each->getName() . 
             " | Email: " . $each->getEmail() ;
    }
} else {
    echo "Get all clients : FAILED";
}



// get client by id
$clientById = $clientRepo->getById(38);

if ($clientById != null) {
    echo "Get client by ID : SUCCESS";
    echo "Name: " . $clientById->getName();
} else {
    echo "Get client by ID : FAILED";
}


//update client 
$update = $clientRepo->update(37, "Updated Client", "updated@mail.com");

if ($update == true) {
    echo "Update client : SUCCESS";
} else {
    echo "Update client : FAILED";
}

echo "compte test ";


//create compte 
$result = $compteRepo->createCompte(43, "ACC1001", "courant", 0);

if ($result == true) {
    echo "Create compte : SUCCESS";
} else {
    echo "Create compte : FAILED";
}


// get all compte
$comptes = $compteRepo->getALLCompte();

if ($comptes != null && count($comptes) > 0) {
    echo "Get all comptes : SUCCESS\n";
    foreach ($comptes as $each) {
        echo "ID: " . $each['id'] . 
             " | Client ID: " . $each['client_id'] . 
             " | Type: " . $each['type_compte'] . 
             " | Sold: " . $each['sold'] . "";
    }
} else {
    echo "Get all comptes : FAILED\n";
}



//get compte by id
$compte = $compteRepo->getCompteByid(2);

if ($compte != null) {
    echo "Get compte by ID : SUCCESS";
    echo "Sold: " . $compte['sold'] . "";
} else {
    echo "Get compte by ID : FAILED";
}



// delete compte
$result = $compteRepo->deleteCompte(7);

if ($result == true) {
    echo "Delete compte : SUCCESS";
} else {
    echo "Delete compte : FAILED (sold not zero or not found)";
}



echo "compte epargn";


$epargne = new CompteEpargne(2, "EP001", 100);

//deposit valid
$result = $epargne->deposer(50);

if ($result == true) {
    echo "Epargne deposit  : SUCCESS\n";
} else {
    echo "Epargne deposit  : FAILED\n";
}


//deposit invalid
$result = $epargne->deposer(-10);

if ($result == true) {
    echo "Epargne deposit  : ERROR\n";
} else {
    echo "Epargne deposit : BLOCKED (correct)\n";
}


//withdraw valid
$result = $epargne->retirer(30);

if ($result == true) {
    echo "Epargne withdraw  : SUCCESS\n";
} else {
    echo "Epargne withdraw  : FAILED\n";
}





echo "comte courant ";

$courant = new CompteCourant(1, "CO001", 100);

//deposit valid
$result = $courant->deposer(50);

if ($result == true) {
    echo "Courant deposit  : SUCCESS\n";
} else {
    echo "Courant deposit  : FAILED\n";
}

//deposit failed
$result = $courant->deposer(1);

if ($result == true) {
    echo "Courant deposit  : ERROR\n";
} else {
    echo "Courant deposit  : BLOCKED (correct)\n";
}



//withdraw valid
$result = $courant->retirer(100);

if ($result == true) {
    echo "Courant withdraw  : SUCCESS\n";
} else {
    echo "Courant withdraw  : FAILED\n";
}


echo "transaction test";

//test transaction
$invalid = new Transaction(-20, "depot", 1);
$result = $transactionRepo->create($invalid);

if ($result == true) {
    echo "Invalid transaction : ERROR (should not pass)\n";
} else {
    echo "Invalid transaction : BLOCKED (correct)\n";
}


//get all transaction
$transactions = $transactionRepo->getByCompte(1);

if ($transactions != null && count($transactions) > 0) {
    echo "Get transactions by compte : SUCCESS\n";
    foreach ($transactions as $each) {
        echo "ID: " . $each['id'] .
             " | Type: " . $each['type_operation'] .
             " | Amount: " . $each['montant'] .
             " | Date: " . $each['date_transaction'] . "\n";
    }
} else {
    echo "Get transactions by compte : FAILED\n";
}

echo "</pre>";
