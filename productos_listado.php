<!DOCTYPE html>
<html lang="es">
<?php
	require_once 'inc/conexion.php';
	require_once('inc/sesion.php');
	include("encabezado.php");

	generar_tit($titulo);
	generar_menu($menu_ppal, 2);

	#datos cargos
	if (!perfil_valido(2)) {
		header("location:index.php");
	}

	$sql = "SELECT *
				FROM productos
				ORDER BY prod_marca, prod_nomb";
	$rs = $db->query($sql);

	$lista = "";

	if (!$rs) {
		print_r($db->errorInfo());  #CUIDADO - mensajes de error en desarrollo  - en producción se emite mensaje amigable y que no muestre información del sistema
	} else {

		foreach ($rs as $fila) {

			$producto = $fila['prod_cod'];
			$modificarProducto = " <a href='producto_abm.php?tipo=M&pers_id={$fila['prod_desc']}'> Agregar detalle de producto</a> ";

			$nombre = utf8_encode($fila['prod_nomb']);

			$lista .= "<li>" .
				"  <strong>$producto</strong>" .
				"  $nombre ____ " .
				"  <a href='producto_abm.php?tipo=M&pers_id={$fila['prod_cod']}'>Modificar Producto</a> | " .
				"  <a href='producto_borrar.php' onclick='javascript:borrar({$fila['prod_cod']});'>Baja</a> | " .
				$modificarProducto .
				"</li>";
		}
	}
	$rs = null;
	$db = null;

?>

<head>
	<meta charset="utf-8">

	<title>Sitio Trabajo Final</title>

	<meta name="description" content="breve descripcion del sitio">
	<meta name="keywords" content="palabraclave1,palabraclave2,palabraclave3">
	<meta name="robots" content="index,nofollow">

	<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/styles.css">

	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="js/jquery-3.3.1.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>

	<!-- Consultas AJAX -->
	<script type="text/javascript">
		function ajax_conn(params, url) {
			var ajax_url;

			/*
				Obtene una instancia del objeto XMLHttpRequest con el que JavaScript puede comunicarse con el servidor 
				de forma asíncrona intercambiando datos entre el cliente y el servidor sin interferir en el comportamiento actual de la página. 
			*/
			if (window.XMLHttpRequest) {
				conn = new XMLHttpRequest();
			} else if (window.ActiveXObject) { // ie 6
				conn = new ActiveXObject("Microsoft.XMLHTTP");
			}


			conn.onreadystatechange = respuesta;
			/*
				Preparar la funcion de respuesta
				cuando exista un cambio de estado se llama a la funcion respuesta (para que maneja la respuesta recibida)
				la URL solicitada podría devolver HTML, JavaSript, CSS, texto plano, imágenes, XML, JSON, etc.
			*/

			ajax_url = url + '?' + params;

			conn.open("GET", ajax_url, true);
			/*
			método XMLHttpRequest.open. 
			- método: el método HTTP a utilizar en la solicitud Ajax. GET o POST.
			url: dirección URL que se va a solicitar, la URL a la que se va enviar la solicitud.
			async: true (asíncrono) o false (síncrono).  -- asíncronico: no se espera la respuesta del servidor - sincronico: se espera la repuesta del servidor
			*/

			conn.send(); // Enviamos la solicitud - por metodo GET

			/* Metodo POST  
			conn.open('POST', url);
						// Si se utiliza el método POST, la solicitud necesita ser enviada como si fuera un formulario
			conn.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
			conn.send(parametros);
			*/

		}



		function respuesta() {
			/*
				El valor de readyState 4 indica que la solicitud Ajax ha concluido 
				y la respuesta desde el servidor está disponible en XMLHttpRequest.responseText
			*/
			if (conn.readyState == 4) { // estado de conexión es completo - response.success
				if (conn.status == 200) { // estado devuelto por el HTTP fue "OK" 
					// conn.responseText - repuesta del servidor
					if (conn.responseText == 1) {
						location.reload(); // se borro un producto - se refresca la pag
					} else {
						alert("El producto no se pudo borrar porque tiene una marca asociada");
					}
				}
			}
		}

		function borrar(id) {
			var errores = 0;

			// validar ID

			// armar parametros a enviar - forma param1=valo1&param2=valor2 ...
			params = "prod_cod=" + id;
			// archivo,  al que se le solcita una tarea  (URL que se va a solicitar via Ajax)
			url = "producto_borrar.php";

			if (errores == 0) {
				if (confirm('¿Está seguro que quiere borrar el producto?')) {
					ajax_conn(params, url);
				}
			}
		}
	</script>

</head>

<body>

	<header>
		<div id="encab" class="navbar d-flex flex-wrap fondo-blanco">
			<div class="d-flex col-6"><?= $titulo ?></div>
			<div class="col-6 d-flex justify-content-end"><?php echo generar_barra(); ?></div>
			<div class="col-12 d-flex justify-content-center"><?= $menu_ppal ?></div>
		</div>

	</header>

	<main class="container" id="cuerpo">

		<h2> ABM de Producto </h2>

		<a class="btn btn-primary" href="producto_abm.php?tipo=A">Ingresar un producto</a>
		<a class="btn btn-primary" href="producto_tabla.php">Agrupar por Marca</a>

		<h3>Listado de Productos</h3>
		<?= $lista ?>
	</main>

	<footer>
	</footer>

</body>

</html>