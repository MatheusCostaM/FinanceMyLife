<?php
include('./protect.php');
include('./db_connect.php');

$conn->set_charset("utf8mb4");

$sql = "SELECT lancamento_id, titulo, valor, frequencia, data_inicial, data_final, tipo FROM lancamentos WHERE user_id = ?";

$stmt = $conn->prepare($sql);

$stmt->bind_param("s", $_SESSION['usuario_id']);

$stmt->execute();

$result = $stmt->get_result();

$lancamentos = [];

while ($row = $result->fetch_assoc()) {
    $lancamentos[] = $row;
}

$stmt->close();

header('Content-Type: application/json');
echo json_encode($lancamentos);

?>