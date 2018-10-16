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

<div class="container cuatro-cero-cuatro">
    <div class="row">
        <br>
        <div class="col-md-4">
            <img src="img/nosotros.jpg" class="img-rounded img-responsive">
            <br>
        </div>
        <div class="col-md-5">
            <h1>Una empresa con mucha historia</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <p>Somos una cadena de supermercados especializados en darle lo mejor a nuestros clientes, siempre comprometidos con un mañana mejor</p>
            <h3>Misión</h3>
            <p>Brindar permanentemente calidad en la atención y el servicio para satisfacer las necesidades y requerimientos de nuestros clientes a través de la mejora continua en cada uno de nuestros procesos, con base en un espíritu noble de responsabilidad social.</p>
            <h3>Visión</h3>
            <p>Ser la cadena de Supermercados líder a nivel nacional, en servicio al cliente, variedad de productos, precios accesibles y proyección comunitaria.</p>
            <h3>Nuestros Valores</h3>
            <ul>
                <li>Responsabilidad</li>
                <li>Honestidad</li>
                <li>Integridad</li>
                <li>Confianza</li>
                <li>Aprendizaje</li>
                <li>Respeto y Tolerancia</li>
                <li>Disciplina</li>
            </ul>
        </div>
    </div>
</div>

<?php
include_once 'plantillas/documento-cierre.inc.php';
?>