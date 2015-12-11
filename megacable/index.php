<?php
	if(isset($_SESSION["usuario"])){
		session_destroy();
	}

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
			<!-- <ul class="nav">
				<li><a href="">Inventario <div class="flecha"></div></a>
					<ul>
						<li><a href="">Inventario actual</a></li>
						<li><a href="">Inventarios anteriores</a></li>
						<li><a href="">Nuevo inventario</a></li>
					</ul>
				</li>
				<li><a href="">Equipos <div class="flecha"></div></a>
					<ul>
						<li><a href="">Lista de equipos</a></li>
						<li><a href="">Agregar nuevos equipos</a></li>
					</ul>
				</li>
				<li><a href="">Bitacora <div class="flecha"></div></a>
					<ul>
						<li><a href="">Nueva bitacora </a></li>
						<li><a href="">Consulta de bitacoras</a></li>
					</ul>
				</li>
				<li><a href="">Tecnicos <div class="flecha"></div></a>
					<ul>
						<li><a href="">Lista de técnicos</a></li>
						<li><a href="">Agregar técnico</a></li>
					</ul>
				</li>
			</ul>
			<h3 class="user">Bievenido <span class="user nombre">César Ortíz</span> <span class="salir">(cerrar sesión)</span></h3> -->
		</nav>
		<section id="central">
			<div class="login">
				<span class="iniciar_sesion">Inicio de sesión</span>
				<form action="php/validacion.php" class="form_login" method="POST">
					<table id="tabla_login">
						<tr>
							<td><span>Usuario:</span></td>
							<td><input type="text" placeholder="Nombre de usuario" name="user"></td>
						</tr>
						<tr>
							<td><span>Contraseña:</span></td>
							<td><input type="password"	placeholder="Contraseña" name="pass"></td>
						</tr>
					</table><br><br>
					<input type="submit" value="Iniciar sesión">
				</form>
			</div>
		</section>
		<footer>
			<p id="version">Version 1.0 Ultima actualización 00/00/00</p>
			<p class="" id="powered">Powered by César Eduardo</p>
		</footer>
	</div>
</body>
</html>