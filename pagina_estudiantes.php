<?php
session_start();

// Verificar si el usuario está logueado como estudiante
if (!isset($_SESSION['tipo_usuario']) || $_SESSION['tipo_usuario'] != 'estudiante') {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<link rel="icon" type="image/png" href="img/logo.png">
<link rel="stylesheet" href="style.css">
    <title>Sistema de Deletreo - Estudiante</title>
</head>
<body>
<center>
    <h1>Bienvenido Estudiante</h1>
    <p>Esta es la página para estudiantes.</p>
    <p><a href="index.php?logout=1">Cerrar sesión</a></p>
    <center>
</body>
</html>