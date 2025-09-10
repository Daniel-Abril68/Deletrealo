<?php
// Iniciar sesión
session_start();

if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: index.php");
    exit();
}

if (isset($_SESSION['tipo_usuario'])) {
    switch ($_SESSION['tipo_usuario']) {
        case 'estudiante':
            header("Location: pagina_estudiantes.php");
            break;
        case 'docente':
            header("Location: pagina_docentes.php");
            break;
        case 'administrador':
            header("Location: pagina_administrador.php");
            break;
        case 'digitador':
            header("Location: pagina_digitador.php");
            break;
    }
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<link rel="icon" type="image/png" href="img/logo.png">
<link rel="stylesheet" href="style.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sistema de Deletreo</title>

    <!-- Estilos FoodHut -->
    <link rel="stylesheet" href="assets/vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="assets/vendors/animate/animate.css">
    <link rel="stylesheet" href="assets/css/foodhut.css">
    <style>.header{background:url("img/index.png") center/cover no-repeat;height:100vh}</style>

</head>
<body data-spy="scroll" data-target=".navbar" data-offset="40" id="home">
    
    <!-- Navbar -->
    <nav class="custom-navbar navbar navbar-expand-lg navbar-dark fixed-top" data-spy="affix" data-offset-top="10">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" 
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <a class="navbar-brand m-auto" href="#">
                <img src="assets/imgs/logo.svg" class="brand-img" alt="">
                <span class="brand-txt">Sistema Deletreo</span>
            </a>
        </div>
    </nav>

    <!-- Header con botones -->
    <header id="home" class="header">
        <div class="overlay text-white text-center">
            <h1 class="display-4 font-weight-bold my-3">Bienvenido al Sistema de Deletreo</h1>
            <h2 class="mb-4">Seleccione su tipo de usuario</h2>
            <div class="d-flex justify-content-center flex-wrap">
                <a href="loguear/loguear_estudiante.php" class="btn btn-lg btn-primary m-2">Estudiante</a>
                <a href="loguear/loguear_docente.php" class="btn btn-lg btn-primary m-2">Docente</a>
                <a href="loguear/loguear_administrador.php" class="btn btn-lg btn-primary m-2">Administrador</a>
                <a href="loguear/loguear_digitador.php" class="btn btn-lg btn-primary m-2">Digitador</a>
            </div>
        </div>
    </header>

    <!-- Footer -->
    <div class="bg-dark text-light text-center border-top wow fadeIn">
        <p class="mb-0 py-3 text-muted small">
            &copy; <?php echo date("Y"); ?> Sistema de Deletreo. Todos los derechos reservados.
        </p>
    </div>

    <!-- Scripts FoodHut -->
    <script src="assets/vendors/jquery/jquery-3.4.1.js"></script>
    <script src="assets/vendors/bootstrap/bootstrap.bundle.js"></script>
    <script src="assets/vendors/bootstrap/bootstrap.affix.js"></script>
    <script src="assets/vendors/wow/wow.js"></script>
    <script src="assets/js/foodhut.js"></script>
</body>
</html>
