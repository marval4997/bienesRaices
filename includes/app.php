<?php
require 'funciones.php';
require 'config/database.php';
require __DIR__. '/../vendor/autoload.php';

//Conectanos a la base de datos
$db= conectarDB();
use App\ActiveRecord;
//use Intervention\Image\ImageManager as Image;

ActiveRecord::setDB($db);
//$imagen =Image::make($_FILES['imagen']['tmp_name']);




