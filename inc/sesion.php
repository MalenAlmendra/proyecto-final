<?php

session_start();  #iniciar o reanuda la sesión

	
	$user = (isset($_SESSION["user"]) && !empty($_SESSION["user"]))? trim($_SESSION["user"]):""; 
	$perfil = (isset($_SESSION["perfil"]) && !empty($_SESSION["perfil"]))? trim($_SESSION["perfil"]):""; 



	if ($user=="") {
		
		# echo "sin seccion";
		# usuario invalido - si existe alguna session la destruye
		
		unset($_SESSION["user"]);
		$_SESSION = array();
		
		session_destroy();
		
	} else {
		/*
			operaciones relacionadas a la session
			por ej: 
				- cargar datos de sesión, 
				- verificar tiempo de la seccion,
				- eliminar datos de sección, luego de un determinado tiempo
				- cambiar ID de sección 
				- registrar datos de usuario logueado, etc.
		*/
		
		
	}

	
?>