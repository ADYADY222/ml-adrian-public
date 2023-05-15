<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "panel";

// Creează conexiunea
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Verifică conexiunea
if (!$conn) {
    die("Conexiunea a eșuat: " . mysqli_connect_error());
}
?>