<?php
	require "dentro.php";
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<script type="text/javascript" src="js/temas.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>	
	<style type="text/css" href="css/temas.css"></style>

	<script type="text/javascript" src="js/categorias.js"></script>
</head>
<body>
	<div class="container">

		<!-- titulo -->
		<div class="row">
			<div class="col-3"></div>
			<div class="col-6">
				<h3 class="display-3 text-center">Categorias</h3>
			</div>
			<div class="col-3">
				<?php
					echo $_SESSION["nombre"];
				?>
		  		<a href="salir.php" class="text-white">
		  			<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="black" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
					  <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
					  <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
					</svg>
		  		</a>
			</div>
		</div>

		<!-- cuerpo -->
		<div class="row">
			<div class="col-3">
			</div>
			<div class="col-6">
				<table class="table table-bordered table-sm table-striped">
					<tbody id="tabCat">

					<!--Esto es lo que se tiene que generar desde PHP-->
					<tr onclick="location.href='temas.php?cate=1'"><td>Categoria1 <span class='text-danger'>añlsdjfklsdjf</span></td></tr><tr onclick="location.href='temas.php?cate=2'"><td>Categoria2 <span class='text-danger'>añlsdjfklsdjf</span></td></tr>					
					</tbody>
				</table>
			</div>
			<div class="col-3">
				<button class="btn btn-secondary mb-3" data-bs-toggle="collapse" data-bs-target="#divFormCat">Crear categoria</button>
				<div class="collapse" id="divFormCat">
					<label for="tituloCat" class="form-label">Título</label><br>
					<input type="text" id="tituloCat" class="form-control"><br>
					<label for="descCat" class="form-label">Descripción</label><br>
					<input type="text" id="descCat" class="form-control"><br>
					<button type="button" onclick="creaCategoria()" class="btn btn-secondary">Enviar</button>
				</div>
			</div>
		</div>

		<!-- fin del div container -->
	</div>
</body>
</html>