<!DOCTYPE html>
<html lang="es">
<?php
require_once 'inc/conexion.php';  #crea la conexión a la BD
require_once('inc/sesion.php');
include("encabezado.php"); 

generar_tit($titulo);
generar_menu($menu_ppal,0);

#datos cargos
if (!perfil_valido(2)) {
	header("location:index.php");
}

	$sql = "SELECT *
			FROM productos AS p 
			INNER JOIN productos_detalle AS pd ON p.prod_cod=pd.producto_codigo 
			INNER JOIN marcas as m ON m.marca_codigo=p.prod_marca
			ORDER BY m.marca_codigo";
	$rs = $db->query($sql);
	
	$lista="<table style='width:80%;' >
				<tr>
					<th style='text-align:center;'>Marca</th>
					<th style='text-align:center;'>Producto</th>
					<th style='text-align:center;'>Precio</th>
					<th style='text-align:center;'>Stock</th>
				</tr>";
	
	if (!$rs) {
		print_r($db->errorInfo());  #CUIDADO - mensajes de error en desarrollo  - en producción se emite mensaje amigable y que no muestre información del sistema
	} else {
		$marca_actual="";
		$total_stock=0;
		$total_marca=0;
		foreach($rs as $fila) {

			$producto=utf8_encode($fila['prod_nomb']);
			$marca=utf8_encode($fila['marca_desc']);
			$precio=$fila['prod_precio_unit'];
			$stock=$fila['stock'];

					
			if($marca_actual=="" || $marca_actual<>$marca)
			{
				if($marca_actual!="") {
				$lista.="<tr>
							<td colspan='4' class='texto-rosa' style='text-align:right;'> <strong> Total stock: ".$total_marca."</strong></td>
						</tr>";
				}
				$lista.="<tr>
							<td colspan='4' class='texto-rosa'> <strong>".$marca."</strong></td>
						</tr>";
				$marca_actual=$marca;
				$total_marca=0;
			}		

			$total_marca+=$stock;
			$total_stock+=$stock;
			$lista.="<tr>
					 <td style='text-align:center;'>".$marca."</td> 
					 <td style='text-align:center;'>".$producto."</td>
					 <td style='text-align:center;'>".$precio."</td>
					 <td style='text-align:center;'>".$stock."</td>
					</tr>";
		}
		$lista.="<tr>	<td colspan='4' class='texto-rosa' style='text-align:right;'> <strong> Total stock: ".$total_marca."</strong></td>
						</tr>";
		$lista.="<tr>	<td colspan='4' class='texto-rosa' style='text-align:right;'> <strong> Total stock: ".$total_stock."</strong></td>
						</tr>";
		
		$lista.="</table>";
	}
	$rs=null;
    $db=null;


$lista.="</table>";

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
			<div class="col-12 d-flex justify-content-center"><?=$menu_ppal?></div>
		</div>
	
	</header>
	
	<main id="cuerpo">
		<div class="container-fluid d-flex justify-content-center ">
			
		<?=$lista?>
		</div>		
	</main>	
	
	<footer>
	</footer>
	
</body>
</html>