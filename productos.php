<?php

    require_once 'inc/conexion.php';  #crea la conexión a la BD
    require_once('inc/sesion.php');
    include("encabezado.php"); 

    generar_tit($titulo);
    generar_menu($menu_ppal,0);

    $color=(isset($_GET["color"]) && !empty($_GET["color"]))?$_GET["color"]:0;
    $precio_desde=(isset($_GET["precio1"]) && !empty($_GET["precio1"]))?$_GET["precio1"]:"";
    $precio_hasta=(isset($_GET["precio2"]) && !empty($_GET["precio2"]))?$_GET["precio2"]:"";
    $talle=(isset($_GET["talle"]) && !empty($_GET["talle"]))?$_GET["talle"]:"";
    $orden=(isset($_GET["orden"]) && !empty($_GET["orden"]))?$_GET["orden"]:0;
    
    //Trae los talles de la base de datos
    function lista_talles(&$lista_c,&$talle_desc) {	
		global $db, $talle;
		
			$lista_c =  " <select class='form-control' id='talle' name='talle' style='width:50%;' >". 
						"	<option value=0 selected>&laquo;Todos&raquo;</option>";
				
			$sql  = " SELECT * FROM talles";
			$rs = $db->query($sql);
				
			if (!$rs) {
				// mensaje error 
			} else {	
				$talle_desc = "";
				foreach ($rs as $row) {	
					$seleccionado = "";
					if ($talle == $row['talle_codigo']) {
						$talle_desc = $row['talle_sigla'];
						$seleccionado = "selected";
					}
					$lista_c .= "<option value='{$row['talle_codigo']}' $seleccionado>". utf8_encode($row['talle_sigla'])."</option>"; 
				}
			}
				
			$lista_c .= "</select>";
			$rs=null;
        }
        
        lista_talles($lista_c,$colores_desc);


         function lista_colores(&$lista_b,&$colores_desc) {    
        global $db, $color;
        
            $lista_b =  " <select class='form-control' id='color' name='color' style='width:50%;' >". 
                        "   <option value=0 selected>Todos</option>";
                
            $sql  = " SELECT * FROM colores";
            $rs = $db->query($sql);
                
            if (!$rs) {
                // mensaje error 
            } else {
                
                $colores_desc = "";
                
                foreach ($rs as $row) {
                    
                    $seleccionado = "";
                    if ($color == $row['color_codigo']) {
                        $colores_desc = $row['color_descripcion'];
                        $seleccionado = "selected";
                    }
                    
                    
                    $lista_b .= "<option value='{$row['color_codigo']}' $seleccionado>". utf8_encode($row['color_descripcion'])."</option>"; 
                }
            }
                
            $lista_b .= "</select>";
            $rs=null;
        }
        
        lista_colores($lista_b,$colores_desc);

    $sql="SELECT * FROM `marcas` ORDER BY `marcas`.`marca_desc` ASC";
    $rs = $db->query($sql);
    $lista="<ul>";
    $marca_desc="";
    foreach ($rs as $row) {
        $marca_desc=utf8_encode($row['marca_desc']);
        $lista.="<li>$marca_desc</li>";
    }
    $lista.="</ul>";



    function crear_cards($titulo,$descripcion,$foto,$precio,$stock){
        $card="
            <div class='card text-center m-1' style='width: 18rem;'>
                <img class='card-img-top' src=\"$foto\" alt='Card image cap'>
                <div class='card-body'>
                    <h5 class='card-title'>$titulo</h5>
                    <p class='card-text'>$descripcion</p>
                    <span class='card-text'>Precio: $ $precio - Stock: $stock</span>
                    <a href='#' class='btn btn-danger'>Comprar</a>
                </div>
            </div>
        ";
        return $card;
    }

    

    //Filtros de productos
    $lista2="";
    

   

 //orden por precio y nombre
    $orden_sql="";

    if ($orden==1) 
    {  $orden_sql = "p.prod_precio_unit";} //$stock - $producto_desc - Precio:\$ $precio
    else
    {    $orden_sql = "p.prod_nomb ";};

    $filtro="";
    switch ($color) {
        case '1':
            $filtro="c.color_codigo=1";
            break;
        case '2':
            $filtro="c.color_codigo=2";
            break;
        case '3':
            $filtro="c.color_codigo=3";
            break;
        case '4':
            $filtro="c.color_codigo=4";
            break;
        case '5':
            $filtro="c.color_codigo=5";
            break;
        case '6':
            $filtro="c.color_codigo=6";
            break;
        case '7':
            $filtro="c.color_codigo=7";
            break;
        case '8':
            $filtro="c.color_codigo=8";
            break;
        case '9':
            $filtro="c.color_codigo=9";
            break;
        case '10':
            $filtro="c.color_codigo=10";
            break;
        default:
            break;
    }
    if($filtro<>""){
    $filtro.=" AND ";
    switch ($talle) {
        case '1':
            $filtro.="t.talle_codigo=1";
            break;
        case '2':
            $filtro.="t.talle_codigo=2";
            break;
        case '3':
            $filtro.="t.talle_codigo=3";
            break;
        case '4':
            $filtro.="t.talle_codigo=4";
            break;
        case '5':
            $filtro.="t.talle_codigo=5";
            break;
        case '6':
            $filtro.="t.talle_codigo=6";
            break;
        case '7':
            $filtro.="t.talle_codigo=7";
            break;
        case '8':
            $filtro.="t.talle_codigo=8";
            break;
        case '9':
            $filtro.="t.talle_codigo=9";
            break;
        case '10':
            $filtro.="t.talle_codigo=10";
            break;
        default:
            $filtro .= " 0=0 ";
            break;
    }
}

    if(($precio_desde>0) && ($precio_hasta>0) && ($precio_desde<$precio_hasta)){
        $filtro.="p.prod_precio_unit BETWEEN $precio_desde AND $precio_hasta";
        
    }

    if (trim($filtro)=="")  {
       $filtro = " 0=0 ";

    }

    $sql = "SELECT * 
            FROM productos as p
                INNER JOIN productos_detalle as pd ON (p.prod_cod=pd.producto_codigo)  
                INNER JOIN talles as t ON (t.talle_codigo=pd.talle_codigo)
                INNER JOIN colores as c ON (c.color_codigo=pd.color_codigo)
                INNER JOIN marcas as m ON (m.marca_codigo=p.prod_marca)
            WHERE $filtro
            ORDER BY $orden_sql ";          
          
     $rs = $db->query($sql);

     if (!$rs ) { 
        print_r($db->errorInfo()); # mensaje en desarrollo

        echo "<tr><td colspan='<=3>'><br>&nbsp;&nbsp; - No se encuentran datos para el filtro ingresado.</td></tr>";
        exit;
     }   
    foreach ($rs as $row) {
        $nombre=utf8_encode($row['prod_nomb']);
        $stock=$row['stock'];
        $imagen=$row['prod_img'];
        $producto_desc=utf8_encode($row['prod_desc']);
        $precio=$row['prod_precio_unit'];


        $lista2.=crear_cards($nombre,$producto_desc,$imagen,$precio,$stock);
    }
    $lista2.="";

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">

    <title>Lista de productos</title>
</head>
<body>
    <header>
		<div id="encab" class="navbar d-flex flex-wrap fondo-blanco">
            <div class="d-flex col-6"><?=$titulo?></div>
            <div class="col-6 d-flex justify-content-end"><?php echo generar_barra(); ?></div>
            <div class="col-12 d-flex justify-content-center"><?=$menu_ppal?></div>
        </div>
	
	</header>
<div class="container">
    <form action="productos.php" method="GET">
    <div class="form-row text-center">
        <div class="col-4 mt-2">
            <h3>Filtro por Color</h3>
            <?=$lista_b?>
            <h3>Ordenar por:</h3>
            <input type="radio" name="orden" id="orden1" value="1" <?php if ($orden==1) {?> checked="checked" <?php }?>> 
                <label for="orden1">Precio</label>
                <input type="radio" name="orden" id="orden2" value="2" <?php if ($orden==2) {?> checked="checked" <?php }?>> 
                <label for="orden2">Nombre</label>

        </div>
        <div class="col-3 d-flex justify-content-center flex-wrap align-items-center">
            <h3 class="w-75">Filtro por Talle</h3>
            <?=$lista_c?>
        </div>
        <div class="col mt-2">
            <h3>Filtro por Precio</h3>
            Desde <br> <input type="number" name="precio1" value="<?=$precio_desde?>" id="desde"><br> 
            Hasta <br><input type="number" name="precio2" value="<?=$precio_hasta?> id="hasta">
        </div>
    <div class="col-2 d-flex align-items-center">
        <input type="submit"class="btn btn-outline-danger btn-lg" value="Filtrar">
    </div>
    </div>   
    </form>
    <h3>Productos Disponibles</h3>
    <div class="container d-flex flex-wrap justify-content-center">
        <?=$lista2?>
    </div>


</div>




	
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="js/jquery-3.3.1.min.js"></script>
	<script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>