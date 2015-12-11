<?php
	session_start();
	include ("../php/sesion.php");
	include ('../php/conexion.php');
	include ("../php/actualizacion.php");

	$link=conectar();
	$tecnico=$_GET['tecnico'];
	$fecha=$_GET['fecha'];
	$sql="SELECT * from material_entregado where fecha='$fecha' and id_tecnico='$tecnico' ;";
	$resultado=mysql_query($sql,$link);
 ?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Modificar inventario</title>
	<link rel="stylesheet" href="../css/estilos.css">
</head>
<body>
	<div class="" id="contenido">
		<header>
			<img src="../logo.png" alt="Megacable" width="150px" height="150px">
			<h1 class="titulo">Modificar inventario</h1>
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
		<?php  ?>
			<form action="inv_modificar_tecnico.php" class="form_inv" method="POST">
				<table class="tabla" border="1px"> 
					<tr>
						<th>Fecha</th><th>Barril</th><th>Divisior de 2</th><th>Divisor de 3</th><th>Grapa RG6</th>
						<th>Coaxial RG-6 (mts)</th><th>Coaxial RG-6 auto (mts)</th><th>Conector Rg-6</th><th>Grapa tipo O</th><th>Tapon Sellamuros</th><th>Cinta ponchable</th><th>Access</th><th>Modem</th>
					</tr>
					<tr>
					<?php
						$sql_tecnico="SELECT id_tecnico,nombre,apellido from tecnicos where id_tecnico='$tecnico';";
						$result_tecnico=mysql_query($sql_tecnico,$link);
						$row_tecnico=mysql_fetch_array($result_tecnico);
						echo "<h2>Modificar material entregado a  ".$row_tecnico['nombre']." ".$row_tecnico['apellido']."</h2>";
						$row=mysql_fetch_array($resultado);
						echo "<input type='hidden' value=".$tecnico." name='tecnico'>";
				echo 	"<td ><input type='date'  value=".$fecha." name='fecha' size='1' readonly='readonly'></td>
						<td ><input value='".$row['barril']."' type='text' name='barril' size='1'></td>
						<td ><input value='".$row['divisor2']."' type='text' name='divisor2' size='1'></td>
						<td ><input value='".$row['divisor3']."' type='text' name='divisor3' size='1'></td>
						<td ><input value='".$row['grapaRG6']."' type='text' size='1' name='grapaRG6'></td>
						<td ><input value='".$row['coaxialRG6']."' size='3' type='text' name='coaxialRG6'></td>
						<td ><input value='".$row['coaxialRG6auto']."' size='5' type='text' name='coaxialRG6a'></td>
						<td ><input value='".$row['conectorRG6']."' size='2' type='text' name='conectorRG6'></td>
						<td ><input value='".$row['grapaO']."' size='1' type='text' name='grapaO'></td>
						<td ><input value='".$row['tapon_sellamuros']."' type='text' name='ts' size='4'></td>
						<td ><input value='".$row['cinta_ponchable']."' type='text' size='4' name='cp'></td>
						<td ><input value='".$row['access']."' type='text'  size='1' name='access'></td>
						<td><input value='".$row['modem']."' type='text' name='modem' size='1'></td>";
						?>
					</tr>					
				</table><br>
				<input type="reset" value="Limpiar"><input type="submit" value="Guardar" >
			</form>
		</section>
		<footer>
			<p id="version"><?php echo $update; ?></p>
			<p class="" id="powered">Powered by César Eduardo</p>
		</footer>
	</div>
</body>
</html>