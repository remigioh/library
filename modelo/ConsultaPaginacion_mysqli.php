<?php include("seguridad.php");
include('class_mysqli.php') ;

$consulta= mysqli_query($conectar,"select * from libros order by autor");

# Contamos los registros de la tabla (numero de filas). 

$filas=mysqli_num_rows($consulta);

/* Dividimos elnumero de filas por el numero de registros a mostrar por pagina para calcular el numero de paginas a mostrar.
Como se requiere que siempre el numero de paginas sea un entero, este sera el siguiente entero al resultado con decimales;
por lo que se usa la funcion ceil() para redondear al siguiente entero   */

$pantallas=ceil($filas/10);

/*  Creamos la cabecera de la tabla que muestra los resultados de la consulta (codigo HTML)  */
?>
<table border="1" width="600" align="center">
<tr align="center"><td colspan="6"> Libros Biblioteca</td></tr>
<tr style="background-color:#666666;color:#ffffff ">
<td align="center" ><b>Titulo</b></td>
<td align="center" >Autor</td>
<td align="center" >Genero</td>
<td align="center" >Descargar</td>
<td align="center" ><img src="imag/editar.png"/></td>
<td align="center" ><img src="imag/eliminar.png"/></td>
</tr>
<?php
$pag=$_GET['pag'];

#Establecemos la condicion para mostrar la primer pagina con los 10 primeros registros.
if ($filas!=0 and $pag<=1)
{
$i=0;
$reg=10;

$consulta= mysqli_query($conectar,"select * from libros order by autor DESC LIMIT $i,$reg");

while($rtdo= mysqli_fetch_array($consulta))
{
$i++;
?>	
<tr id="<?php echo "id_$i"; ?>" align="left">
<td><?php echo utf8_encode($rtdo["titulo"]);  ?></td>
<td><?php echo $rtdo["autor"]; ?></td>
<td><?php echo $rtdo["genero"]; ?></td>
<td><a href="<?php echo $rtdo["enlace"]; ?>" target="_blank" style=" color:#0619a5;">Descargar</a></td>
<td><a class="cargar" href="?pagina=modificar_mysqli&id=<?php echo $rtdo['id']; ?>" title="Editar" ><img src="imag/editar.png" /></a></td>
<td> <a class="cargar" href="?pagina=borrar&id=<?php echo $rtdo["id"];?>" onclick="return confirm('Esta seguro que desa eliminar el registro?');"
title="Eliminar" ><img src="imag/eliminar.png" /> </a> </td>
</tr>
<?php
}
?>
<tr> 
<td colspan="6">
<?php
for ($pag=1; $pag<=$pantallas; $pag++)
			{
			echo "<a href='?pagina=ConsultaPaginacion_mysqli&pag=".$pag."&filas=".$filas."&paginas=".$pantallas."' style='color:blue;'> ".$pag." | </a>";
			}
?>
</td>
</tr>
<?php
}
else if ($filas!=0 and $pag>1)
{
			$i=(($pag*10)-10);
			$reg=10;
$consulta1= mysqli_query($conectar,"select * from libros order by autor DESC LIMIT $i,$reg");
while($rtdo= mysqli_fetch_array($consulta1))
{
$i++;
?>	
<tr id="<?php echo "id_$i"; ?>" align="left">
<td><?php echo utf8_encode($rtdo["titulo"]);  ?></td>
<td><?php echo $rtdo["autor"]; ?></td>
<td><?php echo $rtdo["genero"]; ?></td>
<td><a href="<?php echo $rtdo["enlace"]; ?>" target="_blank" style=" color:#0619a5;">Descargar</a></td>
<td><a class="cargar" href="?pagina=modificar_mysqli&id=<?php echo $rtdo['id']; ?>" title="Editar" ><img src="imag/editar.png" /></a></td>
<td> <a class="cargar" href="?pagina=borrar&id=<?php echo $rtdo["id"];?>" onclick="return confirm('Esta seguro que desa eliminar el registro?');"
title="Eliminar" ><img src="imag/eliminar.png" /> </a> </td>
</tr>
<?php
}
?>
<tr> 
<td colspan="6">
<?php
for ($pag=1;$pag<=$pantallas;$pag++)
			{
			echo "<a href='?pagina=ConsultaPaginacion_mysqli&pag=".$pag."&filas=".$filas."&paginas=".$pantallas."' style='color:blue;'> ".$pag." | </a>";
			}
}
?>
</td>
</tr>
<tr> 
<td colspan="3" align="center"><a href="?pagina=adicion" class="cargar" title="Agregar registros"><img src="imag/agreg.png" border="0" /></a></td>
<td colspan="3" align="center"><a href="?pagina=buscar" class="cargar" title="Buscar libros en la base de datos"><img src="imag/search.png" border="0" /></a></td>
</tr>
</table>