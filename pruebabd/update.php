<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	<h1>Salida de un Sect</h1>
	<?php
	
		$servername = "localhost";
		$username = "prueba";
		$password = "prueba";
		$basedatos = "prueba";
		$id = $_GET["id"];
		$c1 = $_GET["col1"];
		$c2 = $_GET["col2"];
		$c3 = $_GET["col3"];

		try {
			//construir un objeto de la clase PDO para conectar a la base de datos
			$conn = new PDO("mysql:host=$servername;dbname=$basedatos", $username, $password);

			//fijar el atributo MODO de ERROR en el valor EXCEPTION
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			echo "Conectados<br>";

			$sql="UPDATE `tabladatos` 
				SET `columna1` = '".$c1."', `columna2` = '".$c2."', `columna3` = '".$c3."' 
				WHERE `tabladatos`.`ID` =".$id;

			echo $sql;

			$conn->exec($sql);

		} catch(PDOException $e) {
		  echo "Error en el update: " . $e->getMessage();
		  echo "fallo";
		}

		//DESCONEXION DE LA BBDD
		$conn=null;
		echo "<br>DESConectados";

	?>
</body>
</html>