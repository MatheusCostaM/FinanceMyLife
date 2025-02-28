<?php

include('./protect.php');
include('./db_connect.php');

$conn->set_charset("utf8mb4");

header('Content-Type: application/json');

$data = json_decode(file_get_contents('php://input'), true);

$sql_update = "UPDATE lancamentos 
    SET titulo = ?, valor = ?, frequencia = ?, data_inicial = ?, data_final = ? 
    WHERE user_id = ? AND lancamento_id = ?";
$sql_insert = "INSERT INTO lancamentos (user_id, titulo, valor, frequencia, data_inicial, data_final, tipo) 
    VALUES (?, ?, ?, ?, ?, ?, ?)";

$stmt_update = $conn->prepare($sql_update);
$stmt_insert = $conn->prepare($sql_insert);

foreach ($data as $item) {
    $data_final = !empty($item[5]) ? $item[5] : null;

    if ($item[0] != "?") {
        $stmt_update->bind_param("sdsssii", $item[1], $item[2], $item[3], $item[4], $data_final, $_SESSION['usuario_id'], $item[0]);
        $stmt_update->execute();
    } else {
        $stmt_insert->bind_param("isdssss", $_SESSION['usuario_id'], $item[1], $item[2], $item[3], $item[4], $data_final, $item[6]);
        $stmt_insert->execute();
    }
}

$stmt_update->close();
$stmt_insert->close();
$conn->close();
