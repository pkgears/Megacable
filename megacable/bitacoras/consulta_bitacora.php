<?php
	session_start();
	include ("../php/sesion.php");
	include ('../php/actualizacion.php');
 ?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Consultar bitacora</title>
	<link rel="stylesheet" href="../css/estilos.css">
</head>
<body>
	<div class="" id="contenido">
		<header>
			<img src="../logo.png" alt="Megacable" width="150px" height="150px">
		<h1 class="titulo">Consultar bitacora</h1>
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
			<div id="meses">
				<h2>Registro de bitácoras</h2>
				*Las fechas de las bitacoras son mostradas según la fecha del último registro ingresado
				<?php 
					include ("../php/conexion.php");
					include ("seleccion.php");
					$link=conectar();
					$mes_1=4;
					$mes_2=0;
					$año=4;

					$sql_fecha_max="SELECT MAX(fecha) FROM bit_fecha";
					$fecha_max_rs=mysql_query($sql_fecha_max,$link);

					if($row_max=mysql_fetch_array($fecha_max_rs)){
						$max_fecha=$row_max['MAX(fecha)'];
						do{
							$datos='201'.$año.'-'.$mes_2.$mes_1.'-01';
							$datos1='201'.$año.'-'.$mes_2.$mes_1.'-31';
							$date=$meses['201'.$año.'/'.$mes_2.$mes_1.'/01'];
							echo "<div class='mes'><span>".$date."</span><div class='flecha2'></div>";
								$sql_tecnicos="SELECT id_tecnico, nombre, apellido from tecnicos";
								$rs_tecnicos=mysql_query($sql_tecnicos,$link);
								while($row_tecnicos=mysql_fetch_array($rs_tecnicos) ){
									$tecnico=$row_tecnicos['id_tecnico'];
									echo "<div >
										  <h4>".$row_tecnicos['nombre']." ".$row_tecnicos['apellido']."</h4>";
									$sql_bit="SELECT * from index_bitacora inner join bit_fecha where id_tecnico='$tecnico' and index_bitacora.id_bit=bit_fecha.id_bit order by fecha;";
									$rs_bit=mysql_query($sql_bit);
									while ($row_bit=mysql_fetch_array($rs_bit) and $datos<=$row_bit['fecha']) {
										$variable_bitacora=$row_bit['id_bit'];
										$tecnico=$row_tecnicos['id_tecnico'];
										$fecha=$row_bit['fecha'];
										echo "<a href='bitacora_pasada.php?tecnico=$tecnico&id_bit=$variable_bitacora&fecha=$fecha' >Bitacora de ".$row_bit['fecha']."</a><br >";
									}
									echo "</div>";
								}
							echo "</div>";
							$mes_1=$mes_1+1;
							if($mes_1==10){
								$mes_2=1;
								$mes_1=0;
							}
							if(($mes_2.$mes_1)==13){
								$año=$año+1;
								$mes_2=0;
								$mes_1=1;
							}
						}while($datos<=$max_fecha);
					}
				 ?>
		</section>
		<footer>
			<p id="version"><?php echo $update; ?></p>
			<p class="" id="powered">Powered by César Eduardo</p>
		</footer>
	</div>
</body>
</html>