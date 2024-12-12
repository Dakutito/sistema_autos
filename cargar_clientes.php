<?php
include 'conexion.php';

$sql = "SELECT id_cliente, CONCAT(nombre, ' ', apellido) AS nombre FROM clientes";
$result = $conn->query($sql);

$options = "<option value=''>Selecciona un cliente</option>";
while ($row = $result->fetch_assoc()) {
    $options .= "<option value='{$row['id_cliente']}'>{$row['nombre']}</option>";
}

echo $options;
?>
