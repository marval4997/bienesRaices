<?php
require __DIR__ . '/../config/database.php';

$conexion = conectarDB();
$query = "";
if ($_SERVER['SCRIPT_NAME'] == "/index.php") {
    $query = "SELECT * FROM propiedades LIMIT 3";
} else {
    $query = "SELECT * FROM propiedades";
}



$anuncios = mysqli_query($conexion, $query);

//  echo "<pre>";
//  echo var_dump($_SERVER);
//  echo "<pre>";

?>
<div class="contenedor-anuncios">
    <?php while ($anuncio = mysqli_fetch_assoc($anuncios)) : ?>
        <div class="anuncio">

            <img loading="lazy" src="/imagenes/<?php echo $anuncio['imagen']; ?>" alt="auncio">

            <div class="contenido-anuncio">
                <h3><?php echo $anuncio['titulo']; ?></h3>
                <p>Casa de lujo en el lago con excelente vista, acabados de lujo excelente precio</p>
                <p class="precio"><?php echo $anuncio['precio']; ?></p>

                <ul class="iconos-caracteristicas">
                    <li>
                        <img class="icono" loading="lazy" src="build//img/icono_wc.svg" alt="icono wc">
                        <p><?php echo $anuncio['wc']; ?></p>
                    </li>

                    <li>
                        <img class="icono" loading="lazy" src="build//img/icono_estacionamiento.svg" alt="icono estacionamiento">
                        <p><?php echo $anuncio['estacionamiento']; ?></p>
                    </li>

                    <li>
                        <img class="icono" loading="lazy" src="build//img/icono_dormitorio.svg" alt="icono dormitorio">
                        <p><?php echo $anuncio['habitaciones']; ?></p>
                    </li>
                </ul>

                <a href="anuncio.php?id=<?php echo $anuncio['id']; ?>" class="boton boton-amarillo-block">Ver Propiedad</a>
            </div><!--contenido-anuncio-->
        </div><!--.anuncio//////////////////////////////////////777-->
    <?php endwhile; ?>
</div><!--.contenedor-anuncios-->