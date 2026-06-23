CREATE TABLE factures (
    id INT AUTO_INCREMENT PRIMARY KEY,
    reservation_id INT NOT NULL,
    client_id INT NOT NULL,
    chambre_id INT NOT NULL,
    montant_total DECIMAL(10,2) NOT NULL,
    statut ENUM('Impayée','Payée') DEFAULT 'Impayée',
    date_creation DATETIME DEFAULT CURRENT_TIMESTAMP
);
