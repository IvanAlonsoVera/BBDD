<?php 

	//Ficheros con la clase usuario y la clase ListaUsuario
	require 'Usuario.php';

	$per = json_decode($_POST['usuario']);


	//comprobar que se recibe el usuario y la contraseña
	//son datos obligatorios.
	if($per->usu != "" && $per->pas != "" && $per->ema != ""){
		//se han recibido los datos obligatorios
		registrarUsuario($per);
	}else{
		//no se ha recibido alguno de los datos y se informa del error
		$resp=false;
		echo json_encode($resp);
	}

	//funcion para registrar un usuario en el sistema
	function registrarUsuario($p)
	{
		//se crea el objeto "reg" que contiene los datos del usuario
		$reg = new Usuario($p->nom, $p->ape, $p->ema, $p->usu, $p->pas);


		//leer fichero de configuracion

		$dirConf="conf/";
		$fichConf="conf.dat";

		$fc = fopen($dirConf.$fichConf,"r");

		$conexBD = [];

		while(!feof($fc)){ //feof => File - End Of File
			$linea = fgets($fc); //fgets => File - Get String
			$datosLinea = explode("=",$linea);
			$conexBD[$datosLinea[0]]=trim($datosLinea[1]);
		}

		fclose($fc);

		//insertar en base de datos
		try {
		    //construir un objeto de la clase PDO para conectar a la base de datos		
		    $conn = new PDO("mysql:host=".$conexBD["servidor"].";dbname=".$conexBD["basededatos"], $conexBD["usuario"], $conexBD["pass"]);

	 		//fijar el atributo MODO de ERROR en el valor EXCEPTION
	  		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	  		$sql = $reg->inserta();

	  		$conn->exec($sql);

	  		$conn = null;

			$resp=true;
			echo json_encode($resp);


		} catch(PDOException $e) {

			error_log("Error en la insercion: " . $e->getMessage());

			$resp=false;
			echo json_encode($resp);
		}

	}
