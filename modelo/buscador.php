<?php
include('conexion1.php') ;
conectar();

$autor=$_POST['autor'];
if ($autor=='')
{
echo "Por favor debe digitar un nombre de autor";
exit();
}
else
{
$consulta= mysql_query("select * from libros where autor LIKE '%$autor%' ORDER BY titulo");
 if($row= mysql_fetch_array($consulta))
 {
?>
<html>
<head>
<script languaje="javascript" type="text/javascript">
function cambiar(id,color)
	{
 		document.getElementById(id).style.backgroundColor=color;
	} 
</script>
</head> 
<body> 
<table border="1" width="600" align="center">
<tr align="center" style="background-color:#666666;color:#ffffff " >

<td colspan="6"> Libros de <?php echo utf8_decode($row["autor"]); ?></td>
</tr>
<tr>
<td align="center" ><b>titulo</b></td>
<td align="center" >autor</td>
<td align="center" >precio</td>
<td align="center" >comentarios</td>
</tr>

<?php
do
		{
?>			
			<tr align="left">

			<td > <?php echo utf8_decode($row["titulo"]); ?></td>  

            <td > <?php echo utf8_decode($row["autor"]); ?></td> 

            <td > <?php echo utf8_decode($row["precio"]); ?></td> 

            <td > <?php echo utf8_decode($row["genero"]); ?></td> 

         	</tr>

<?php  

}

while ($row = mysql_fetch_array($consulta)); 

?>	
<tr>
     		<td colspan="4" align="center"> <input type="button" value="Volver" onclick="history.back();" /> </td> 
     		</tr>
			</table>
			</body>
			</html>
<?php			
}	 
 else
{ 
echo "¡ No se ha encontrado ningún registro !"; 
} 
}
?>
