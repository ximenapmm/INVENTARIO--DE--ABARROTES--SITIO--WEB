<?php
require_once 'auth.php'; // Verificación de sesión
require_once('../bd/base_de_datos.php');
require_once('tcpdf/tcpdf.php'); // Ruta a la biblioteca TCPDF

$sql_select = "SELECT * FROM productos";
$resultado_select = $base_de_datos->query($sql_select);

if ($resultado_select && $resultado_select->rowCount() > 0) {
    // Crear nueva instancia de TCPDF
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

    // Configurar información del documento
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Tu Nombre');
    $pdf->SetTitle('Lista de Productos - TiendaSoft');
    $pdf->SetSubject('Lista de Productos');
    $pdf->SetKeywords('TiendaSoft, productos, PDF');

    // Agregar una página
    $pdf->AddPage();

    // Contenido de la tabla
    $html = '<h2>LISTA DE PRODUCTOS:</h2>';
    $html .= '<table border="1">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Categoria</th>
                    <th>Estado</th>
                    <th>Fecha de Registro</th>
                </tr>';

    while ($row = $resultado_select->fetch(PDO::FETCH_ASSOC)) {
        $html .= '<tr>
                    <td>' . htmlspecialchars($row['id']) . '</td>
                    <td>' . htmlspecialchars($row['nombre']) . '</td>
                    <td>$' . number_format($row['precio'], 2) . '</td>
                    <td>' . htmlspecialchars($row['cantidad']) . '</td>
                    <td>' . htmlspecialchars($row['categoria']) . '</td>
                    <td>' . htmlspecialchars($row['estado']) . '</td>
                    <td>' . htmlspecialchars($row['fecha_registro']) . '</td>
                  </tr>';
    }

    $html .= '</table>';

    // Escribir el contenido HTML en el PDF
    $pdf->writeHTML($html, true, false, true, false, '');

    // Nombre del archivo PDF para descargar
    $nombre_archivo = 'lista_productos.pdf';

    // Salida del PDF (descarga directa)
    $pdf->Output($nombre_archivo, 'D');
    exit;
} else {
    echo "<p>No se encontraron productos para generar el PDF.</p>";
}
