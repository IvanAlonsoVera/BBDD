<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	<h1>Salida de un Sect</h1>
	<?php
	
		$numero = $_GET["numero"];
		$servername = "localhost";
		$username = "prueba";
		$password = "prueba";
		$basedatos = "prueba";

		try {
			//construir un objeto de la clase PDO para conectar a la base de datos
			$conn = new PDO("mysql:host=$servername;dbname=$basedatos", $username, $password);

			//fijar el atributo MODO de ERROR en el valor EXCEPTION
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			echo "Conectados";

			//como hacer jn select a la base de datos
			//preparamos la sentencia sql
			$stmt = $conn->prepare("SELECT id, columna1, columna2, columna3 FROM tabladatos WHERE Columna3<".$numero);

			//la ejecutamos
  			$stmt->execute();

  			//metemos en un array asociativo la respuesta
  			$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

  			//los resultados
  			$salida = $stmt->fetchAll();

  			echo "<table border=1>";
  			echo "<th>ID</th><th>Columna1</th><th>Columna2</th><th>Columna3</th>";
	  			for ($i=0; $i < count($salida); $i++) { 
	  				echo "<tr>";
		  				foreach ($salida[$i] as $clave) {
							echo "<td>".$clave."</td>";
						}
					echo "</tr>";
	  			}
			echo "</table>";

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