<?php
$hostname = 'localhost';
$database = 'bd_abarrotes';
$username = 'root';
$password = '';
$conex = mysqli_connect($hostname, $username, $password, $database);

if (!$conex) {
    echo 'Ha ocurrido un error.' . mysqli_connect_error();
}
?>