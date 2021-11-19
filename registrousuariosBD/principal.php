<?php
	require "dentro.php";
?>

<!DOCTYPE html>
<html>
<head>f
	<meta charset="utf-8">
	<title></title>
	<script type="text/javascript" src="js/temas.js"></script>
</head>
<body>
<?php
	echo $_SESSION["nombre"];
?>

	<a href="salir.php">Salir</a>
	<h3>Estas dentro</h3>
	<form>
		Título:<input type="text" id="titulo"><br>
		Texto: <textarea id="texto"></textarea>
		<button type="button" onclick="registraTema()">Enviar tema</button>
	</form>
	<hr>
<?php
	try{
	  //construir un objeto de la clase PDO para conectar a la base de datos	
	  $conn = new PDO("mysql:host=".$_SESSION["servidor"].";dbname=".$_SESSION["basededatos"], $_SESSION["usuario"], $_SESSION["pass"]);
	  
	  //fijar el atributo MODO de ERROR en el valor EXCEPTION
	  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	  //Pasos para hacer un SELECT de la base de datos
	  //preparamos la consulta
	  $stmt = $conn->prepare("SELECT * FROM temas");
  
  	  //ejecutamos la consulta
  	  $stmt->execute();


  	  //modo de resultados en array asociativo
  	  $stmt->setFetchMode(PDO::FETCH_ASSOC);

  	  //los resultados
  	  $salida = $stmt->fetchAll();

  	  echo '<table border=2>';

	  echo "<tr><td>Título</td><td>Texto</td><td>borrar</td></tr>";

  	  for ($i=0; $i < count($salida); $i++) { 
  	  	echo "<tr>";

		echo "<td>".$salida[$i]["titulo"]."</td>";
		echo "<td>".$salida[$i]["texto"]."</td>";
		if ($salida[$i]["id_usuario"] == $_SESSION['id']) {
			echo '<td><a href=borraTema.php?id='.$salida[$i]["id"].">borrar</a></td>";
		}else{
			echo '<td></td>';
		}


  	  	echo "</tr>";
  	  }

  	  echo "</table>";


	} catch(PDOException $e) {
	  error_log("Error en la conexion: " . $e->getMessage());
	}

	//deconectar de la BD
	$conn = null;

?>	
</body>
</html>
