<?php include("controlador/seguridad.php"); ?>
<form action="modelo/insertar_mysqli.php" enctype="multipart/form-data" method="post">
<table align="center" border="1">
<tr>
	<td colspan="2" align="center">Agregar Libros</td>
</tr>

<tr>
	<td>Titulo</td>
	<td><input type="text" name="titulo" /></td>
</tr>
<tr>
	<td>Autor</td>
	<td><input type="text" name="autor" /></td>
</tr>
<tr>
	<td>Genero</td>
	<td><textarea type="textarea" name="genero"> </textarea></td>
</tr>
<tr>
	<td>Archivo</td>
	<td><input type="file" name="enlace" id="enlace" /></td>
</tr>
<tr>
	<td colspan="2" align="center"><input type="submit" value="Agregar" /> <input type="button" value="Volver" onclick="history.back();"/>     </td>

</tr>
</table>
</form>