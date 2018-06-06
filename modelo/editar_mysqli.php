<?php
include('conexion_mysqli.php') ;
conectar();
// recojo en una variable la consulta a la base de datos
$consulta=mysqli_query($conectar, "select * from libros where id=$i");
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
<td colspan="6"> Libros Biblioteca central</td>
</tr>
<tr>
<td align="center" ><b>Titulo</b></td>
<td align="center" >Autor</td>
<td align="center" >Genero</td>
<td align="center" >Enlace</td>
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



<td><?php echo $rtdo["titulo"];  ?></td>
<td><?php echo $rtdo["autor"]; ?></td>
<td><?php echo $rtdo["genero"]; ?></td>
<td><a href="<?php echo $rtdo["enlace"]; ?>" target="_blank" style=" color:#0619a5;">Descargar</a></td>
<td><a href="modificar_mysqli.php?id=<?php echo $rtdo['id'];?>" title="Editar"><img src="imag/editar.png" /></a></td>
<td> <a href="delete_mysqli.php?id=<?php echo $rtdo['id'];?>" onclick="return confirm('Esta seguro que desa eliminar el registro?')";
title="Eliminar"><img src="imag/eliminar.png" /> </a> </td>
</tr>



<?php
}
?>
<tr> 
<td colspan="6" align="center"><a href="adicion.html" title="Agregar registros"> <img src="imag/agreg.png" border="0" /> </a>     </td>
</tr>

</table>
</body>
</html>
