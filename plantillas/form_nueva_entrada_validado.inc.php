<div class="form-group">
    <label for="titulo">Título</label>
    <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Colócale el título"
           <?php $validador -> mostrar_titulo(); ?> >
    <?php $validador -> mostrar_error_titulo(); ?>
</div>
<div class="form-group">
    <label for="url">URL</label>
    <input type="text" class="form-control" id="url" name="url" placeholder="Dirección única sin espacios para la entrada"
           <?php $validador -> mostrar_url(); ?> >
    <?php $validador -> mostrar_error_url(); ?>
</div>
<div class="form-group">
    <label for="contenido">Contenido</label>
    <textarea class="form-control" rows="4" id="contenido" name="texto" placeholder="Escribe Aquí tu artículo"
              ><?php $validador -> mostrar_texto(); ?></textarea>
        <?php $validador -> mostrar_error_texto(); ?>
</div>
<div class="checkbox">
    <label>
        <input type="checkbox" name="publicar" value="si" <?php if ($entrada_publica) echo 'checked'; ?>
               >Deseas publicarlo de inmediato</label>
</div>
<br>
<div class="text-right">
    <button class="btn btn-default" type="submit" id="btn" name="guardar" >Guardar Entrada</button>
</div>