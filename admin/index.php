<?php
require '../includes/funciones.php';

$auth =estadoAuntenticado();

if(!$auth){
    header('Location: /');
}

//importar la conexion
require '../includes/config/database.php';
$conexion= conectarDB();
//escribir la consulta
$query = "SELECT * FROM propiedades";
//consultar la bd
$resultadoPropiedades=mysqli_query($conexion,$query);

//Muestra mensaje condicional
$mensaje = $_GET['mensaje'] ?? null;

//Eliminar archivo
if($_SERVER['REQUEST_METHOD']=="POST"){
    $id=$_POST['id'];
    $id=filter_var($id, FILTER_VALIDATE_INT);

    if($id){

        $query="SELECT imagen FROM propiedades WHERE id=$id ";
        $resultado=mysqli_query($conexion,$query);
        $imagen=mysqli_fetch_assoc($resultado);

        echo $imagen['imagen'];
        $carpetaImagenes = '../imagenes/';
        unlink($carpetaImagenes.$imagen['imagen']);

        //elimina propiedad
        $query="DELETE FROM propiedades WHERE id=$id";
        $resultado=mysqli_query($conexion,$query);

        if($resultado){
            header('Location: /admin?mensaje=3');
        }
    }

}

//Incluye un templete

incluirTemplete('header')

?>

<main class="contenedor seccion">
    <h1>Administrador de bienes raíces</h1>
    <?php if ($mensaje ==1) : ?>
        <p class="alerta exito"> <?php echo "Registro Exitoso"; ?> </p>
    <?php endif ?>

    <?php if ($mensaje ==2) : ?>
        <p class="alerta exito"> <?php echo "Actualización Exitosa"; ?> </p>
    <?php endif ?>

    <?php if ($mensaje ==3) : ?>
        <p class="alerta exito"> <?php echo "Registro eliminado"; ?> </p>
    <?php endif ?>


    <a href="/admin/propiedades/crear.php" class="boton boton-verde">Nueva Propiedad</a>


    <table class="propiedades">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titulo</th>
                <th>Imagen</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>
            <?php while($row= mysqli_fetch_assoc($resultadoPropiedades)): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['titulo']; ?></td>
                <td>
                    <img class="imagen-tabla" src="/imagenes/<?php echo $row['imagen']; ?>" alt="imagen propiedad">
                </td>
                <td><?php echo $row['precio']; ?></td>
                <td>
                    <form class="w-100"  method="POST" >
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                        <input class="boton-rojo-block" type="submit" value="Eliminar">
                    </form>
                    <a href="propiedades/actualizar.php?id=<?php echo $row['id']; ?>" class="boton-amarillo-block">Actualizar</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>




</main>

<?php
//cerrar la conexion
mysqli_close($conexion);
incluirTemplete('footer');
?>