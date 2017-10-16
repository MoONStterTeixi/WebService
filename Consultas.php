<?php

//Link Callback
//http://localhost/WebService/Consultas.php?format=xml
//http://localhost/WebService/Consultas.php?format=json


$format = strtolower($_GET['format']) == 'json' ? 'json' : 'xml'; //Valor por defecto XML
$code = $_GET['code'];
$action = $_GET['action'];
$Hcode = '1111'; //Codigo de seguridad
if($code === $Hcode){
    switch ($action) {
        case 'SelectDatos':
        SelectDatos();
            break;
        default:
            echo 'Error, accion no valida.';
            break;
    }
}else{
    echo 'Error, codigo erroneo';
}
function SelectDatos(){
    require("Conexiondb.php");
    $query = "SELECT * FROM datos";
    mysqli_query($conexion, $query) or die(mysqli_error());
    $result = $conexion->query($query);
    mysqli_close($conexion);
    format($result);
}
function format($result){
    $posts = array();
    if(mysqli_num_rows($result)) {
        while($post = mysqli_fetch_assoc($result)) {
            $posts[] = array('post'=>$post);
        }
    }
    
    if($format == 'json') {
        header('Content-type: application/json');
        echo json_encode(array('posts'=>$posts));
    }
    else {
        header('Content-type: text/xml');
        echo '<posts>';
        foreach($posts as $index => $post) {
            if(is_array($post)) {
                foreach($post as $key => $value) {
                    echo '<',$key,'>';
                    if(is_array($value)) {
                        foreach($value as $tag => $val) {
                            echo '<',$tag,'>',htmlentities($val),'</',$tag,'>';
                        }
                    }
                    echo '</',$key,'>';
                }
            }
        }
        echo '</posts>';
    }
}
?>