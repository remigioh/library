<?php include("controlador/seguridad.php");

// Script para modificar un registro de la base de datos biblioteca
include('modelo/class_mysqli3.php');

$i=$_GET['id'];

// recojo en una variable la consulta a la base de datos
$consulta=mysqli_query($conectar, "select * from archivos where id=$i");

// Pasamos la consulta de la base de datos a un vector que recoge el contenido del registro a modificar

$resultado= mysqli_fetch_array($consulta);
?>	

<form action="modelo/edit.php" method="post">
<table align="center" border="1">
<tr>
	<td colspan="2" align="center">Editar registros de la tabla</td>
</tr>

<tr>
	<td>Titulo</td>
	<td><input type="text" name="titulo" value="<?php echo $resultado["titulo"];  ?>" /></td>
</tr>
<tr>
	<td>Autor</td>
	<td><input type="text" name="autor" value="<?php echo $resultado["autor"];  ?>" /></td>
</tr>
<tr>
	<td>Genero</td>
	<td><textarea type="textarea" name="genero"><?php echo $resultado["genero"]; ?></textarea></td>
</tr>
<tr>
	<td>Archivo</td>
	<td><input type="file" name="archivo" value="<?php echo $resultado["archivo"]; ?>" /><?php echo $resultado["archivo"]; ?></td>
</tr>
<tr>
	<td colspan="2" align="center">
	<input type="hidden" name="codigo" value="<?php echo $i; ?>" />
	<input type="submit" value="Modificar" />
	<input type="button" value="Volver" onclick="history.back();"/></td>
</tr>
</table>
</form>