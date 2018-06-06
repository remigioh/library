<?php include("controlador/seguridad.php");
include('modelo/class_mysqli3.php') ;
$consulta= mysqli_query($conectar,"select id, archivo, titulo, autor, genero from archivos order by autor");
?>
<table border="1" width="600" align="center">
<tr align="center"><td colspan="6"> Libros del Repositorio</td></tr>
<tr style="background-color:#666666;color:#ffffff ">
<td align="center" ><b>Titulo</b></td>
<td align="center" >Autor</td>
<td align="center" >Genero</td>
<td align="center" >Descargar</td>
<td align="center" ><img src="imag/editar.png"/></td>
<td align="center" ><img src="imag/eliminar.png"/></td>
</tr>
<?php
$i=0;
while($rtdo= mysqli_fetch_array($consulta))
{
$i++;
?>	
<tr id="<?php echo "id_$i"; ?>" align="left">
<td><?php echo $rtdo["titulo"];  ?></td>
<td><?php echo $rtdo["autor"]; ?></td>
<td><?php echo $rtdo["genero"]; ?></td>
<td><a href="modelo/getfile.php?id=<?php echo $rtdo['id']; ?>" style='color:#0619a5;'><?php echo $rtdo["archivo"]; ?></a></td>
<td><a class="cargar" href="?pagina=modificar_mysqli&id=<?php echo $rtdo['id']; ?>" title="Editar" ><img src="imag/editar.png" /></a></td>
<td> <a class="cargar" href="?pagina=borrar&id=<?php echo $rtdo["id"];?>" onclick="return confirm('Esta seguro que desa eliminar el registro?');"
title="Eliminar" ><img src="imag/eliminar.png" /> </a> </td>
</tr>
<?php
}
?>
<tr> 
<td colspan="3" align="center"><a href="?pagina=adicion" class="cargar" title="Agregar registros"><img src="imag/agreg.png" border="0" /></a></td>
<td colspan="3" align="center"><a href="?pagina=buscar" class="cargar" title="Buscar libros en la base de datos"><img src="imag/search.png" border="0" /></a></td>
</tr>
</table>