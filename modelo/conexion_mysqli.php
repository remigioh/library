<?php
function conectar()
{
$server="localhost";
$user="root";
$password="123456";
$db="biblioteca";
global $conectar;
$conectar=mysqli_connect($server,$user,$password) or die
("No se pudo conectar servidor MySQL ".mysql_error());

mysqli_select_db($conectar,$db)or die 
("No se pudo conectar a la Base de datos");
}
//conectar();
?>