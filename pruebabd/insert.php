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
		$c1 = $_GET["col1"];
		$c2 = $_GET["col2"];
		$c3 = $_GET["col3"];

		try {
			//construir un objeto de la clase PDO para conectar a la base de datos
			$conn = new PDO("mysql:host=$servername;dbname=$basedatos", $username, $password);

			//fijar el atributo MODO de ERROR en el valor EXCEPTION
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$sql="INSERT INTO tabladatos (columna1, columna2, columna3) VALUES ('".$c1."', '".$c2."',".$c3." )";

			echo $sql;

			$conn->exec($sql);

			header('Location: http://basededatos.ang/pruebabd/interfazTabla.php');

		} catch(PDOException $e) {
		  echo "Error en la insercion: " . $e->getMessage();
		  echo "fallo";
		}

		//DESCONEXION DE LA BBDD
		$conn=null;
		echo "<br>DESConectados";

	?>
</body>
</html>