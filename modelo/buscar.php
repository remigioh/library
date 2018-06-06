<?php include("controlador/seguridad.php"); ?>
<table align="center" border="1">
<tr>
	<td colspan="2" align="center">Buscar libros en la Biblioteca</td>
</tr>
<tr>
	<td>Digite el autor</td>
	<td><input type="text" name="autor" pattern="^[A-Z][A-Za-z\s]+" title="Digite solo letras y espacios" required autofocus /></td>
</tr>
<tr>
<td align="center"><input type="button" value="Volver" onclick="history.back();"/></td>	<td align="center"><input type="submit" value="Buscar" /></td>
</tr>
</table>
</form>