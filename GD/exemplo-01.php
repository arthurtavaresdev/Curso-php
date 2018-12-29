<?php

    header('Content-Type: image/png; charset:utf-8');


    $image = imagecreate(256,256);  

    $black = imagecolorallocate($image, 0,0,0);
    $red = imagecolorallocate($image, 255,0,0);

    imagestring($image, 5, 60,120, utf8_decode("Olá mundo"),$red);
    imagepng($image);

    imagepng($image);
    imagedestroy($image);
?>