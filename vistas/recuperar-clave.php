<?php

$título = 'Recuperación de Contraseña';

/* establece la cabecera de nuestro código del index.php para que sea usado por todos */
include_once 'plantillas/documento-declaracion.inc.php';
/* el .inc es de include */
/* aquí enlazamos con la barra de navegación */
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
                        <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                        &nbsp Recuperación de Contraseña
                    </p>
                </div>
                <div class="panel-body">
                    <form role="form" method="post" action="<?php echo RUTA_GENERAR_URL_SECRETA; ?>">
                        <h2>Introduce tu email</h2>
                        <br>
                        <p>
                            Escribe la dirección de correo electrónico con la que te registraste y te enviaremos un email con el que podras restablecer tu contraseña.
                        </p>
                        <br>
                        <label for="email" class="sr-only">Email</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Email"
                               required autofocus>
                        <br>
                        <button class="btn btn-lg btn-primary btn-block" type="submit" name="enviar_email">
                            <p>
                                <span class="glyphicon glyphicon-send" aria-hidden="true"></span>
                                &nbsp Enviar
                            </p>
                        </button>
                    </form>
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
<?php
include_once 'plantillas/documento-cierre.inc.php';
?>
