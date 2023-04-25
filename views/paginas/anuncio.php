


<main class="contenedor seccion contenido-centrado">
    <h1><?php echo $anuncio->titulo; ?></h1>

    <picture>
        <source srcset="imagenes/<?php echo $anuncio->imagen; ?>" type="image/webp">
        <source srcset="build/img/destacada.jpg" type="image/jpeg">
        <img loading="lazy" src="build/img/destacada.jpg" alt="imagen de la propiedad">
    </picture>

    <div class="resumen-propiedad">
        <p class="precio"><?php echo $anuncio->precio; ?></p>
        <ul class="iconos-caracteristicas">
            <li>
                <img class="icono" loading="lazy" src="build//img/icono_wc.svg" alt="icono wc">
                <p><?php echo $anuncio->wc; ?></p>
            </li>

            <li>
                <img class="icono" loading="lazy" src="build//img/icono_estacionamiento.svg" alt="icono estacionamiento">
                <p><?php echo $anuncio->estacionamiento; ?></p>
            </li>

            <li>
                <img class="icono" loading="lazy" src="build//img/icono_dormitorio.svg" alt="icono dormitorio">
                <p><?php echo $anuncio->habitaciones; ?></p>
            </li>
        </ul>

        <p>
        <?php echo $anuncio->descripcion; ?>
        </p>
    </div>
</main>
