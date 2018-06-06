<?php
include('class_mysqli3.php');

// recojemos los valores de los campos del registro a modificar

$titulo=$_POST['titulo'];
$autor=$_POST['autor'];
$archivo=$_POST['archivo'];
$genero=$_POST['genero'];
$codigo=$_POST['codigo'];

// Actualizo el registro en la tabla libros de la base de datos biblioteca

mysqli_query($conectar,"update archivos set titulo='$titulo',autor='$autor',archivo='$archivo',genero='$genero' where id='$codigo'");
 
echo  "<script>
alert(' El registro se actualizo en la tabla libros de la base de datos biblioteca');
window.location='../inicio.php';
</script>"
 ?>