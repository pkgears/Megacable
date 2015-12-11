<?php
	session_start();
	include ("../php/sesion.php");
 ?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Inventarios anteriores</title> 
	<link rel="stylesheet" href="../css/estilos.css">
	<script type="text/javascript" src="http://code.jquery.com/jquery-2.1.0.min.js"></script>

</head>
<body>
	<div class="" id="contenido">
		<header>
			<img src="../logo.png" alt="Megacable" width="150px" height="150px">
			<h1 class="titulo">Inventarios anteriores</h1>
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
			<?php 

				include ("../php/conexion.php");
				$link=conectar();

				$fecha=$_GET['fecha'];


				$sql_inv="SELECT * FROM inventario where fecha='$fecha';";

				$resultado_inv=mysql_query($sql_inv,$link);

				if($row_inv=mysql_fetch_array($resultado_inv)){
					echo "<h2>Registro de inventario de la fecha ".$fecha;
					$id=$row_inv['id_inventario'];
					$sql_rec="SELECT * from material_recibido where id_recibo='$id';";
					$sql_util="SELECT * from material_utilizado where id_util='$id';";
					$resultado_rec=mysql_query($sql_rec,$link);
					$resultado_util=mysql_query($sql_util,$link);
					if($row_rec=mysql_fetch_array($resultado_rec)){
							echo "
								<h3>Material recibido</h3>
							<table class='tabla' border='1px'>
								<tr>
									<th width='100px'>Fecha</th>
									<th>Barril</th><th>Divisior de 2</th>
									<th>Divisor de 3</th><th>Grapa RG6</th>
									<th>Coaxial RG-6 (mts)</th>
									<th>Coaxial RG-6 auto (mts)</th>
									<th>Conector Rg-6</th>
									<th>Grapa tipo O</th>
									<th>Tapon Sellamuros</th>
									<th>Cinta ponchable</th>
									<th>Access</th>
									<th>Modem</th>
								</tr>
								<tr>
									<td>".$row_rec['fecha']."</td>
									<td>".$row_rec['barril']."</</td>
									<td>".$row_rec['divisor2']."</</td>
									<td>".$row_rec['divisor3']."</</td>
									<td>".$row_rec['grapaRG6']."</</td>
									<td>".$row_rec['coaxialRG6']."</</td>
									<td>".$row_rec['coaxialRG6auto']."</</td>
									<td>".$row_rec['conectorRG6']."</</td>
									<td>".$row_rec['grapaO']."</</td>
									<td>".$row_rec['tapon_sellamuros']."</</td>
									<td>".$row_rec['cinta_ponchable']."</</td>
									<td>".$row_rec['access']."</</td>
									<td>".$row_rec['modem']."</</td>
								</tr>
							</table>";
					}
					else{
						echo "Error en Material recibido";
					}
					if ($row_util=mysql_fetch_array($resultado_util)) {
							echo "
								<h3>Material utilizado</h3>
							<table class='tabla'  border='1px'>
								<tr>
									<th width='100px'>Fecha</th>
									<th>Barril</th><th>Divisior de 2</th>
									<th>Divisor de 3</th><th>Grapa RG6</th>
									<th>Coaxial RG-6 (mts)</th>
									<th>Coaxial RG-6 auto (mts)</th>
									<th>Conector Rg-6</th>
									<th>Grapa tipo O</th>
									<th>Tapon Sellamuros</th>
									<th>Cinta ponchable</th>
									<th>Access</th>
									<th>Modem</th>
								</tr>
								<tr>
									<td>".$row_util['fecha']."</td>
									<td>".$row_util['barril']."</</td>
									<td>".$row_util['divisor2']."</</td>
									<td>".$row_util['divisor3']."</</td>
									<td>".$row_util['grapaRG6']."</</td>
									<td>".$row_util['coaxialRG6']."</</td>
									<td>".$row_util['coaxialRG6auto']."</</td>
									<td>".$row_util['conectorRG6']."</</td>
									<td>".$row_util['grapaO']."</</td>
									<td>".$row_util['tapon_sellamuros']."</</td>
									<td>".$row_util['cinta_ponchable']."</</td>
									<td>".$row_util['access']."</</td>
									<td>".$row_util['modem']."</</td>
								</tr>
							</table>";
					}
					else{
						echo "Error en Material recibido";
					}

					echo "
								<h3>Inventario</h3>
							<table class='tabla'  border='1px'>
								<tr>
									<th width='100px'>Fecha</th>
									<th>Barril</th><th>Divisior de 2</th>
									<th>Divisor de 3</th><th>Grapa RG6</th>
									<th>Coaxial RG-6 (mts)</th>
									<th>Coaxial RG-6 auto (mts)</th>
									<th>Conector Rg-6</th>
									<th>Grapa tipo O</th>
									<th>Tapon Sellamuros</th>
									<th>Cinta ponchable</th>
									<th>Access</th>
									<th>Modem</th>
								</tr>
								<tr>
									<td>".$row_inv['fecha']."</td>
									<td>".$row_inv['barril']."</</td>
									<td>".$row_inv['divisor2']."</</td>
									<td>".$row_inv['divisor3']."</</td>
									<td>".$row_inv['grapaRG6']."</</td>
									<td>".$row_inv['coaxialRG6']."</</td>
									<td>".$row_inv['coaxialRG6auto']."</</td>
									<td>".$row_inv['conectorRG6']."</</td>
									<td>".$row_inv['grapaO']."</</td>
									<td>".$row_inv['tapon_sellamuros']."</</td>
									<td>".$row_inv['cinta_ponchable']."</</td>
									<td>".$row_inv['access']."</</td>
									<td>".$row_inv['modem']."</</td>
								</tr>
								</table>";

				}
				else{
						echo "<h3 class='error'>Error</h3>";
					}

				 ?>
		</section>
		<footer>
			<p id="version">Version 1.0 Ultima actualización 00/00/00</p>
			<p class="" id="powered">Powered by César Eduardo</p>
		</footer>
	</div>
</body>
</html>