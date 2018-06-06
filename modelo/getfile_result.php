<?php 		/* Script para descargar el archivo del repositorio */

include('class_mysqli3.php') ;

$id=$_GET['id'];

$consulta= mysqli_query($conectar,"select archivo, contenido, tipo from archivos WHERE id=$id");


 $tipo = mysql_result($consulta, 0, "tipo");
 $archivo = mysql_result($consulta, 0, "archivo");
 $contenido = mysql_result($consulta, 0, "contenido");
 
//Obtenemos el tipo mime del archivo así el navegador sabrá de que se trata
 header("Content-type: $tipo");
 
 //Obtenemos el nombre del archivo por si lo que se requiere es descargarlo
header('Content-Disposition: attachment; filename="'.$archivo.'"');

//Por ultimo mostramos el contenido del archivo
 print $contenido; 
 
 ?>