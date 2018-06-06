<?php
include('conexion_mysqli.php');
conectar();
$sql="select * from libros order by autor";
$consulta= mysqli_query($conectar,$sql);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
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
<td colspan="6"> Libros Biblioteca central</td>
</tr>
<tr>
<td align="center" ><b>Titulo</b></td>
<td align="center" ><b>Autor</b></td>
<td align="center" ><b>Precio</b></td>
<td align="center" ><b>Genero</b></td>
<td align="center" ><img src="imag/editar.png"/></td>
<td align="center" ><img src="imag/eliminar.png"/></td>
</tr>
<?php

$i=0;
while($rtdo= mysqli_fetch_array($consulta))
{
$i++;
?>	

<tr id="<?php echo "id_$i"; ?>" align="left" style="background-color:#666666;color:#000000 " onmousemove="cambiar('<?php echo "id_$i";?>','#cccccc')" onmouseout="cambiar('<?php echo "id_$i"; ?>','#ffffff')">



<td><?php echo utf8_encode($rtdo["titulo"]);  ?></td>
<td><?php echo $rtdo["autor"]; ?></td>
<td><?php echo $rtdo["precio"]; ?></td>
<td><?php echo utf8_encode($rtdo["genero"]); ?></td>
<td><img src="imag/editar.png"/></td>
<td><img src="imag/eliminar.png" /></td>
</tr>



<?php
}
mysqli_close($conectar);
?>
<tr> 
<td colspan="3" align="center"><a href="" title="Agregar registros"> <img src="imag/agreg.png" border="0" /></a></td>
<td colspan="3" align="center"><a href="" title="Buscar libros en la base de datos"> <img src="imag/search.png" border="0" /></a></td>
</tr>
</table>
</body>
</html>