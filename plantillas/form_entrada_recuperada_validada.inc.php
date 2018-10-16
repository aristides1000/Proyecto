<input type="hidden" id="id-entrada" name="id-entrada" value="<?php echo $id_entrada; ?>">
<div class="form-group">
    <label for="titulo">Título</label>
    <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Colócale el título" value="<?php echo $validador -> obtener_titulo(); ?>">
    <input type="hidden" id="titulo-original" name="titulo-original" value="<?php echo $entrada_recuperada -> obtener_titulo(); ?>">
    <?php
        $validador -> mostrar_error_titulo();
    ?>
</div>
<div class="form-group">
    <label for="url">URL</label>
    <input type="text" class="form-control" id="url" name="url" placeholder="Dirección única sin espacios para la entrada" value="<?php echo $validador -> obtener_url(); ?>">
    <input type="hidden" id="url-original" name="url-original" value="<?php echo $entrada_recuperada -> obtener_url(); ?>">
    <?php
        $validador -> mostrar_error_url();
    ?>
</div>
<div class="form-group">
    <label for="contenido">Contenido</label>
    <textarea class="form-control" rows="4" id="texto" name="texto" placeholder="Escribe Aquí tu artículo"><?php echo $validador -> obtener_texto(); ?></textarea>
    <input type="hidden" id="texto-original" name="texto-original" value="<?php echo $entrada_recuperada -> obtener_texto(); ?>">
    <?php
        $validador -> mostrar_error_texto();
    ?>
</div>
<div class="checkbox">
    <label>
        <input type="checkbox" name="publicar" value="si" <?php if ($validador -> obtener_checkbox()) echo 'checked'; ?>>Deseas publicarlo de inmediato
        <input type="hidden" id="publicar-original" name="publicar-original" value="<?php echo $entrada_recuperada -> esta_activa(); ?>">
    </label>
</div>
<br>
<div class="text-right">
    <button class="btn btn-default" type="submit" id="btn" name="guardar_cambios_entrada" >Guardar Cambios</button>
</div>