CREATE TABLE reservation (
    reservation_id INT AUTO_INCREMENT PRIMARY KEY,
    covoiturage_id INT NOT NULL,
    utilisateur_id INT NOT NULL,
    voiture_id INT NOT NULL,
    statut ENUM('en attente', 'accepté', 'refusé') DEFAULT 'en attente',
    date_reservation TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (covoiturage_id) REFERENCES covoiturage(covoiturage_id),
    FOREIGN KEY (utilisateur_id) REFERENCES utilisateur(utilisateur_id),
    FOREIGN KEY (voiture_id) REFERENCES voiture(voiture_id)
);