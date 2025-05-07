<?php
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
    require 'modelo/conexion.php';

    session_start();
    if (isset($_SESSION['username'])) {
        $nombre_usuario = $_SESSION['username'];
    }

    $resultado_busqueda = null;
    $mensaje = "";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id_deletreo = $_POST['id_deletreo'];

        $query = "SELECT * FROM deletreo WHERE id_deletreo = ?";
        $stmt = $conexion->prepare($query);
        $stmt->bind_param("s", $id_deletreo);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($resultado->num_rows > 0) {
            $resultado_busqueda = $resultado->fetch_assoc();
        } else {
            $mensaje = "Registro no encontrado en deletreo.";
        }
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Buscar en Deletreo</title>
</head>
<body>
    <h1>Buscar Palabra en Deletreo</h1>
    <?php if (isset($nombre_usuario)) echo 'Usuario: ' . htmlspecialchars($nombre_usuario); ?>

    <form action="" method="post">
        <label for="id_deletreo">ID de deletreo:</label>
        <input type="text" name="id_deletreo" required>
        <button type="submit">Buscar</button>
    </form>

    <?php if ($resultado_busqueda): ?>
        <h2>Resultado:</h2>
        <p><strong>ID:</strong> <?= htmlspecialchars($resultado_busqueda['id_deletreo']) ?></p>
        <p><strong>Palabra:</strong> <?= htmlspecialchars($resultado_busqueda['palabra']) ?></p>
        <!-- Agrega más campos aquí según la estructura real -->
    <?php elseif ($mensaje): ?>
        <p><?= $mensaje ?></p>
    <?php endif; ?>
</body>
</html>
