<?php

//Link Callback
//http://localhost/WebService/Insert.php?action=InsertarDatos&code=1111&num1=100&num2=100

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
    require("Conexiondb.php");
    $num1 = $_GET['num1'];
    $num2 = $_GET['num2'];
    $query = "INSERT INTO datos (num1, num2) VALUES ('$num1','$num2')";
    mysqli_query($conexion, $query) or die(mysqli_error());
    mysqli_close($conexion);
}


?>