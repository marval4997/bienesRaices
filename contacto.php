<?php
require './includes/funciones.php';
incluirTemplete('header');
?>

<main class="contenedor seccion">
    <h1>Contacto</h1>

    <picture>
        <source srcset="build/img/destacada3.webp" type="webp">
        <source srcset="build/img/destacada3.jpg" type="jpeg">
        <img loading="lazy" src="build/img/destacada3.jpg" alt="imagen de contacto">
    </picture>

    <h2>Llene el formulario de contacto</h2>

    <form class="formulario" action="">
        <fieldset>
            <legend>Información Personal</legend>

            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" placeholder="Tu nombre">

            <label for="email">E-mail</label>
            <input type="email" name="email" id="email" placeholder="TU email">


            <label for="telefono">Telefono</label>
            <input type="tel" name="telefono" id="telefono" placeholder="Tu telefono">

            <label for="mensaje">Mensaje</label>
            <textarea name="mensaje" id="mensaje" cols="30" rows="10"></textarea>
        </fieldset>

        <fieldset>
            <legend>Información</legend>

            <label for="opciones">Vende o Compra</label>
            <select id="opciones">
                <option value="" disabled selected>-- Selecciona --</option>
                <option value="compra">Compra</option>
                <option value="venta">Venta</option>
            </select>

            <label for="Presupuesto">Precio</label>
            <input type="number" name="Presupuesto" id="Presupuesto" placeholder="Presupuesto">

        </fieldset>

        <fieldset>
            <legend>Contacto</legend>

            <p>como desea ser contactado</p>

            <div class="forma-contacto">
                <label for="contactar-telefono">Teléfono</label>
                <input type="radio" name="contactar" value="telefono" id="contactar-telefono">

                <label for="contactar-email">E-mail</label>
                <input type="radio" name="contactar" value="email" id="contactar-email">
            </div>

            <p>Si eligió teléfono, elija la fecha y la hora</p>

            <label for="fecha">Fecha</label>
            <input type="date" name="fecha" id="fecha">

            <label for="hora">Hora</label>
            <input type="time" name="hora" id="hora" min="09:00" max="18:00">
        </fieldset>

        <input class="boton-verde" type="submit" value="enviar">
    </form>
</main>

<?php
incluirTemplete('footer');
?>