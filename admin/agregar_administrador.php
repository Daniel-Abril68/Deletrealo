<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
session_start();

require_once("../modelo/conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mostrar qué datos llegan para depurar
    echo "<pre>";
    var_dump($_POST);
    echo "</pre>";

    $nombre_administrador = $_POST["nombre_administradr"] ?? null;
    $usuario = $_POST["usuario"] ?? null;
    $contrasena_raw = $_POST["contrasena"] ?? null;

    if (!$nombre_administrador || !$usuario || !$contrasena_raw) {
        die("Faltan datos del formulario.");
    }

    $contrasena = password_hash($contrasena_raw, PASSWORD_DEFAULT);

    $sql = "INSERT INTO administrador (nombre_administrador, usuario, contrasena) VALUES (?, ?, ?)";
    $stmt = $conexion->prepare($sql);

    if (!$stmt) {
        die("Error preparando consulta: " . $conexion->error);
    }

    $stmt->bind_param("sss", $nombre_administrador, $usuario, $contrasena);

    if ($stmt->execute()) {
        echo "<script>alert('✅ Administrador agregado correctamente.'); window.location.href='../pagina_administrador.php';</script>";
    } else {
        echo "❌ Error al guardar administrador: " . $stmt->error;
    }

    $stmt->close();
    $conexion->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Agregar Administrador</title>
</head>
<body>
    <h1>Agregar Administrador</h1>
    <form method="POST" action="">
        <label for="nombre">Nombre completo:</label><br>
        <input type="text" id="nombre" name="nombre" required><br><br>

        <label for="usuario">Usuario:</label><br>
        <input type="text" id="usuario" name="usuario" required><br><br>

        <label for="contrasena">Contraseña:</label><br>
        <input type="password" id="contrasena" name="contrasena" required><br><br>

        <input type="submit" value="Agregar">
    </form>
    <p><a href="../pagina_administrador.php">Volver al panel</a></p>
</body>
</html>
