<?php 
function conectar(){
	$usBD="usuario";
	$passBD="2014digital";
	$bd="admin_digital";
	$host="localhost";

	$link = mysql_connect($host,$usBD,$passBD);

	if(!$link){
		echo "Error al conectar con el servidor";
		exit();
	}
	mysql_select_db($bd,$link);
	return $link;
}
 ?>