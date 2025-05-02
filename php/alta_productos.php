<?php
require_once 'auth.php'; // Verificación de sesión
include('../bd/base_de_datos.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $cantidad = $_POST['cantidad'];
    $categoria = $_POST['categoria'];
    $codigo_barras = $_POST['codigo_barras'];

    $sql = "INSERT INTO productos (nombre, precio, cantidad, categoria, codigo_barras) 
            VALUES (:nombre, :precio, :cantidad, :categoria, :codigo_barras)";
    $stmt = $base_de_datos->prepare($sql);
    $resultado = $stmt->execute([
        ':nombre' => $nombre,
        ':precio' => $precio,
        ':cantidad' => $cantidad,
        ':categoria' => $categoria,
        ':codigo_barras' => $codigo_barras
    ]);

    if ($resultado) {
        echo "<script>alert('Registro exitoso.'); window.location.replace('alta_productos.php');</script>";
        exit;
    } else {
        echo "<script>alert('Algo salió mal. Intente de nuevo.'); window.location.replace('alta_productos.php');</script>";
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos/styles.css">
    <link rel="shortcut icon" href="../images/tiendasoft.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <title>TiendaSoft | Alta de Productos</title>
</head>
<body class="admin-panel-body">
    <nav class="admin-navbar">
        <div class="admin-navbar-brand">Panel de Control</div>
        <div class="admin-navbar-menu">
            <a href="panel_administrador.php" class="admin-navbar-item">Inicio</a>
            <a href="logout.php" class="admin-navbar-item">Cerrar Sesión</a>
        </div>
    </nav>
  
    <h2 class="titulo-centrado">ALTA DE PRODUCTOS</h2>
    <div class="alta-productos">
        <form method="POST">
            Nombre del producto: <br>
            <input class="caja" type="text" placeholder="Nombre" name="nombre" required><br> <br>

            Precio: <br>
            <input class="caja" type="text" placeholder="Precio" name="precio" required><br> <br>

            Cantidad: <br>
            <input class="caja" type="text" placeholder="Cantidad" name="cantidad" required><br> <br>

            Categoría: <br>
            <input class="caja" type="text" placeholder="Categoría" name="categoria" required><br> <br>
            
            Codigo de barras: <br>
            <input class="caja" type="text" placeholder="Codigo de barras" name="codigo_barras" required><br><br> <br>

            <input class="btn" type="submit" value="Registrar">
        </form>
    </div>
</body>
</html>
