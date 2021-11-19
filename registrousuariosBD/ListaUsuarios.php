<?php
	class ListaUsuarios{
		//path y nombre del fichero de usuarios
		private $path;
		private $fichUsu;

		//array asociativo con la informacion de cada usuario
		private $listaUsu;

		function __construct($p,$f){
			//rellenar atributos con parametros
			$this->path=$p;
			$this->fichUsu=$f;

			if (file_exists($p.$f)) {

				//abre el fichero
				$fu = fopen($p.$f,"r");

				//lee el contenido hasta el final
				while(!feof($fu)){
					//lee el contenido hasta el final del ficehro
					$linea = fgets($fu);

					$linea = substr($linea,0,strlen($linea)-1);

					//si la linea esta vacia no se hace nada
					if(strlen($linea)!=0){
						//se divide la linea por el ";" y se genera un array indexado
						$datosUsu = explode(";",$linea);
						//se añade el usuario al array asociativo
						//la clave "usu" y un array con todos los datos
						$this->listaUsu[$datosUsu[3]] = $datosUsu;
					}
				}
				//cerrar el fichero
				fclose($fu);
			}

		}

		function noExisteUsuario($usu){
			return !isset($this->listaUsu[$usu]);
		}
		function login($u,$p){

			//Se comprueba si el usuario esta en la lista
			//que se ha creado el fichero
			if(isset($this->listaUsu[$u])){
							
				//el usuario existe
				//comprobamos la contraseña
				if($this->listaUsu[$u][4]==$p){
					
					return true;
				}else{
					
					return false;
				}

			}else{
				//el usuario no existe
				//se devuelve false
				return false;
			}
		}

	}