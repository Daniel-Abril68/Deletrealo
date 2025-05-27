<?php
session_start();

// Verificar si el usuario está logueado como estudiante
if (!isset($_SESSION['tipo_usuario']) || $_SESSION['tipo_usuario'] !== 'estudiante') {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel del Estudiante - Sistema de Deletreo</title>
</head>
<body>
    <h1>Bienvenido, <?php echo htmlspecialchars($_SESSION['nombre_estudiante'] ?? 'Estudiante'); ?></h1>
    <p>Esta es la página de acceso para estudiantes del sistema de deletreo.</p>
    <p><a href="index.php?logout=1">Cerrar sesión</a></p>
</body>
</html>
