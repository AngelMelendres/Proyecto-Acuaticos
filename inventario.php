<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Products</title>
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/sweetalert2.css">
	<link rel="stylesheet" href="css/material.min.css">
	<link rel="stylesheet" href="css/material-design-iconic-font.min.css">
	<link rel="stylesheet" href="css/jquery.mCustomScrollbar.css">
	<link rel="stylesheet" href="css/main.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="js/jquery-1.11.2.min.js"><\/script>')</script>
	<script src="js/material.min.js" ></script>
	<script src="js/sweetalert2.min.js" ></script>
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
	<!-- navLateral -->
	<?php
		include "includes/menuLateralIzq.php";
	?>
	<!-- pageContent -->
	<section class="full-width pageContent">
		<!-- navBar -->
		<?php
        include "includes/AreaNotificacion.php";
        ?>
        <!-- Fin navBar -->


		<section class="full-width header-well">
			<div class="full-width header-well-icon">
				<i class="zmdi zmdi-washing-machine"></i>
			</div>
			<div class="full-width header-well-text">
				<p class="text-condensedLight">
					En esta secion se administran los productos:
                    <br>base de datos del inventario por clasificacion
                    <br>agrear un nuevo procuto al inventario
				</p>
			</div>
		</section>


		<div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
			<div class="mdl-tabs__tab-bar">
				<a href="#tabListProducts" class="mdl-tabs__tab is-active">INVENTARIO</a>
                <a href="#tabNewProduct" class="mdl-tabs__tab ">NUEVO PRODUCTO</a>
                <a href="#tabDetalles" class="mdl-tabs__tab ">DETALLADO</a>
				
			</div>

             <div class="mdl-tabs__panel is-active" id="tabListProducts">
				<div class="mdl-grid">
					<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">
						<form action="#">
							<div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable">
								<label class="mdl-button mdl-js-button mdl-button--icon" for="searchProduct">
									<i class="zmdi zmdi-search"></i>
								</label>
								<div class="mdl-textfield__expandable-holder">
									<input class="mdl-textfield__input" type="text" id="searchProduct">
									<label class="mdl-textfield__label"></label>
								</div>
							</div>
						</form>
						<nav class="full-width menu-categories">
							<ul class="list-unstyle text-center">
								<li><a href="#!">Category 1</a></li>
								<li><a href="#!">Category 2</a></li>
								<li><a href="#!">Category 3</a></li>
								<li><a href="#!">Category 4</a></li>
							</ul>
						</nav>
						<?php
						include "config.php";
						$result=$conection->query("SELECT * FROM inventario")->fetchAll(PDO::FETCH_OBJ);?>
						
						<?php foreach($result as $producto):?>

						
							<div class="mdl-card mdl-shadow--2dp full-width product-card">
								<div class="mdl-card__title">
									<img src="assets/img/fontLogin.jpg" alt="product" class="img-responsive">
								</div>
								<div class="mdl-card__supporting-text">
									<small><b>Precio: </b><?php  echo $producto->precio?> $</small><br>
									<small><b>Stock: </b> <?php  echo $producto->stock?></small>
								</div>
								<div class="mdl-card__actions mdl-card--border">
									<?php  echo $producto->nombre?>
									<button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect">
										<i class="zmdi zmdi-more"></i>
									</button>
								</div>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>           
            
			<div class="mdl-tabs__panel " id="tabNewProduct">
				<div class="mdl-grid">
					<div class="mdl-cell mdl-cell--12-col">
						<div class="full-width panel mdl-shadow--2dp">
							<div class="full-width panel-tittle bg-primary text-center tittles">
								Nuevo Produto
							</div>
							<div class="full-width panel-content">


								<form method="POST" action="conection.php">
									<div class="mdl-grid">
										<div class="mdl-cell mdl-cell--12-col">
									        <legend class="text-condensedLight"><i class="zmdi zmdi-border-color"></i> &nbsp; Datos del Producto</legend><br>
									    </div>
										<div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="text" pattern="-?[A-Za-z0-9áéíóúÁÉÍÓÚ ]*(\.[0-9]+)?" id="NameProduct" name="nombre">
												<label class="mdl-textfield__label" for="NameProduct">Nombre</label>
												<span class="mdl-textfield__error">Nombre Invalido</span>
											</div>
										</div>
										<div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="text" pattern="-?[A-Za-z0-9áéíóúÁÉÍÓÚ ]*(\.[0-9]+)?" id="BarCode" name="codigo">
												<label class="mdl-textfield__label" for="BarCode">Codigo de Barras</label>
												<span class="mdl-textfield__error">Codigo Ivalido</span>
											</div>
										</div>
									
										<div class="mdl-cell mdl-cell--4-col mdl-cell--8-col-tablet">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="number" pattern="-?[0-9]*(\.[0-9]+)?" id="StrockProduct" name="stock">
												<label class="mdl-textfield__label" for="StrockProduct">Unidades</label>
												<span class="mdl-textfield__error">Numero invalido</span>
											</div>
										</div>
										<div class="mdl-cell mdl-cell--4-col mdl-cell--8-col-tablet">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="text" pattern="-?[0-9.]*(\.[0-9]+)?" id="PriceProduct" name="precio">
												<label class="mdl-textfield__label" for="PriceProduct">Precio</label>
												<span class="mdl-textfield__error">Precion Invalido</span>
											</div>
										</div>
										<div class="mdl-cell mdl-cell--4-col mdl-cell--8-col-tablet">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" id="discountProduct" name="costo">
												<label class="mdl-textfield__label" for="discountProduct">Costo</label>
												<span class="mdl-textfield__error">Costo no valido</span>
											</div>
										</div>

										<div class="mdl-cell mdl-cell--4-col mdl-cell--8-col-tablet">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="text"  id="modelProduct" name="modelo">
												<label class="mdl-textfield__label" for="modelProduct">Modelo</label>
												<span class="mdl-textfield__error">No valido</span>
											</div>
										</div>
										<div class="mdl-cell mdl-cell--4-col mdl-cell--8-col-tablet">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="text" id="markProduct" name="marca">
												<label class="mdl-textfield__label" for="markProduct">Marca</label>
												<span class="mdl-textfield__error">No valido</span>
											</div>
										</div>
						
										<div class="mdl-cell mdl-cell--4-col mdl-cell--8-col-tablet">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<select class="mdl-textfield__input" name="categoria">
													<option value="" disabled="" selected="">Seleccione Categoria</option>
													<option value="">Categoria n</option>
													
												</select>
											</div>
										</div>
										
										<div class="mdl-cell mdl-cell--12-col">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="text" pattern="-?[A-Za-z0-9áéíóúÁÉÍÓÚ ]*(\.[0-9]+)?" id="Description" name="descripcion">
												<label class="mdl-textfield__label" for="Description">Descripcion</label>
												<span class="mdl-textfield__error">Descripcion Invalido</span>
											</div>
										</div>


										<div class="mdl-cell mdl-cell--12-col">
									        <legend class="text-condensedLight"><i class="zmdi zmdi-border-color"></i> &nbsp; IMAGEN DEL PRODUCTO</legend><br>
									    </div>
										
										<div class="mdl-cell mdl-cell--4-col mdl-cell--8-col-tablet">
											<div class="mdl-textfield mdl-js-textfield">
												<input type="file" name="imagen">
											</div>
										</div>
									</div>
									<p class="text-center">
										<button type="submit" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg-primary" id="btn-addProduct">
											<i class="zmdi zmdi-plus"></i>
										</button>
										<div class="mdl-tooltip" for="btn-addProduct">Añadir Producto</div>
									</p>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			
					<div class="mdl-list mdl-tabs__panel " id="tabDetalles">
						<table class="table">
							<thead class="thead-dark">
								<tr>
									<th scope="col">NOMBRE</th>
									<th scope="col">CODIGO</th>
									<th scope="col">STOCK</th>
									<th scope="col">PRECIO</th>
									<th scope="col">COSTO</th>
									<th scope="col">MARCA</th>
									<th scope="col">MODELO</th>
									<th scope="col">CATEGORIA</th>
									<th scope="col">DESCRIPCION</th>
									<th scope="col">OPCIONES</th>
								</tr>
							</thead>
							<tbody>
									<?php
									include "config.php";
									$result=$conection->query("SELECT * FROM inventario")->fetchAll(PDO::FETCH_OBJ);?>
									
									<?php foreach($result as $producto):?>
								<tr>
									<td><?php  echo $producto->nombre?></td>
									<td><?php  echo $producto->codigo_barras?></td>
									<td><?php  echo $producto->stock?></td>
									<td><?php  echo $producto->precio?></td>
									<td><?php  echo $producto->costo?></td>
									<td><?php  echo $producto->marca?></td>
									<td><?php  echo $producto->modelo?></td>
									<td><?php  echo $producto->categoria_producto?></td>
									<td><?php  echo $producto->descripcion?></td>
									<td><button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect"><i class="zmdi zmdi-more"></i></button></td>
								</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>

			


		</div>
	</section>
</body>
</html>