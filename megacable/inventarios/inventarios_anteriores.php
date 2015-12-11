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
			<div id="meses">
				<h2>Registro de Inventarios</h2>
				<?php 
					include ("seleccion.php");
					include ("../php/conexion.php");

					$link=conectar();

					$mes_1=4;
					$mes_2=0;
					$año=4;

					$sql="SELECT fecha FROM inventario";
					$sql_max="SELECT MAX(fecha) from inventario;";
					//$sql_max="SELECT fecha from inventario where fecha=Select MAX(fecha) from inventario;";
					$resultado=mysql_query($sql_max,$link);
					if($row_max=mysql_fetch_array($resultado)){
						$max_fecha=$row_max['MAX(fecha)'];						
						do{
							$datos='201'.$año.'-'.$mes_2.$mes_1.'-01';
							$datos1='201'.$año.'-'.$mes_2.$mes_1.'-31';
							$date=$meses['201'.$año.'/'.$mes_2.$mes_1.'/01'];
							echo "<div class='mes'><span>".$date."</span><div class='flecha2'></div>";
							$resultado2=mysql_query($sql,$link);
							while ($row=mysql_fetch_array($resultado2)) {
								if($row['fecha']>=$datos and $row['fecha']<=$datos1){
									echo "<div class='cuadros'><a href='inventario_fecha.php?fecha=".$row['fecha']."'>Inventario del ". $row['fecha']."</a></div>";
								}
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
					else{
						echo "Error";
					}
				 ?>
			</div>
			<aside id='calendario'>
				
			</aside>
		</section>
		<footer>
			<p id="version">Version 1.0 Ultima actualización 00/00/00</p>
			<p class="" id="powered">Powered by César Eduardo</p>
		</footer>
	</div>
</body>
</html>

