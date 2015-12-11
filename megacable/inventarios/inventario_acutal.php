<?php
	session_start();
	include ("../php/sesion.php");
	include ("../php/actualizacion.php");
 ?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Inventario acutal</title>
	<link rel="stylesheet" href="../css/estilos.css">
</head>
<body>
	<div class="" id="contenido">
		<header>
			<img src="../logo.png" alt="Megacable" width="150px" height="150px">
			<h1 class="titulo">Inventario acutal</h1>
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
		<section id="central" class='add_foto'>
			<h3>Material recibido </h3>
				<?php 
					include ("../php/conexion.php");
					$link=conectar();
					
					
					$sql_rec="SELECT * FROM material_recibido where id_recibo=(Select MAX(id_recibo) from material_recibido) ;";
					$resultado_rec=mysql_query($sql_rec,$link);

					if($row1=mysql_fetch_array($resultado_rec)){
						echo   "
						<table border='1' class='tabla' >
							<tr>
								<th width='100px'>Fecha</th><th>Barril</th><th>Divisior de 2</th><th>Divisor de 3</th><th>Grapa RG6</th><th>Coaxial RG-6 (mts)</th><th>Coaxial RG-6 auto (mts)</th><th>Conector Rg-6</th><th>Grapa tipo O</th><th>Tapon Sellamuros</th><th>Cinta ponchable</th><th>Access</th><th>Modem</th>
							</tr>
							<tr>
									<td>".$row1['fecha']."</td>
									<td>".$row1['barril']."</</td>
									<td>".$row1['divisor2']."</</td>
									<td>".$row1['divisor3']."</</td>
									<td>".$row1['grapaRG6']."</</td>
									<td>".$row1['coaxialRG6']."</</td>
									<td>".$row1['coaxialRG6auto']."</</td>
									<td>".$row1['conectorRG6']."</</td>
									<td>".$row1['grapaO']."</</td>
									<td>".$row1['tapon_sellamuros']."</</td>
									<td>".$row1['cinta_ponchable']."</</td>
									<td>".$row1['access']."</</td>
									<td>".$row1['modem']."</</td>
									</tr>";
					echo '</table><a href="mod_inventario.php?fecha='.$row1['fecha'].'"><img src="edit_inv.png" alt="" title="Modificar el material recibido"></a>
							<br><br>';
						}
						else{
							echo "<h2>***No se encontro registro***</h2>";
						}

					 ?>
			<?php  
			 ?>
			<h3>Material utilizado</h3>
				<?php 
					$link=conectar();

					$sql_util="SELECT * FROM material_utilizado where id_util=(Select MAX(id_util) from material_utilizado) ;";
					$resultado_util=mysql_query($sql_util,$link);

					if($row2=mysql_fetch_array($resultado_util)){
						echo   "
							<table border='1' class='tabla'>
								<tr>
									<th width='100px'>Fecha</th><th>Barril</th><th>Divisior de 2</th><th>Divisor de 3</th><th>Grapa RG6</th><th>Coaxial RG-6 (mts)</th><th>Coaxial RG-6 auto (mts)</th><th>Conector Rg-6</th><th>Grapa tipo O</th><th>Tapon Sellamuros</th><th>Cinta ponchable</th><th>Access</th><th>Modem</th>
								</tr>
								<tr>
									<td>".$row2['fecha']."</td>
									<td>".$row2['barril']."</</td>
									<td>".$row2['divisor2']."</</td>
									<td>".$row2['divisor3']."</</td>
									<td>".$row2['grapaRG6']."</</td>
									<td>".$row2['coaxialRG6']."</</td>
									<td>".$row2['coaxialRG6auto']."</</td>
									<td>".$row2['conectorRG6']."</</td>
									<td>".$row2['grapaO']."</</td>
									<td>".$row2['tapon_sellamuros']."</</td>
									<td>".$row2['cinta_ponchable']."</</td>
									<td>".$row2['access']."</</td>
									<td>".$row2['modem']."</</td>
									</tr>";
						}
						else{
							echo "<h2>***No se encontro registro***</h2>";
						}


					 ?>
			</table>
			<h3>Inventario final</h3>
				<?php 
					$link=conectar();

					$id=$row1['id_recibo'];
					$barril=$row1['barril']-$row2['barril'];
					$divisor2=$row1['divisor2']-$row2['divisor2'];
					$divisor3=$row1['divisor3']-$row2['divisor3'];
					$grapaRG6=$row1['grapaRG6']-$row2['grapaRG6'];
					$coaxialRG6=$row1['coaxialRG6']-$row2['coaxialRG6'];
					$coaxialRG6auto=$row1['coaxialRG6auto']-$row2['coaxialRG6auto'];
					$conectorRG6=$row1['conectorRG6']-$row2['conectorRG6'];
					$grapaO=$row1['grapaO']-$row2['grapaO'];
					$ts=$row1['tapon_sellamuros']-$row2['tapon_sellamuros'];
					$cp=$row1['cinta_ponchable']-$row2['cinta_ponchable'];
					$access=$row1['access']-$row2['access'];
					$modem=$row1['modem']-$row2['modem'];

					$sql_inv="SELECT * FROM inventario where id_inventario=(Select MAX(id_inventario) from inventario) ;";
					$resultado_inv=mysql_query($sql_inv,$link);

					$sql_inv_update="UPDATE `inventario` SET `barril`='$barril', divisor2='$divisor2', divisor3='$divisor3', grapaRG6='$grapaRG6', coaxialRG6='$coaxialRG6', coaxialRG6auto='$coaxialRG6auto', conectorRG6='$conectorRG6', grapaO='$grapaO', tapon_sellamuros='$ts', cinta_ponchable='$cp', access='$access', modem='$modem' WHERE id_inventario='$id' ;";

					if(!mysql_query($sql_inv_update,$link)){
						echo "Error 1";
					}

					if($row3=mysql_fetch_array($resultado_inv)){
						echo   "
							<table border='1' class='tabla'>
								<tr>
									<th width='100px'>Fecha</th><th>Barril</th><th>Divisior de 2</th><th>Divisor de 3</th><th>Grapa RG6</th><th>Coaxial RG-6 (mts)</th><th>Coaxial RG-6 auto (mts)</th><th>Conector Rg-6</th><th>Grapa tipo O</th><th>Tapon Sellamuros</th><th>Cinta ponchable</th><th>Access</th><th>Modem</th>
								</tr>
								<tr>
										<td>".$row3['fecha']."</td>
										<td>".$row3['barril']."</</td>
										<td>".$row3['divisor2']."</</td>
										<td>".$row3['divisor3']."</</td>
										<td>".$row3['grapaRG6']."</</td>
										<td>".$row3['coaxialRG6']."</</td>
										<td>".$row3['coaxialRG6auto']."</</td>
										<td>".$row3['conectorRG6']."</</td>
										<td>".$row3['grapaO']."</</td>
										<td>".$row3['tapon_sellamuros']."</</td>
										<td>".$row3['cinta_ponchable']."</</td>
										<td>".$row3['access']."</</td>
										<td>".$row3['modem']."</</td>
										</tr>";
					}
					else{
						echo "<h2>***No se encontro registro***</h2>";
					}
							mysql_close($link);
						 ?>
			</table>
			<br><span class='notificacion'>*Si las operaciones paracen erroneas cargue la página nuevamente</span>
		</section>
		<footer>
			<p id="version">Version 1.0 Ultima actualización <?php echo $update ?></p>
			<p class="" id="powered">Powered by César Eduardo</p>
		</footer>
	</div>
</body>
</html>