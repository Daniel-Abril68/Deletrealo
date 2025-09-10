<?php
session_start();

if (!isset($_SESSION['tipo_usuario']) || $_SESSION['tipo_usuario'] != 'digitador') {
    header("Location: index.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
<link rel="icon" type="image/png" href="img/logo.png">
<link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Administrador - Deletrealo</title>
</head>
<body>
<center>
    <h1>Panel de digitador</h1>
    <ul>
        <li><a href="digitador/agregar_palabra.php">Agregar Palabra</a></li>
    </ul>
    
    <p><a href="index.php?logout=1">Cerrar sesión</a></p>
    <center>
</body>
</html>