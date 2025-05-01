<?php
if(!isset($_POST["nombre"]) ||
    !isset($_POST["correo"]) ||
    !isset($_POST["pass"])
) {
    header("Location: crear_cuenta.html");
    exit();
}

include_once "../bd/base_de_datos.php";

$administrador = trim($_POST["nombre"]);
$correo = trim($_POST["correo"]);
$pass = $_POST["pass"];

// Validar campos vacíos
if(empty($administrador) || empty($correo) || empty($pass)) {
    echo "
    <script>
        alert('Todos los campos son obligatorios');
        window.history.back();
    </script>";
    exit();
}

// Verificar si el administrador ya existe
$verificar = $base_de_datos->prepare("SELECT COUNT(*) FROM administrador WHERE correo = ?");
$verificar->execute([$correo]);
$existe = $verificar->fetchColumn();

if($existe > 0) {
    echo "
    <script>
        alert('Este administrador ya está registrado');
        window.history.back();
    </script>";
    exit();
}

// Encriptar la contraseña
$pass_hash = password_hash($pass, PASSWORD_DEFAULT);

// Insertar el nuevo administrador
$insertar = $base_de_datos->prepare("INSERT INTO administrador (nombre, correo, pass) VALUES (?, ?, ?);");
$resultado_insertar = $insertar->execute([$administrador, $correo, $pass_hash]);

if($resultado_insertar) {
    echo "
    <script>
        alert('Tu cuenta ha sido creada con éxito');
        window.location.href = 'login_administrador.html';
    </script>";
} else {
    echo "
    <script>
        alert('Error al crear la cuenta');
        window.history.back();
    </script>";
}
?>