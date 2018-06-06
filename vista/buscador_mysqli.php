<?php include("controlador/seguridad.php");

include('modelo/class_mysqli3.php') ;

$autor=$_POST['autor'];
if ($autor=='')
{
echo "Por favor debe digitar un nombre de autor";
exit();
}
else
{
$consulta= mysqli_query($conectar,"select id, archivo, titulo, autor, genero from archivos where autor LIKE '%$autor%' ORDER BY titulo");
 if($row= mysqli_fetch_array($consulta))
 {
?>
<table border="1" width="600" align="center">
<tr align="center" style="background-color:#666666;color:#ffffff">

<td colspan="6"> Libros de <?php echo utf8_decode($row["autor"]); ?></td>
</tr>
<tr>
<td align="center" ><b>Titulo</b></td>
<td align="center" >Autor</td>
<td align="center" >Genero</td>
<td align="center" >Descargar</td>
</tr>

<?php
do
		{
?>			
			<tr align="left">

			<td > <?php echo utf8_decode($row["titulo"]); ?></td>  

            <td > <?php echo utf8_decode($row["autor"]); ?></td> 

            <td > <?php echo utf8_decode($row["genero"]); ?></td>
			
			<td ><a href="modelo/getfile.php?id=<?php echo $row['id']; ?>" style='color:#0619a5;'> <?php echo utf8_decode($row["archivo"]); ?></a></td> 
			
         	</tr>

<?php  
}
while ($row = mysqli_fetch_array($consulta));
?>	
<tr>
     		<td colspan="4" align="center"> <input type="button" value="Volver" onclick="history.back();" /> </td> 
     		</tr>
			</table>
<?php			
}	 
 else
{ 
echo "¡ No se ha encontrado ningún registro !"; 
} 
}
?>
