<?php
require '../../includes/funciones.php';

$auth =estadoAuntenticado();

if(!$auth){
    header('Location: /');
}
$id = $_GET['id'] ;
$id = filter_var($id, FILTER_VALIDATE_INT);

if (!$id) {
    header('Location: /admin');
}

require '../../includes/config/database.php';
$conexion = conectarDB();

$query="DELETE propiedaes WHERE id=$id";
$resultado=

incluirTemplete('header');
?>

<main class="contenedor seccion">
    <h1>Borrar</h1>

</main>

<?php
incluirTemplete('footer');
?>