<?php

 if(!is_dir("images")) mkdir("images");

 foreach(scandir("images") as $item){
     if(!in_array($item,array(".",'..'))){

        echo "$item foi removido com sucesso. <br>";
        unlink("./images/$item");
     }


 }

 rmdir('images');

?>