<?php
include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';

include_once 'app/Usuario.inc.php';
include_once 'app/Entrada.inc.php';
include_once 'app/Comentario.inc.php';

include_once 'app/RepositorioUsuario.inc.php';
include_once 'app/RepositorioEntrada.inc.php';
include_once 'app/RepositorioComentario.inc.php';

$titulo = $entrada->obtener_titulo();

/* establece la cabecera de nuestro código del index.php para que sea usado por todos */
include_once 'plantillas/documento-declaracion.inc.php';
/* el .inc es de include */
/* aquí enlazamos con la barra de navegación */
include_once 'plantillas/navbar.inc.php';
?>

<div class="container contenido-articulo">
    <div class="row">
        <div class="col-md-12">
            <h1>
                <?php echo $entrada->obtener_titulo(); ?>
            </h1>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12">
            <p>
                Por
                <a href="#">
                    <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                    &nbsp <?php echo $autor -> obtener_nombre(); ?>
                </a>
                el
                &nbsp <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> &nbsp <?php echo $entrada -> obtener_fecha(); ?>
            </p>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12">
            <article class="text-justify">
                <?php echo nl2br($entrada -> obtener_texto()); ?>
            </article>
        </div>
    </div>
    <?php
    include_once 'plantillas/entradas_al_azar.inc.php';
    ?>
    <br>
    <?php
        if (count($comentarios) > 0) {
            include_once 'plantillas/comentarios_entrada.inc.php';
        } else {
            echo '<p>¡Todavía no hay comentarios!</p>';
        }
    ?>
</div>

<?php
include_once 'plantillas/documento-cierre.inc.php';
?>