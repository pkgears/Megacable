<?php
session_start();
include ("conexion.php");
include ("sesion.php");

$check=0;

$user=$_POST['user'];
$pass=$_POST['pass'];

$bd="admin_digital";

$link=conectar();

if($link){
	if(mysql_select_db($bd,$link)){
		$consulta=mysql_query("SELECT * FROM usuarios WHERE usuario='$user' and password='$pass';",$link);
		$cons=mysql_fetch_array($consulta);
		if(mysql_num_rows($consulta)!=0){
			$_SESSION["usuario"]=$user;
			header("Location:../inicio.php");
		}
		else{
			$check=1;
			header("location:../error/error1001x.php");
		}
	}
	else{
		echo "Error al conectar con la base de datos";
	}
}
else{
	echo "Error al conectar con el servidor";
}

$_SESSION["usuario"]=$user;
?>