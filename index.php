<!DOCTYPE html>
<html lang="es">
<?php
require_once 'inc/conexion.php';  #crea la conexión a la BD
require_once('inc/sesion.php');
include("encabezado.php"); 

generar_tit($titulo);
generar_menu($menu_ppal,0);
?>
<head>
	<meta charset="utf-8">

	<title>Sitio Trabajo Final</title>	

	<meta name="description" content="breve descripcion del sitio">
	<meta name="keywords" content="palabraclave1,palabraclave2,palabraclave3">
	<meta name="robots" content="index,nofollow" >

	<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon"/>
	
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/styles.css">
	
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="js/jquery-3.3.1.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js" ></script>
	

</head>

<body>

	<header>
		<div id="encab" class="navbar d-flex flex-wrap fondo-blanco">
			<div class="d-flex col-6"><?=$titulo?></div>
			<div class="col-6 d-flex justify-content-end"><?php echo generar_barra(); ?></div>
			<div class="col-12 d-flex justify-content-center navbar navbar-light"><?=$menu_ppal?></div>
		</div>
	
	</header>
	
	<main id="cuerpo">
		<div class="container">		
			<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
				<ol class="carousel-indicators">
					<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
					<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
					<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
				</ol>
				
				<div class="carousel-inner">
					<div class="carousel-item active">
						<img class="d-block w-100" src="images/slider/1.jpg" alt="First slide">
					</div>
					<div class="carousel-item">
						<img class="d-block w-100" src="images/slider/2.jpg" alt="Second slide">
					</div>
					<div class="carousel-item">
						<img class="d-block w-100" src="images/slider/3.jpg" alt="Third slide">
					</div>
				</div>
				<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>

			
			<br class="clear">
				

		</div>		
	</main>	
	
	<footer>
	</footer>
	
</body>
</html>