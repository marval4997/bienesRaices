<?php
require '../../includes/app.php';

use App\Vendedor;


estadoAuntenticado();
$vendedores= new Vendedor();
$errores= Vendedor::getErrores();

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $vendedores=new Vendedor($_POST['vendedor']);

    $errores=$vendedores->validar();

    if(empty($errores)){
        $resultado=$vendedores->guardar();
    }
}



incluirTemplete('header');
?>

<main class="contenedor seccion">
    <h1>Crear Vendedor(a)</h1>
    <a href="/admin/index.php" class="boton boton-verde">Volver</a>

    <?php foreach ($errores as $error) : ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>

    <form class="formulario" action="/admin/vendedores/crear.php" method="POST" enctype="multipart/form-data">

        <?php include '../../includes/templates/formulario_vendedores.php'; ?>

        <input class="boton-verde" type="submit" value="Enviar">

    </form>
</main>


<?php
incluirTemplete('footer');
?>