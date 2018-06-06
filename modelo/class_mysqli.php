<?php
// Parametros de la clase mysqli

$host='localhost';
$user='root';
$passw='123456789';
$db='biblioteca';

/* Conexión al servidor MySQL instanciando el objeto $conectar de la clase mysqli */

$conectar = new mysqli($host,$user,$passw,$db);   

if($conectar->connect_errno) { 
echo '<p>Error al conectar con la base de datos:'.$conectar->connect_error;
echo '</p>';
exit;
}
?>