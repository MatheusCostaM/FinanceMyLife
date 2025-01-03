<?php
$servername = "localhost";
$username = "root";
$password = "vertrigo";
$dbname = "login";

// Criar conexão
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Verificar conexão
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>