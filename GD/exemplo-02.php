<?php

    date_default_timezone_set("America/Sao_Paulo");
    setlocale(LC_ALL,"pt_BR.utf-8","pt_BR","portuguese");

    header('Content-Type: image/jpeg; charset:utf-8');



    $image = imagecreatefromjpeg("certificado.jpg");

    $titleColor = imagecolorallocate($image,0,0,0);
    $gray = imagecolorallocate($image,100,100,100);
    
    imagestring($image,5,450,150, "CERTIFICADO",$titleColor);
    imagestring($image,5,440,350, "Divanei Aparecido",$titleColor);


    imagestring($image,5,440,370, utf8_decode("Concluído em "). date('m/y'),$titleColor);




    imagejpeg($image,"certificado-".date("Y-m-d").".jpg");
    imagedestroy($image);

?>