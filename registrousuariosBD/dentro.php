<?php
	session_start();

	if(!isset($_SESSION['dentro'])){
		header("location: errorlogin.html");
	}
?>