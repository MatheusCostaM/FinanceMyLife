<?php

include('./protect.php');
include('./db_connect.php');

header('Content-Type: application/json');

$lancamento_id = json_decode(file_get_contents('php://input'));


$sql = "DELETE FROM lancamentos WHERE lancamento_id = ?";
$stmt = $conn->prepare($sql);

$stmt->bind_param("i", $lancamento_id);

$stmt->execute();

$stmt->close();
$conn->close();

?>