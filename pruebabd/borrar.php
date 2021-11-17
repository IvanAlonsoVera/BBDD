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

		try {
			//construir un objeto de la clase PDO para conectar a la base de datos
			$conn = new PDO("mysql:host=$servername;dbname=$basedatos", $username, $password);

			//fijar el atributo MODO de ERROR en el valor EXCEPTION
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			echo "Conectados<br>";

			$sql="DELETE FROM tabladatos WHERE id=".$id;

			echo $sql;

			$conn->exec($sql);

			header('Location: http://basededatos.ang/pruebabd/interfazTabla.php');

		} catch(PDOException $e) {
		  echo "Error en la borrasion: " . $e->getMessage();
		  echo "fallo";
		}

		//DESCONEXION DE LA BBDD
		$conn=null;
		echo "<br>DESConectados";

	?>
</body>
</html>