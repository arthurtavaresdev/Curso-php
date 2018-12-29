<?php

    $data = array(
        'empresa' => 'Gdax'
    );

    setcookie("NOME_DO_COOKIE", json_encode($data), time() + 3600);
    echo 'Ok';


?>