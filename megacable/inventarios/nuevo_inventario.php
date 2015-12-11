<?php
	session_start();
	include ("../php/sesion.php");
 ?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Inventario nuevo</title>
	<link rel="stylesheet" href="../css/estilos.css">
</head>
<body>
	<div class="" id="contenido">
		<header>
			<img src="../logo.png" alt="Megacable" width="150px" height="150px">
			<h1 class="titulo">Inventario nuevo</h1>
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
			<form action="inv_nuevo.php" class="form_inv" method="POST">
				<table class="tabla" border="1px"> 
					<tr>
						<th>Fecha</th><th>Barril</th><th>Divisior de 2</th><th>Divisor de 3</th><th>Grapa RG6</th>
						<th>Coaxial RG-6 (mts)</th><th>Coaxial RG-6 auto (mts)</th><th>Conector Rg-6</th><th>Grapa tipo O</th><th>Tapon Sellamuros</th><th>Cinta ponchable</th><th>Access</th><th>Modem</th>
					</tr>
					<tr>
						<td ><input type="date"  name="fecha" size="1"></td>
						<td ><input value="0" type="text" name="barril" size="1" pattern='[0-9]+' title='Este campo unicamente acepta numero'></td>
						<td ><input value="0" type="text" name="divisor2" size="1" pattern='[0-9]+' title='Este campo unicamente acepta numero'></td>
						<td ><input value="0" type="text" name="divisor3" size="1" pattern='[0-9]+' title='Este campo unicamente acepta numero'></td>
						<td ><input value="0" type="text" size="1" name="grapaRG6" pattern='[0-9]+' title='Este campo unicamente acepta numero'></td>
						<td ><input value="0" size="3" type="text" name="coaxialRG6" pattern='[0-9]+' title='Este campo unicamente acepta numero'></td>
						<td ><input value="0" size="5" type="text" name="coaxialRG6a" pattern='[0-9]+' title='Este campo unicamente acepta numero'></td>
						<td ><input value="0" size="2" type="text" name="conectorRG6" pattern='[0-9]+' title='Este campo unicamente acepta numero'></td>
						<td ><input value="0" size="1" type="text" name="grapaO" pattern='[0-9]+' title='Este campo unicamente acepta numero'></td>
						<td ><input value="0" type="text" name="ts" size="4" pattern='[0-9]+' title='Este campo unicamente acepta numero'></td>
						<td ><input value="0" type="text" size="4" name="cp" pattern='[0-9]+' title='Este campo unicamente acepta numero'></td>
						<td ><input value="0" type="text"  size="1" name="access" pattern='[0-9]+' title='Este campo unicamente acepta numero'></td>
						<td><input value="0" type="text" name="modem" size="1" pattern='[0-9]+' title='Este campo unicamente acepta numero'></td>
					</tr>					
				</table><br>
				<input type="reset" value="Limpiar"></ins><input type="submit" value="Guardar" >
			</form>
		</section>
		<footer>
			<p id="version">Version 1.0 Ultima actualización 00/00/00</p>
			<p class="" id="powered">Powered by César Eduardo</p>
		</footer>
	</div>
</body>
</html>