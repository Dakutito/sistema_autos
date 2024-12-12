<?php
include 'conexion.php';

$sql = "SELECT id_auto, CONCAT(marca, ' ', modelo) AS auto FROM autos";
$result = $conn->query($sql);

$options = "<option value=''>Selecciona un auto</option>";
while ($row = $result->fetch_assoc()) {
    $options .= "<option value='{$row['id_auto']}'>{$row['auto']}</option>";
}

echo $options;
?>
