<?php
include '../conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_separacion = $_POST['id_separacion'];
    $id_cliente = $_POST['id_cliente'];
    $id_auto = $_POST['id_auto'];
    $fecha = $_POST['fecha'];

    $sql = "UPDATE separaciones SET id_cliente = $id_cliente, id_auto = $id_auto, fecha = '$fecha' WHERE id_separacion = $id_separacion";
    if ($conn->query($sql) === TRUE) {
        echo "Separación actualizada correctamente";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
