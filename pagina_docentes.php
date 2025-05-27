<?php
session_start();

// Verificar si el usuario está logueado como docente
if (!isset($_SESSION['tipo_usuario']) || $_SESSION['tipo_usuario'] != 'docente') {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sistema de Deletreo - Docente</title>
</head>
<body>
    <h1>Bienvenido Docente</h1>
    <p>Esta es la página para docentes.</p>
    <p><a href="index.php?logout=1">Cerrar sesión</a></p>
</body>
</html>