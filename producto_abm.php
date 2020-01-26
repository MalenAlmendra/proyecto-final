<?php
    require_once 'inc/conexion.php';  #crea la conexión a la BD
    require_once('inc/sesion.php');
    include("encabezado.php"); 

    generar_tit($titulo);
    generar_menu($menu_ppal,0);


    //Lista de Colores
    function lista_colores(&$lista_c,&$color_desc) {	
        global $db, $color;
        $lista_c =  " <select class='form-control' id='color' name='color' style='width:30%;' Required>". 
                    "	<option value=0 selected>Seleccione un color...</option>";
            
        $sql  = " SELECT * FROM colores";
        $rs = $db->query($sql);
            
        if (!$rs) {
            // mensaje error 
        } else {
            
            $color_desc = "";
            
            foreach ($rs as $row) {
                
                $seleccionado = "";
                if ($color == $row['color_codigo']) {
                    $color_desc = $row['color_descripcion'];
                    $seleccionado = "selected";
                }
                
                
                $lista_c .= "<option value='{$row['color_codigo']}' $seleccionado>". utf8_encode($row['color_descripcion'])."</option>"; 
            }
        }
            
        $lista_c .= "</select>";
        $rs=null;
    }

    //Lista de Marcas
    function lista_marcas(&$lista_m,&$marca_desc) {	
        global $db, $marca2;
        $lista_m =  " <select class='form-control' id='agregar-marca' name='marca' style='width:30%;' Required>". 
                    "	<option value=0 selected>Seleccione una marca...</option>";
            
        $sql  = " SELECT * FROM marcas";
        $rs = $db->query($sql);
            
        if (!$rs) {
            // mensaje error 
        } else {
            
            $marca_desc = "";
            
            foreach ($rs as $row) {
                
                $seleccionado = "";
                if ($marca2 == $row['marca_codigo']) {
                    $marca_desc = $row['marca_desc'];
                    $seleccionado = "selected";
                }
                
                
                $lista_m .= "<option value='{$row['marca_codigo']}' $seleccionado>". utf8_encode($row['marca_desc'])."</option>"; 
            }
        }
            
        $lista_m .= "</select>";
        $rs=null;
    }

    //Lista de Talles
    function lista_talles(&$lista_t,&$talle_sigla) {	
        global $db, $talle2;
        $lista_t =  " <select class='form-control' id='agregar-talle' name='talle' style='width:30%;' Required>". 
                    "	<option value=0 selected>Seleccione un talle...</option>";
            
        $sql  = " SELECT * FROM talles";
        $rs = $db->query($sql);
            
        if (!$rs) {
            // mensaje error 
        } else {
            
            $talle_sigla = "";
            
            foreach ($rs as $row) {
                
                $seleccionado = "";
                if ($talle2 == $row['talle_codigo']) {
                    $talle_desc = $row['talle_desc'];
                    $talle_sigla=$row['talle_sigla'];
                    $seleccionado = "selected";
                }
                
                
                $lista_t .= "<option value='{$row['talle_codigo']}' $seleccionado>". utf8_encode($row['talle_sigla'])."</option>"; 
            }
        }
            
        $lista_t .= "</select>";
        $rs=null;
    }
    
    lista_colores($lista_c,$color_desc);
    lista_marcas($lista_m,$marca_desc);
    lista_talles($lista_t,$talle_sigla);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <title>Alta de Productos</title>
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
        <h2>ABM de Producto</h2>
        <form action="./http_request/agregar_producto.php" method="POST" enctype="multipart/form-data">
            <label for="agregar-nombre">Nombre</label>
            <input class="form-control" style='width:30%;' id="agregar-nombre" type="text" name="nombre" Required> <br>
            <label for="agregar-desc">Descripción</label>
            <textarea class="form-control" style='width:50%;' name="desc" id="agregar-desc" cols="30" rows="10" Required></textarea>
            <label for="img">Imagen</label>
            <input class="form-control-file" style='width:30%;' id="img" type="file" name="imagen"  Required> <br>
            <label for="agregar-pu">Precio Unitario</label>
            <input class="form-control" style='width:17%;' id="agregar-pu" type="number" name="pu" Required> <br>
            <label for="agregar-stock">Stock</label>
            <input class="form-control" style='width:17%;' id="agregar-stock" type="number" name="stock" Required> <br>
            <label for="agregar-marca">Marca</label><?=$lista_m?>
            <label for="agregar-talle">Talle</label><?=$lista_t?>
            <label for="agregar-categoria">Categoría</label>
            <select class="form-control" style='width:30%;' name="categoria" id="agregar-categoria" Required>
                <option value="">Seleccione una categoria...</option>
                <option value="accesorios">Accesorios</option>
                <option value="calzados">Calzados</option>
                <option value="deportiva">Ropa Deportiva</option>
                <option value="pantalones">Pantalones</option>
                <option value="remeras">Remeras</option>
            </select> <br>
            <label for="">Color</label><?=$lista_c?><br>
            <input type="submit" class="btn btn-outline-danger" name="Enviar">
        </form>
    </div>
    <footer>
    copyright
    </footer>


	
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>