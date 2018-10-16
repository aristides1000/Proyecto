<?php
include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/RepositorioUsuario.inc.php';
include_once 'app/Redireccion.inc.php';

$titulo = '¡Registro correcto!';

include_once 'plantillas/documento-declaracion.inc.php';
include_once 'plantillas/navbar.inc.php';
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <p><span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span> Registro Correcto</p>
                </div>
                <div class="panel-body text-center">
                    <p>¡Gracias por registrarte <b><?php echo $nombre ?></b>!</p>
                    <br>
                    <p><a href="<?php echo RUTA_LOGIN ?>">Inicia sesión</a> Para comenzar a usar tu cuenta</p>
                </div>
            </div> 
        </div>
    </div>
</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<?php
include_once 'plantillas/documento-cierre.inc.php';
?>