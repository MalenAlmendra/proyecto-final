<?php

require 'inc/sesion.php';
require 'inc/conexion.php';

$prod_id =( isset($_GET['prod_cod']) && !empty($_GET['prod_cod']))? $_GET['prod_cod']:0;
$rta=0;

$borrar=false;

if ($prod_id<>0) {

	$sql="SELECT * FROM productos_detalle WHERE prod_cod=$prod_id";
	$rs = $db->query($sql)->fetch();


	if ($rs) { 
		$borrar=true;
	}
	$rs=null;
		
	if ($borrar) { 
		
		$sql="DELETE FROM productos_detalle WHERE producto_codigo=$prod_id";  // borra el numero de la tabla producto_detalle
		$sql=$db->prepare($sql);
		$sqlvalue=[$prod_id];

		$sql2="DELETE FROM productos WHERE prod_cod=?";  // borra el numero de la tabla producto
		$sql2=$db->prepare($sql2);
		$sqlvalue2=[$prod_id2];

		if ( !$sql->execute($sqlvalue) && !$sql2 -> execute($sqlvalue2)) {  
			$rta=0;
		} else {
			$rta=1;
		}
		
		$rs=null;
	}
}
$db=null;  
echo $rta; 
?>