<HTML>
<HEAD>
<TITLE>lectura.php</TITLE>
</HEAD>
<BODY>
<h1><div align="center">Lectura de la tabla</div></h1>
<br>
<br>
<?
//Conexion con la base
mysql_connect("db408529168.db.1and1.com","dbo408529168","SysCol.Si_");

//Ejecutamos la sentencia SQL
$result=mysql_db_query("db408529168","select * from prematriculas");
?>
<table align="center" border="1" width="500">
<tr>
<th>Nombre</th>
<th>Telifono</th>
</tr>
<?
//Mostramos los registros
while ($row=mysql_fetch_array($result))
{
echo '<tr><td>'.$row["Nombres"].'</td>';
echo '<td>'.$row["Telefono"].'</td></tr>';
}
mysql_free_result($result)
?>

</table>
<tr><td><br><br></td></tr>
<div align="center">
<a href="../prematricula.php">A&ntilde;adir un nuevo registro</a><br>
<a href="actualizaregistro.php">Actualizar un registro existente</a><br>
<a href="borraregistro.php">Borrar un registro</a><br>
</div>

</BODY>
</HTML>
