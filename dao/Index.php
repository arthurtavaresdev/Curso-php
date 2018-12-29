<?php

    require_once("config.php");

    // $sql = new Sql();
    // $usuarios = $sql -> select('SELECT * FROM tb_usuarios');
    // echo json_encode($usuarios);

    // $root = new User();
    // $root -> loadById(3);


    // echo $root;

    // $lista =   =User::getList();
    // echo json_encode($lista);


    $usuario = new User();
    // $usuario -> login('arthurabreu00',"hoje2010");
    // $usuario -> insert();

    $usuario -> loadById(4);
    $usuario -> deleteUser();

    echo $usuario;
?>