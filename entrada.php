<?php
require './includes/funciones.php';
incluirTemplete('header');
?>
<main class="contenedor seccion contenido-centrado">
    <h1>Guía para la decoración de tu hogar</h1>

    <picture>
        <source srcset="build/img/destacada2.webp" type="image/webp">
        <source srcset="build/img/destacada2.jpg" type="image/jpeg">
        <img loading="lazy" src="build/img/destacada2.jpg" alt="imagen de la propiedad">
    </picture>

    <p class="infromacion-meta">Escrito el: <span>20/10/2021</span> por: <span>Admin</span></p>

    <div class="resumen-propiedad">

        <p>
            Nulla reprehenderit voluptate mollit pariatur ullamco velit fugiat id aute proident irure minim officia.
            Ullamco culpa tempor in eiusmod cupidatat sint nostrud cillum non ut sint eiusmod quis quis. Duis qui id
            anim magna aute incididunt veniam ipsum labore reprehenderit reprehenderit dolor. Mollit culpa veniam
            dolore eiusmod qui laboris excepteur reprehenderit labore est amet fugiat. Veniam elit fugiat dolor
            occaecat dolore irure adipisicing exercitation consectetur aliquip elit ex.
        </p>

        <p>
            Nisi eu ullamco et reprehenderit proident qui commodo voluptate exercitation deserunt adipisicing elit
            minim. Et amet qui est minim anim est magna esse ex deserunt deserunt tempor non sint. Ullamco ea
            laborum occaecat nulla est aute ullamco amet reprehenderit consectetur. Officia deserunt nostrud minim
            commodo enim. Magna cillum pariatur sit cillum velit ad adipisicing officia occaecat. Ut proident sit
            eiusmod est labore officia aute magna eu incididunt do ex.

            Veniam nostrud sint minim ullamco nisi dolore elit cupidatat qui elit exercitation dolor enim. Tempor
            elit ex proident ad exercitation nulla in. Velit cupidatat sunt aute consectetur sint laboris tempor
            duis.
        </p>
    </div>
</main>

<?php
incluirTemplete('footer');
?>