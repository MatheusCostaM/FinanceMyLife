<?php
$servername = "sql313.byethost13.com";
$username = "b13_38026041";
$password = "MatheusDev2025";
$dbname = "b13_38026041_financemylife";

// Criar conexão
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Verificar conexão
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>