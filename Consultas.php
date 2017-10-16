<?php

//Link Callback
//http://localhost/WebService/Consultas.php?format=xml
//http://localhost/WebService/Consultas.php?format=json

require("Conexiondb.php");
$format = strtolower($_GET['format']) == 'json' ? 'json' : 'xml'; //Valor por defecto XML

$query = "SELECT * FROM datos";
mysqli_query($conexion, $query) or die(mysqli_error());
$result = $conexion->query($query);
mysqli_close($conexion);



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
?>