<?php  
	
	require 'ListaUsuarios.php';

	if (isset($_REQUEST['usuario'],$_GET['contra'])) {
		
		//datos fichero
		$path = "datos/";
		$fichUsu = "usuarios.txt";

		$usu = $_REQUEST['usuario'];
		$pass = $_REQUEST['usuario'];

		$listaUsu= new ListaUsuarios($path,$fichUsu);

		if($listaUsu->login($usu,$pass)){
			echo "estas dentro";
		}else{
			echo "te quedaste fuera";
		}

	}else{
		echo "Error en el login";
	}