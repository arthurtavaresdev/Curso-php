<?php
    
    define('SECRET_IV',pack('a16','senha'));
    define('SECRET',pack('a16','senha'));

    $data = [
        'nome' => 'Arthur'
    ];

    $openssl = openssl_encrypt(
        json_encode($data),
        'AES-128-CBC',
        SECRET,
        0,
        SECRET_IV
    );

    $final =  base64_encode($openssl);

    echo $final;

    $string = openssl_decrypt(
        base64_decode($final),
        'AES-128-CBC',
        SECRET,
        0,
        SECRET_IV
    );

    echo "<br />".$string;

    

?>