<?php
	session_start();
	include ("../php/sesion.php");
	include ("../php/actualizacion.php");
 ?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Agregar bitacora</title>
	<link rel="stylesheet" href="../css/estilos.css">
</head>
<body>
	<div class="" id="contenido">
		<header>
			<img src="../logo.png" alt="Megacable" width="150px" height="150px">
			<h1 class="titulo">Agregar bitacora</h1>
			<a href="../inicio.php">Regresar a inicio</a>
		</header>
		<nav>
			<ul class="nav">
				<li><a href="../inventarios/menu_inventarios.php">Inventario <div class="flecha"></div></a>
					<ul>
						<li><a href="../inventarios/inventario_acutal.php">Inventario actual</a></li>
						<li><a href="../inventarios/inventarios_anteriores.php">Inventarios anteriores</a></li>
						<li><a href="../inventarios/nuevo_inventario.php">Nuevo inventario</a></li>
					</ul>
				</li>
				<li><a href="../equipos/menu_equipos.php">Equipos <div class="flecha"></div></a>
					<ul>
						<li><a href="../equipos/lista_equipos.php">Lista de equipos</a></li>
						<li><a href="../equipos/agregar_equipos.php">Agregar nuevos equipos</a></li>
					</ul>
				</li>
				<li><a href="../bitacoras/menu_bitacoras.php">Bitacora <div class="flecha"></div></a>
					<ul>
						<li><a href="../bitacoras/nueva_bitacora.php">Nueva bitacora </a></li>
						<li><a href="../bitacoras/consulta_bitacora.php">Consulta de bitacoras</a></li>
					</ul>
				</li>
				<li><a href="../tecnicos/menu_tecnicos.php">Tecnicos <div class="flecha"></div></a>
					<ul>
						<li><a href="../tecnicos/lista_tecnicos.php">Lista de técnicos</a></li>
						<li><a href="../tecnicos/agregar_tecnico.php">Agregar técnico</a></li>
					</ul>
				</li>
			</ul>
			<h3 class="user">Has iniciado sesion como <span class="user nombre"><a href="../usuario.php"><?php echo $_SESSION["usuario"];?></a></span>
			<span class="salir"><a href="../php/logout.php">(cerrar sesión)</a></span></h3>
		</nav>
		<section id="central">
			<form action="crear_bit.php" method="POST">
				
				
					<?php
						include ('../php/conexion.php');
						$link=conectar();

						$sql_check="SELECT id_inventario from inventario";
						$check=mysql_query($sql_check,$link);
						if($inv=mysql_fetch_array($check)>0){
							echo "<h4>Selecione el técnico al que pertenece la nueva hoja de bitácora:</h4>";
							echo "<select name='tecnico'>";
							$sql="SELECT id_tecnico, nombre, apellido FROM tecnicos where fec_salida is NULL OR fec_salida=0000-00-00;";
							$consulta=mysql_query($sql,$link);
							while ($row=mysql_fetch_array($consulta)){
								echo $row['nombre'];
								echo "<option value=".$row['id_tecnico'].">".$row['nombre']." ".$row['apellido']."</option>";
							}
							echo  "</select>
									<input type='submit' value='Aceptar'>";
						}
						else{
							echo "<h3>No hay registro de inventarios</h3>";
						}
					 ?>
					
			</form>
		</section>
		<footer>
			<p id="version">Version 1.0 Ultima actualización <?php echo $update; ?></p>
			<p class="" id="powered">Powered by César Eduardo</p>
		</footer>
	</div>
</body>
</html>