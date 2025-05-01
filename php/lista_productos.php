<?php 
require_once 'auth.php'; // Verificación de sesión
include('../bd/base_de_datos.php');
$sql_select = "SELECT * FROM productos";
$resultado_select = $base_de_datos->query($sql_select);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos/styles.css">
    <link rel="shortcut icon" href="../images/tiendasoft.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <title>TiendaSoft | Lista de Productos</title>
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
        <h2>LISTA DE PRODUCTOS:</h2>
        <?php
       
        if ($resultado_select && $resultado_select->rowCount() > 0){
            echo "<table border='1'>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Categoria</th>
                        <th>Estado</th>
                        <th>Fecha de Registro</th>
                    </tr>";

                    while ($row = $resultado_select->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>
                        <td>" . htmlspecialchars($row['id']) . "</td>
                        <td>" . htmlspecialchars($row['nombre']) . "</td>
                        <td>$" . number_format($row['precio'], 2) . "</td>
                        <td>" . htmlspecialchars($row['cantidad']) . "</td>
                        <td>" . htmlspecialchars($row['categoria']) . "</td>
                        <td>" . htmlspecialchars($row['estado']) . "</td>
                        <td>" . htmlspecialchars($row['fecha_registro']) . "</td>
                      </tr>";
            }

            echo "</table>";
        } else {
            echo "<p>No se encontraron productos.</p>";
        }
        ?>
    </div>
    <div style="margin-top: 1.5rem;">
        <a href="imprimir.php" class="admin-btn">Crear PDF</a>
    </div>
</body>
</html>
