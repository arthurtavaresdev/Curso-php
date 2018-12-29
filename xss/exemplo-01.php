<form method="post">
    <input type="search" name="busca" id="busca">
    <button type="submit">Enviar</button>

</form>

<?php
    if(isset($_POST['busca'])){
        echo $_POST['busca'];
    }
?>