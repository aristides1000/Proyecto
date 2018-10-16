<?php
include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/RepositorioUsuario.inc.php';
include_once 'app/ValidadorLogin.inc.php';
include_once 'app/ControlSesion.inc.php';
include_once 'app/Redireccion.inc.php';

if (ControlSesion::sesion_iniciada()) {
    Redireccion::redirigir(SERVIDOR);
}

if (isset($_POST['login'])) {
    Conexion::abrir_conexion();

    $validador = new ValidadorLogin($_POST['email'], $_POST['clave'], Conexion::obtener_conexion());

    if ($validador->obtener_error() === '' &&
            !is_null($validador->obtener_usuario())) {
        ControlSesion::iniciar_sesion(
                $validador->obtener_usuario()->obtener_id(),
                $validador->obtener_usuario()->obtener_nombre());
        Redireccion::redirigir(SERVIDOR);
    }

    Conexion::cerrar_conexion();
}

$título = 'Login';

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
                        &nbsp Iniciar sesion
                    </p>
                </div>
                <div class="panel-body">
                    <form role="form" method="post" action="<?php echo RUTA_LOGIN; ?>">
                        <h2>Introduce tus datos</h2>
                        <br>
                        <label for="email" class="sr-only">Email</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Email"
                        <?php
                        if (isset($_POST['login']) && isset($_POST['email']) && !empty($_POST['email'])) {
                            echo 'value="' . $_POST['email'] . '"';
                        }
                        ?>
                               required autofocus>
                        <br>
                        <label for="clave" class="sr-only">Contraseña</label>
                        <input type="password" class="form-control" name="clave" id="clave" placeholder="Contraseña" required>
                        <br>
                        <?php
                        if (isset($_POST['login'])) {
                            $validador->mostrar_error();
                        }
                        ?>
                        <button class="btn btn-lg btn-primary btn-block" type="submit" name="login">
                            <p>
                                <span class="glyphicon glyphicon-hand-right" aria-hidden="true"></span>
                                &nbsp Iniciar Sesión
                            </p>
                        </button>
                    </form>
                    <br>
                    <div class="text-center">
                        <a href="<?php echo RUTA_RECUPERAR_CLAVE; ?>">¿Olvidaste tu contraseña?</a>
                    </div>
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