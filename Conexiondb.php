<?php
$Servidor = "localhost";
$puerto = "3306";
$user = "root";
$pass = "";
$db = "test";

$Servidor = $Servidor . ":" . $puerto;

$conexion = mysqli_connect($Servidor, $user, $pass, $db);
if(mysqli_connect_errno()){
    echo "Fallo al de conexion: " . mysqli_connect_errno();
}
?>