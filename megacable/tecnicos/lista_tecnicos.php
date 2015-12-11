<?php
	session_start();
	include ("../php/sesion.php");
 ?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Lista de técnicos</title>
	<link rel="stylesheet" href="../css/estilos.css">
</head>
<body>
	<div class="" id="contenido">
		<header>
			<img src="../logo.png" alt="Megacable" width="150px" height="150px">
			<h1 class="titulo">Lista de técnicos</h1>
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
			<div class="tabla">
				<h1></h1>
				<table>
					<?php
					include ("../php/conexion.php");
					$link=conectar();
					$sql="SELECT * FROM `tecnicos` WHERE fec_salida=0000-00-00 OR fec_salida is null;";
					$resultado=mysql_query($sql);
					if ($row = mysql_fetch_array($resultado)){ 
					   echo "<table border = '1' align='center'> \n"; 
					   echo "<tr><th>Perfil</th><th>Nombre</th><th>Apellido</th><th>Fecha de contratacion</th><th>Direccion</th><th>Telefono</th><th>Opciones</th></tr> \n"; 
					   do {
						      echo "<tr>
						      		<td><a href='perfil_tecnico.php?tecnico=".$row['id_tecnico']."'><img src='../img/perfil.png' title='Perfil del técnico'></a></td>
						      		<td><a href='perfil_tecnico.php?tecnico=".$row['id_tecnico']."'>".$row["nombre"]."</a></td>
						      		<td><a href='perfil_tecnico.php?tecnico=".$row['id_tecnico']."'>".$row["apellido"]."</a></td>
						      		<td>".$row["fec_contrato"]."</td>
						      		<td>".$row["direccion"]."</td>
						      		<td>".$row["telefono"]."</td>
						      		<td>
						      		<a href='editar_tecnico.php?tecnico=".$row['id_tecnico']."'><img src='../img/editar.png' alt='Editar' width=20px height=20px title='Editar técnico'></a> 
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
						      		echo "<a href='../inventarios/nuevo_inventario_tecnico.php?tecnico=".$row['id_tecnico']."'><img src='../img/inventario2.png' alt='Editar' width=20px height=20px title='Nuevo inventario'></a> 
						      		</td>
						      		</tr> \n"; 
					   } while ($row = mysql_fetch_array($resultado) ); 
					   echo "</table> \n"; 
					} else { 
					echo "<h3>¡ No se ha encontrado ningún registro !</h3>"; 
					} 
					mysql_close($link);
				?><br />
				<a href="despedidos.php">Lista de técnicos despedidos</a>
			</div>
		</section>
		<footer>
			<p id="version">Version 1.0 Ultima actualización 00/00/00</p>
			<p class="" id="powered">Powered by César Eduardo</p>
		</footer>
	</div>
</body>
</html>