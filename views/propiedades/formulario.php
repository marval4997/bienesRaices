<fieldset>
    <legend>Información General</legend>

    <label for="titulo">Titulo</label>
    <input type="text" name="propiedad[titulo]" id="titulo" placeholder="Titulo Propiedad" value="<?php echo s($propiedad->titulo); ?>">

    <label for="precio">Precio</label>
    <input type="number" name="propiedad[precio]" id="precio" placeholder="Precio Propiedad" value="<?php echo s($propiedad->precio); ?>">

    <label for="imagen">Imagen</label>
    <input type="file" name="propiedad[imagen]" id="imagen" accept="image/jpeg, image/png">
    <?php if ($propiedad->imagen) : ?>
        <img src="/imagenes/<?php echo $propiedad->imagen ?>" alt="" class="imagen-propiedad">
    <?php endif; ?>
    <label for="descripcion">Descripción</label>
    <textarea name="propiedad[descripcion]" id="descripcion">
    <?php echo s($propiedad->descripcion); ?>
</textarea>

</fieldset>

<fieldset>
    <legend>Información Propiedad</legend>

    <label for="habitaciones">Habitaciones</label>
    <input type="number" name="propiedad[habitaciones]" id="habitaciones" placeholder="Ej: 3" min="1" value="<?php echo s($propiedad->habitaciones); ?>">

    <label for="wc">Baños</label>
    <input type="number" name="propiedad[wc]" id="wc" placeholder="Ej: 3" min="1" value="<?php echo s($propiedad->wc); ?>">

    <label for="estacionamiento">Estacionamiento</label>
    <input type="number" name="propiedad[estacionamiento]" id="estacionamiento" placeholder="Ej: 3" min="1" value="<?php echo s($propiedad->estacionamiento); ?>">

</fieldset>

<fieldset>
    <legend>Vendedor</legend>
    <label for="vendedor_id">Vendedor</label>
    <select name="propiedad[vendedor_id]" id="vendedor_id">
        <option value="" selected disabled>--seleccionar--</option>

        <?php foreach ($vendedores as $vendedor) : ?>
            <option value="<?php echo s($vendedor->id); ?>" 
            <?php echo $vendedor->id === $propiedad->vendedor_id  ? "selected"  : ""; ?>>
                <?php echo s($vendedor->nombre). " ". s($vendedor->apellido); ?>
            </option>
        <?php endforeach; ?>
    </select>

</fieldset>