CREATE TABLE avis (
    avis_id INT AUTO_INCREMENT PRIMARY KEY,
    utilisateur_id INT NOT NULL,
    covoiturage_id INT NOT NULL,
    commentaire VARCHAR(255) NOT NULL,
    note TINYINT NOT NULL CHECK (note BETWEEN 1 AND 5),
    statut VARCHAR(50) NOT NULL,
    date_avis TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (utilisateur_id) REFERENCES utilisateur(utilisateur_id) ON DELETE CASCADE,
    FOREIGN KEY (covoiturage_id) REFERENCES covoiturage(covoiturage_id) ON DELETE CASCADE
);