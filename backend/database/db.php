<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "t_ecoride_bd";

// Créer la connexion avec MySQLi
$conn = new mysqli($host, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Erreur de connexion : " . $conn->connect_error);
}
?>