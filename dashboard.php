<?php
    require_once 'inc/conexion.php';  #crea la conexión a la BD
    require_once('inc/sesion.php');
    include("encabezado.php"); 

    generar_tit($titulo);
    generar_menu($menu_ppal,0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon"/>
	
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/styles.css">
	
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="js/jquery-3.3.1.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js" ></script>


    <title>Mi Cuenta | La Rosa</title>
</head>
<body>
    <header>
		<div id="encab" class="navbar d-flex flex-wrap fondo-blanco">
			<div class="d-flex col-6"><?=$titulo?></div>
			<div class="col-6 d-flex justify-content-end"><?php echo generar_barra(); ?></div>
			<div class="col-12 d-flex justify-content-center navbar navbar-light"><?=$menu_ppal?></div>
		</div>
	</header>
</body>
</html>