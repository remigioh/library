<?php 		/* Script para descargar el archivo del repositorio */

include('class_mysqli3.php') ;

$id=$_GET['id'];

$consulta= mysqli_query($conectar,"select archivo, contenido, tipo from archivos WHERE id=$id");


 $obj=mysqli_fetch_object($consulta);		

//Obtenemos el tipo mime del archivo así el navegador sabrá de que se trata
header("Content-type: {$obj->tipo}");

//Obtenemos el nombre del archivo por si lo que se requiere es descargarlo
header('Content-Disposition: attachment; filename="'.$obj->archivo.'"');

//Por ultimo mostramos el contenido del archivo
print $obj->contenido;
 
 ?>