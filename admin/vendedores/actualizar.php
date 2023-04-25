<?php

use App\Vendedor;

require '../../includes/app.php';



estadoAuntenticado();
$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT);

if (!$id) {
    header('Location: /admin');
}

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

incluirTemplete('header');
?>

<main class="contenedor seccion">
    <h1>Actualizar Vendedor(a)</h1>
    <a href="/admin/index.php" class="boton boton-verde">Volver</a>

    <?php foreach ($errores as $error) : ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>

    <form class="formulario" method="POST" enctype="multipart/form-data">

        <?php include '../../includes/templates/formulario_vendedores.php'; ?>

        <input class="boton-verde" type="submit" value="Enviar">

    </form>
</main>


<?php
incluirTemplete('footer');
?>