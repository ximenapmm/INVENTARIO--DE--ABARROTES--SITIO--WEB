<?php
require_once 'auth.php'; // Archivo de verificación de sesión
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos/styles.css">
    <link rel="shortcut icon" href="../images/tiendasoft.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">

    <title>TiendaSoft | Búsqueda </title>
</head>
<body class="admin-panel-body">
    <!-- Barra de navegación del administrador -->
    <nav class="admin-navbar">
        <div class="admin-navbar-brand">Panel de Control</div>
        <div class="admin-navbar-menu">
            <a href="panel_administrador.php" class="admin-navbar-item">Inicio</a>
            <a href="logout.php" class="admin-navbar-item">Cerrar Sesión</a>
        </div>
    </nav>
    <p>Búsqueda por código de barras</p>
</body>
</html>