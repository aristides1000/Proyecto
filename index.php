<?php

include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';

include_once 'app/Usuario.inc.php';
include_once 'app/Entrada.inc.php';
include_once 'app/Comentario.inc.php';

include_once 'app/RepositorioUsuario.inc.php';
include_once 'app/RepositorioEntrada.inc.php';
include_once 'app/RepositorioComentario.inc.php';

$componentes_url = parse_url($_SERVER['REQUEST_URI']);

$ruta = $componentes_url['path'];

$partes_ruta = explode('/', $ruta);
$partes_ruta = array_filter($partes_ruta);
$partes_ruta = array_slice($partes_ruta, 0);

$ruta_elegida = 'vistas/404.php';

if ($partes_ruta[0] == 'Proyecto') {
    /*Estar pendiente con el archivo 'app/config.inc.php' estar pendiente para no equivocarnos con la conexion y el puerto de los servidores virtuales, en el caso de mi casa el puerto del localhost es 8080*/
    if(count($partes_ruta) == 1) {
        $ruta_elegida = 'vistas/home.php';
    }else if (count($partes_ruta) == 2) {
        switch ($partes_ruta[1]) {
        /*Aquí van las urls con 2 divisores o separadores osea, estos '/' si no entiendes lo que digo ve el video de urls amigables de java dev one*/
            case 'login':
                $ruta_elegida = 'vistas/login.php';
                break;
            case 'logout':
                $ruta_elegida = 'vistas/logout.php';
                break;
            case 'registro':
                $ruta_elegida = 'vistas/registro.php';
                break;
            case 'gestor':
                $ruta_elegida = 'vistas/gestor.php';
                $gestor_actual = '';
                break;
            case 'relleno-dev':
                $ruta_elegida = 'scripts/script-relleno.php';
                break;
            case 'nueva-entrada':
                $ruta_elegida = 'vistas/nueva-entrada.php';
                break;
            case 'borrar-entrada':
                $ruta_elegida = 'scripts/borrar-entrada.php';
                break;
            case 'editar-entrada':
                $ruta_elegida = 'vistas/editar-entrada.php';
                break;
            case 'recuperar-clave':
                $ruta_elegida = 'vistas/recuperar-clave.php';
                break;
            case 'generar-url-secreta':
                $ruta_elegida = 'scripts/generar-url-secreta.php';
                break;
            case 'mail':
                $ruta_elegida = 'vistas/prueba-mail.php';
                break;
            case 'buscar':
                $ruta_elegida = 'vistas/buscar.php';
                break;
            case 'perfil':
                $ruta_elegida = 'vistas/perfil.php';
                break;
            case 'nosotros':
                $ruta_elegida = 'vistas/nosotros.php';
                break;
            case 'productos':
                $ruta_elegida = 'vistas/productos.php';
                break;
        }
    }else if (count($partes_ruta) == 3) {
        /*Aquí van las urls con 3 divisores o separadores osea, estos '/' si no entiendes lo que digo ve el video de urls amigables de java dev one*/
        if ($partes_ruta[1] == 'registro-correcto') {
            $nombre = $partes_ruta[2];
            $ruta_elegida = 'vistas/registro-correcto.php';
        }
        if ($partes_ruta[1] == 'entrada') {
            $url = $partes_ruta[2];
            
            Conexion::abrir_conexion();
            $entrada = RepositorioEntrada :: obtener_entrada_por_url(Conexion::obtener_conexion(), $url);
            
            if ($entrada != null){
                $autor = RepositorioUsuario::obtener_usuario_por_id(Conexion::obtener_conexion(), $entrada -> obtener_autor_id());
                $comentarios = RepositorioComentario::obtener_comentarios(Conexion::obtener_conexion(), $entrada -> obtener_id());
                $entradas_azar = RepositorioEntrada::obtener_entradas_al_azar(Conexion::obtener_conexion(), 3);
                
                $ruta_elegida = 'vistas/entrada.php';
            }
        }
        if ($partes_ruta[1] == 'gestor') {
            switch ($partes_ruta[2]) {
                case 'entradas':
                    $gestor_actual = 'entradas';
                    $ruta_elegida = 'vistas/gestor.php';
                    break;
                case 'comentarios':
                    $gestor_actual = 'comentarios';
                    $ruta_elegida = 'vistas/gestor.php';
                    break;
                case 'favoritos':
                    $gestor_actual = 'favoritos';
                    $ruta_elegida = 'vistas/gestor.php';
                    break;
            }
        }
        
        if ($partes_ruta[1] == 'recuperacion-clave'){
            $url_personal = $partes_ruta[2];
            $ruta_elegida = 'vistas/recuperacion-clave.php';
        }
    }
}
include_once $ruta_elegida;

/*
if ($partes_ruta[2] == 'registro') {
    include_once 'vistas/registro.php';*//*todas las demás páginas llevan el pámetro $partes_ruta[2], si no comprendes ve el video de java dev one número 38 de url amigables*//*
} else if ($partes_ruta[2] == 'login') {
    include_once 'vistas/login.php';
} else if ($partes_ruta[1] == 'Proyecto') {
    include_once 'vistas/home.php';/*dejar el home siempre de último escribir las demás páginas siempre arriba de home que es nuestro nuevo index que es nuestra página principal*//*
} else {
    echo '404';
}
*/

?>