<?php
include ("seguridad.php");

$contador ="";

$x = 1;

foreach($_POST as $clave => $value){
	if($clave=="Contador"){
		$contador = $value;
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

// Hacemos la consulta con la sentencia SQL para borrar el registro

mysql_query("delete FROM prematriculas WHERE Contador=$contador");

// Verificamos si se borro el registro

if(mysql_affected_rows()>0){
	echo "La prematricula se elimino de la base de datos";
}else{
	echo "No se borro nada de la base de datos de Prematriculas";	
}
mysql_close($conexion);
 ?>
