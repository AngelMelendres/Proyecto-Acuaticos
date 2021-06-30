
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Empleados</title>
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

		<section class="full-width header-well">
			<div class="full-width header-well-icon">
				<i class="zmdi zmdi-account"></i>
			</div>
			<div class="full-width header-well-text">
				<p class="text-condensedLight">
					En esta secion se agregan y mustran los empleados
				</p>
			</div>
		</section>


		<div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
			<div class="mdl-tabs__tab-bar">
				<a href="#tabListAdmin" class="mdl-tabs__tab is-active">LISTA DE EMPLEADOS</a>
				<a href="#tabNewAdmin" class="mdl-tabs__tab">NUEVO EMPLEADO</a>
				
			</div>

			<div class="mdl-tabs__panel is-active	" id="tabListAdmin">
				<div class="mdl-grid">
					<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop mdl-cell---1-offset-desktop">
						<div class="full-width panel mdl-shadow--2dp">
							<div class="full-width panel-tittle bg-success text-center tittles">
                            Informacion del Empleado
							</div>
							<div class="full-width panel-content">
								<form action="#">
									<div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable">
										<label class="mdl-button mdl-js-button mdl-button--icon" for="searchAdmin">
											<i class="zmdi zmdi-search"></i>
										</label>
										<div class="mdl-textfield__expandable-holder">
											<input class="mdl-textfield__input" type="text" id="searchAdmin">
											<label class="mdl-textfield__label"></label>
										</div>

									</div>
								</form>
								<div class="mdl-list">
							
								<table class="table">
										<thead class="thead-dark">
											<tr>
												<th scope="col">Usuario</th>
												<th scope="col">Nombre</th>
												<th scope="col">Apellido</th>
												<th scope="col">Correo</th>
												<th scope="col">Telefono</th>
												<th scope="col">Contraseña</th>
												<th scope="col">Editar</th>
											</tr>
										</thead>
										<tbody>
												<?php
												include "config.php";
												$result=$conection->query("SELECT * FROM empleados")->fetchAll(PDO::FETCH_OBJ);?>
												
											<?php foreach($result as $empleado):?>
											<tr>
												<td><?php echo $empleado->usuario_empleado?></td>
												<td><?php  echo $empleado->nombre?></td>
												<td><?php  echo $empleado->apellido?></td>
												<td><?php  echo $empleado->correo?></td>
												<td><?php  echo $empleado->telefono?></td>
												<td><?php  echo $empleado->contraseña?></td>
												<td><button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect"><i class="zmdi zmdi-more"></i></button></td>
												
											</tr>
										<?php endforeach; ?>
										</tbody>
									</table>
									
									
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="mdl-tabs__panel " id="tabNewAdmin">
				<div class="mdl-grid">
					<div class="mdl-cell mdl-cell--12-col">
						<div class="full-width panel mdl-shadow--2dp">
							<div class="full-width panel-tittle bg-primary text-center tittles">
								Añadir Empleado
							</div>
							<div class="full-width panel-content">
								<form method="POST" action="añadirEmpleado.php">
									<div class="mdl-grid">
										<div class="mdl-cell mdl-cell--12-col">
									        <legend class="text-condensedLight"><i class="zmdi zmdi-border-color"></i> &nbsp; DATOS DEL EMPLEADO</legend><br>
									    </div>
									    <div class="mdl-cell mdl-cell--4-col mdl-cell--8-col-tablet">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="number" pattern="-?[0-9]*(\.[0-9]+)?" id="DNIAdmin" name="cedula">
												<label class="mdl-textfield__label" for="DNIAdmin">C.I.</label>
												<span class="mdl-textfield__error">Este dato es invalido</span>
											</div>
									    </div>
									    <div class="mdl-cell mdl-cell--4-col mdl-cell--8-col-tablet">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="text" pattern="-?[A-Za-záéíóúÁÉÍÓÚ ]*(\.[0-9]+)?" id="NameAdmin" name="nombre">
												<label class="mdl-textfield__label" for="NameAdmin">Nombre</label>
												<span class="mdl-textfield__error">Este dato es invalido</span>
											</div>
									    </div>
										<div class="mdl-cell mdl-cell--4-col mdl-cell--8-col-tablet">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="text" pattern="-?[A-Za-záéíóúÁÉÍÓÚ ]*(\.[0-9]+)?" id="LastNameAdmin" name="apellido">
												<label class="mdl-textfield__label" for="LastNameAdmin">Apellido</label>
												<span class="mdl-textfield__error">Este dato es invalido</span>
											</div>
										</div>
										<div class="mdl-cell mdl-cell--4-col mdl-cell--8-col-tablet">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="tel" pattern="-?[0-9+()- ]*(\.[0-9]+)?" id="phoneAdmin" name="telefono">
												<label class="mdl-textfield__label" for="phoneAdmin">Telefono</label>
												<span class="mdl-textfield__error">Este dato es invalidor</span>
											</div>
										</div>
										<div class="mdl-cell mdl-cell--4-col mdl-cell--8-col-tablet">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="email" id="emailAdmin" name="correo">
												<label class="mdl-textfield__label" for="emailAdmin">E-mail</label>
												<span class="mdl-textfield__error">Este dato es invalido</span>
											</div>
										</div>
										
										<div class="mdl-cell mdl-cell--12-col">
									        <legend class="text-condensedLight"><i class="zmdi zmdi-border-color"></i> &nbsp; CREDENCIALES</legend><br>
									    </div>
										<div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="text" pattern="-?[A-Za-z0-9áéíóúÁÉÍÓÚ]*(\.[0-9]+)?" id="UserNameAdmin" name="usuario">
												<label class="mdl-textfield__label" for="UserNameAdmin">Nombre de Usuario</label>
												<span class="mdl-textfield__error">Este dato es invalido</span>
											</div>
										</div>
										<div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="password" id="passwordAdmin" name="pass">
												<label class="mdl-textfield__label" for="passwordAdmin">Password</label>
												<span class="mdl-textfield__error">Este dato es invalido</span>
											</div>
										</div>
										<div class="mdl-cell mdl-cell--12-col">
									        <legend class="text-condensedLight"><i class="zmdi zmdi-border-color"></i> &nbsp; Foto de Perfil</legend><br>
									    </div>
                                        <div class="mdl-cell mdl-cell--4-col mdl-cell--8-col-tablet">
											<div class="mdl-textfield mdl-js-textfield">
												<input type="file">
											</div>
										</div>
										
                                    </div>

									<p class="text-center">
										<button type="submit" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg-primary" id="btn-addProduct">
											<i class="zmdi zmdi-plus"></i>
										</button>
										<div class="mdl-tooltip" for="btn-addProduct">Añadir Empleado</div>
									</p>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			
		</div>
	</section>
</body>
</html>