
<?php
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $precio = $_POST['precio'];
    $anio = $_POST['anio'];

    $sql = "INSERT INTO autos (marca, modelo, precio, anio) VALUES ('$marca', '$modelo', '$precio', '$anio')";
    if ($conn->query($sql) === TRUE) {
        echo "Auto agregado con éxito";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
