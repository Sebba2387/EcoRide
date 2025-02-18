CREATE TABLE covoiturage (
    covoiturage_id INT AUTO_INCREMENT PRIMARY KEY,
    utilisateur_id INT,
    voiture_id INT,
    date_depart DATE,
    heure_depart TIME,
    lieu_depart VARCHAR(255),
    date_arrivee DATE,
    heure_arrivee TIME,
    lieu_arrivee VARCHAR(255),
    statut ENUM('en attente', 'démarré', 'en pause') DEFAULT 'en attente',
    nombre_places INT,
    prix DECIMAL(10, 2),
    FOREIGN KEY (utilisateur_id) REFERENCES utilisateur(utilisateur_id),
    FOREIGN KEY (voiture_id) REFERENCES voiture(voiture_id)
);
