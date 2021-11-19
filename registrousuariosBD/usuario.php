<?php  
	class Usuario{
		private $nombre;
		private $apellidos;
		private $correo;
		private $usu;
		private $pass;

		function __construct($n,$a,$e,$u,$p){
			$this->nombre = $n;
			$this->apellidos = $a;
			$this->correo = $e;
			$this->usu = $u;
			$this->pass = $p;

		}
		function creeLineaFichero(){
			$sal= $this->nombre.";".$this->apellidos.";".$this->correo.";".$this->usu.";".$this->pass;
			return $sal;
		}
		function inserta(){

			$cript = password_hash($this->pass,PASSWORD_DEFAULT);

			$sal = "INSERT INTO usuarios(nombre,apellidos,user,pass,correo) VALUES(
			'".$this->nombre."',
			'".$this->apellidos."',
			'".$this->usu."',
			'".$cript."',
			'".$this->correo."')";
			return $sal;
		}

		function getUsu(){
			return $this->usu;
		}

	}