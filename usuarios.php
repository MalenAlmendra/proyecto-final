<!DOCTYPE html>
<html lang="es">
<?php
require_once 'inc/conexion.php';
require_once('inc/sesion.php');
include("encabezado.php"); 

generar_tit($titulo);
generar_menu($menu_ppal,1);

#datos empleados-personas
if (!perfil_valido(1)) {
	header("location:index.php");
}



	$sql = "SELECT *
			FROM usuario
			ORDER BY usuario_perfil, usuario_nombre ";
	$rs = $db->query($sql);
	
	$lista="";
	
	if (!$rs) {
		print_r($db->errorInfo());  #CUIDADO - mensajes de error en desarrollo  - en producción se emite mensaje amigable y que no muestre información del sistema
	} else {
		
		foreach($rs as $fila) {
			
			if (is_null($fila['usuario_perfil'])) {
				$cargo="__sin cargo__ -";
				$agregarTrabajo=" <a href='personas_perfil.php?tipo=A&pers_id={$fila['usuario_id']}'> Agregar Trabajo</a> ";
			} else {
				$cargo=utf8_encode($fila['usuario_perfil']);
				$agregarTrabajo=" <a href='personas_perfil.php?tipo=M&pers_id={$fila['usuario_id']}'> Modificar Trabajo</a> ";
			}
			
			$nombre=utf8_encode($fila['usuario_nombre']);
			
			$lista.="<li>".
					"  <strong>$cargo</strong>". 
					"  $nombre ____ ".
					"  <a href='personas_abm.php?tipo=M&pers_id={$fila['usuario_id']}'>Modifica</a> | ".
					"  <a href='#' onclick='javascript:borrar({$fila['usuario_id']});'>Baja</a> | ".
					"  $agregarTrabajo ".
					"</li>";
		}
		
	}

	$rs=null;
    $db=null;
	
?>
<head>
	<meta charset="utf-8">

	<title>Sitio Trabajo Final</title>
	
	<meta name="description" content="breve descripcion del sitio">
	<meta name="keywords" content="palabraclave1,palabraclave2,palabraclave3">
	<meta name="robots" content="index,nofollow" >
	
	<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon"/>
	<link rel="stylesheet" href="css/estilos.css">

	<script type="text/javascript">

	
		function ajax_conn(params,url) {
		var ajax_url; 
		
			/*
				Obtene una instancia del objeto XMLHttpRequest con el que JavaScript puede comunicarse con el servidor 
				de forma asíncrona intercambiando datos entre el cliente y el servidor sin interferir en el comportamiento actual de la página. 
			*/
			if(window.XMLHttpRequest) {
				conn = new XMLHttpRequest();
			}
			else if(window.ActiveXObject) {  // ie 6
				conn = new ActiveXObject("Microsoft.XMLHTTP");
			}

			
			conn.onreadystatechange = respuesta;  	
						/*
							Preparar la funcion de respuesta
							cuando exista un cambio de estado se llama a la funcion respuesta (para que maneja la respuesta recibida)
							la URL solicitada podría devolver HTML, JavaSript, CSS, texto plano, imágenes, XML, JSON, etc.
						*/
						
			ajax_url = url+'?' + params;   	
  							
			conn.open( "GET",ajax_url,true);
						/*
						método XMLHttpRequest.open. 
						- método: el método HTTP a utilizar en la solicitud Ajax. GET o POST.
						url: dirección URL que se va a solicitar, la URL a la que se va enviar la solicitud.
						async: true (asíncrono) o false (síncrono).  -- asíncronico: no se espera la respuesta del servidor - sincronico: se espera la repuesta del servidor
						*/
	
			conn.send();	// Enviamos la solicitud - por metodo GET
			
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
			if(conn.readyState == 4) { 			// estado de conexión es completo - response.success
				if(conn.status == 200) {		// estado devuelto por el HTTP fue "OK" 
												// conn.responseText - repuesta del servidor
					if ( conn.responseText==1) {
						location.reload();  // se borro un empleado - se refresca la pag
					} else {
						alert("El empleado no se pudo borrar porque tiene un trabajo asociado");
					} 
				}
			}
		}

		function borrar(id) {
		var errores=0;
		
			// validar ID
			
				// armar parametros a enviar - forma param1=valo1&param2=valor2 ...
			params="pers_id="+id;
				// archivo,  al que se le solcita una tarea  (URL que se va a solicitar via Ajax)
			url="personas_borrar.php";
			
			if (errores==0) {
				if (confirm('¿Está seguro que quiere borrar el empleado?')) {
					ajax_conn(params,url);
				}
			}
		}	
		
	</script>	
</head>
 
<body>
	
	<header>
		<?php echo generar_barra(); ?>
		
		<div id="encab">
			<?=$titulo?>
			<?=$menu_ppal?>
		</div>
	
	</header>
	
	<main id="cuerpo">
		
		<h2> Ejemplo de ABM de empleados </h2>
		
		<a href="personas_abm.php?tipo=A">&raquo;Ingresar un empleado</a>

		<h3>Listado de Empleados</h3>


		<ul>
			<?=$lista ?>
		</ul>

	</main>	
	
	<footer>
	</footer>
	
</body>
</html>