<?php

    require_once 'vendor/autoload.php';

    $app = new \Slim\Slim();

    $app -> get("/", function() {
        echo json_encode(array(
            "Date" => date("Y-m-d H:i:s")
        ));
    });

    $app -> get("/hello/:name", function($name) {
        echo "Hello, " .$name;
    });

    $app -> run();



?>