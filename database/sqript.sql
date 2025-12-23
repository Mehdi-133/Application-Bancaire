--@block 
use BankApp;


--@block
CREATE TABLE clients (

    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    created_at  DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT  CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

);

--@block
SELECT * FROM transactions ;


--@block

CREATE TABLE comptes(


    id INT AUTO_INCREMENT PRIMARY KEY,
    sold DECIMAL(10,2) NOT NULL DEFAULT 0,
    numero VARCHAR(255) NOT NULL UNIQUE,
    type_compte ENUM('courant', 'epargne') NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    client_id INT NOT NULL,

    CONSTRAINT each_client 
    FOREIGN KEY(client_id)
    REFERENCES clients (id)
    ON DELETE RESTRICT
    
);


--@block

CREATE TABLE transactions(

    id INT AUTO_INCREMENT PRIMARY KEY, 
    montant DECIMAL(10,2) NOT NULL DEFAULT 0,
    type_operation ENUM('depot', 'retrait ') NOT NULL,
    date_transaction DATETIME DEFAULT CURRENT_TIMESTAMP,
    compte_id INT NOT NULL,

    CONSTRAINT each_transaction
    FOREIGN KEY (compte_id)
    REFERENCES comptes(id)
    ON DELETE CASCADE

);



