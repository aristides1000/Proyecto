<?php
header($_SERVER['SERVER_PROTOCOL'] . '404 Not Found', true, 404);
include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/RepositorioUsuario.inc.php';
include_once 'app/ValidadorLogin.inc.php';
include_once 'app/ControlSesion.inc.php';
include_once 'app/Redireccion.inc.php';

$título = 'Error 404';

/* establece la cabecera de nuestro código del index.php para que sea usado por todos */
include_once 'plantillas/documento-declaracion.inc.php';
/* el .inc es de include */
/* aquí enlazamos con la barra de navegación */
include_once 'plantillas/navbar.inc.php';
?>

<div class="container cuatro-cero-cuatro">
    <div class="row">
        <br>
        <div class="col-md-4">
            <img src="img/404.gif" class="img-rounded img-responsive">
            <br>
        </div>
        <div class="col-md-5">
            <h1>Error 404</h1>
            <h3>La página que has intentado localizar no se encuentra en nuestro servidor</h3>

            <button class="btn btn-primary btn-sm">
                <a href="<?php echo SERVIDOR; ?>" id="cuatro-cero-cuatro">                    
                    <p>
                        <span class="glyphicon glyphicon-home" aria-hidden="true"></span>
                        &nbsp Volver a la página principal &nbsp
                    </p>
                </a>
            </button>
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
<?php
include_once 'plantillas/documento-cierre.inc.php';
?>