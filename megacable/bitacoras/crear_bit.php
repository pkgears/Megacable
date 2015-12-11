<?php 
include ('../php/conexion.php');

$link=conectar();
$tecnico=$_POST['tecnico'];

$sql="INSERT INTO index_bitacora (id_tecnico) VALUES ('$tecnico');";

if(mysql_query($sql,$link)){
	$rs=mysql_query("SELECT * from index_bitacora where id_tecnico='$tecnico' and id_bit=(SELECT MAX(id_bit) from index_bitacora);",$link);
	$row=mysql_fetch_array($rs);
	$id=$row['id_bit'];
	header("location: insertar_bit.php?id=$id");
}
else{
	echo "Error";
}

 ?>