<?php
require_once '../inc/conexion.php';  #crea la conexión a la BD
require_once('../inc/sesion.php');
$nombre = (isset($_POST["nombre"]) && !empty($_POST["nombre"])) ? $_POST["nombre"] : "";
$descripcion = (isset($_POST["desc"]) && !empty($_POST["desc"])) ? $_POST["desc"] : "";
$precio = (isset($_POST["pu"]) && !empty($_POST["pu"])) ? $_POST["pu"] : 0;
$stock = (isset($_POST["stock"]) && !empty($_POST["stock"])) ? $_POST["stock"] : 0;
$categoria = (isset($_POST["categoria"]) && !empty($_POST["categoria"])) ? $_POST["categoria"] : 0;
$marca = (isset($_POST["marca"]) && !empty($_POST["marca"])) ? $_POST["marca"] : 0;
$talle = (isset($_POST["talle"]) && !empty($_POST["talle"])) ? $_POST["talle"] : 0;
$color = (isset($_POST["color"]) && !empty($_POST["color"])) ? $_POST["color"] : 0;
$imagen = $_FILES['imagen']['name']; //obtiene el nombre de la imagen
$archivo = $_FILES['imagen']['tmp_name']; //obtiene el archivo
$nombre_imagen = basename($imagen);
$ruta = "../images";
if ($categoria != "") {
    switch ($categoria) {
        case 'accesorios':
            $ruta .= "/Accesorios/" . $nombre_imagen; //   images/Accesorios/nombre.jpg
            break;
        case 'calzados':
            $ruta .= "/calzados/" . $nombre_imagen;
            break;
        case 'deportiva':
            $ruta .= "/deportiva/" . $nombre_imagen;
            break;
        case 'pantalones':
            $ruta .= "/pantalones/" . $nombre_imagen;
            break;
        case 'remeras':
            $ruta .= "/remeras/" . $nombre_imagen;
            break;

        default:
            $ruta .= "/otros/" . $nombre_imagen; //   images/nombre.jpg
            break;
    }
}

move_uploaded_file($archivo, $ruta); //- mueve el archivo subido (tmp_name) a una nueva ubicación.

if ($_FILES['imagen']['error'] == UPLOAD_ERR_OK)  echo "Imagen guardada exitosamente";

$consulta1  = " INSERT INTO `productos`(`prod_cod`, `prod_nomb`, `prod_desc`, `prod_img`, `prod_precio_unit`, `prod_marca`) VALUES ('','$nombre','$descripcion','$ruta','$precio','$marca');";

$rs = $db->query($consulta1);
$id_producto= $db->lastInsertId();
echo ("<br/> Producto Agregado Correctamente a la tabla PRODUCTOS");

//¿Cómo traer el codigo del producto cargado? con SELECT LAST_INSERT_ID(); dentro de SQL
//¿Cómo ver ese resultado en PHP? Con db->lastInsertId();

$consulta2  = " INSERT INTO `productos_detalle`(`articulo`, `talle_codigo`, `color_codigo`, `stock`, `producto_codigo`) VALUES ('','$talle','$color','$stock','$id_producto')";
$rs = $db->query($consulta2); 
echo ("<br/> Producto Agregado Correctamente a la tabla PRODUCTOS_DETALLE");
 
 
     //if($_FILES['img']['name'] !="" && is_uploaded_file($_FILES['img']['tmp_name'])) 
 
     //if ($_FILES['img']['error']== UPLOAD_ERR_OK)  echo "Imagen guardada exitosamente";
