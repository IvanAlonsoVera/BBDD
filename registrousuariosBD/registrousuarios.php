<?php 
	//los ficheros con las clases
	require 'usuario.php';

	$persona= json_decode($_POST['usu']);

	//comprueba que recibe usuario y pass
	if ($persona->usuario !="" && $persona->contrasena !="" && $persona->correo !="") {
		registrarUsuario($persona);
	}else{
		$resp=false;
		echo json_encode($resp."hola".var_dump($persona)."hola");
	}

	function registrarUsuario($p){

		$reg = new Usuario($p->nombre, $p->apellido, $p->correo, $p->usuario, $p->contrasena);

		//leer fichero de configuracion

		$dirConf="conf/";
		$fichConf="conf.dat";

		$fc = fopen($dirConf.$fichConf,"r");

		$conexBD = [];

		while (!feof($fc)) {// file end of file
			$linea = fgets($fc); //file get string
			$datosLinea = explode("=",$linea);
			$conexBD[$datosLinea[0]]=trim($datosLinea[1]);
		}

		//insertar en base de datos

		try {
			//construir un objeto de la clase PDO para conectar a la bbdd
			$conn = new PDO("mysql:host=".$conexBD["servidor"].";dbname=".$conexBD["basededatos"], $conexBD["usuario"], $conexBD["pass"]);

			$conn->setAtTribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$sql = $reg->inserta();

			$conn->exec($sql);

			$con=null;

			$resp=true;
			echo json_encode($resp);

		}catch(PDOException $e){

			error_log("Error en la inserción: " . $e->getMessage());

			$resp=false;
			echo json_encode($resp.$e->getMessage());
		}
		
		

	}

