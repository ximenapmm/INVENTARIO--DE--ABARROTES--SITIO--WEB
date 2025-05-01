<?php
$usuario="root";
$contraseña="";
$nombre_base_de_datos="bd_abarrotes";
try{
    $base_de_datos = new PDO('mysql:host=localhost;dbname=' . $nombre_base_de_datos, $usuario, $contraseña);
}catch(Exception $e)
{
    echo "Ocurrio algo con la base de datos: " . $e->getMessage();
}
?>