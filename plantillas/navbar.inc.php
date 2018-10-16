<?php
include_once 'app/ControlSesion.inc.php';
include_once 'app/config.inc.php';

Conexion :: abrir_conexion();
$total_usuarios = RepositorioUsuario :: obtener_numero_usuarios(Conexion::obtener_conexion());
?>
<nav class="navbar navbar-default navbar-static-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Este botón despliega la barra de Navegación</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo SERVIDOR ?>">        
                &nbsp SupplyHome
            </a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <?php 
//                if (!ControlSesion::sesion_iniciada()){
         ?>
            <ul class="nav navbar-nav">
                <li><a href="<?php echo RUTA_NOSOTROS ?>"><i class="fas fa-building"></i> &nbsp;Nosotros</a></li>
                <li><a href="<?php echo RUTA_PRODUCTOS ?>"><span class="glyphicon glyphicon-apple" aria-hidden="true"></span> &nbsp;Nuestros Productos</a></li>
                <li><a href="<?php echo RUTA_AUTORES ?>"><span class="glyphicon glyphicon-grain" aria-hidden="true"></span> &nbsp;Provedores</a></li>
            </ul>
            <?php
//                }
          ?>
            <!--Barra de sesión-->
            <ul class="nav navbar-nav navbar-right">
                <?php
                if (ControlSesion::sesion_iniciada()) {
                    ?>
                    <li>
                        <a href="<?php echo RUTA_PERFIL; ?>">
                            <span class="glyphicon glyphicon-user" aria-hidden="true"></span> &nbsp;
                            <?php echo ' ' . $_SESSION['nombre_usuario']; ?>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo RUTA_GESTOR; ?>">
                            <span class="glyphicon glyphicon-dashboard" aria-hidden="true"></span> &nbsp;
                            Gestor de Compra
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo RUTA_LOGOUT; ?>">
                            <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> &nbsp;
                            Cerrar Sesión
                        </a>
                    </li>
                    <?php
                } else {
                    ?>

                    <li>
                        <a href="#">
                            <span class="glyphicon glyphicon-user" aria-hidden="true"></span> &nbsp;
                            <?php
                            echo $total_usuarios;
                            ?>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo RUTA_LOGIN ?>"><span class="glyphicon glyphicon-log-in" aria-hidden="true"></span> &nbsp;
                            Iniciar sesión
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo RUTA_REGISTRO ?>"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> &nbsp;
                            Registro
                        </a>
                    </li>

                    <?php
                }
                ?>
            </ul>
        </div>
    </div>
</nav>