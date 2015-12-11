<?php 
include ('../php/conexion.php');
$link=conectar();

$id_tecnico=$_POST['id'];
$id_bitacora=$_POST['id_bitacora'];
$fecha=$_POST['fecha'];
$serie=$_POST['serie'];
$suscriptor=$_POST['suscriptor'];
$barril=$_POST['barril'];
$div2=$_POST['divisor2'];
$div3=$_POST['divisor3'];
$grapaRG6=$_POST['grapaRG6'];

$coaxialRG6inicio=$_POST['coaxialRG6inicio'];
$coaxialRG6fin=$_POST['coaxialRG6fin'];
$coaxialRG6=($_POST['coaxialRG6fin']-$_POST['coaxialRG6inicio']);

$coaxialRG6ainicio=$_POST['coaxialRG6ainicio'];
$coaxialRG6afin=$_POST['coaxialRG6afin'];
$coaxialRG6a=($_POST['coaxialRG6afin']-$_POST['coaxialRG6ainicio']);

$conectorRG6=$_POST['conectorRG6'];
$grapaO=$_POST['grapaO'];
$ts=$_POST['ts'];
$cp=$_POST['cp'];
$access=$_POST['access'];
$modem=$_POST['modem'];

$sql="INSERT INTO `bitacoras`(`id_bit`, `no_serie`, `suscriptor`, `fecha`, `barril`, `divisor2`, `divisor3`, `grapaRG6`, `inicio_coaxialRG6`, `fin_coaxialRG6`, `coaxialRG6`, `inicio_coaxialRG6auto`, `fin_coaxialRG6auto`, `coaxialRG6auto`, `conectorRG6`, `grapaO`, `tapon_sellamuros`, `cinta_ponchable`, `access`, `modem`) VALUES ('$id_bitacora', '$serie', '$suscriptor', '$fecha', '$barril', '$div2', '$div3', '$grapaRG6', '$coaxialRG6inicio', '$coaxialRG6fin', '$coaxialRG6', '$coaxialRG6ainicio', '$coaxialRG6afin', '$coaxialRG6a', '$conectorRG6', '$grapaO', '$ts', '$cp', '$access', '$modem')";

$sql_select="SELECT MAX(id_util) from material_utilizado";
$rs=mysql_query($sql_select,$link);

echo $coaxialRG6a." ".$coaxialRG6;
mysql_query("BEGIN;",$link);
if(mysql_query($sql,$link)){
	if($row=mysql_fetch_array($rs)){
		$max_util=$row['MAX(id_util)'];
		$sql_update="UPDATE `material_utilizado` SET `fecha`=('$fecha'),`barril`=(barril+'$barril'),`divisor2`=(divisor2+'$div2'),`divisor3`=(divisor3+'$div3'), `grapaRG6`=(grapaRG6+'$grapaRG6'),`coaxialRG6`=(coaxialRG6+'$coaxialRG6'),`coaxialRG6auto`=(coaxialRG6auto+'$coaxialRG6a'),`conectorRG6`=(conectorRG6+'$conectorRG6'),`grapaO`=(grapaO+'$grapaO'),`tapon_sellamuros`=(tapon_sellamuros+'$ts'),`cinta_ponchable`=(cinta_ponchable+'$cp'),`access`=(access+'$access'),`modem`=(modem+'$modem') where id_util='$max_util';";
	$sql_select_tecnico="SELECT MAX(id_util) from material_utilizado_tecnicos";
		$rs=mysql_query($sql_select_tecnico,$link);
		$row_update_tecnico=mysql_fetch_array($rs);
		$max_util_tecnico=$row_update_tecnico['MAX(id_util)'];
		echo $max_util_tecnico;
		$sql_update_tecnico="UPDATE `material_utilizado_tecnicos` SET `fecha`=('$fecha'),`barril`=(barril+'$barril'),`divisor2`=(divisor2+'$div2'),`divisor3`=(divisor3+'$div3'), `grapaRG6`=(grapaRG6+'$grapaRG6'),`coaxialRG6`=(coaxialRG6+'$coaxialRG6'),`coaxialRG6auto`=(coaxialRG6auto+'$coaxialRG6a'),`conectorRG6`=(conectorRG6+'$conectorRG6'),`grapaO`=(grapaO+'$grapaO'),`tapon_sellamuros`=(tapon_sellamuros+'$ts'),`cinta_ponchable`=(cinta_ponchable+'$cp'),`access`=(access+'$access'),`modem`=(modem+'$modem') where id_util='$max_util_tecnico' and id_tecnico=2;";

		if(mysql_query($sql_update_tecnico,$link)){
			if(mysql_query($sql_update,$link)){
				$sql_update_equipos="UPDATE equipos right join bitacoras on equipos.no_serie=bitacoras.no_serie SET equipos.fec_inst=bitacoras.fecha, equipos.suscriptor=bitacoras.suscriptor where equipos.no_serie='$serie' and equipos.fec_inst is null and equipos.suscriptor is null;";
				$resultado_equipos=mysql_query($sql_update_equipos,$link);
				$equipos=mysql_fetch_array($resultado_equipos);
						if(mysql_query($sql_update_equipos,$link)){
							mysql_query("SELECT * FROM equipos;", $link);
							mysql_query("COMMIT",$link);
							header("location: bitacora_actual.php?id=$id_tecnico");
								
						}
						else{
							mysql_query("ROOLBACK",$link);
							echo "ERROR en actualizacion";
						}	
				}
				else{
					mysql_query("ROOLBACK",$link);
					echo "Error 0";
				}
		}
		else{
			mysql_query("ROOLBACK",$link);
			echo "Error 1";
		}
	}
	else{
		mysql_query("ROOLBACK",$link);
		echo "Error 2";
	}
}
else{
	mysql_query("ROOLBACK",$link);
	echo "Error 3";
}

mysql_close($link);

 ?>