<?php
$code = $_GET['code'];
$action = $_GET['action'];

switch ($action) {
    case 'InsertinDatos':
        InsertinDatos();
        break;
    
    default:
        echo 'Error, action no valid.';
        break;
}

function InsertinDatos(){
require("Conexiondb.php");
    $name = $_GET['name'];
    $lastname = $_GET['lastname'];
    $query = "INSERT INTO datos (Nombre, Apellido) VALUES ('$name','$lastname')";
    mysqli_query($conexion, $query) or die(mysqli_error());
    mysqli_close($conexion);
}

?>