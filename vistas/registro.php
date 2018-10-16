<?php
include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/Usuario.inc.php';
include_once 'app/RepositorioUsuario.inc.php';
include_once 'app/ValidadorRegistro.inc.php';
include_once 'app/Redireccion.inc.php';

if (isset($_POST['enviar'])) {
    Conexion :: abrir_conexion();

    $validador = new ValidadorRegistro($_POST['nombre'], $_POST['email'], $_POST['clave1'], $_POST['clave2'], Conexion :: obtener_conexion());

    if ($validador->registro_valido()) {
        $usuario = new Usuario('', $validador->obtener_nombre(), $validador->obtener_email(), password_hash($validador->obtener_clave(), PASSWORD_DEFAULT), '', '');
        $usuario_insertado = RepositorioUsuario :: insertar_usuario(Conexion :: obtener_conexion(), $usuario);

        if ($usuario_insertado) {
            Redireccion::redirigir(RUTA_REGISTRO_CORRECTO . '/' . $usuario->obtener_nombre());
        }
    }

    Conexion :: cerrar_conexion();
}

$titulo = 'Registro';

/* establece la cabecera de nuestro código del index.php para que sea usado por todos */

include_once 'plantillas/documento-declaracion.inc.php';

/* el .inc es de include */

/* aquí enlazamos con la barra de navegación */
include_once 'plantillas/navbar.inc.php';
?>

<div class="container-fluid">
    <div class="jumbotron">
        <h1 class="text-center">Formulario de Registro</h1>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-6 text-center">
            <div class="panel panel-deafult">
                <div class="panel-heading">
                    <p>
                        <span class="glyphicon glyphicon-apple" aria-hidden="true"></span>
                        &nbsp Instrucciones
                    </p>
                </div>
                <div class="panel-body">
                    <br>
                    <p class="text-justify">
                        Para unirte, hacer compras y darnos tu experiencia en nuestros supermercados llena el siguiente formulario, recuerda que tu email te ayudará a gestionar tu cuenta de usuario
                    </p>
                    <br>
                    <a href="#">¿Ya tienes cuenta?</a>
                    <br>
                    <a href="#">¿Olvidaste tu contrañesa?</a>
                    <br>
                    <br>
                </div>
            </div>
        </div>
        <div class="col-md-6 text-center">
            <div class="panel panel-deafult">
                <div class="panel-heading">
                    <p>
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                        &nbsp Introduce tus datos
                    </p>
                </div>
                <div class="panel-body">
                    <form role="form" method="post" action="<?php echo RUTA_REGISTRO ?>">
                        <?php
                        if (isset($_POST['enviar'])) {
                            include_once 'plantillas/registro_validado.inc.php';
                        } else {
                            include_once 'plantillas/registro_vacio.inc.php';
                        }
                        ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include_once 'plantillas/documento-cierre.inc.php';
?>