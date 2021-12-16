<?php
	
if (isset($_GET["nombre"],$_GET["desc"])) {
	registramosCategoria();
}else{
	echo "-1";
}

function registramosCategoria(){
	
	$nombre = $_GET['nombre'];
	$descri = $_GET["desc"];
	$fc = fopen($dirConf.$fichConf,"r");

	$conexBD = [];

	while(!feof($fc)){ //feof => File - End Of File
		$linea = fgets($fc); //fgets => File - Get String
		$datosLinea = explode("=",$linea);
		$conexBD[$datosLinea[0]]=trim($datosLinea[1]);
	}

	fclose($fc);

try {
	    //construir un objeto de la clase PDO para conectar a la base de datos		
	    $conn = new PDO("mysql:host=".$conexBD["servidor"].";dbname=".$conexBD["basededatos"], $conexBD["usuario"], $conexBD["pass"]);

 		//fijar el atributo MODO de ERROR en el valor EXCEPTION
  		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	} catch(PDOException $e) {

		error_log("Error en la insercion: " . $e->getMessage());

		echo json_encode($resp);
	}
}
	