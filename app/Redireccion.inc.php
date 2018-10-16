<?php
class Redireccion {
    public static function redirigir($url){
        //url: unique resource location
        header('location: ' . $url, true, 301); //el código de servidor 301 indica redirección
        exit();
    }
}
?>