<?php include("controlador/seguridad.php");

include('modelo/class_mysqli3.php');

$i=$_GET['id'];
// recojo en una variable la consulta a la base de datos
$consulta=mysqli_query($conectar, "select * from archivos where id=$i");

// Pasamos la consulta de la base de datos a un vector que recoge el contenido del registro a borrar
$resultado= mysqli_fetch_array($consulta);
?>
<form action="modelo/delete_mysqli.php" method="post">
<table align="center" border="1">
<tr>
	<td colspan="2" align="center">Borrar un registro de la tabla libros</td>
</tr>

<tr>
	<td>Titulo</td>
	<td><input type="text" name="titulo" value="<?php echo $resultado["titulo"];  ?>" readonly /></td>
</tr>
<tr>
	<td>Autor</td>
	<td><input type="text" name="autor" value="<?php echo $resultado["autor"];  ?>" readonly /></td>
</tr>
<tr>
	<td>Genero</td>
	<td><textarea type="textarea" name="genero" readonly ><?php echo $resultado["genero"]; ?></textarea></td>
</tr>
<tr>
	<td>Archivo</td>
	<td><input type="text" name="archivo" value="<?php echo $resultado["archivo"];  ?>" readonly /></td>
</tr>
<tr>
	<td colspan="2" align="center">
	<input type="hidden" name="id" value="<?php echo $i; ?>" />
	<input type="submit" value="Borrar" onclick="return confirm('Esta seguro que desa eliminar el registro?');" />
	<input type="button" value="Volver" onclick="history.back();"/></td>
</tr>
</table>
</form>