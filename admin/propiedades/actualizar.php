<?php

use App\Propiedad;
use App\Vendedor;
require '../../includes/app.php';

estadoAuntenticado();


$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT);

if (!$id) {
    header('Location: /admin');
}

$vendedores= Vendedor::all();
//Consulta para obtener datos
$propiedad = Propiedad::find($id);
$errores = Propiedad::getErrores();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $args = $_POST['propiedad'];
    $propiedad->sincronizar($args);

    $errores = $propiedad->validar();

    if (empty($errores)) {
        $nombreImagen = md5(uniqid(rand() . true)) . ".jpg";



        if ($_FILES['propiedad']['error']['imagen'] == 0) {
            $propiedad->setImage($nombreImagen);
            move_uploaded_file($_FILES['propiedad']['tmp_name']['imagen'], CARPETA_IMAGENES . $nombreImagen);
        }
        //Subida de archivos;
        $propiedad->guardar();

    }
}




incluirTemplete('header');
?>

<main class="contenedor seccion">
    <h1>Actualizar Propiedad</h1>
    <a href="/admin/index.php" class="boton boton-verde">Volver</a>

    <?php foreach ($errores as $error) : ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>

    <form class="formulario" method="POST" enctype="multipart/form-data">

        <?php include '../../includes/templates/formulario_propiedades.php'; ?>

        <input class="boton-verde" type="submit" value="Actualizar">

    </form>
</main>

<?php
incluirTemplete('footer');
?>