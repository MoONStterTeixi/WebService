<?php
require("format.php");
include('conexiondb.class.php');

$code = strtolower($_GET['code']);
$action = strtolower($_GET['action']);
$Hcode = '1111'; //Codigo de seguridad

if($code === $Hcode){
    switch ($action) {
        case 'getall':
        getall($format);
            break;
        default:
            echo 'Error, accion no valida.';
            break;
    }
}else{
    echo 'Error, codigo erroneo';
}

function getall($format){
    $conexion = new conexiondb();
    $query = "SELECT * FROM datos";
    $result = $conexion->query($query);
    $conexion->desconectar();
    echo format($result);
}
?>