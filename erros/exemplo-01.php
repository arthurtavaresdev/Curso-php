<?php

    function erro_handler($code, $message,$file,$line){
        echo json_encode(array(
            "code" => $code,
            "message" => $message,
            "line" => $line,
            "file" => $file
        ));
    }

    set_error_handler("erro_handler");

    $total = 100/0;

?>