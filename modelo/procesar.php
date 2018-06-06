<?php
include ("seguridad.php");

$texto ="UPDATE prematriculas SET";
$contador ="";
$x = 1;
if(empty($_POST['AceptaMails'])){
	$_POST['AceptaMails'] = "No";
}
foreach($_POST as $clave => $value){
	if($clave=="Contador"){
		$contador = " WHERE ".$clave."=".$value;
	}else{
		
		if($x == count($_POST)){
			$texto .= " ".$clave."='".$value."'";
			
		}else{
			$texto .= " ".$clave."='".$value."',";
			
		}		
		
	}
	
	$x++;
	
}
//Establecemos conexión con MySQL y seleccionamos base de datos
require_once('conexion1.php');

$query = mysql_query($texto.$contador,$conexion) or die ("error");
if(mysql_affected_rows()>0){
	echo "Actualización de datos exitosa";
}else{
	echo "No se realizó ningún cambio";	
}
mysql_close($conexion);
?>