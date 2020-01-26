<?php

require_once('inc/sesion.php');
include("encabezado.php"); 

generar_tit($titulo);
generar_menu($menu_ppal,0);
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">

    <script>
		function validar(){
		var errores;
		
		errores=0;
		
			// validar datos 
			
			if (errores==0){
				return true;
			}else {
				return false;
			}
			
		
		}
		
	</script>


    <title>Login | La Rosa de Guadalupe</title>
</head>
<body class="">
    <div class="container-fluid col-12 d-flex hero-img alto">
        <div class="container col-4 d-flex">
            <div class="row d-flex justify-content-center align-items-center align-content-center">
                <a href="index.php"><img class="mt-3" src="images/Logo.png" alt=""></a>
                <form class="mt-3" action="iniciar_sesion.php" method="post" onsubmit="return validar()">
                    <div class="col-12 d-flex flex-wrap justify-content-center">
                        <div class="form-group col-9 text-center text-white">
                            <label for="name">N° de Usuario</label>
                            <input type="text" name="legajo" id="legajo" value="" maxlength="8" class="form-control">
                        </div>
                        <div class="form-group col-9 text-center text-white">
                            <label for="pass">Contraseña</label>
                            <input type="password" name="psw" id="psw" value="" maxlength="20" class="form-control">
                        </div>
                        <div class="row col-12 mb-3 d-flex flex-wrap justify-content-center">
                            <button type="submit" name="iniciar" class="btn btn-primary col-3 mr-1">Comenzar</button>
                            <button type="button" name="registrarse" class="btn btn-success col-3 ml-1">Registrarme</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="js/jquery-3.3.1.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js" ></script>
</body>
</html>