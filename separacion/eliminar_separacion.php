<?php
include '../conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $sql = "DELETE FROM separaciones WHERE id_separacion = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Separación eliminada correctamente";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
