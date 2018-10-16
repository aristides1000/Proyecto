<?php
include_once 'app/Conexion.inc.php';
include_once 'app/RepositorioUsuario.inc.php';
include_once 'app/EscritorEntradas.inc.php';

$titulo = 'SupplyHome';

/* establece la cabecera de nuestro código del index.php para que sea usado por todos */

include_once 'plantillas/documento-declaracion.inc.php';

/* el .inc es de include */

/* aquí enlazamos con la barra de navegación */
include_once 'plantillas/navbar.inc.php';
?>
<div class="container-fluid">
    <div class="jumbotron">
        <h1>Bienvenido a SupplyHome</h1>
        <p> Disfruta la experiencia de comprar en nuestros supermercados</p>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <p>
                                <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                                &nbsp Búsqueda
                            </p>
                        </div>
                        <div class="panel-body text-center">
                            <form role="form" method="post" action="<?php echo RUTA_BUSCAR; ?>">
                                <div class="form-group">
                                    <input type="search" name="termino-buscar" class="form-control" placeholder="¿Qué buscas?" required>
                                </div>
                                <button type="submit" name="buscar" class="btn btn-primary btn-sm">
                                    <p>
                                        <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                                        &nbsp Buscar
                                    </p>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <p>    
                                <span class="glyphicon glyphicon-filter" aria-hidden="true"></span>
                                &nbsp Filtros
                            </p>
                        </div>
                        <div class="panel-body"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <p>
                                <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> &nbsp Archivo
                            </p>
                        </div>
                        <div class="panel-body"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <?php
            EscritorEntradas::escribir_entradas();
            ?>
        </div>
    </div>
</div>
<?php
include_once 'plantillas/documento-cierre.inc.php';
?>