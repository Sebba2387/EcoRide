CREATE DATABASE IF NOT EXISTS t_ecoride_bd;
USE t_ecoride_bd;

CREATE TABLE IF NOT EXISTS utilisateur (
    utilisateur_id INT PRIMARY KEY,
    nom VARCHAR(50) NOT NULL,
    prenom VARCHAR(50) NOT NULL,
    email VARCHAR(50) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    pseudo VARCHAR(50) NOT NULL
);
