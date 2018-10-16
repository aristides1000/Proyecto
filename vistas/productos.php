<?php
include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/RepositorioUsuario.inc.php';
include_once 'app/ValidadorLogin.inc.php';
include_once 'app/ControlSesion.inc.php';
include_once 'app/Redireccion.inc.php';

$título = 'Nosotros';

include_once 'plantillas/documento-declaracion.inc.php';
include_once 'plantillas/navbar.inc.php';
?>

<div class="container">
    <div class="row">
        <?php
//        Conexion::abrir_conexion();
//        $re=mysql_query("SELECT * FROM productos")or die(mysql_error());
//        while ($f=mysql_fetch_array($re)) {
            ?>
            <div class="col-md-4">
                <center>    
                    <img src="../producto/cebolla.jpg" class="img-responsive img-rounded"><br>
                    <span>Cebolla</span><br>
                    <a href="#">ver</a>
                </center>
            </div>
            <div class="col-md-4">
                <center>    
                    <img src="../producto/detergente.jpg" class="img-responsive img-rounded" width="150px"><br>
                    <span>detergente</span><br>
                    <a href="#">ver</a>
                </center>
            </div>
            <?php
//            Conexion::cerrar_conexion();
//        }
        ?>
    </div>
</div>

<?php
include_once 'plantillas/documento-cierre.inc.php';
?>