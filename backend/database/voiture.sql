CREATE TABLE voiture (
    voiture_id INT AUTO_INCREMENT PRIMARY KEY,
    utilisateur_id INT,
    modele VARCHAR(100) NOT NULL,
    immatriculation VARCHAR(20) NOT NULL,
    energie VARCHAR(50) NOT NULL,
    couleur VARCHAR(50) NOT NULL,
    date_immatriculation DATE NOT NULL,
    FOREIGN KEY (utilisateur_id) REFERENCES utilisateur(utilisateur_id)
);
