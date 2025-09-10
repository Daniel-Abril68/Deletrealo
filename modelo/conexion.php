<?php
// Configuración de conexión a la base de datos
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "deletrealo";

// --- CONEXIÓN REMOTA ---
$servername = "sql309.infinityfree.com";
$username = "if0_39794556";
$password = "daniel17082008"; 
$dbname = "if0_39794556_deletrealo";

// Función para crear una conexión a la base de datos
function conectar_db() {
    global $servername, $username, $password, $dbname;
    
    // Crear conexión
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    // Verificar la conexión
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }
    
    return $conn;
}
?>