<?php

namespace MVC;

class Router
{
    public $rutasGET = [];
    public $rutasPOST = [];

    public function get($url, $fn)
    {
        $this->rutasGET[$url] = $fn;
    }

    public function post($url, $fn)
    {
        $this->rutasPOST[$url] = $fn;
    }


    public function comprobarRutas($urlActual)
    {
        session_start();
        $rutas_protegidas = [
            '/admin',
            '/propiedades/crear',
            '/propiedades/crear',
            '/propiedades/actualizar',
            '/propiedades/actualizar',
            '/propiedades/eliminar',
            '/vendedores/crear',
            '/vendedores/crear',
            '/vendedores/actualizar',
            '/vendedores/actualizar',
            '/vendedores/eliminar'
        ];
        $method = $_SERVER['REQUEST_METHOD'];
        $auth = $_SESSION['login'] ?? null;

        if ($method == 'GET') {
            $fn = $this->rutasGET[$urlActual] ?? null;
        } else {
            $fn = $this->rutasPOST[$urlActual] ?? null;
        }

        if (in_array($urlActual, $rutas_protegidas) && !$auth) {
            header('Location: /');
        }

        if ($fn) {
            call_user_func($fn, $this);
        } else {
            echo 'pagina no encontrada';
        }
    }

    public function render($view, $datos = [])
    {
        foreach ($datos as $key => $value) {
            $$key = $value;
        }
        ob_start();
        include __DIR__ . "/views/$view.php";

        $contenido = ob_get_clean();

        include __DIR__ . "/views/layout.php";
    }
}
