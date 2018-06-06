<?php
function conectar()
{
$server="localhost";
$user="root";
$password="123456";
$db="prematriculas";

global $conexion;
$conexion=mysql_connect($server,$user,$password) or die
("No se pudo conectar servidor MySQL ".mysql_error());

mysql_select_db($db,$conexion)or die 
("No se pudo conectar a la Base de datos");
}
conectar();
?>