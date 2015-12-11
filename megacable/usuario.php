<?php
	session_start();
	include ("php/sesion.php");
 ?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Usuario</title>
	<link rel="stylesheet" href="css/estilos.css">
</head>
<body>
	<div class="" id="contenido">
		<header>
			<img src="logo.png" alt="Megacable" width="150px" height="150px">
			<h1 class="titulo">Perfil de usuario</h1>
		</header>
		<nav>
			<ul class="nav">
				<li><a href="inventarios/menu_inventarios.php">Inventario <div class="flecha"></div></a>
					<ul>
						<li><a href="inventarios/inventario_acutal.php">Inventario actual</a></li>
						<li><a href="inventarios/inventarios_anteriores.php">Inventarios anteriores</a></li>
						<li><a href="inventarios/nuevo_inventario.php">Nuevo inventario</a></li>
					</ul>
				</li>
				<li><a href="equipos/menu_equipos.php">Equipos <div class="flecha"></div></a>
					<ul>
						<li><a href="equipos/lista_equipos.php">Lista de equipos</a></li>
						<li><a href="equipos/agregar_equipos.php">Agregar nuevos equipos</a></li>
					</ul>
				</li>
				<li><a href="bitacoras/menu_bitacoras.php">Bitacora <div class="flecha"></div></a>
					<ul>
						<li><a href="bitacoras/nueva_bitacora.php">Nueva bitacora </a></li>
						<li><a href="bitacoras/consulta_bitacora.php">Consulta de bitacoras</a></li>
					</ul>
				</li>
				<li><a href="tecnicos/menu_tecnicos.php">Tecnicos <div class="flecha"></div></a>
					<ul>
						<li><a href="tecnicos/lista_tecnicos.php">Lista de técnicos</a></li>
						<li><a href="tecnicos/agregar_tecnico.php">Agregar técnico</a></li>
					</ul>
				</li>
			</ul>
			<h3 class="user">Has iniciado sesion como <span class="user nombre"><?php echo $_SESSION["usuario"];?></span>
			<span class="salir"><a href="php/logout.php">(cerrar sesión)</a></span></h3>
		</nav>
		<section id="central">
			<div class="mod_user">
				<p>Tu usuario es: <?php echo $_SESSION["usuario"];?> </p>
				<p>Tu nombre es: <?php
					include ("php/conexion.php");
					$link=conectar();
					$user=$_SESSION["usuario"];
					$sql="SELECT * from usuarios where usuario='$user';";
					$resultado=mysql_query($sql);
					while ($row = mysql_fetch_array($resultado)){
						$_SESSION["primer_nombre"]=$row["primer_nombre"];
						$_SESSION["segundo_nombre"]=$row["segundo_nombre"];
						$_SESSION["apellido_paterno"]=$row["apellido_paterno"];
						$_SESSION["apellido_materno"]=$row["apellido_materno"];
						echo $row["primer_nombre"]." ".$row["segundo_nombre"]." ".$row["apellido_paterno"]." ".$row["apellido_materno"];
						}
					mysql_close($link);
				?></p>
				<!-- <p>Modificar perfil de usuario:</p>
				<form action="" method="POST" id="mod_user">
					<table>
						<tr>
							<td>Usuario: </td><td><input type="text" name="usuario"></td>
						</tr>
						<tr>
							<td>Nombre: </td><td><input type="text" name="nombre"></td>
						</tr>
						<tr>
							<td>Apellido paterno: </td><td><input type="text" name="ape_pat"></td>
						</tr>
						<tr>
							<td>Apellido materno: </td><td><input type="text" name="ape_mat"></td>
						</tr>
						<tr>
							<td>Nueva contraseña: </td><td><input type="password" name="pass"></td>
						</tr>
						<tr>
							<td>Repetir nueva contraseña: </td><td><input type="password" name="pass"></td>
						</tr>
					</table>
					<input type="submit" value="Aceptar">
				</form> -->
			</div>
		</section>
		<footer>
			<p id="version">Version 1.0 Ultima actualización 00/00/00</p>
			<p class="" id="powered">Powered by César Eduardo</p>
		</footer>
	</div>
</body>
</html>