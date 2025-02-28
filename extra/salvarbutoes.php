<?php

include('./protect.php');
include('./db_connect.php');

$conn->set_charset("utf8mb4");

header('Content-Type: application/json');

$data = json_decode(file_get_contents('php://input'), true);

$sql = "UPDATE controladores 
        SET botao1 = ?, botao2 = ?, botao3 = ?, botao4 = ?, botao5 = ?, botao6 = ?, botao7 = ?, botao8 = ?, tipo1 = ?, tipo2 = ?, tipo3 = ?, tipo4 = ?
        WHERE user_id = ?";

$stmt = $conn->prepare($sql);

$stmt->bind_param(
    "iiiiiiiiiiiii",
    $data['posicoes'][0],
    $data['posicoes'][1],
    $data['posicoes'][2],
    $data['posicoes'][3],
    $data['posicoes'][4],
    $data['posicoes'][5],
    $data['posicoes'][6],
    $data['posicoes'][7],
    $data['posicoes'][8],
    $data['posicoes'][9],
    $data['posicoes'][10],
    $data['posicoes'][11],
    $_SESSION['usuario_id']
);

$stmt->execute();
$stmt->close();
$conn->close();
?>