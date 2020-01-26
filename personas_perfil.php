<!DOCTYPE html>
<html lang="es">
<?php

require 'inc/session.php';
require 'inc/conn.php';  #crea la conexión a la BD

include_once("encabezado.php"); 
include_once("pie.php"); 

generar_tit($titulo);
generar_menu($menu_ppal,1);

generar_breadcrumbs($camino_nav,0,"Persona-cargo"); 



	#pregunta si se hizo clic en el botón 'enviar', es decir si se enviaron los datos ingresados en el formulario al servidor
	$btn =(isset($_POST['enviar']) && !empty($_POST['enviar']))? true:false;

	
		function inicializar_vars() {
		global $nombre, $apellido, $dni, $cargo_id, $legajo,$fecha;
		
			$nombre=$apellido=$dni="";
			$cargo_id=$legajo=0;
			$fecha=null;
		}

		# recupera datos enviados por el metodo post	
		function recuperar_datos() {
		global $pers_id, $tipo, $cargo_id, $legajo, $fecha ;
		
			$pers_id =(isset($_POST['pers_id']) && !empty($_POST['pers_id']))? $_POST['pers_id']:"";
			$tipo =(isset($_POST['tipo']) && !empty($_POST['tipo']))? $_POST['tipo']:"A"; 	
			$cargo_id=(isset($_POST["cargo_id"]) && !empty($_POST["cargo_id"]))? $_POST["cargo_id"]:0;
			$legajo=(isset($_POST["legajo"]) && !empty($_POST["legajo"]))? $_POST["legajo"]:0;
			$fecha=(isset($_POST["fecha"]) && !empty($_POST["fecha"]))? $_POST["fecha"]:null;
		}

		#funcion que valida los datos recuprados del formulario 
		function validar_datos(){
		global $fecha; 
	
			// primero se chequea que esté bien la fecha 
			$f=explode("/", $fecha);
			$fecha ="{$f[2]}-{$f[1]}-{$f[0]}";
			$fecha= date("Y-m-d",strtotime($fecha));  # pasar fecha a un formato valido para la BD 	
			// ...
		}
 		

	
	inicializar_vars();
	
	
	if (!$btn) { 
	
				# no hizo clic en el botón 'enviar'(de tipo submit), la solicitud viene de la página personas.php (por medio de un enlace - utilizando metodo GET)
				# puede ser un alta o modificacion de cargo
				# recuperar el id de la persona y tipo de operación por medio del método GET
				# 		el id y tipo deben ser cargados en los inputs ocultos del formulario para saber que operación fue la que se solicitó

				#seleccionar los datos según el identificador de la persona ingresado
			$pers_id =(isset($_GET['pers_id']) && !empty($_GET['pers_id']))? $_GET['pers_id']:"";
			$tipo =(isset($_GET['tipo']) && !empty($_GET['tipo']))? $_GET['tipo']:"A"; 

			// Valida datos ingresados -  $pers_id-$tipo 
			#validar_datos();

				
			# selecciono los datos del empleado 
			$cargo_id="";
			$leg_lect = ($tipo=="M")? "readonly":"";
			
			$sql = "SELECT * 
					FROM personas
					LEFT JOIN trabaja ON trabaja.pers_id = personas.pers_id
					WHERE personas.pers_id=$pers_id
				  ";
						  #pers_id solo es ambiguo - personas.pers_id
			$rs = $db->query($sql)->fetch();
			
			if ($rs){
				$nombre=$rs['nombre'];
				$apellido=$rs['apellido'];
				$dni=$rs['dni'];
				
				$legajo=$rs['legajo'];
				
				$cargo_id = (!is_null($rs['cargo_id']) )? $rs['cargo_id']:0;
			
				if (!is_null($rs['fechaingreso'])) {
					$fecha= date("d/m/Y",strtotime($rs['fechaingreso']));
				}

			} else {
				print_r($db->errorInfo());  #desarrollo
			}
			$rs=null;

			
			# busca los cargos disponibles y se presentan en una lista
			$sql  = " SELECT cargo_id, cargo_desc ";
			$sql .= " FROM cargo ";
			$sql .= " ORDER BY cargo_desc ";
			$rs = $db->query($sql);
		
			$lista_c =  "<select id='cargo_id' name='cargo_id' style='width:60%;'>". 
						"	<option value=0>&laquo;Seleccione una opción&raquo;</option>";
		
			foreach ($rs as $row) {

				$seleccionado = ($cargo_id == $row['cargo_id'])? "selected":"";
				
				$lista_c .= "<option value='{$row['cargo_id']}' $seleccionado>{$row['cargo_desc']}</option>"; 
			}
			$lista_c .= "</select>";
			$rs=null;
		
	} else {
		#hizo clic en el boton submit - envio los datos del formulario a procesar en el servidor

		# grabamos los datos enviados por el método POST en el formulario en la BD
		# recuperar todos los datos (incluso los campos ocultos) por el método POST

		recuperar_datos();

		validar_datos();  #SIEMPRE VALIDAR DATOS 
	
	
		#VERIFICAR que se entre un solo cargo por persona
		#  -- consulta tener en cuenta que no se agrega un cargo a una persona que ya tiene
		
		##########################################
		#  VERIFICAR que el legajo sea unico - buscar si se ingreso en la tabla el legajo ingresado
		#		Si es un alta hay que hacer un select * from trabaja where legajo=LegajoIngresado
		#		Si es una modificación se inhabilita el campo legajo
		
		#ver si es una modificación o un alta
		if ($tipo=="M") {
			$sql="UPDATE trabaja SET 
					cargo_id=?,
					fechaingreso=?
				  WHERE pers_id=$pers_id
				";
			$sql = $db->prepare($sql);
			$sqlvalue=[$cargo_id,$fecha];
			$rs = $sql->execute($sqlvalue);

			if (!$rs) {
				print_r($db->errorInfo());  #desarrollo
			} else {
				header("location:personas.php");
			}
			$rs=null;

		} else {   #es un alta 

			$sql = "INSERT INTO trabaja(legajo,pers_id,cargo_id,fechaingreso) VALUES(?,?,?,?)"; 
			$sql = $db->prepare($sql);
			$sqlvalue=[$legajo,$pers_id,$cargo_id,$fecha];
			$rs = $sql->execute($sqlvalue);

 			
			if (!$rs) {
				print_r($db->errorInfo());  #desarrollo
			} else {
				header("location:personas.php");
				# Una vez hecho el alta o modificación volver a la página personas.php
			}
			$rs=null;
		}

	}

	
	$rs=null;
    $db=null;
?>

<head>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
	<title>Sitio Trabajo Final</title>
	
	<meta name="description" content="breve descripcion del sitio">
	<meta name="keywords" content="palabraclave1,palabraclave2,palabraclave3">
	<meta name="robots" content="index,nofollow" >
	
	<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon"/>
	<link rel="stylesheet" href="css/estilos.css">
	
	<script type="text/javascript">
	
		function validar() {
		var errores=0;
		
			// valida datos ingresados en el formulario
			// si datos ok -- return true  sino return false
			
			if (errores==0) {
				return true;
			} else {
				return false;
			}
		}

	</script>
	
</head>
 
<body>
	
	<div id="encabprint"> Empresa - Logo	</div>

	<header>
		<?php echo generar_barra(); ?>
		
		<div id="encab">
			<?=$titulo?>
			<?=$menu_ppal?>
		</div>
	
	</header>
	
	<div id="cuerpo">
		<?= $camino_nav?>
		
		<h3> Cargo del Empleado</h3>

			<h4>Datos Personales</h4>

			<form action="personas_cargo.php" method="post" onsubmit="return validar()" >
				<fieldset> 
					<legend>Datos</legend>
					<span><strong>Nombre:</strong> <?=$nombre?> </span><br>
					<span><strong>Apellido:</strong> <?=$apellido?> </span><br>
					<span><strong>DNI:</strong> <?=$dni?> </span><br>

					<label for="legajo">Legajo</label>
					<input type="text" name="legajo" id="legajo" value="<?=$legajo?>" maxlength="8" <?=$leg_lect?>>
					
					<br>
					<label for="cargo_id">Cargos</label>
					<?=$lista_c?>
					
					<label for="fecha">Fecha</label>
					<input type="text" name="fecha" id="fecha" value="<?=$fecha?>" size="10" maxlength="10">
					
					
					<input type="hidden" name="tipo" id="tipo" value="<?=$tipo?>">
					<input type="hidden" name="pers_id" id="pers_id" value="<?=$pers_id?>">
				</fieldset>

				<fieldset id="btn" style="text-align:right;">
					<legend>&nbsp;</legend>
					<input type="submit" name="enviar" value="Enviar Datos">
					<input type="reset" name="cancelar" value="Cancelar">
				</fieldset>
			</form>
		

	</div>

	<footer>
		<?=pie()?>
	</footer>

</body>
</html>