
<main class="contenedor seccion">
    <h1>Contacto</h1>

    <?php if($mensaje):?>
        <p class="alerta exito"><?php echo $mensaje; ?></p>
    <?php endif; ?>    

    <picture>
        <source srcset="build/img/destacada3.webp" type="webp">
        <source srcset="build/img/destacada3.jpg" type="jpeg">
        <img loading="lazy" src="build/img/destacada3.jpg" alt="imagen de contacto">
    </picture>

    <h2>Llene el formulario de contacto</h2>

    <form class="formulario" action="/contacto" method="POST">
        <fieldset>
            <legend>Información Personal</legend>

            <label for="nombre">Nombre</label>
            <input type="text" name="contacto[nombre]" id="nombre" placeholder="Tu nombre">

           


           

            <label for="mensaje">Mensaje</label>
            <textarea name="contacto[mensaje]" id="mensaje" cols="30" rows="10"></textarea>
        </fieldset>

        <fieldset>
            <legend>Información</legend>

            <label for="opciones">Vende o Compra</label>
            <select id="opciones" name="contacto[tipo]">
                <option value="" disabled selected>-- Selecciona --</option>
                <option value="compra">Compra</option>
                <option value="venta">Venta</option>
            </select>

            <label for="presupuesto">Precio</label>
            <input type="number" name="contacto[presupuesto]" id="presupuesto" placeholder="presupuesto">

        </fieldset>

        <fieldset>
            <legend>Contacto</legend>

            <p>como desea ser contactado</p>

            <div class="forma-contacto">
                <label for="contactar-telefono">Teléfono</label>
                <input type="radio" name="contacto[contactar]" value="telefono" id="contactar-telefono">

                <label for="contactar-email">E-mail</label>
                <input type="radio" name="contacto[contactar]" value="email" id="contactar-email">
            </div>

            <div id="metodo-contacto"></div>

            <p>Si eligió teléfono, elija la fecha y la hora</p>

            
        </fieldset>

        <input class="boton-verde" type="submit" value="enviar">
    </form>
</main>

