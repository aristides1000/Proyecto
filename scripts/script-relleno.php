<?php

include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';

include_once 'app/Usuario.inc.php';
include_once 'app/Entrada.inc.php';
include_once 'app/Comentario.inc.php';

include_once 'app/RepositorioUsuario.inc.php';
include_once 'app/RepositorioEntrada.inc.php';
include_once 'app/RepositorioComentario.inc.php';

Conexion::abrir_conexion();

for ($usuarios = 0; $usuarios < 100; $usuarios++){
    $nombre = sa(10);
    $email = sa(5).'@'.sa(3);
    $password = password_hash('123456', PASSWORD_DEFAULT);
    
    $usuario = new Usuario('', $nombre, $email, $password, '', '');
    RepositorioUsuario::insertar_usuario(Conexion::obtener_conexion(), $usuario);
}

for ($entradas = 0; $entradas < 100; $entradas++){
    $titulo = sa(10);
    $url = $titulo;
    $texto = lorem();
    $autor = rand(1, 100);
    
    $entrada = new Entrada('', $autor, $url, $titulo, $texto, '', '');
    RepositorioEntrada::insertar_entrada(Conexion::obtener_conexion(), $entrada);
}

for ($comentarios = 0; $comentarios < 100; $comentarios++){
    $titulo = sa(10);
    $texto = lorem();
    $autor = rand(1, 100);
    $entrada =rand(1, 100);
    
    $comentario = new Comentario('', $autor, $entrada, $titulo, $texto, '');
    RepositorioComentario::insertar_comentario(Conexion::obtener_conexion(), $comentario);
}

function sa($longitud) {
    $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $numero_caracteres = strlen($caracteres);
    $string_aleatorio = '';
    
    for ($i = 0; $i < $longitud; $i++) {
        $string_aleatorio .= $caracteres[rand(0, $numero_caracteres - 1)];
    }
    
    return $string_aleatorio;
}

function lorem(){
    $lorem = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis vel lacus accumsan, gravida lorem ac, volutpat turpis. Vestibulum fermentum tincidunt nisl quis cursus. Morbi in dolor eu erat luctus porttitor in vitae velit. Etiam quis ante cursus, fringilla sapien efficitur, accumsan ex. Duis imperdiet elementum nisi, eget tristique nibh dignissim vitae. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. In molestie tristique fringilla. Nunc pellentesque leo sapien, et faucibus mauris interdum sed. Cras posuere ut justo sed bibendum. Vivamus id urna eu diam mattis finibus. Ut id pharetra orci, in tincidunt risus. Pellentesque et volutpat turpis. Nulla commodo odio ultricies, dignissim enim eget, sollicitudin felis. Donec in vulputate ex, nec varius dui. Fusce posuere nisi a posuere porta.

Proin quam magna, lobortis vel molestie id, fringilla sit amet odio. Etiam pellentesque justo tincidunt sem rutrum ultricies. Praesent dolor lectus, feugiat eu metus varius, suscipit placerat augue. Nullam fringilla vel nisi eget fermentum. Aenean posuere lorem non dolor feugiat, sit amet aliquet elit vestibulum. Mauris quis velit eget nunc pretium tincidunt. Curabitur quis tincidunt massa. Maecenas in mollis mi. Nullam vitae arcu elementum augue posuere tincidunt at cursus orci. Nulla nec ex sed dolor mollis placerat sit amet ac diam. Nulla id orci elit. Pellentesque semper pulvinar tortor, quis sollicitudin velit elementum id. Aenean feugiat enim lorem, non commodo enim porttitor eu. Sed tortor metus, faucibus eu varius at, facilisis non justo. Curabitur mollis dapibus sem, non pulvinar ligula accumsan eu.

Etiam fringilla vel lorem at ullamcorper. Mauris malesuada, enim a ornare gravida, sapien tellus rutrum nisi, eu luctus quam lacus ut erat. Aliquam vitae nulla est. Integer ut varius orci. Cras a nulla sed lacus varius volutpat ut nec enim. Cras a accumsan dolor. Ut condimentum, ex et tempor convallis, nunc magna luctus dolor, at semper nisl nibh pretium massa. Donec mollis dictum felis, sodales tincidunt ligula ultrices id. Donec eu quam accumsan velit venenatis lacinia. Duis sed nibh pharetra elit congue euismod. Sed euismod pharetra tincidunt.

Donec et pulvinar urna, ut semper leo. Donec mi tellus, pulvinar ut porttitor iaculis, vestibulum at arcu. Etiam rutrum lacinia urna ac sagittis. Sed semper dui in blandit hendrerit. Proin vitae augue non massa tempor vehicula sed non leo. Vivamus tempor ipsum a semper convallis. Vivamus dignissim lobortis pulvinar. Aliquam sit amet eleifend nunc. Aliquam erat volutpat. Donec iaculis ligula at quam tempor mollis. Nulla eu aliquet lorem. Ut rhoncus mollis magna, et pulvinar est lacinia eu. Nullam ut risus eu tortor efficitur porta.

Fusce tempor bibendum nulla, sed lacinia augue dapibus nec. Nullam pulvinar orci est, vel sodales risus feugiat sed. Donec massa libero, elementum non interdum in, condimentum ut velit. Ut fermentum mauris nec nisl sodales rutrum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Pellentesque non condimentum purus. Fusce pulvinar odio quis erat mattis, quis eleifend ex tincidunt. Maecenas volutpat consectetur ornare. Cras interdum congue commodo. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nam consectetur urna quis porta vehicula. Etiam iaculis porttitor dui quis mattis. Duis eros tortor, ullamcorper non ante ut, sollicitudin consequat nulla. Donec eget volutpat mauris. Integer nunc velit, mattis at imperdiet at, tincidunt ac quam. Curabitur ut aliquet lorem.';
    
    return $lorem;
}
?>

