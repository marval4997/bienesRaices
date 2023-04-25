<?php
//importar conexion
require 'includes/config/database.php';
$conexion=conectarDB();

//Crear email
$email = "correo@correo.com";
$password= "123456";

$passwordHash =password_hash($password, PASSWORD_DEFAULT);

//var_dump($passwoRdHash);
//query para crear correo
$query = "INSERT INTO usuarios (email, password) VALUES('$email', '$passwordHash')";

$consulta=mysqli_query($conexion,$query);

if($consulta){
    echo "registro exitoso";
}else{
    echo "resgistro fallido";
}



