<?php
function concetarDB(): mysqli {
    $db = mysqli_connect('localhost', 'root', '', 'bienesraices_crud');
    if(!$db){
        echo "Error de conexión a la base de datos";
        exit;
    }

    return $db;
}
?>