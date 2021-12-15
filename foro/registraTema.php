<?php
	require "dentro.php";

	$tema = json_decode($_POST['tema']);

	//insertar en base de datos
	try {
	    //construir un objeto de la clase PDO para conectar a la base de datos		
	    $conn = new PDO("mysql:host=".$_SESSION["servidor"].";dbname=".$_SESSION["basededatos"], $_SESSION["usuario"], $_SESSION["pass"]);

 		//fijar el atributo MODO de ERROR en el valor EXCEPTION
  		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  		$sql = "INSERT INTO temas(titulo,texto,id_usuario,id_categoria) VALUES('".$tema[0]."','".$tema[1]."',".$_SESSION["id"].",".$tema[2].") ";
  		$conn->exec($sql);


  		//recuperar el id de la categoria creada

		$stmt = $conn->prepare('SELECT id FROM categorias WHERE nombre="'.$cat[0].'"');
		//ejecutamos la consulta
		$stmt->execute();
		//modo de resultados en array asociativo
		$stmt->setFetchMode(PDO::FETCH_ASSOC);
	  	//los resultados
	  	$salida = $stmt->fetchAll();
	  	$salida[0]["id"];

  		$conn = null;

		$resp=$salida[0]["id"];
		echo json_encode($resp);


	} catch(PDOException $e) {

		error_log("Error en la insercion: " . $e->getMessage());

		$resp=false;
		echo json_encode($resp.$e->getMessage());
	}