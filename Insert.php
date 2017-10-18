<?php

include('conexiondb.class.php');

$code = $_GET['code'];
$action = $_GET['action'];
$Hcode = '1111'; //Codigo de seguridad

if($code === $Hcode){
    switch ($action) {
    case 'InsertarDatos':
        InsertarDatos();
        break;
    
    default:
        echo 'Error, accion no valida.';
        break;
    }
}
else{
    echo 'Error, codigo erroneo';
}

function InsertarDatos(){
    $num1 = $_GET['num1'];
    $num2 = $_GET['num2'];
    $conexion = new conexiondb();
    $query = "INSERT INTO datos (num1, num2) VALUES ('$num1','$num2')";
    $result = $conexion->query($query);
    
}
?>