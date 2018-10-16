<?php
//info de la base de datos
define('NOMBRE_SERVIDOR', 'localhost');
define('NOMBRE_USUARIO', 'root');
define('PASSWORD', '');
define('NOMBRE_BD', 'blog');

//rutas de la web
//importante incluir las nuevas rutas aquí, esto incluye las nuevas de carrito de compra
//ESTAS SON LAS RUTAS DE MI PÁGINA
//PARA ACTIVARLAS EN LOS VINCULOS DEBO ESCRIBIR "href="<?php echo RUTA_ENTRADAS(aqui va el cierre de la etiqueta de llamado a php)""
define("SERVIDOR", "http://localhost:9090/Proyecto");/*mi ruta a la carpeta proyecto, tengo que estar muy pilas con esto al momento de montar mi carpeta en otra compu OJO OJO OJO OJO OJO OJO OJO sobre todo con el puerto de localhost que por defecto es 80, eso me va generar un error si no estoy pilas OJO*/
define("RUTA_REGISTRO", SERVIDOR."/registro");
define("RUTA_REGISTRO_CORRECTO", SERVIDOR."/registro-correcto");
define("RUTA_LOGIN", SERVIDOR."/login");
define("RUTA_LOGOUT", SERVIDOR."/logout");
define("RUTA_ENTRADA", SERVIDOR."/entrada");
define("RUTA_GESTOR", SERVIDOR."/gestor");
define("RUTA_GESTOR_ENTRADAS", RUTA_GESTOR."/entradas");
define("RUTA_GESTOR_COMENTARIOS", RUTA_GESTOR."/comentarios");
define("RUTA_GESTOR_FAVORITOS", RUTA_GESTOR."/favoritos");
define("RUTA_NUEVA_ENTRADA", SERVIDOR."/nueva-entrada");
define("RUTA_BORRAR_ENTRADA", SERVIDOR."/borrar-entrada");
define("RUTA_EDITAR_ENTRADA", SERVIDOR."/editar-entrada");
define("RUTA_RECUPERAR_CLAVE", SERVIDOR."/recuperar-clave");
define("RUTA_GENERAR_URL_SECRETA", SERVIDOR."/generar-url-secreta");
define("RUTA_PRUEBA_MAIL", SERVIDOR."/mail");
define("RUTA_RECUPERACION_CLAVE", SERVIDOR."/recuperacion-clave");
define("RUTA_BUSCAR", SERVIDOR."/buscar");
define("RUTA_PERFIL", SERVIDOR."/perfil");
define("RUTA_NOSOTROS", SERVIDOR."/nosotros");
define("RUTA_PRODUCTOS", SERVIDOR."/productos");
define("RUTA_AUTORES", SERVIDOR."/#");

//recursos
define("RUTA_CSS", SERVIDOR . "/css/");
define("RUTA_JS", SERVIDOR . "/js/");
define("DIRECTORIO_RAIZ", realpath(__DIR__."/.."));
?>