<?php 

include ('../php/conexion.php');
$link=conectar();
$tecnico=$_POST['tecnico'];

//Se sube el archivo
if($_FILES['imagen']['size']>0){ 
	$dir="../fotos_auto/";
	opendir($dir);
	$_FILES['imagen']['name']=time();
	$destino=$dir.$_FILES['imagen']['name'];
	copy($_FILES['imagen']['tmp_name'],$destino);
	$nombre=$_FILES['imagen']['name'];

	$resultado=mysql_query("SELECT * FROM fotos_auto Where id_foto_auto='$tecnico';");

	$row=mysql_fetch_array($resultado);
	if($row>0){
		if(mysql_query("UPDATE fotos_auto SET nombre_foto_auto='$destino' where id_foto_auto='$tecnico';",$link)){
			mysql_query("UPDATE tecnicos SET id_foto_auto='$tecnico' where id_tecnico='$tecnico';",$link);
			header("location: perfil_tecnico.php?tecnico=$tecnico");
		}
		else{
			echo "Error 1";
		}
	}
	else{
		if(mysql_query("INSERT INTO fotos_auto (id_foto_auto,nombre_foto_auto) VALUES ('$tecnico','$destino');",$link)){
			if(mysql_query("UPDATE tecnicos SET id_foto_auto='$tecnico' where id_tecnico='$tecnico';",$link)){
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