<?php
define('TEMPLATES_URL', __DIR__ . '/templates');
define('FUNCIONES_URL', __DIR__ . 'funciones.php');
define('CARPETA_IMAGENES', __DIR__ . '/../imagenes/');

function incluirTemplete(string $nombre, bool $inicio = false)
{
    include TEMPLATES_URL . "/$nombre.php";
}

function estadoAuntenticado()
{
    session_start();

    if (!$_SESSION['login']) {
        header('Location: /');
    }
}

function debug($variable)
{
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    exit;
}

function s($html): string
{
    $s = htmlspecialchars($html);
    return $s;
}

function validarTipoContenido($tipo)
{
    $tipos = ['vendedor', 'propiedad'];
    return in_array($tipo, $tipos);
}

function notificaciones($codigo)
{
    $mensaje = "";
    switch ($codigo) {
        case '1':
            $mensaje = "Registro Exitoso";
            break;

        case '2':
            $mensaje = "Actualización Exitosa";
            break;

        case '3':
            $mensaje = "Registro eliminado";
            break;

        default:
            $mensaje = false;
            break;
    }

    return $mensaje;
}
