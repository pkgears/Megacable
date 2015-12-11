<?php 
include ('../php/conexion.php');
$link=conectar();

$fecha=$_POST['fecha'];
$barril=$_POST['barril'];
$div2=$_POST['divisor2'];
$div3=$_POST['divisor3'];
$grapaRG6=$_POST['grapaRG6'];
$coaxialRG6=$_POST['coaxialRG6'];
$coaxialRG6a=$_POST['coaxialRG6a'];
$conectorRG6=$_POST['conectorRG6'];
$grapaO=$_POST['grapaO'];
$ts=$_POST['ts'];
$cp=$_POST['cp'];
$access=$_POST['access'];
$modem=$_POST['modem'];

$sql="UPDATE material_recibido SET `barril`='$barril',`divisor2`='$div2',`divisor3`='$div3',`grapaRG6`='$grapaRG6',`coaxialRG6`='$coaxialRG6',`coaxialRG6auto`='$coaxialRG6a',`conectorRG6`='$conectorRG6',`grapaO`='$grapaO',`tapon_sellamuros`='$ts',`cinta_ponchable`='$cp',`access`='$access',`modem`='$modem' WHERE fecha='$fecha';";

if(mysql_query($sql,$link)){
	header("location: ../inventario_acutal.php");
}
else{
	echo "Error";
}
?>
