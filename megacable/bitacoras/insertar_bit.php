<?php
	session_start();
	include ("../php/sesion.php");
 ?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Control Digital</title>
	<link rel="stylesheet" href="../css/estilos.css">
</head>
<body>
	<div class="" id="contenido">
		<header>
			<img src="../logo.png" alt="Megacable" width="150px" height="150px">
			<h1 class="titulo">Control de Digitalización</h1>
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
		<section id="bitacora_div" class=''>
			<?php 
				include ('../php/conexion.php');
				$link=conectar();
				$id=$_GET['id'];
				$sql_select="SELECT * from index_bitacora where id_bit='$id';";
				$result_select=mysql_query($sql_select,$link);
				$row_select=mysql_fetch_array($result_select);
				$id_bitacora=$row_select['id_bit'];
				$tecnico=$row_select['id_tecnico'];

				$sql_tecnico="SELECT id_tecnico,nombre,apellido from tecnicos where id_tecnico='$tecnico';";
				$result_tecnico=mysql_query($sql_tecnico,$link);
				$row_tecnico=mysql_fetch_array($result_tecnico);

				echo "<h3>Nueva bitacora de ".$row_tecnico['nombre']." ".$row_tecnico['apellido']."</h3>";

			 ?>
			<table border="1px" class='tabla_bitacora'>
			<form action="guardar.php" method="POST">

				<tr>
					<th>Fecha</th><th>No. serie</th><th>Suscriptor</th><th>Barril</th><th>Divisior de 2</th><th>Divisor de 3</th><th>Grapa RG6</th>
					<th>Inicio</th><th>Fin</th><th>Coaxial RG-6 (mts)</th><th>Inicio</th><th>Fin</th><th>Coaxial RG-6 auto (mts)</th><th>Conector Rg-6</th><th>Grapa tipo O</th><th>Tapon Sella-muros</th><th>Cinta ponchable</th><th>Access</th><th>Modem</th>
				</tr>
				<?php

				$sql_bit="SELECT * FROM bitacoras where id_bit='$id_bitacora';";
				$result_bitacora=mysql_query($sql_bit,$link);
				while($row_bit=mysql_fetch_array($result_bitacora)){
					echo "
					<tr>
						<td>".$row_bit['fecha']."</td>
						<td>".$row_bit['no_serie']."</td>
						<td>".$row_bit['suscriptor']."</td>
						<td>".$row_bit['barril']."</td>
						<td>".$row_bit['divisor2']."</td>
						<td>".$row_bit['divisor3']."</td>
						<td>".$row_bit['grapaRG6']."</td>
						<td>".$row_bit['inicio_coaxialRG6']."</td>
						<td>".$row_bit['fin_coaxialRG6']."</td>
						<td>".$row_bit['coaxialRG6']."</td>
						<td>".$row_bit['inicio_coaxialRG6auto']."</td>
						<td>".$row_bit['fin_coaxialRG6auto']."</td>
						<td>".$row_bit['coaxialRG6auto']."</td>
						<td>".$row_bit['conectorRG6']."</td>
						<td>".$row_bit['grapaO']."</td>
						<td>".$row_bit['tapon_sellamuros']."</td>
						<td>".$row_bit['cinta_ponchable']."</td>
						<td>".$row_bit['access']."</td>
						<td>".$row_bit['modem']."</td>
					</tr>";
				}
				 ?>
				<tr>
					<?php echo "<input type='hidden' value=".$id." name='id'>
								<input type='hidden' value=".$id_bitacora." name='id_bitacora'>"; ?>
					<td ><input type="date"  name="fecha" size="3"></td>
					<td ><input pattern='[0-9]+' title='Unicamente números' type="text" name="serie" size="3"></td>
					<td ><input type="text" name="suscriptor" size="3"></td>
					<td ><input pattern='[0-9]+' title='Unicamente números'value="0" type="text" name="barril" size="1"></td>
					<td ><input pattern='[0-9]+' title='Unicamente números'value="0" type="text" name="divisor2" size="1"></td>
					<td ><input pattern='[0-9]+' title='Unicamente números'value="0" type="text" name="divisor3" size="1"></td>
					<td ><input pattern='[0-9]+' title='Unicamente números'value="0" type="text" size="1" name="grapaRG6"></td>
					<td ><input pattern='[0-9]+' title='Unicamente números'value="0" size="3" type="text" name="coaxialRG6inicio" width="1"></td>
					<td ><input pattern='[0-9]+' title='Unicamente números'value="0" size="3" type="text" name="coaxialRG6fin" size="1"></td>
					<td ><input pattern='[0-9]+' title='Unicamente números'value="0" size="3" type="text" name="coaxialRG6" readonly="readonly"></td>
					<td ><input pattern='[0-9]+' title='Unicamente números'value="0" size="3" type="text" name="coaxialRG6ainicio" size="1"></td>
					<td ><input pattern='[0-9]+' title='Unicamente números'value="0" size="3" type="text" name="coaxialRG6afin" size="1"></td>
					<td ><input pattern='[0-9]+' title='Unicamente números'value="0" size="5" type="text" name="coaxialRG6a" readonly="readonly"></td>
					<td ><input pattern='[0-9]+' title='Unicamente números'value="0" size="2" type="text" name="conectorRG6"></td>
					<td ><input pattern='[0-9]+' title='Unicamente números'value="0" size="1" type="text" name="grapaO"></td>
					<td ><input pattern='[0-9]+' title='Unicamente números'value="0" type="text" name="ts" size="4"></td>
					<td ><input pattern='[0-9]+' title='Unicamente números'value="0" type="text" size="4" name="cp"></td>
					<td ><input pattern='[0-9]+' title='Unicamente números'value="0" type="text"  size="1" name="access"></td>
					<td><input pattern='[0-9]+' title='Unicamente números'value="0" type="text" name="modem" size="1"></td>
				</tr>
			</table><br>
			<input type="submit" value="Guardar">
			</form>
		</section>
		<footer>
			<p id="version">Version 1.0 Ultima actualización <?php echo date("d-m-y"); ?></p>
			<p class="" id="powered">Powered by César Eduardo</p>
		</footer>
	</div>
</body>
</html>