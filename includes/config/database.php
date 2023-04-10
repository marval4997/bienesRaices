<?php

function conectarDB() : mysqli {
    $db= mysqli_connect('localhost', 'root', '', 'BD_bienesRices');

    if(!$db){
        echo "Error en la conexion";
        exit;
    }

    return $db;
}