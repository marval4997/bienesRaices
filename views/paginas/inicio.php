<main class="contenedor seccion">
    <h1>Mas sobre nosotros</h1>

    <div class="iconos-nosotros">
        <div class="icono">
            <img src="build/img/icono1.svg" alt="icono seguridad" loading="lazy">
            <h3>Seguridad</h3>
            <p>
                Enim amet cillum duis ut anim officia ut enim non consectetur ad. Aliquip non culpa quis do eiusmod
                consequat eiusmod eiusmod officia. Reprehenderit tempor do amet laborum mollit in eiusmod.
            </p>
        </div><!--.icono-->

        <div class="icono">
            <img src="build/img/icono2.svg" alt="icono precio" loading="lazy">
            <h3>Precio</h3>
            <p>
                Enim amet cillum duis ut anim officia ut enim non consectetur ad. Aliquip non culpa quis do eiusmod
                consequat eiusmod eiusmod officia. Reprehenderit tempor do amet laborum mollit in eiusmod.
            </p>
        </div><!--.icono-->

        <div class="icono">
            <img src="build/img/icono3.svg" alt="icono tiempo" loading="lazy">
            <h3>Tiempo</h3>
            <p>
                Enim amet cillum duis ut anim officia ut enim non consectetur ad. Aliquip non culpa quis do eiusmod
                consequat eiusmod eiusmod officia. Reprehenderit tempor do amet laborum mollit in eiusmod.
            </p>
        </div><!--.icono-->

    </div>
</main>

<section class="seccion contenedor">
    <h2>Casas y Depas en Venta</h2>

    <?php 
    include 'templete_anuncios.php';
    ?>

    <div class="alinear-derecha">
        <a class=" boton-verde" href="anuncios.php">ver todas</a>
    </div>
</section>

<section class="imagen-contacto">
    <h2>Encuentra la casa de tu sueño</h2>
    <p>llenar el formulario de contacto y un asesor se pondrá en contacto contigo a la brevedad</p>
    <a class="boton-amarillo" href="contacto.html">Contactados</a>
</section>

<div class="contenedor seccion seccion-inferior">
    <section class="block">
        <h3>Nuestro blog</h3>
        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/blog1.webp" type="image/webp">
                    <source srcset="build/img/blog1.jpg" type="image/jpeg">
                    <img loading="lazy" src="build/img/blog1.jpg" alt="texto entrada blog">
                </picture>
            </div>

            <div class="texto-entrada">
                <a href="entrada.php">
                    <h4>Terraza en el techo de tu casa</h4>
                    <p class="infromacion-meta">Escrito el: <span>20/10/2021</span> por: <span>Admin</span></p>

                    <p>
                        Consejos para construir la terraza en el techo de tu casa con los mejores materiales y
                        ahorrando dinero
                    </p>
                </a>
            </div>
        </article>

        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/blog2.webp" type="image/webp">
                    <source srcset="build/img/blog2.jpg" type="image/jpeg">
                    <img loading="lazy" src="build/img/blog2.jpg" alt="texto entrada blog">
                </picture>
            </div>

            <div class="texto-entrada">
                <a href="entrada.php">
                    <h4>Guía para la decoración de tu hogar</h4>
                    <p class="infromacion-meta">Escrito el: <span>20/10/2021</span> por: <span>Admin</span></p>

                    <p>
                        Maximiza el espacio en tu hogar con esta guía, aprende a combinar muebles y colores para
                        darle espacio
                    </p>
                </a>
            </div>
        </article>
    </section>

    <section class="testimoniales">
        <h3>testimoniales</h3>

        <div class="testimonial">
            <blockquote>
                El personal se comporto de una excelente forma, muy buena atención y la casa que me ofrecieron
                cumple con todas mis expectativas
            </blockquote>
            <p>-Margarito Valdez</p>
        </div>
    </section>
</div>