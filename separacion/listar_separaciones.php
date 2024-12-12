<?php
include '../conexion.php';

$sql = "SELECT separaciones.id_separacion, CONCAT(clientes.nombre, ' ', clientes.apellido) AS cliente, CONCAT(autos.marca, ' ', autos.modelo) AS auto, separaciones.fecha
        FROM separaciones
        INNER JOIN clientes ON separaciones.id_cliente = clientes.id_cliente
        INNER JOIN autos ON separaciones.id_auto = autos.id_auto";

$result = $conn->query($sql);
$rows = "";

while ($row = $result->fetch_assoc()) {
    $rows .= "<tr>
                <td>{$row['id_separacion']}</td>
                <td>{$row['cliente']}</td>
                <td>{$row['auto']}</td>
                <td>{$row['fecha']}</td>
                <td>
                    <a href='#' class='editar' data-id='{$row['id_separacion']}'>Editar</a>
                    <a href='#' class='eliminar' data-id='{$row['id_separacion']}'>Eliminar</a>
                </td>
              </tr>";
}

echo $rows;
?>
