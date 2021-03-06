<?php
	session_start();
	include ("php/sesion_raiz.php");
 ?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Control Digital</title>
	<link rel="stylesheet" href="css/estilos.css">
</head>
<body>
	<div class="" id="contenido">
		<header>
			<img src="logo.png" alt="Megacable" width="150px" height="150px">
			<h1 class="titulo">Control de Digitalización</h1>
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
			<h3 class="user">Has iniciado sesion como <span class="user nombre"><a href="usuario.php"><?php echo $_SESSION["usuario"];?></a></span>
			<span class="salir"><a href="php/logout.php">(cerrar sesión)</a></span></h3>
		</nav>
		<section id="central">
			<div class="bienvenido">
				<br>
				<h1>Bienvenido 
				<?php
					include ("php/conexion.php");
					$link=conectar();
					$user=$_SESSION["usuario"];
					$sql="SELECT primer_nombre,apellido_paterno from usuarios where usuario='$user';";
					$resultado=mysql_query($sql);
					while ($row = mysql_fetch_array($resultado)){
						 	echo $row["primer_nombre"]." ".$row["apellido_paterno"];
						// Cerramos el While
					}
					mysql_close($link);
				?>
				</h1>
				</div>
				<div class="nav_sec">
					<h2>¿A donde desear ir?</h2>
					<a href="inventarios/menu_inventarios.php">Inventario</a>
					<a href="equipos/menu_equipos.php">Equipos</a>
					<a href="bitacoras/menu_bitacoras.php">Bitacora</a>
					<a href="tecnicos/menu_tecnicos.php">Tecnicos</a>
				<br><br>
				</div>
			</div>
		</section>
		<footer>
			<p id="version">Version 1.0 Ultima actualización 00/00/00</p>
			<p class="" id="powered">Powered by César Eduardo</p>
		</footer>
	</div>
</body>
</html>