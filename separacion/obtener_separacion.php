
<?php
include '../conexion.php';

$id = $_GET['id'];
$sql = "SELECT * FROM separaciones WHERE id_separacion = $id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo json_encode($result->fetch_assoc());
} else {
    echo json_encode([]);
}
?>
