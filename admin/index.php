<?php
require '../includes/app.php';
use App\Propiedad;
use App\Vendedor;
estadoAuntenticado();

//importar la conexion

//Consultar para tener vendedores
$propiedades= Propiedad::all();
$vendedores= Vendedor::all();

//debug($propiedades);
//debug($propiedades);

//Muestra mensaje condicional
$mensaje = $_GET['mensaje'] ?? null;

//Eliminar archivo
if($_SERVER['REQUEST_METHOD']=="POST"){
    $id=$_POST['id'];
    $id=filter_var($id, FILTER_VALIDATE_INT);
    $tipo=$_POST['tipo'];
    
    if(validarTipoContenido($tipo)){
        if($tipo == 'vendedor'){
            $vendedores=Vendedor::find($id);
            $vendedores->eliminar();
        }elseif($tipo == 'propiedad'){
            $propiedad=Propiedad::find($id);
            $propiedad->eliminar();
        }
    }

}

//Incluye un templete

incluirTemplete('header')

?>

<main class="contenedor seccion">
    <h1>Administrador de bienes raíces</h1>
    <?php if (!empty($mensaje)) : ?>
        <p class="alerta exito"> <?php echo s(notificaciones($mensaje)); ?> </p>
    <?php endif ?>

    


    <a href="/admin/propiedades/crear.php" class="boton boton-verde">Nueva Propiedad</a>
    <a href="/admin/vendedores/crear.php" class="boton boton-amarillo">Nuev@ vendedor</a>

    <h2>Propiedades</h2>

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
            <?php foreach($propiedades as $propiedad) : ?>
            <tr>
                <td><?php echo $propiedad->id; ?></td>
                <td><?php echo $propiedad->titulo; ?></td>
                <td>
                    <img class="imagen-tabla" src="/imagenes/<?php echo $propiedad->imagen; ?>" alt="imagen propiedad">
                </td>
                <td><?php echo $propiedad->precio; ?></td>
                <td>
                    <form class="w-100"  method="POST" >
                    <input type="hidden" name="tipo" value="propiedad">
                        <input type="hidden" name="id" value="<?php echo $propiedad->id; ?>">
                        <input class="boton-rojo-block" type="submit" value="Eliminar">
                    </form>
                    <a href="propiedades/actualizar.php?id=<?php echo$propiedad->id; ?>" class="boton-amarillo-block">Actualizar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h2>vendedores</h2>

    <table class="propiedades">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Teléfono</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach($vendedores as $vendedor) : ?>
            <tr>
                <td><?php echo $vendedor->id; ?></td>
                <td><?php echo $vendedor->nombre. " ".$vendedor->apellido; ?></td>
                <td><?php echo $vendedor->telefono; ?></td>
                <td>
                    <form class="w-100"  method="POST" >
                    <input type="hidden" name="tipo" value="vendedor">
                        <input type="hidden" name="id" value="<?php echo $vendedor->id; ?>">
                        <input class="boton-rojo-block" type="submit" value="Eliminar">
                    </form>
                    <a href="vendedores/actualizar.php?id=<?php echo$vendedor->id; ?>" class="boton-amarillo-block">Actualizar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>




</main>

<?php


incluirTemplete('footer');
?>