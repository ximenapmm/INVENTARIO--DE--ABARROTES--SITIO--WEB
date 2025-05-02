<?php
require_once 'auth.php';
include('../bd/base_de_datos.php');

// Si se envió el formulario de edición
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['actualizar'])) {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $cantidad = $_POST['cantidad'];
    $categoria = $_POST['categoria'];
    $codigo_barras = $_POST['codigo_barras'];

    $sql = "UPDATE productos SET nombre = ?, precio = ?, cantidad = ?, categoria = ?, codigo_barras = ? WHERE id = ?";
    $stmt = $base_de_datos->prepare($sql);
    $stmt->execute([$nombre, $precio, $cantidad, $categoria, $codigo_barras, $id]);

    echo "<script>alert('Producto actualizado correctamente.'); window.location.href='gestion_productos.php';</script>";
    exit;
}

// Si se quiere editar un producto específico
$producto_editar = null;
if (isset($_GET['editar'])) {
    $id_editar = $_GET['editar'];
    $sql = "SELECT * FROM productos WHERE id = ?";
    $stmt = $base_de_datos->prepare($sql);
    $stmt->execute([$id_editar]);
    $producto_editar = $stmt->fetch(PDO::FETCH_ASSOC);
}

// Obtener todos los productos
$sql = "SELECT * FROM productos";
$resultado = $base_de_datos->query($sql);
$productos = $resultado->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos/styles.css">
    <link rel="shortcut icon" href="../images/tiendasoft.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <title>TiendaSoft | Gestión de Productos</title>
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

    <div class="contenedor">
        <h2>Gestión de Productos</h2>

        <?php if ($producto_editar): ?>
            <!-- Formulario de edición -->
            <h3>Editar Producto</h3>
            <form method="POST">
                <input type="hidden" name="id" value="<?= $producto_editar['id'] ?>">

                Nombre:<br>
                <input class="caja" type="text" name="nombre" value="<?= htmlspecialchars($producto_editar['nombre']) ?>" required><br>

                Precio:<br>
                <input class="caja" type="text" name="precio" value="<?= htmlspecialchars($producto_editar['precio']) ?>" required><br>

                Cantidad:<br>
                <input class="caja" type="text" name="cantidad" value="<?= htmlspecialchars($producto_editar['cantidad']) ?>" required><br>

                Categoría:<br>
                <input class="caja" type="text" name="categoria" value="<?= htmlspecialchars($producto_editar['categoria']) ?>" required><br>

                Codigo de barras:<br>
                <input class="caja" type="text" name="codigo_barras" value="<?= htmlspecialchars($producto_editar['codigo_barras']) ?>" required><br><br>

                <input class="btn" type="submit" name="actualizar" value="Actualizar Producto">

                <button type="button" class="btn" onclick="window.location.href='gestion_productos.php'">Cancelar</button>
            </form>
            <hr>
        <?php endif; ?>

        <?php if (!isset($_GET['editar'])): ?>
    <!-- TABLA DE PRODUCTOS -->
    <table border='1'>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th>Categoría</th>
            <th>codigo_barras</th>
            <th>Acciones</th>
        </tr>
        <?php foreach ($productos as $producto): ?>
            <tr>
                <td><?= htmlspecialchars($producto['id']) ?></td>
                <td><?= htmlspecialchars($producto['nombre']) ?></td>
                <td>$<?= number_format($producto['precio'], 2) ?></td>
                <td><?= htmlspecialchars($producto['cantidad']) ?></td>
                <td><?= htmlspecialchars($producto['categoria']) ?></td>
                <td><?= htmlspecialchars($producto['codigo_barras']) ?></td>
                <td>
                    <a class="btn" href="?editar=<?= $producto['id'] ?>">Editar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php endif; ?>

    </div>
</body>
</html>
