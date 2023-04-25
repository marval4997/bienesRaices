<?php
require '../../includes/app.php';

use App\Propiedad;
use App\Vendedor;


estadoAuntenticado();




$errores = Propiedad::getErrores();


//areglo con mensajes de errores
$propiedad = new Propiedad();

$vendedores= Vendedor::all();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $propiedad = new Propiedad($_POST['propiedad']);

    //Subida de archivos;
    $nombreImagen = md5(uniqid(rand() . true)) . ".jpg";



    if ($_FILES['propiedad']['error']['imagen'] == 0) {
        $propiedad->setImage($nombreImagen);
    }





    // $errores = $propiedad->validar();
    //revisar que el arreglo de errores esta vacio
    $errores = $propiedad->validar();
  

    if (empty($errores)) {

        if (!is_dir(CARPETA_IMAGENES)) {
            mkdir(CARPETA_IMAGENES, 0777);
        }


        //generar nombre de imagen

        //subir imagen
        move_uploaded_file($_FILES['propiedad']['tmp_name']['imagen'], CARPETA_IMAGENES . $nombreImagen);

        //realiza un resize a la imagen con intervention


        //guarda la imagen en el servidor




        $resultado = $propiedad->guardar();
    }
}




incluirTemplete('header');
?>

<main class="contenedor seccion">
    <h1>Crear</h1>
    <a href="/admin/index.php" class="boton boton-verde">Volver</a>

    <?php foreach ($errores as $error) : ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>

    <form class="formulario" action="/admin/propiedades/crear.php" method="POST" enctype="multipart/form-data">

        <?php include '../../includes/templates/formulario_propiedades.php'; ?>

        <input class="boton-verde" type="submit" value="Enviar">

    </form>
</main>

<?php
incluirTemplete('footer');
?>