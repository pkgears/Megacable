<?php 
include ('../php/conexion.php');
$link=conectar();

$tecnico=$_POST['tecnico'];
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

$sql="INSERT INTO `material_entregado`(`id_tecnico`,`fecha`, `barril`, `divisor2`, `divisor3`, `grapaRG6`, `coaxialRG6`, `coaxialRG6auto`, `conectorRG6`, `grapaO`, `tapon_sellamuros`, `cinta_ponchable`, `access`, `modem`) VALUES ('$tecnico', '$fecha','$barril', '$div2', '$div3', '$grapaRG6', '$coaxialRG6','$coaxialRG6a','$conectorRG6','$grapaO','$ts','$cp','$access','$modem');";

$sql_inv="INSERT INTO `inventario_tecnico`(`id_tecnico`,`fecha`, `barril`, `divisor2`, `divisor3`, `grapaRG6`, `coaxialRG6`, `coaxialRG6auto`, `conectorRG6`, `grapaO`, `tapon_sellamuros`, `cinta_ponchable`, `access`, `modem`) VALUES ('$tecnico','$fecha','$barril', '$div2', '$div3', '$grapaRG6', '$coaxialRG6','$coaxialRG6a','$conectorRG6','$grapaO','$ts','$cp','$access','$modem');";

$sql_util="INSERT INTO `material_utilizado_tecnicos`(`id_tecnico`,`fecha`, `barril`, `divisor2`, `divisor3`, `grapaRG6`, `coaxialRG6`, `coaxialRG6auto`, `conectorRG6`, `grapaO`, `tapon_sellamuros`, `cinta_ponchable`, `access`, `modem`) VALUES ('$tecnico','$fecha',0,0,0,0,0,0,0,0,0,0,0,0);";


if (mysql_query($sql,$link)) {
	mysql_query($sql_inv,$link);
	mysql_query($sql_util,$link);
	header("location:hecho.php");

}
else{
	echo "<h1>No se pudo</h1>";
}
?>