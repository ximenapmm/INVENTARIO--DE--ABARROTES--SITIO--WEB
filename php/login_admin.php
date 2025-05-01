<?php
session_start();

if(!isset($_POST["correo"]) || !isset($_POST["pass"])) {
    header("Location: login_administrador.html?error=Acceso no autorizado");
    exit();
}

include_once "../bd/base_de_datos.php";

$correo = trim($_POST["correo"]);
$pass = $_POST["pass"];

// Validar campos vacíos
if(empty($correo) || empty($pass)) {
    header("Location: login_administrador.html?error=Correo y contraseña son obligatorios");
    exit();
}

// Buscar al administrador
$consulta = $base_de_datos->prepare("SELECT id, nombre, correo, pass FROM administrador WHERE correo = ?");
$consulta->execute([$correo]);
$admin = $consulta->fetch(PDO::FETCH_ASSOC);

// Verificar credenciales
if($admin && password_verify($pass, $admin['pass'])) {
    $_SESSION['admin_id'] = $admin['id'];
    $_SESSION['admin_nombre'] = $admin['nombre'];
    $_SESSION['admin_correo'] = $admin['correo'];
    $_SESSION['loggedin'] = true;
    $_SESSION['last_activity'] = time(); // Para control de inactividad
    
    header("Location: panel_administrador.php");
    exit();
} else {
    header("Location: login_administrador.html?error=Credenciales incorrectas");
    exit();
}
?>