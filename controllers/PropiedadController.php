<?php

namespace Controllers;

use MVC\Router;
use Model\Propiedad;
use Model\Vendedor;

class PropiedadController
{
    public static function index(Router $router)
    {
        $propiedades = Propiedad::all();
        $vendedores = Vendedor::all();
        $resultado = null;

        $router->render("propiedades/admin", [
            'propiedades' => $propiedades,
            'resultado' => $resultado,
            'vendedores' => $vendedores
        ]);
    }

    public static function crear(Router $router)
    {
        $propiedad = new Propiedad;
        $vendedores = Vendedor::all();
        $errores = Propiedad::getErrores();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            //instancia con los datos del formulario
            $propiedad = new Propiedad($_POST['propiedad']);
            //Generando nombre único de imagen
            $nombreImagen = md5(uniqid(rand() . true)) . ".jpg";

            if ($_FILES['propiedad']['error']['imagen'] == 0) {
                $propiedad->setImage($nombreImagen);
            }
            //revisar que el arreglo de errores esta vació
            $errores = $propiedad->validar();
            if (empty($errores)) {

                if (!is_dir(CARPETA_IMAGENES)) {
                    mkdir(CARPETA_IMAGENES, 0777);
                }
                //subir imagen
                //debug(CARPETA_IMAGENES . $nombreImagen);
                move_uploaded_file($_FILES['propiedad']['tmp_name']['imagen'], CARPETA_IMAGENES . $nombreImagen);
                $resultado = $propiedad->guardar();
            }
        }

        $router->render("propiedades/crear", [
            'propiedad' => $propiedad,
            'vendedores' => $vendedores,
            'errores' => $errores
        ]);
    }

    public static function actualizar(Router $router)
    {
        //debug("actualizar");
        $id = Redirecionar("/admin");

        $propiedad = Propiedad::find($id);
        $vendedores = Vendedor::all();
        $errores = Propiedad::getErrores();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $args = $_POST['propiedad'];
            $propiedad->sincronizar($args);

            $errores = $propiedad->validar();

            if (empty($errores)) {
                //nombre único de imagen
                $nombreImagen = md5(uniqid(rand() . true)) . ".jpg";

                if ($_FILES['propiedad']['error']['imagen'] == 0) {
                    $propiedad->setImage($nombreImagen);
                    //mover archivo al servidor
                    move_uploaded_file($_FILES['propiedad']['tmp_name']['imagen'], CARPETA_IMAGENES . $nombreImagen);
                }
                //Guardar datos
                $propiedad->guardar();
            }
        }

        $router->render("propiedades/actualizar", [
            'propiedad' => $propiedad,
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
                $propiedad = Propiedad::find($id);
                $propiedad->eliminar();
            }
        }
    }
}
