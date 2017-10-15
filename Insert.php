<?php
require("Conexiondb.php");
$nombre = $_GET['nombre'];
$apellido = $_GET['apellido'];

$query = "INSERT INTO datos (Nombre, Apellido) VALUES ('$nombre','$apellido')";
mysqli_query($conexion, $query) or die(mysqli_error());
mysqli_close($conexion);
?>