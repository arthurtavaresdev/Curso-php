<?php

    $link = 'https://www.google.com/logos/doodles/2018/holidays-2018-southern-hemisphere-day-1-5683333013962752-law.gif';

    $content = file_get_contents($link);

    $parse = parse_url($link);

    $basename = basename($parse['path']);

    $file = fopen($basename,"w+");

    fwrite($file,$content);
    
    fclose($file);

?>

<img src="<?=$basename?>" />;