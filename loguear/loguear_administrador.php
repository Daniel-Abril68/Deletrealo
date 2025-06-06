<?php
// Iniciar sesión
session_start();

// Verificar si ya hay una sesión activa
if (isset($_SESSION['tipo_usuario']) && $_SESSION['tipo_usuario'] == 'administrador') {
    header("Location: ../pagina_administrador.php");
    exit();
}

// Incluir archivo de conexión
require_once '../modelo/conexion.php';

// Inicializar variables
$error = "";

// Procesar el formulario cuando se envía
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = conectar_db();
    
    // Obtener datos del formulario
    $email = $conn->real_escape_string($_POST['email']);
    $clave = $conn->real_escape_string($_POST['clave']);
    
    // Verificar si el usuario existe en la tabla correspondiente
    $sql = "SELECT * FROM administrador WHERE email_administrador = '$email' AND contraseña = '$clave'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $_SESSION['tipo_usuario'] = 'administrador';
        $_SESSION['email'] = $email;
        header("Location: ../pagina_administrador.php");
        exit();
    } else {
        $error = "Email o contraseña incorrectos";
    }
    
    // Cerrar conexión
    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login - Administrador</title>
</head>
<body>
    <h2>Sistema de Deletreo</h2>
    <h3>Ingreso como Administrador</h3>
    
    <?php if (!empty($error)): ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>
    
    <form method="post" action="">
        <p>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </p>
        
        <p>
            <label for="clave">Contraseña:</label>
            <input type="password" id="clave" name="clave" required>
        </p>
        
        <p>
            <input type="submit" value="Iniciar Sesión">
            <a href="../index.php"><button type="button">Cancelar</button></a>
        </p>
    </form>
</body>
</html>