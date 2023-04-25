<?php

namespace Controllers;

use MVC\Router;
use Model\Vendedor;

class VendedorController
{
    public static function crear(Router $router)
    {
        $vendedores = new Vendedor();
        $errores = Vendedor::getErrores();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $vendedores = new Vendedor($_POST['vendedor']);

            $errores = $vendedores->validar();

            if (empty($errores)) {
                $vendedores->guardar();
            }
        }


        $router->render("vendedores/crear", [
            'vendedores' => $vendedores,
            'errores' => $errores
        ]);
    }

    public static function actualizar(Router $router)
    {
        $id = Redirecionar("/admin");
        $vendedores = Vendedor::find($id);
        $errores = Vendedor::getErrores();

        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            $args = $_POST['vendedor'];
            $vendedores->sincronizar($args);

            $errores = $vendedores->validar();
            if (empty($errores)) {
                $vendedores->guardar();
            }
        }

        $router->render("vendedores/crear", [
            'vendedores' => $vendedores,
            'errores' => $errores
        ]);
    }

    public static function eliminar()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $tipo = $_POST['tipo'];
            $id = filter_var($id, FILTER_VALIDATE_INT);

            if (validarTipoContenido($tipo)) {
                $propiedad = Vendedor::find($id);
                $propiedad->eliminar();
            }
        }
    }
}
