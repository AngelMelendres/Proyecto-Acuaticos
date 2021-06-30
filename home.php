
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>INICIO</title>
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/sweetalert2.css">
	<link rel="stylesheet" href="css/material.min.css">
	<link rel="stylesheet" href="css/material-design-iconic-font.min.css">
	<link rel="stylesheet" href="css/jquery.mCustomScrollbar.css">
	<link rel="stylesheet" href="css/main.css">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="js/jquery-1.11.2.min.js"><\/script>')</script>
	<script src="js/material.min.js" ></script>
	<script src="js/jquery.mCustomScrollbar.concat.min.js" ></script>
	<script src="js/main.js" ></script>
</head>
<body>
<?php
        session_start();

        if(!isset($_SESSION["correo"])){
            header("location: index.php");
        }

?>

	<!-- Menu lateral izq -->
	<?php
		include "includes/menuLateralIzq.php";
	?>
	<!-- pageContent -->
	<section class="full-width pageContent">
		<!-- navBar -->
	<?php
        include "includes/AreaNotificacion.php";
    ?>
		<!-- Menu selecion -->
		<section class="full-width text-center" style="padding: 40px 0;">
			<h3 class="text-center tittles">ACUATICOS EC.</h3>
			<!-- Tiles -->
			
				<article class="full-width tile">
				<a href="empleados.php">	
					<div class="tile-text">
						<span class="text-condensedLight">
							<br>
							
							<small>EMPLEADOS</small>
							
						</span>
					</div>
					<i class="zmdi zmdi-account tile-icon"></i>
				</a>	
				</article>
			

			

					<article class="full-width tile">
					<a href="clientes.php">	
					<div class="tile-text">
						
						<span class="text-condensedLight">
							71<br>
							<small>Clientes</small>
						</span>
					</div>
					
					<i class="zmdi zmdi-accounts tile-icon"></i>
					</a>
				</article>			
			

			
				<article class="full-width tile">
				<a href="provedores.php">	
					<div class="tile-text">
						<span class="text-condensedLight">
							7<br>
							<small>Proovedores</small>
						</span>
					</div>
					<i class="zmdi zmdi-truck tile-icon"></i>
				</a>	
				</article>
			

			
					<article class="full-width tile">
					<a href="categories.html">		
					<div class="tile-text">
						<span class="text-condensedLight">
							9<br>
							<small>Categorias</small>
						</span>
					</div>
					<i class="zmdi zmdi-label tile-icon"></i>
					</a>
				</article>			
			

			
				<article class="full-width tile">
				<a href="inventario.php">	
					<div class="tile-text">
						<span class="text-condensedLight">
							121<br>
							<small>Inventario</small>
						</span>
					</div>
					<i class="zmdi zmdi-washing-machine tile-icon"></i>
				</a>	
				</article>			
			

			
				<article class="full-width tile">
					<a href="sales.html">
					<div class="tile-text">
						<span class="text-condensedLight">
							47<br>
							<small>Ventas</small>
						</span>
					</div>
					<i class="zmdi zmdi-shopping-cart tile-icon"></i>
					</a>
				</article>				
			

		</section>

		
	</section>
</body>
</html>