<?php
$Servidor = "localhost";
$user = "root";
$pass = "";
$db = "test";

$conexion = mysqli_connect($Servidor, $user, $pass, $db);
if(mysqli_connect_errno()){
    echo "Fallo al de conexion: " . mysqli_connect_errno();
}
?>