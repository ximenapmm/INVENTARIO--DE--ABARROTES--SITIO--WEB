<?php
session_start();

date_default_timezone_set('America/Mexico_City');
// Verificar si la sesión es válida
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login_administrador.html?error=Debes iniciar sesión");
    exit();
}

// Verificar inactividad (30 minutos)
$inactivity_limit = 1800; // 30 minutos en segundos
if(isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > $inactivity_limit)) {
    session_unset();
    session_destroy();
    header("Location: login_administrador.html?error=Sesión expirada por inactividad");
    exit();
}

// Actualizar tiempo de última actividad
$_SESSION['last_activity'] = time();

// Verificación adicional contra la base de datos (opcional pero recomendado)
include_once "../bd/base_de_datos.php";
$consulta = $base_de_datos->prepare("SELECT id FROM administrador WHERE id = ? LIMIT 1");
$consulta->execute([$_SESSION['admin_id']]);
$admin = $consulta->fetch();

if(!$admin) {
    session_destroy();
    header("Location: login_administrador.html?error=Usuario no encontrado");
    exit();
}
?>