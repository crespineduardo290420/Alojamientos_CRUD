<?php
$host = "localhost";
$user = "root"; 
$pass = ""; 
$dbname = "crud_alojamientos";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
