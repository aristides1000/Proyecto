<?php

include_once 'app/RepositorioRecuperacionClave.inc.php';
include_once 'app/Redireccion.inc.php';

Conexion::abrir_conexion();

if (RepositorioRecuperacionClave::url_secreta_existe(Conexion::obtener_conexion(), $url_personal)) {
    $id_usuario = RepositorioRecuperacionClave::obtener_id_usuario_mediante_url_secreta(Conexion::obtener_conexion(), $url_personal);
} else {
    //lanzar error 404
    echo '404';
}

if (isset($_POST['guardar-clave'])) {
    //validar clave 1
    //comprobar si la clave 2 coincide
    //fijarse del formulario de registro

    $clave_cifrada = password_hash($_POST['clave'], PASSWORD_DEFAULT);
    $clave_actualizada = RepositorioUsuario::actualizar_password(Conexion::obtener_conexion(), $id_usuario, $clave_cifrada);
    //Eliminar solicitud de recuperación de contraseña
    //hacerlo como en el capítulo de transacciones

    //Redirigir a notificación de actualización correcta y ofrecer link a login
    if ($clave_actualizada) {
        Redireccion::redirigir(RUTA_LOGIN);
    } else {
        //informar del error
        echo 'ERROR';
    }
}

Conexion::cerrar_conexion();

$titulo = 'Recuperación de contraseña';

include_once 'plantillas/documento-declaracion.inc.php';
include_once 'plantillas/navbar.inc.php';
?>
<div class="container">
    <div class="row">
        <div class="col-md-3">
        </div>
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading text-center">
                    <p>
                        Escribe tu nueva contraseña
                    </p>
                </div>
                <div class="panel-body">
                    <form role="form" method="post" action="<?php echo RUTA_RECUPERACION_CLAVE."/".$url_personal;?>">
                        <br>
                        <div class="form-group">
                            <label for="clave">Nueva Contraseña</label>
                            <input type="password" name="clave" id="clave" class="form-control" placeholder="Mínimo tiene que tener 6 caractéres" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="clave2">Repite la Contraseña</label>
                            <input type="password" name="clave2" id="clave2" class="form-control" placeholder="Debe coincidir con la de arriba" required>
                        </div>
                        
                        <button type="submit" name="guardar-clave" class="btn btn-lg btn-primary btn-block">
                            Guardar contraseña
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>