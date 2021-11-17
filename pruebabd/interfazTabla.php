<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	<h1>Interfaz con Tabla</h1>
	<hr>
	<form action="insert.php" method="GET">
		valor col 1<input type="text" name="col1"><br>
		valor col 2<input type="text" name="col2"><br>
		valor col 3<input type="text" name="col3"><br>
		<input type="submit">
	</form><hr>
	<?php
	
		$servername = "localhost";
		$username = "prueba";
		$password = "prueba";
		$basedatos = "prueba";

		try {
			//construir un objeto de la clase PDO para conectar a la base de datos
			$conn = new PDO("mysql:host=$servername;dbname=$basedatos", $username, $password);

			//fijar el atributo MODO de ERROR en el valor EXCEPTION
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			//como hacer jn select a la base de datos
			//preparamos la sentencia sql
			$stmt = $conn->prepare("SELECT ID, columna1, columna2, columna3 FROM tabladatos");

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

					echo "<td>";
	  				echo '<a href="http://basededatos.ang/pruebabd/borrar.php?id='.$salida[$i]["ID"].'">borrar</a>';
	  				echo "</td>";
	  				echo "<td>";
	  				echo '<a href="http://basededatos.ang/pruebabd/selectundato.php?id='.$salida[$i]["ID"].'">Modificar</a>';
	  				echo "</td>";
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