<?php
include_once 'app/EscritorEntradas.inc.php';

$busqueda = null;
$resultados = null;

//$resultados_multiples = null;

$buscar_titulo = false;
$buscar_contenido = false;
$buscar_tags = false;
$buscar_autor = false;

if (isset($_POST['buscar']) && isset($_POST['termino-buscar']) && !empty($_POST['termino-buscar'])) {
    $busqueda = $_POST['termino-buscar'];
//esto se debe validar correctamente
//$resultados_multiples = false;

    Conexion::abrir_conexion();
    $resultados = RepositorioEntrada::buscar_entradas_todos_los_campos(Conexion::obtener_conexion(), $busqueda);

    Conexion::cerrar_conexion();
}

if (isset($_POST['busqueda-avanzada']) && isset($_POST['campos'])) {

    if (in_array("titulo", $_POST['campos'])) {
        $buscar_titulo = true;
    }

    if (in_array("contenido", $_POST['campos'])) {
        $buscar_contenido = true;
    }

    if (in_array("tags", $_POST['campos'])) {
        $buscar_tags = true;
    }

    if (in_array("autor", $_POST['campos'])) {
        $buscar_autor = true;
    }

    if ($_POST['fecha'] == "recientes") {
        $orden = "DESC";
    }

    if ($_POST['fecha'] == "antiguas") {
        $orden = "ASC";
    }

    if (isset($_POST['termino-buscar']) && !empty($_POST['termino-buscar'])) {
        $busqueda = $_POST['termino-buscar'];
//esto se debe validar correctamente
//$resultados_multiples = true;

        Conexion :: abrir_conexion();

        if ($buscar_titulo) {
            $entradas_por_titulo = RepositorioEntrada :: buscar_entradas_por_titulo(Conexion::obtener_conexion(), $busqueda, $orden);
        }

        if ($buscar_contenido) {
            $entradas_por_contenido = RepositorioEntrada :: buscar_entradas_por_contenido(Conexion::obtener_conexion(), $busqueda, $orden);
        }

        if ($buscar_tags) {
            //añadir tagas cuando existan
        }

        if ($buscar_autor) {
            $entradas_por_autor = RepositorioEntrada :: buscar_entradas_por_autor(Conexion::obtener_conexion(), $busqueda, $orden);
        }
    }
}

$titulo = "Buscar en el Sistema";

include_once 'plantillas/documento-declaracion.inc.php';
include_once 'plantillas/navbar.inc.php';
?>

<div class="container-fluid">
    <div class="row">
        <div class="jumbotron">
            <h1 class="text-center">Buscar en SupplyHome</h1>
            <br>
            <div class="row">
                <div class="col-md-2">
                </div>
                <div class="col-md-8 text-center">
                    <form role="form" method="post" action="<?php echo RUTA_BUSCAR; ?>">
                        <div class="form-group">
                            <input type="search" name="termino-buscar" class="form-control" placeholder="¿Qué buscas?" required <?php echo "value='" . $busqueda . "'" ?>>
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
</div>

<!--Esta parte me da error-->
<!--<div class="container">
    <div class="row">
        <div class="panel-group">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" href="#avanzada">Busqueda Avanzada</a>
                    </h4>
                </div>
                <div id="avanzada" class="collapse panel-collapse">
                    <div class="panel-body">
                        <form role="form" method="post" action="<?php echo RUTA_BUSCAR; ?>">
                            <div class="form-group">
                                <input type="search" name="termino-buscar" class="form-control" placeholder="¿Qué buscas?" required <?php echo "value='" . $busqueda . "'" ?>>
                            </div>
                            <p>buscar en los siguientes campos:</p>
                            <label class="checkbox-inline">
                                <input type="checkbox" value="titulo" name="campos[]"
                                <?php
                                if (isset($_POST['busqueda-avanzada'])) {
                                    if ($buscar_titulo) {
                                        echo "checked";
                                    }
                                } else {
                                    echo "checked";
                                }
                                ?>
                                       >Título
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" value="contenido" name="campos[]"
                                <?php
                                if (isset($_POST['busqueda-avanzada'])) {
                                    if ($buscar_contenido) {
                                        echo "checked";
                                    }
                                } else {
                                    echo "checked";
                                }
                                ?>
                                       >Contenido
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" value="tags" name="campos[]"
                                <?php
                                if (isset($_POST['busqueda-avanzada'])) {
                                    if ($buscar_tags) {
                                        echo "checked";
                                    }
                                } else {
                                    echo "checked";
                                }
                                ?>
                                       >Tags
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" value="autor" name="campos[]"
                                <?php
                                if (isset($_POST['busqueda-avanzada'])) {
                                    if ($buscar_autor) {
                                        echo "checked";
                                    }
                                }
                                ?>
                                       >Autor
                            </label>
                            <hr>
                            <p>Ordenar por:</p>
                            <label class="radio-inline">
                                <input type="radio" name="fecha" value="recientes"
                                <?php
                                if (isset($_POST['busqueda-avanzada']) && isset($orden) && $orden == 'DESC') {
                                    echo "checked";
                                }

                                if (!isset($_POST['busqueda_avanzada'])) {
                                    echo "checked";
                                }
                                ?>
                                       >Entradas más recientes
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="fecha" value="antiguas"
                                <?php
                                if (isset($_POST['busqueda-avanzada']) && isset($orden) && $orden == 'ASC') {
                                    echo "checked";
                                }
                                ?>
                                       >Entradas más Antiguas
                            </label>
                            <hr>
                            <button type="submit" name="busqueda-avanzada" class="btn btn-primary btn-sm">
                                <p>
                                    <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                                    &nbsp Busqueda Avanzada
                                </p>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>-->

<div class="container" id="resultados">
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1>
                    Resultados
                    <?php
                    if (isset($_POST['buscar']) && count($resultados)) {
                        echo " ";
                        ?>
                        <small><?php echo count($resultados); ?></small>
                        <?php
                    } //COMPROBAR RESULTADOS EN BUSQUEDA MÚLTIPLE
                    ?>
                </h1>
            </div>
        </div>
    </div>

    <?php
    if (isset($_POST['buscar'])) {
        if (count($resultados)) {
            EscritorEntradas::mostrar_entradas_busqueda($resultados);
        } else {
            ?>
            <h3>sin coincidencias</h3>
            <br>
            <?php
        }
    } else if (isset($_POST['busqueda_avanzada'])) {
        if (count($entradas_por_titulo) || count($entradas_por_contenido) || count($entradas_por_autor)) {
            $parametros = count($_POST['campos']);
            $ancho_columnas = 12 / $parametros;
            ?>
            <div class="row">
                <?php
                for ($i = 0; $i < $parametros; $i++) {
                    ?>
                    <div class="<?php echo 'col-md-' . $ancho_columnas; ?> text-center"></div>
                    <h4><?php echo 'Coincidencias en ' . $_POST['campos'][$i]; ?></h4>
                    <br>
                    <?php
                    switch ($_POST['campos'][$i]) {
                        case "titulo":
                            EscritorEntradas::mostrar_entradas_busqueda_multiple($entradas_por_titulo);
                            break;
                        case "contenido":
                            EscritorEntradas::mostrar_entradas_busqueda_multiple($entradas_por_contenido);
                            break;
                        case "tags":
                            break;
                        case "autor":
                            EscritorEntradas::mostrar_entradas_busqueda_multiple($entradas_por_autor);
                            break;
                    }
                    ?>
                </div>
                <?php
            }
            ?>
        </div>
        <?php
    } else {
        ?>
        <h3>Sin coincidencias</h3>
        <br>
        <?php
    }
}
?>

</div>
<?php
include_once 'plantillas/documento-cierre.inc.php';
?>