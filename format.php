<?php

    function format($result){
        $posts = array();
        if(mysqli_num_rows($result)) {
            while($post = mysqli_fetch_assoc($result)) {
                $posts[] = array('post'=>$post);
            }
        }
        header('Content-type: application/json');
        return json_encode(array('posts'=>$posts));
    }

?>