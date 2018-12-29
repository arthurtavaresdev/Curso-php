<?php

    $conn = new mysqli('127.0.0.1','root','','dbphp7');
    if($conn -> connect_error){
        echo 'Eror: ' . $conn -> connect_error;
        exit;
    }
    // $stmt = $conn -> prepare("INSERT INTO tb_usuarios (deslogin,dessenha) VALUES (?,?);");
    // $stmt -> bind_param("ss",$login,$pass);

    // $login = "User2";
    // $pass =  "1234567";

    // $stmt -> execute();

    $result = $conn -> query("SELECT * FROM tb_usuarios ORDER BY deslogin");

    $data = array();

    while($row = $result -> fetch_array(MYSQLI_ASSOC)){
        array_push($data,$row);
    }

    echo json_encode($data);


?>