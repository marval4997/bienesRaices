<main class="contenedor seccion contenido-centrado">
    <h1>Iniciar Sesión</h1>

    <?php foreach ($errores as $error) : ?>
        <p class="alerta error"><?php echo $error; ?></p>
    <?php endforeach; ?>

    <form  method="POST" class="formulario" action="/login">
        <fieldset>
            <legend>Email y Password</legend>

            <label for="email">E-mail</label>
            <input type="email" name="usuario[email]" id="email" placeholder="TU email" >

            <label for="password">Nombre</label>
            <input type="password" name="usuario[password]" id="password" placeholder="Tu Password" >

            <input class="boton-verde" type="submit" value="enviar">

        </fieldset>

    </form>

</main>