<?php
$host = "mysql-ecoriders.alwaysdata.net";
$username = "ecoriders_user";
$password = "graduate*Flutter";
$dbname = "ecoriders_database";

// Créer la connexion avec MySQLi
$conn = new mysqli($host, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Erreur de connexion : " . $conn->connect_error);
}

?>