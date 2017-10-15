<?php
require("Conexiondb.php");

$query = "SELECT * FROM datos";
mysqli_query($conexion, $query) or die(mysqli_error());
$result = $conexion->query($query);
mysqli_close($conexion);
?>