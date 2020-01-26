<?php

require '../inc/sesion.php';
require '../inc/conexion.php';

$prod_id =( isset($_GET['prod_cod']) && !empty($_GET['prod_cod']))? $_GET['prod_cod']:0;
if ($prod_id<>0) {

	$sql="SELECT * FROM productos_detalle WHERE prod_cod=$prod_id";
	$rs = $db->query($sql);


	if ($rs) { 
		$borrar=true;
    }
    
	$rs=null;
		
	if ($borrar) { 
		$sql2="DELETE FROM productos WHERE prod_cod=$prod_id";  // borra el numero de la tabla producto
		$sql2=$db->prepare($sql2);
        $sqlvalue2=[$prod_id2];
		$sql2->execute();

		$sql="DELETE FROM productos_detalle WHERE producto_codigo=$prod_id";  // borra el numero de la tabla producto_detalle
		$sql=$db->prepare($sql);
        $sqlvalue=[$prod_id];
        $sql->execute();
    
		$rs=null;
	}
}
$db=null;

echo 'producto eliminado con exito! :)';

?>