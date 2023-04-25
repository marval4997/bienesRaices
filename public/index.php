<?php
require_once(__DIR__.'/../includes/app.php');
if(!empty($_GET['url'])){
    $url='/'.$_GET['url'];
}else{
    $url="/";
}

use Controllers\LoginController;
use MVC\Router;
use Controllers\PropiedadController;
use Controllers\VendedorController;
use Controllers\PaginasController;

$router= new Router();
//inicio
$router->get('/', [PaginasController::class, 'inicio']);
$router->get('/nosotros', [PaginasController::class, 'nosotros']);
$router->get('/blog', [PaginasController::class, 'blog']);
$router->get('/anuncios', [PaginasController::class, 'anuncios']);
$router->get('/anuncio', [PaginasController::class, 'anuncio']);
$router->get('/contacto', [PaginasController::class, 'contacto']);
$router->post('/contacto', [PaginasController::class, 'contacto']);


//admin
$router->get('/admin', [PropiedadController::class, 'index']);
//propiedades
$router->get('/propiedades/crear',  [PropiedadController::class, 'crear']);
$router->post('/propiedades/crear',  [PropiedadController::class, 'crear']);
$router->get('/propiedades/actualizar',  [PropiedadController::class, 'actualizar']);
$router->post('/propiedades/actualizar',  [PropiedadController::class, 'actualizar']);
$router->post('/propiedades/eliminar',  [PropiedadController::class, 'eliminar']);
//vendedores
$router->get('/vendedores/crear',  [VendedorController::class, 'crear']);
$router->post('/vendedores/crear',  [VendedorController::class, 'crear']);
$router->get('/vendedores/actualizar',  [VendedorController::class, 'actualizar']);
$router->post('/vendedores/actualizar',  [VendedorController::class, 'actualizar']);
$router->post('/vendedores/eliminar',  [VendedorController::class, 'eliminar']);

//login
$router->get('/login',[LoginController::class,'login']);
$router->post('/login',[LoginController::class,'login']);
$router->get('/logout',[LoginController::class,'logout']);

$router->comprobarRutas($url);