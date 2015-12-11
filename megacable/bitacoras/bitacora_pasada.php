<?php
	session_start();
	include ("../php/sesion.php");
	include ('../php/actualizacion.php');
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
		<section id="bitacora_div" class='tabla'>

			<?php 
			include ("../php/conexion.php");
			$link=conectar();
			$tecnico=$_GET['tecnico'];
			$id_bitacora=$_GET['id_bit'];
			$fecha=$_GET['fecha'];
			$sql="SELECT nombre, apellido from tecnicos where id_tecnico=$tecnico";
			$rs=mysql_query($sql,$link);
			$row=mysql_fetch_array($rs);
			echo "<h2>Bitacora de ".$row['nombre']." ".$row['apellido']." de la fecha ".$fecha."</h2>";
			?>
			<table border="1px" class='tabla_bitacora'>
			<tr>
					<th width="200px">Fecha</th>
					<th width="100px">No. serie</th>
					<th width="100px">Suscriptor</th>
					<th width="60px">Barril</th>
					<th width="60px">Divisior de 2</th>
					<th width="60px">Divisor de 3</th>
					<th width="60px">Grapa RG6</th>
					<th width="60px">Inicio</th>
					<th width="60px">Fin</th>
					<th width="60px">Coaxial RG-6 (mts)</th>
					<th width="60px">Inicio</th>
					<th width="60px">Fin</th>
					<th width="60px">Coaxial RG-6 auto (mts)</th>
					<th width="60px">Conector Rg-6</th
					><th width="60px">Grapa tipo O</th>
					<th width="60px">Tapon Sella-muros</th>
					<th width="60px">Cinta ponchable</th>
					<th width="60px">Access</th>
					<th width="60px">Modem</th>
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
			</table><br>
		</section>
		<footer>
			<p id="version"><?php echo $update; ?></p>
			<p class="" id="powered">Powered by César Eduardo</p>
		</footer>
	</div>
</body>
</html>