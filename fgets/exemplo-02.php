<?php

    $filename = 'logo.png';
    $base64 = base64_encode(file_get_contents($filename));

    $fileinfo = new finfo(FILEINFO_MIME_TYPE);

    $mimeType = $fileinfo -> file($filename);

    $base64encode = "data:".$mimeType.";base64,".$base64;

?>

<a href="<?=$base64encode?>" target="_blank"> Link para imagens </a>

<img src="<?=$base64encode?>" alt="logo" />