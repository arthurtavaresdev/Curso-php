<form method="post" enctype="multipart/form-data">

    <input type="file" name="fileUpload">

    <button type="submit"> Enviar </button>

</form>

<?php

    if($_SERVER["REQUEST_METHOD"] === 'POST'){

        $file = $_FILES["fileUpload"];

        if($file["error"]){
            throw new Exception("Error: ".$file["error"]);
        }

        $dirUploads = "uploads";

        if(!is_dir($dirUploads)){
            mkdir($dirUploads);
        }

        if(move_uploaded_file($file["tmp_name"],$dirUploads.'/'.$file['name'])){
            echo 'Upload concluido com sucesso !';
        }
        else{
            throw new Exception("Não foi possivel concluir o upload", 1);
        }

    }

?>