<?php
// db_connection.php
$servername = "localhost:330";
$username = "root"; // Modifier selon votre configuration
$password = ""; // Modifier selon votre configuration
$dbname = "social_network";

$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
