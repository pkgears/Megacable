<?php
	session_start();
	include ("../php/sesion.php");
	include ('../php/conexion.php');

	$link=conectar();
	$tecnico=$_GET['tecnico'];
	$sql="SELECT * FROM tecnicos left join fotos on tecnicos.id_foto=fotos.id_foto where id_tecnico='$tecnico' ;";
	$resutlado=mysql_query($sql,$link);
	$row=mysql_fetch_array($resutlado);

	$sql_auto="SELECT * FROM tecnicos left join fotos_auto on tecnicos.id_foto_auto=fotos_auto.id_foto_auto where id_tecnico='$tecnico' ;";
	$resutlado=mysql_query($sql_auto,$link);
	$row_auto=mysql_fetch_array($resutlado);

 ?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Control Digital</title>
	<link rel="stylesheet" href="../css/estilos.css">
	<script language="JavaScript">
		function ocultar_mostrar(div){
			div = document.getElementById(div);
			//Verificamos si la capa esta oculta o no y como resultado
			//indicamos que cambie su valor distinto al actual. "none" o "block"
			div.style.display!='none'?
			div.style.display='none':div.style.display='block';
			}
	</script>
</head>
<body>
	<div class="" id="contenido">
		<header>
			<img src="../logo.png" alt="Megacable" width="150px" height="150px">
			<h1 class="titulo">Perfil de técnico</h1>
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
		<section id="central" class='perfil'>
			<div id='back' class="add_foto ">
				<a href="lista_tecnicos.php"><img src='../img/back.png' title='Volver a "Lista de técnicos"'></a>
				<h3>Lista de técnicos</h3>
				<div id='botones'>
						<?php 

							if($row['fec_salida']=="0000-00-00" or is_null($row['fec_salida'])){
						echo "<a href='editar_tecnico.php?tecnico=".$row['id_tecnico']."'><img src='../img/editar.png' alt='Editar' width=20px height=20px title='Editar técnico'></a> 
						      		<a href='../bitacoras/bitacora_actual.php?id=".$row['id_tecnico']."'><img src='../img/bitacora.png' alt='Editar' width=20px height=20px title='Bitacora actual'></a> 
						      		<a href='../inventarios/inventario_actual_tecnico.php?tecnico=".$row['id_tecnico']."'><img src='../img/inventario_a.png' alt='Editar' width=20px height=20px title='Inventario actual'></a>";
						      		$sql_check="SELECT id_inventario from inventario";
									$check=mysql_query($sql_check,$link);
									if($inv=mysql_fetch_array($check)>0){
						      		echo "<a href='../confirmar_bitacora.php?id=".$row['id_tecnico']."'><img src='../img/bitacora_new.png' alt='Editar' width=20px height=20px title='Nueva bitacora'></a> ";
						      		}
						      		else{
						      			 echo "<a href='../bitacoras/nueva_bitacora.php'><img src='../img/bitacora_new.png' alt='Editar' width=20px height=20px title='Nueva bitacora'></a> ";
						      		}
						      		echo "<a href='../inventarios/nuevo_inventario_tecnico.php?tecnico=".$row['id_tecnico']."'><img src='../img/inventario2.png' alt='Editar' width=20px height=20px title='Nuevo inventario'></a>" ;
						      }
					 		?>
					 </div><br>
			</div>
			<div id="perfil" >	
				<aside id="left">
					<div id="foto_perfil">
						<span id='titulo_foto'>Fotografía del técnico</span>
						<?php echo "<img src=".$row['nombre_foto']." alt='Foto de técnico' title='Foto de tecnico' width='180px' height='180px'>" ?>
						<div class="add_foto">
							<img src="../fotos/image_add.png" title="Cambiar fotografia" onclick='ocultar_mostrar("foto")'>
						<?php echo '<a href="borrar_foto.php?tecnico='.$row['id_tecnico'].'"><img src="../fotos/image_delete.png" title="Eliminar fotografia"></a>' ?>	
						</div>
						<article id="foto" class='opcion add_foto pequeno'>
							<img  src='../img/cerrar.png' onclick='ocultar_mostrar("foto")'title='Cerrar'><br />
								<form action="anadir_foto.php" method="POST" enctype="multipart/form-data">
									<h4>Seleccione la fotografia</h4>
									<?php echo "<input type='hidden' value=".$row['id_tecnico']." name='tecnico'>"?>
									<input type="file" name="imagen">
									<input type='submit' value="Enviar">
								</form>						
						</article>
					</div>	
				</aside>
				
				<article id="detalles">
					
					<table class="tabla_perfil" border="">
						<?php 
							echo "<tr><th>Nombre: </th><td>".$row['nombre']."</td><tr>
								  <tr><th>Apellidos: </th><td>".$row['apellido']."</td></tr>
								  <tr><th>Direccion:</th><td>".$row['direccion']."</td></tr>
								  <tr><th>Teléfono:</th><td>".$row['telefono']."</td></tr>
								  <tr><th>Fecha de contratación: </th><td>".$row['fec_contrato']."</td></tr>
								  <tr><th>Fecha de salida: </th><td>".$row['fec_salida']."</td></tr>
								  <tr><th>Comentarios de contratación: </th><td>".$row['comentarios']."</td></th>
								  <tr><th>Comentarios de salida: </th><td>".$row['comentarios_after']."</td></tr>
								  <a href='editar_tecnico.php?tecnico=".$row['id_tecnico']."'><img src='../img/editar_equipo.png' alt='Editar información' title='Editar información' ></a>
					</table>
					";
						 
						?>
				</article>
				<article id='detalles'>
					<div id='bitacoras'>
						<h3>Bitacoras</h3>
						<?php 
					include ("seleccion.php");

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
							echo "<h4>".$date."</h4>";
							$sql_bit="SELECT * from index_bitacora inner join bit_fecha where id_tecnico='$tecnico' and index_bitacora.id_bit=bit_fecha.id_bit order by fecha;";
							$rs_bit=mysql_query($sql_bit);
							while ($row_bit=mysql_fetch_array($rs_bit) and $datos<=$row_bit['fecha']) {
										$variable_bitacora=$row_bit['id_bit'];
										$fecha=$row_bit['fecha'];
										echo "<a href='../bitacoras/bitacora_pasada.php?tecnico=$tecnico&id_bit=$variable_bitacora&fecha=$fecha' >Bitacora de ".$row_bit['fecha']."</a><br >";
									}
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
					</div>
					<div id='inventarios'>
						<h3>Inventarios</h3>
						<?php 

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
									echo "<h4>".$date."</h4>";
									$resultado2=mysql_query($sql,$link);
									while ($row=mysql_fetch_array($resultado2)) {
										if($row['fecha']>=$datos and $row['fecha']<=$datos1){
											echo "<a href='inventario_fecha.php?fecha=".$row['fecha']."'>Inventario del ". $row['fecha']."</a>";
										}
									}
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
				</article>
				<aside id='right'>
					<div id="foto_carro">
						<span id='titulo_foto'>Vehículo del técnico</span>
						<?php echo "<img src=".$row_auto['nombre_foto_auto']." alt='Vehículo del tecnico' title='Vehículo del tecnico' width='180px' height='180px'>" ?>
						<div class="add_foto">
							<img src="../fotos/image_add.png" title="Cambiar fotografia" onclick='ocultar_mostrar("foto_auto")'>
						<?php echo '<a href="borrar_foto_auto.php?tecnico='.$tecnico.'"><img src="../fotos/image_delete.png" title="Eliminar fotografia"></a>' ?>	
						</div>
						<article id="foto_auto" class='opcion add_foto pequeno'>
							<img  src='../img/cerrar.png' onclick='ocultar_mostrar("foto_auto")'title='Cerrar'><br />
								<form action="anadir_foto_auto.php" method="POST" enctype="multipart/form-data">
									<h4>Seleccione la fotografia del vehículo</h4>
									<?php echo "<input type='hidden' value='".$tecnico."' name='tecnico'>"
									?>
									<input type="file" name="imagen">
									<input type='submit' value="Enviar">
								</form>						
						</article>
					</div>
				</aside>
			</div>
			
		</section>
		<footer>
			<p id="version">Version 1.0 Ultima actualización 00/00/00</p>
			<p class="" id="powered">Powered by César Eduardo</p>
		</footer>
	</div>
</body>
</html>
