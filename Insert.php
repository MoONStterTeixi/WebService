<?php

//Link Callback
//http://localhost/WebService/Insert.php?action=InsertarDatos&code=111&num1=10&num2=12

$code = $_GET['code'];
$action = $_GET['action'];

switch ($action) {
    case 'InsertarDatos':
        InsertarDatos();
        break;
    
    default:
        echo 'Error, accion no valida.';
        break;
}

function InsertarDatos(){
require("Conexiondb.php");
    $num1 = $_GET['num1'];
    $num2 = $_GET['num2'];
    $query = "INSERT INTO datos (num1, num2) VALUES ('$num1','$num2')";
    mysqli_query($conexion, $query) or die(mysqli_error());
    mysqli_close($conexion);
}


?>