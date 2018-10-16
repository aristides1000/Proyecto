<?php

class Usuario {
    private $id;
    private $nombre;
    private $email;
    private $password;
    private $fecha_registro;
    private $activo;

    public function __construct($id, $nombre, $email, $password, $fecha_registro, $activo) {
		$this -> id = $id;
		$this -> nombre = $nombre;
		$this -> email = $email;
		$this -> password = $password;
		$this -> fecha_registro = $fecha_registro;
		$this -> activo = $activo;
	}

/*getters*/
/*nos permiten recuperar variables de una clase*/
	public function obtener_id() {
		return $this -> id;
	}

	public function obtener_nombre() {
		return $this -> nombre;
	}

	public function obtener_email() {
		return $this -> email;
	}

	public function obtener_password() {
		return $this -> password;
	}

	public function obtener_fecha_registro() {
		return $this -> fecha_registro;
	}

	public function esta_activo() {
		return $this -> activo;
	}

/*Setters*/
/*los setters sirven para cambiar valores en nuestra base de datos*/

	public function cambiar_nombre($nombre) {
		$this -> nombre = $nombre;
	}

	public function cambiar_email($email) {
		$this -> email = $email;
	}

	public function cambiar_password($password) {
		$this -> password = $password;
	}

	public function cambiar_activo($activo) {
		$this -> activo = $activo;
	}

}

?>