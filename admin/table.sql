CREATE TABLE `annonces` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `nom` VARCHAR(255) NOT NULL,
    `prix` DECIMAL(10, 2) NOT NULL,
    `surface` INT NOT NULL,
    `type` ENUM('chambre', 'studio', 'appartement', 'résidence étudiante') NOT NULL,
    `colocation` BOOLEAN NOT NULL,
    `latitude` DECIMAL(9, 6) NOT NULL,
    `longitude` DECIMAL(9, 6) NOT NULL,
    `description` TEXT,
    `telephone` VARCHAR(15),  
    `contact` VARCHAR(255),  
    `proprietaire` VARCHAR(255), 
    `proximite` INT,          
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
