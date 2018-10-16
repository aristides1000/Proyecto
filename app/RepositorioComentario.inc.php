<?php

include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/Comentario.inc.php';

class RepositorioComentario {

    public static function insertar_comentario($conexion, $comentario) {
        $comentario_insertado = false;

        if (isset($conexion)) {
            try {
                $sql = "INSERT INTO comentarios(autor_id, entrada_id, titulo, texto, fecha) VALUES(:autor_id, :entrada_id, :titulo, :texto, NOW())";
                /* Esta sección de código da error por la Actualización de PHP 7 */
                /*
                  $sentencia = $conexion->prepare($sql);

                  $sentencia->bindParam(':autor_id', $comentario -> obtener_autor_id(), PDO::PARAM_STR);
                  $sentencia->bindParam(':entrada_id', $comentario -> obtener_entrada_id(), PDO::PARAM_STR);
                  $sentencia->bindParam(':titulo', $comentario -> obtener_titulo(), PDO::PARAM_STR);
                  $sentencia->bindParam(':texto', $comentario -> obtener_texto(), PDO::PARAM_STR);
                 */
                /* inicio versión de código que pasa variables en lugar de funciones que evita errores en PHP */

                $autor_idtemp = $comentario->obtener_autor_id();
                $entrada_idtemp = $comentario->obtener_entrada_id();
                $titulotemp = $comentario->obtener_titulo();
                $textotemp = $comentario->obtener_texto();

                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':autor_id', $autor_idtemp, PDO::PARAM_STR);
                $sentencia->bindParam(':entrada_id', $entrada_idtemp, PDO::PARAM_STR);
                $sentencia->bindParam(':titulo', $titulotemp, PDO::PARAM_STR);
                $sentencia->bindParam(':texto', $textotemp, PDO::PARAM_STR);

                /* fin de código de la nueva versión */

                $comentario_insertado = $sentencia->execute();
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }
        return $comentario_insertado;
    }

    public static function obtener_comentarios($conexion, $entrada_id) {
        $comentarios = array();

        if (isset($conexion)) {
            try {
                include_once 'Comentario.inc.php';

                $sql = "SELECT * FROM comentarios WHERE entrada_id = :entrada_id";

                
                /* Esta sección de código da error por la Actualización de PHP 7 */
                
                $sentencia = $conexion -> prepare($sql);
                $sentencia -> bindParam(':entrada_id', $entrada_id, PDO::PARAM_STR);
                
                /* inicio versión de código que pasa variables en lugar de funciones que evita errores en PHP */
                /*
                $entrada_idtemp = $comentario->obtener_entrada_id();
                
                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':entrada_id', $entrada_idtemp, PDO::PARAM_STR);
                */
                /* fin de código de la nueva versión */
                $sentencia->execute();

                $resultado = $sentencia -> fetchAll();

                if (count($resultado)) {
                    foreach ($resultado as $fila) {
                        $comentarios[] = new Comentario($fila['id'], $fila['autor_id'], $fila['entrada_id'], $fila['titulo'], $fila['texto'], $fila['fecha']);
                    }
                }
            } catch (PDOException $ex) {
                print "ERROR" . $ex -> getMessage();
            }
        }
        
        return $comentarios;
    }
    
    public static function contar_comentarios_usuario($conexion, $id_usuario) {
       $total_comentarios = '0';
       
       if (isset($conexion)) {
            try {
                $sql = "SELECT COUNT(*) as total_comentarios FROM comentarios WHERE autor_id = :autor_id";
                /* Pendiente que aquí comienza el error */
                /* Esta sección de código da error por la Actualización de PHP 7 */
                $sentencia = $conexion->prepare($sql);

                $sentencia->bindParam(':autor_id', $id_usuario, PDO::PARAM_STR);
                
                $sentencia->execute();

                $resultado = $sentencia->fetch();

                if (!empty($resultado)) {
                    $total_comentarios = $resultado['total_comentarios'];
                }
            } catch (PDOException $ex) {
                print 'ERROR ' . $ex->getMessage();
            }
        }

        return $total_comentarios;
    }
}

?>