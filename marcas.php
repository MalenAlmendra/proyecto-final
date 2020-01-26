<!DOCTYPE html>
<html lang="es">
<?php
require_once 'inc/conexion.php';
require_once('inc/sesion.php');
include("encabezado.php"); 

generar_tit($titulo);
generar_menu($menu_ppal,2);

#datos cargos
if (!perfil_valido(2)) {
	header("location:index.php");
}

?>
<head>
	<meta charset="utf-8">

	<title>Sitio Trabajo Final</title>
	
	<meta name="description" content="breve descripcion del sitio">
	<meta name="keywords" content="palabraclave1,palabraclave2,palabraclave3">
	<meta name="robots" content="index,nofollow" >
	
	<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon"/>
	<link rel="stylesheet" href="css/estilos.css">
	
</head>
 
<body>
	
	<header>
		<?php echo generar_barra(); ?>
		
		<div id="encab">
			<?=$titulo?>
			<?=$menu_ppal?>
		</div>
	
	</header>
	
	<main class="container" id="cuerpo">
		
		<h2> Ejemplo de ABM de Marcas </h2>
		
		<a href="cargo_abm.php?tipo=A">&raquo;Ingresar una marca</a>

		<h3>Listado de Marcas</h3>
		<div class="card" style="width: 18rem;">
  			<img class="card-img-top" src="images/Marcas/47-Street.png" alt="">
  			<div class="card-body">
  			  <h5 class="card-title">47 Street</h5>
  			  <a href="#" class="btn btn-secondary">Eliminar</a>
  			</div>
		</div>
		<div class="card" style="width: 18rem;">
  			<img class="card-img-top" src="images/Marcas/Adidas.png" alt="">
  			<div class="card-body">
  			  <h5 class="card-title">Adidas</h5>
  			  <a href="#" class="btn btn-secondary">Eliminar</a>
  			</div>
		</div>
		<div class="card" style="width: 18rem;">
  			<img class="card-img-top" src="images/Marcas/Fila.png" alt="">
  			<div class="card-body">
  			  <h5 class="card-title">Fila</h5>
  			  <a href="#" class="btn btn-secondary">Eliminar</a>
  			</div>
		</div>
		<div class="card" style="width: 18rem;">
  			<img class="card-img-top" src="images/Marcas/La-Leopolda.jpg" alt="">
  			<div class="card-body">
  			  <h5 class="card-title">La Leopolda</h5>
  			  <a href="#" class="btn btn-secondary">Eliminar</a>
  			</div>
		</div>
		<div class="card" style="width: 18rem;">
  			<img class="card-img-top" src="images/Marcas/Levis.png" alt="">
  			<div class="card-body">
  			  <h5 class="card-title">Levi's</h5>
  			  <a href="#" class="btn btn-secondary">Eliminar</a>
  			</div>
		</div>
		<div class="card" style="width: 18rem;">
  			<img class="card-img-top" src="images/Marcas/Moleca.png" alt="">
  			<div class="card-body">
  			  <h5 class="card-title">Moleca</h5>
  			  <a href="#" class="btn btn-secondary">Eliminar</a>
  			</div>
		</div>
		<div class="card" style="width: 18rem;">
  			<img class="card-img-top" src="images/Marcas/Muaa.jpg" alt="">
  			<div class="card-body">
  			  <h5 class="card-title">Muaa</h5>
  			  <a href="#" class="btn btn-secondary">Eliminar</a>
  			</div>
		</div>
		<div class="card" style="width: 18rem;">
  			<img class="card-img-top" src="images/Marcas/Nike.png" alt="">
  			<div class="card-body">
  			  <h5 class="card-title">Nike</h5>
  			  <a href="#" class="btn btn-secondary">Eliminar</a>
  			</div>
		</div>
		<div class="card" style="width: 18rem;">
  			<img class="card-img-top" src="images/Marcas/Paruolo.jpg" alt="">
  			<div class="card-body">
  			  <h5 class="card-title">Paruolo</h5>
  			  <a href="#" class="btn btn-secondary">Eliminar</a>
  			</div>
		</div>
		<div class="card" style="width: 18rem;">
  			<img class="card-img-top" src="images/Marcas/Prune.png" alt="">
  			<div class="card-body">
  			  <h5 class="card-title">Prüne</h5>
  			  <a href="#" class="btn btn-secondary">Eliminar</a>
  			</div>
		</div>
		<div class="card" style="width: 18rem;">
  			<img class="card-img-top" src="images/Marcas/Punto1.jpg" alt="">
  			<div class="card-body">
  			  <h5 class="card-title">Punto1</h5>
  			  <a href="#" class="btn btn-secondary">Eliminar</a>
  			</div>
		</div>
		<div class="card" style="width: 18rem;">
  			<img class="card-img-top" src="images/Marcas/Ray-Ban.png" alt="">
  			<div class="card-body">
  			  <h5 class="card-title">Ray-Ban</h5>
  			  <a href="#" class="btn btn-secondary">Eliminar</a>
  			</div>
		</div>
		<div class="card" style="width: 18rem;">
  			<img class="card-img-top" src="images/Marcas/Simones.png" alt="">
  			<div class="card-body">
  			  <h5 class="card-title">Simones</h5>
  			  <a href="#" class="btn btn-secondary">Eliminar</a>
  			</div>
		</div>
		<div class="card" style="width: 18rem;">
  			<img class="card-img-top" src="images/Marcas/Taverniti.png" alt="">
  			<div class="card-body">
  			  <h5 class="card-title">Taverniti</h5>
  			  <a href="#" class="btn btn-secondary">Eliminar</a>
  			</div>
		</div>
		<div class="card" style="width: 18rem;">
  			<img class="card-img-top" src="images/Marcas/Valkur.jpg" alt="">
  			<div class="card-body">
  			  <h5 class="card-title">Valkur</h5>
  			  <a href="#" class="btn btn-secondary">Eliminar</a>
  			</div>
		</div>
		<div class="card" style="width: 18rem;">
  			<img class="card-img-top" src="images/Marcas/Viamo.png" alt="">
  			<div class="card-body">
  			  <h5 class="card-title">Viamo</h5>
  			  <a href="#" class="btn btn-secondary">Eliminar</a>
  			</div>
		</div>
	</main>	
	
	<footer>
	</footer>
	
</body>
</html>