<div class="form-group">
	<label>Nombre de Usuario</label>
	<input type="text" class="form-control" name="nombre" placeholder="Escribe aquí tu nombre" <?php $validador -> mostrar_nombre() ?>>
	<?php
	$validador -> mostrar_error_nombre();
	?>
</div>
<div class="form-group">
	<label>Email</label>
	<input type="email" class="form-control" name="email" placeholder="Escribe aquí tu email" <?php $validador -> mostrar_email() ?>>
	<?php
	$validador -> mostrar_error_email();
	?>
</div>
<div class="form-group">
	<label>Contraseña</label>
	<input type="password" class="form-control" name="clave1" placeholder="Escribe aquí tu Contraseña">
	<?php
	$validador -> mostrar_error_clave1();
	?>
</div>
<div class="form-group">
	<label>Confirma tu Contraseña</label>
	<input type="password" class="form-control" name="clave2" placeholder="Vuelve a escribir tu Contraseña">
	<?php
	$validador -> mostrar_error_clave2();
	?>
</div>
<button type="submit" class="btn btn-primary btn-lg" name="enviar">
	<p>
    <span class="glyphicon glyphicon-send" aria-hidden="true"></span>
    &nbsp Enviar mis datos
    </p>
</button>