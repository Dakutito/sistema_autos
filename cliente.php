<?php
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $cedula = $_POST['cedula'];
    $direccion = $_POST['direccion'];

    $sql = "INSERT INTO clientes (nombre, apellido, cedula, direccion) VALUES ('$nombre', '$apellido', '$cedula', '$direccion')";
    if ($conn->query($sql) === TRUE) {
        echo "Cliente agregado con éxito";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
