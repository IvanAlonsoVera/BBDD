<?php
	require "dentro.php";

	session_unset();
	session_destroy();
	header("Location: http://basededatos.turi/registrousuariosajaxBD/")
?>