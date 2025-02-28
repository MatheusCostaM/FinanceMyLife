<?php

include('./protect.php');
include('./db_connect.php');

$conn->set_charset("utf8mb4");

$sql = "SELECT botao1, botao2, botao3, botao4, botao5, botao6, botao7, botao8, tipo1, tipo2, tipo3, tipo4 FROM controladores WHERE user_id = ?";

$stmt = $conn->prepare($sql);

$stmt->bind_param("s", $_SESSION['usuario_id']);

$stmt->execute();

$result = $stmt->get_result();

$buttons = [];

if ($row = $result->fetch_assoc()) {
    $buttons = array_values($row);
}

$stmt->close();

header('Content-Type: application/json');
echo json_encode($buttons);

?>