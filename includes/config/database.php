<?php

function conectarDB() : mysqli {
    $db= new mysqli('localhost', 'root', '', 'BD_bienesRices');

    if(!$db){
        echo "Error en la conexion";
        exit;
    }

    return $db;
}