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
//Consulta para obtener datos
$query = "SELECT * FROM propiedades WHERE id=$id";
$resultadoDatos = mysqli_query($conexion, $query);
$propiedad = mysqli_fetch_assoc($resultadoDatos);

//Consultar para tener vendedores
$consulta = "SELECT * FROM vendedores";
$arrVendedores = mysqli_query($conexion, $consulta);
//areglo con mensajes de errores
$errores = [];

$titulo = $propiedad['titulo'];
$precio = $propiedad['precio'];
$imagenPropiedad = $propiedad['imagen'];
$descripcion = $propiedad['descripcion'];
$habitaciones = $propiedad['habitaciones'];
$wc = $propiedad['wc'];
$estacionamiento = $propiedad['estacionamiento'];
$vendedorId = $propiedad['vendedor_id'];
$imagen="";



if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    echo "<pre>";
    var_dump($_POST);
    echo "</pre>";

    echo "<pre>";
    var_dump($_FILES);
    echo "</pre>";

    $titulo = mysqli_real_escape_string($conexion, $_POST['titulo']);
    $precio = mysqli_real_escape_string($conexion, $_POST['precio']);
    // $imagen = mysqli_real_escape_string( $conexion, $_POST['imagen']);
    $descripcion = mysqli_real_escape_string($conexion, $_POST['descripcion']);
    $habitaciones = mysqli_real_escape_string($conexion, $_POST['habitaciones']);
    $wc = mysqli_real_escape_string($conexion, $_POST['wc']);
    $estacionamiento = mysqli_real_escape_string($conexion, $_POST['estacionamiento']);
    $vendedorId = mysqli_real_escape_string($conexion, $_POST['vendedor']);


    $imagen = $_FILES['imagen'];

    if (!$titulo) {
        $errores[] = "Debe de añadir un titulo";
    }
    if (!$precio) {
        $errores[] = "El precio es obligatorio";
    }
    if (strlen($descripcion) < 50) {
        $errores[] = "La descripción es obligatoria y debe tener al menos 50 caracteres";
    }
    if (!$habitaciones) {
        $errores[] = "El numero de habitaciones es obligatorio";
    }
    if (!$wc) {
        $errores[] = "El numero de baños es obligatorio";
    }
    if (!$estacionamiento) {
        $errores[] = "El numero de lugares de estacionamiento es obligatorio";
    }
    if (!$vendedorId) {
        $errores[] = "Elige un vendedor";
    }


    //tamaño
    $medida = 100000 * 100;
    //if ($imagen['size'] > $medida) {
      //  $errores[] = "La imagen es muy pesasa";
   // }
    //revisar que el arreglo de errores esta vacio

    if (empty($errores)) {

        $carpetaImagenes = '../../imagenes/';
        if (!is_dir($carpetaImagenes)) {
            mkdir($carpetaImagenes, 0777);
        }

        $nombreImagen="";

        if($imagen['name']){
            unlink($carpetaImagenes.$propiedad['imagen']);
            $nombreImagen = md5(uniqid(rand() . true)) . ".jpg";
            //subir imagen
            move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImagen);
        }else{
            $nombreImagen=$propiedad['imagen'];
        }
        //Subida de archivos;
   
        //generar nombre de imagen
    

        $query = "UPDATE propiedades SET
        titulo='$titulo',
        precio=$precio,
        imagen='$nombreImagen',
        descripcion='$descripcion', 
        habitaciones=$habitaciones,
        wc=$wc, 
        estacionamiento=$estacionamiento, 
        vendedor_id=$vendedorId
        WHERE id=$id";

        $resultado = mysqli_query($conexion, $query);

        if ($resultado) {
            $mensaje = 2;

            header("Location: /admin?mensaje=$mensaje");
        }
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
        <fieldset>
            <legend>Inofrmacion General</legend>

            <label for="titulo">Titulo</label>
            <input type="text" name="titulo" id="titulo" placeholder="Titulo Propiedad" value="<?php echo $titulo; ?>">

            <label for="precio">Precio</label>
            <input type="number" name="precio" id="precio" placeholder="Precio Propiedad" value="<?php echo $precio; ?>">

            <label for="imagen">Imagen</label>
            <input type="file" name="imagen" id="imagen" accept="image/jpeg, image/png">
            <img class="imagen-propiedad" src="/imagenes/<?php echo $imagenPropiedad; ?>" alt="">

            <label for="descripcion">Descripción</label>
            <textarea name="descripcion" id="descripcion">
                <?php echo $descripcion; ?>
            </textarea>

        </fieldset>

        <fieldset>
            <legend>Información Propiedad</legend>

            <label for="habitaciones">Habitaciones</label>
            <input type="number" name="habitaciones" id="habitaciones" placeholder="Ej: 3" min="1" value="<?php echo $habitaciones; ?>">

            <label for="wc">Baños</label>
            <input type="number" name="wc" id="wc" placeholder="Ej: 3" min="1" value="<?php echo $wc; ?>">

            <label for="estacionamiento">Estacionamiento</label>
            <input type="number" name="estacionamiento" id="estacionamiento" placeholder="Ej: 3" min="1" value="<?php echo $estacionamiento; ?>">

        </fieldset>

        <fieldset>
            <legend>Vendedor</legend>
            <select name="vendedor" id="">
                <option value="" selected disabled>--Selecciona--</option>
                <?php while ($row = mysqli_fetch_assoc($arrVendedores)) : ?>
                    <option <?php echo $vendedorId === $row['id'] ? 'selected' : ''; ?> value="<?php echo $row['id']; ?>">
                        <?php echo $row['nombre'] . " " . $row['apellido']; ?>
                    </option>
                <?php endwhile; ?>
            </select>
        </fieldset>

        <input class="boton-verde" type="submit" value="Actualizar">

    </form>
</main>

<?php
incluirTemplete('footer');
?>