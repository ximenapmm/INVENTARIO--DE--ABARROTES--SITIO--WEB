<?php
error_reporting(E_ALL & ~E_DEPRECATED & ~E_NOTICE);
require_once 'auth.php'; // Verificación de sesión
require_once('../bd/base_de_datos.php');
require_once('../library/tcpdf.php'); // Ruta a la biblioteca TCPDF

$sql_select = "SELECT * FROM productos";
$resultado_select = $base_de_datos->query($sql_select);

if ($resultado_select && $resultado_select->rowCount() > 0) {

    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);


    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Tu Nombre');
    $pdf->SetTitle('Lista de Productos - TiendaSoft');
    $pdf->SetSubject('Lista de Productos');
    $pdf->SetKeywords('TiendaSoft, productos, PDF');

    $pdf->AddPage();

    $html = '<h2>LISTA DE PRODUCTOS:</h2>';
    $html .= '<table border="1">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Categoria</th>
                    <th>Codigo de barras</th>
                    <th>Fecha de Registro</th>
                </tr>';

    while ($row = $resultado_select->fetch(PDO::FETCH_ASSOC)) {
        $html .= '<tr>
                    <td>' . htmlspecialchars($row['id']) . '</td>
                    <td>' . htmlspecialchars($row['nombre']) . '</td>
                    <td>$' . number_format($row['precio'], 2) . '</td>
                    <td>' . htmlspecialchars($row['cantidad']) . '</td>
                    <td>' . htmlspecialchars($row['categoria']) . '</td>
                    <td>' . htmlspecialchars($row['codigo_barras']) . '</td>
                    <td>' . htmlspecialchars($row['fecha_registro']) . '</td>
                  </tr>';
    }

    $html .= '</table>';

    $pdf->writeHTML($html, true, false, true, false, '');

    $nombre_archivo = 'lista_productos.pdf';

    $pdf->Output($nombre_archivo, 'D');
    exit;
} else {
    echo "<p>No se encontraron productos para generar el PDF.</p>";
}
