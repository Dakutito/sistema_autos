<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "separacion_autos";

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
