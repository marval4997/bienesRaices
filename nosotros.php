<?php
require './includes/app.php';
incluirTemplete('header');
?>

<main class="contenedor seccion">
    <h1>Conoce sobre Nosotros</h1>

    <div class="contenido-nosotros">
        <div class="imagen">
            <picture>
                <source srcset="build/img/nosotros.webp" type="image/webp">
                <source srcset="build/img/nosotros.jpg" type="image/jpeg">
                <img loading="lazy" src="build/img/nosotros.jpg" alt="imagen nosotros">
            </picture>
        </div>

        <div class="texto-nosotros">
            <blockquote>25 años de experiencia</blockquote>
            <p>
                Irure cillum est nulla magna sint in anim sit. Eiusmod exercitation sit pariatur ullamco in velit
                officia elit nulla et aute. Culpa adipisicing et quis aliqua elit cupidatat incididunt. Sint magna
                duis consectetur irure minim proident sint aliquip veniam nostrud aute velit nulla.
            </p>

            <p>
                Eu reprehenderit nisi laborum culpa nulla aliqua irure laborum nisi ut ullamco aliqua Lorem sit.
                Magna quis duis ad commodo occaecat excepteur incididunt enim exercitation culpa. Sint voluptate
                irure mollit exercitation tempor ex aute esse mollit in velit esse ut. Reprehenderit elit et amet
                ullamco. Adipisicing dolore ex cupidatat aute do. Ex ut magna esse pariatur consequat occaecat
                labore enim. Sunt minim occaecat sit ut nisi aliqua quis in amet eu et.

            </p>
        </div>
    </div>
</main>

<section class="contenedor seccion">
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
</section>

<?php
incluirTemplete('footer');
?>