<?php
 
	
/*
Perfiles
	A - administrador - puede ingresar personal y productos
	E - empleado - puede ingresar productos
	C - cliente - solo puede ver los productos
*/		


	/* 
	Función que verifica que la función/página requerida sea valida para el perfil logueado 
	1 - personas
	2 - productos
	3 - ver
	*/
	function perfil_valido($opcion) {
	global $perfil;
		switch($opcion){
			case 1: 
				$valido=($perfil=="A")? true:false;
				break;
			case 2: 
				$valido=($perfil=="A" || $perfil=="E")? true:false;
				break;	
			case 3: 
				$valido=true;
				break;
			default:
				$valido=false;
		}
		
		return $valido;
		
	}


	#genera titulo
	function generar_tit(&$tit) {
		$tit = '<a class="container col d-flex align-items-center justify-content-around" href="index.php" title="logo de Trabajo Final">
					<img class="logo d-inline-block align-top" src="images/Logo.png" alt="logo de la Rosa">
					<h3 class="texto-rosa letra-lobster"> Tienda La Rosa de Guadalupe</h3>
				</a>
					';
	}

	
	#genera barra superior
	function generar_barra() {
	global $user;
	
		if ($user=="") {
			$links = "<a href='#' title='crear una cuenta de usuario' class='texto-salmon letra-lobster'> Registrarse</a> &nbsp;".
				     "<a href='login.php' title='iniciar sesion' class='texto-salmon letra-lobster'> Login</a>";
		} else {
			$links = "
					<span>{$_SESSION['nombre']} </span> &nbsp;".
					 "<a href='cerrar_sesion.php' title='cerrar sessión de usuario'> X </a>";
		}
					 
		$barra_sup ="<div id='barra_superior' class='barra-superior'>
						$links
					</div> ";
					
		return  $barra_sup;
	}
	

	# genera el menu principal y selecciona el item indicado
	# menu: 1,personas - 2, cargos -  3,consultas
	function generar_menu(&$menu_ppal,$sel) {
	global $menu1, $perfil;
		
		$menu="";
		
		
		$clase1 = ($sel==2)? "menuactual":"";
		
		if ($perfil=="A" || $perfil=="E") {
			
			$menu.= "<li class='sin-decoracion mr-1 btn fondo-rosa mt-2'>".
					"<a href='productos_listado.php' title='Administración de Productos' class='text-white'>". 
					"	ABM de productos". 
					"</a>".
					"</li>";
		}	
		
	
		$clase1 = ($sel==3)? "menuactual":"";
	
		$menu.= " <li class='sin-decoracion ml-1 btn fondo-rosa mt-2' >".
				"	<a href='productos.php' title='Consulta productos' class='text-white'>".  
				"		 Consultar Productos ". 
				"  	</a>".
				"</li>";

  
		$menu_ppal = "<ul id='menuppal'>$menu</ul>";  
			
	}
	
?>