<?php 
include ('../php/conexion.php');
$link=conectar();

$tecnico=$_GET['tecnico'];
$sql="SELECT * from fotos where id_foto=$tecnico;";
$resultado_select=mysql_query($sql,$link);

if($row=mysql_fetch_array($resultado_select)){
	if(unlink($row['nombre_foto'])){
		mysql_query("UPDATE tecnicos SET id_foto=0 where id_tecnico='$tecnico';",$link);
		mysql_query("DELETE FROM `fotos` WHERE id_foto ='$tecnico';");
	 	header("location: perfil_tecnico.php?tecnico=$tecnico");
 	}
 	else{
 		mysql_query("UPDATE tecnicos SET id_foto=0 where id_tecnico='$tecnico';",$link);
		mysql_query("DELETE FROM `fotos` WHERE id_foto ='$tecnico';");
 		header("location: perfil_tecnico.php?tecnico=$tecnico");
 	}
}
else{
	mysql_query("UPDATE tecnicos SET id_foto=0 where id_tecnico='$tecnico';",$link);
	mysql_query("DELETE FROM `fotos` WHERE id_foto ='$tecnico';");
	header("location: perfil_tecnico.php?tecnico=$tecnico");
}

?>