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
		$id = $_GET['id'];

		try {
			//construir un objeto de la clase PDO para conectar a la base de datos
			$conn = new PDO("mysql:host=$servername;dbname=$basedatos", $username, $password);

			//fijar el atributo MODO de ERROR en el valor EXCEPTION
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			echo "Conectados";

			//como hacer jn select a la base de datos
			//preparamos la sentencia sql
			$stmt = $conn->prepare("SELECT ID, columna1, columna2, columna3 FROM tabladatos");

			//la ejecutamos
  			$stmt->execute();

  			//metemos en un array asociativo la respuesta
  			$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

  			//los resultados
  			$salida = $stmt->fetchAll();

  			echo '<form action="update.php" metod="get">';
  				echo '<input type="hidden" name="id" value="'.$id.'"><br>';
  				echo 'columna1<input type="text" name="col1" value="'.$salida[0]["columna1"].'"><br>';
	  			echo 'columna2<input type="text" name="col2" value="'.$salida[0]["columna2"].'"><br>';
	  			echo 'columna3<input type="text" name="col3" value="'.$salida[0]["columna3"].'"><br>';
	  			echo '<input type="submit">';
  			echo "</form>";

		} catch(PDOException $e) {
		  echo "Connection failed: " . $e->getMessage();
		  echo "fallo";
		}

		//DESCONEXION DE LA BBDD
		$conn=null;
		echo "<br>DESConectados";

	?>
</body>
</html>