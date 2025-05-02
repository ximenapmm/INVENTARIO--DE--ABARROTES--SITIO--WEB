<?php
require_once 'auth.php'; // Verificación de sesión
include('../bd/base_de_datos.php');

$producto_encontrado = null;
if (!empty($_POST['codigo_barras'])) {
    $codigo = $_POST['codigo_barras'];
    $stmt = $base_de_datos->prepare("SELECT * FROM productos WHERE codigo_barras = ?");
    $stmt->execute([$codigo]);
    $producto_encontrado = $stmt->fetch(PDO::FETCH_ASSOC);
}
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
    <h1 class="titulo-centrado">BÚSQUEDA POR CÓDIGO DE BARRAS</h1>
    <div class="busqueda-contenedor">
    <form method="POST">
        <input type="text" 
               class="caja" 
               placeholder="Escanea código..."
               autofocus required>
        <button type="submit" class="btn">🔍 Buscar</button>
    </form>

    <?php if ($producto_encontrado): ?>
        <div class="resultado-busqueda">
            <h3>Producto encontrado:</h3>
            <p><strong>Nombre:</strong> <?= htmlspecialchars($producto_encontrado['nombre']) ?></p>
            <p><strong>Precio:</strong> $<?= number_format($producto_encontrado['precio'], 2) ?></p>
            <p><strong>Cantidad:</strong> <?= $producto_encontrado['cantidad'] ?></p>
            <p><strong>Categoría:</strong> <?= $producto_encontrado['categoria'] ?></p>
        </div>
    <?php elseif ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
        <p style="color:red;">Producto no encontrado con ese código.</p>
    <?php endif; ?>
</div>

</body>
</html>