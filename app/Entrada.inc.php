<?php

class Entrada {

    private $id;
    private $autor_id;
    private $url;
    private $titulo;
    private $texto;
    private $fecha;
    private $activa;

    public function __construct($id, $autor_id, $url, $titulo, $texto, $fecha, $activa) {
        $this -> id = $id;
        $this -> autor_id = $autor_id;
        $this -> url = $url;
        $this -> titulo = $titulo;
        $this -> texto = $texto;
        $this -> fecha = $fecha;
        $this -> activa = $activa;
    }

/*getters*/
/*nos permiten recuperar variables de una clase*/
    
    public function obtener_id(){
        return $this -> id;
    }

    public function obtener_autor_id(){
        return $this -> autor_id;
    }
    
    public function obtener_url(){
        return $this -> url;
    }
    
    public function obtener_titulo(){
        return $this -> titulo;
    }

    public function obtener_texto(){
        return $this -> texto;
    }
    
    public function obtener_fecha(){
        return $this -> fecha;
    }

    public function esta_activa(){
        return $this -> activa;
    }
    
/*Setters*/
/*los setters sirven para cambiar valores en nuestra base de datos*/    
    
    public function cambiar_url($url) {
        $this -> url = $url;
    }
    
    public function cambiar_titulo($titulo) {
        $this -> titulo = $titulo;
    }
    
    public function cambiar_texto($texto) {
        $this -> texto = $texto;
    }
    
    public function cambiar_activa($activa) {
        $this -> activa = $activa;
    }
}

?>