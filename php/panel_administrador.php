<?php
require_once 'auth.php'; // Archivo de verificación de sesión
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos/styles.css">
    <link rel="shortcut icon" href="../images/tiendasoft.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <title>Panel de Administración</title>
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

    <!-- Contenido principal -->
    <div class="admin-container">
        <div class="welcome-message">
            <h2>Bienvenido, <?php echo htmlspecialchars($_SESSION['admin_nombre']); ?></h2>
            <p>Último acceso: <?php echo date('d/m/Y h:i:s A'); ?></p>
        </div>

        <div class="admin-card">
            <h4>Acciones rápidas:</h4>
            <ul class="admin-actions-list">
                <li><a href="alta_productos.php">Dar de alta a productos</a></li>
                <li><a href="lista_productos.php">Productos dados de alta</a></li>
                <li><a href="gestion_productos.php">Gestión de productos</a></li>
                <li><a href="busqueda_productos.php">Busqueda por código de barras</a></li>
            </ul>
            
            <!-- Mover esto a productos dados de alta -->
            
        </div>
    </div>
</body>
</html>