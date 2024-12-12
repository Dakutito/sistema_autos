<?php
include '../conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_cliente = $_POST['id_cliente'];
    $id_auto = $_POST['id_auto'];
    $fecha = $_POST['fecha'];

    $sql = "INSERT INTO separaciones (id_cliente, id_auto, fecha) VALUES ('$id_cliente', '$id_auto', '$fecha')";
    if ($conn->query($sql) === TRUE) {
        echo "Separación registrada con éxito";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
