<?php

if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['usuario_id'])) {
    die(header("Location: ../main.php"));
}

?>