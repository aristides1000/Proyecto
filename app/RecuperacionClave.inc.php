<?php

class RecuperacionClave {
    
    private $id;
    private $usuario_id;
    private $url_secreta;
    private $fecha;
    
    public function __construct($id, $usuario_id, $url_secreta, $fecha) {
        $this->id = $id;
        $this->usuario_id = $usuario_id;
        $this->url_secreta = $url_secreta;
        $this->fecha = $fecha;
        
    }
    
}

?>