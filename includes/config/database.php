<?php

function conectarDB(){
    $db = mysqli_connect('localhost', 'root', 'jesus895lpk.', 'bienesraices_crud');
    $db->set_charset("utf8"); // Para que se muestren correctamente los acentos y las ñ

    if(!$db){
        echo "Error, no se pudo conectar";
        exit;
    }

    return $db;
}