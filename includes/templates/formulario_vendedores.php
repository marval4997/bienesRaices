<fieldset>
    <legend>Información Personal</legend>

    <label for="nombre">Nombre</label>
    <input type="text" name="vendedor[nombre]" id="nombre" placeholder="Nombre vendedor(a)" value="<?php echo s($vendedores->nombre); ?>">

    <label for="apellido">Apellido</label>
    <input type="text" name="vendedor[apellido]" id="apellido" placeholder="Apellido vendedor(a)" value="<?php echo s($vendedores->apellido); ?>">

    <label for="telefono">Teléfono</label>
    <input type="tel" name="vendedor[telefono]" id="telefono" placeholder="Teléfono vendedor(a)" value="<?php echo s($vendedores->telefono); ?>">




</fieldset>


