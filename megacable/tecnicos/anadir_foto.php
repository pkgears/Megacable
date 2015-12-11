<?php 

include ('../php/conexion.php');
$link=conectar();
$tecnico=$_POST['tecnico'];

//Se sube el archivo
if($_FILES['imagen']['size']>0){
	$dir="../fotos/";
	opendir($dir);
	$_FILES['imagen']['name']=time();
	$destino=$dir.$_FILES['imagen']['name'];
	copy($_FILES['imagen']['tmp_name'],$destino);
	$nombre=$_FILES['imagen']['name'];

	$resultado=mysql_query("SELECT * FROM fotos Where id_foto='$tecnico';");

	$row=mysql_fetch_array($resultado);
	if($row>0){
		if(mysql_query("UPDATE fotos SET nombre_foto='$destino' where id_foto='$tecnico';",$link)){
			mysql_query("UPDATE tecnicos SET id_foto='$tecnico' where id_tecnico='$tecnico';",$link);
			header("location: perfil_tecnico.php?tecnico=$tecnico");
		}
		else{
			echo "Error 1";
		}
	}
	else{
		if(mysql_query("INSERT INTO fotos (id_foto,nombre_foto) VALUES ('$tecnico','$destino');",$link)){
			if(mysql_query("UPDATE tecnicos SET id_foto='$tecnico' where id_tecnico='$tecnico';",$link)){
				header("location: perfil_tecnico.php?tecnico=$tecnico");
			}
			else{
				echo "Error 2";
			}
		}	
		else{
			echo "Error";
		}
	}
}
else{
	echo "<h1>No se seleccion&oacute; ninguna imagen</h1>";
}
?>
