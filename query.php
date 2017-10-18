<?php

    require("format.php");
    include('conexiondb.class.php');

    $code = strtolower($_GET['code']);
    $action = strtolower($_GET['action']);
    $Hcode = '1111';

    if($code === $Hcode){
        switch ($action) {
            case 'getall':
                getall();
                break;
            case 'insertarnums':
                insertarnums();
                break;
            default:
                echo 'Error, accion no valida.';
                break;
        }
    }else{
        echo 'Error: Hcode fail';
    }

    function getall(){
        $conexion = new conexiondb();
        $query = "SELECT * FROM datos";
        $result = $conexion->query($query);
        $conexion->desconectar();
        echo format($result);
    }

    function insertarnums(){
        $num1 = $_GET['num1'];
        $num2 = $_GET['num2'];
        $conexion = new conexiondb();
        $query = "INSERT INTO datos (num1, num2) VALUES ('$num1','$num2')";
        $result = $conexion->query($query);
        echo 'Insercion Correcta';
        
    }

?>