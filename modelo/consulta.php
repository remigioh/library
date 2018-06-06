<?php include ("seguridad.php"); ?>
<html>
<head>
<title>Sistemas Interactivos</title>
<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
<script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script>
	$(document).ready(function(e) {
        $(".editar").on('click',function(e){
			e.preventDefault();
			
			var codigo = $(this).attr('data-edit');
			window.open('actualizaregistro.php?cod='+codigo,'Actualizar','width=500,height=400,scrollbars=yes');		
			});
    });
	
	$(document).ready(function(e) {
        $(".del").on('click',function(e){
			e.preventDefault();
			
			var codigo = $(this).attr('data-del');
			window.open('borraregistro.php?cod='+codigo,'Borrar','width=500,height=400,scrollbars=yes');		
			});
    });
</script>
<style type="text/css">
	body{
		font-family: "Lucida Sans Unicode","Lucida Grande",Sans-Serif;
		color:#000099;
	}
	table {
		border-collapse: collapse;		
		font-size: 13px;
		cursor:default;
	}
	
	
	thead tr th {
		border-bottom: 2px solid #6678B1;
		color: #000099;
		font-size: 13px;
		font-weight:100;
		padding: 7px;
		text-align:left;
	}
	
	tbody tr td {
		border-bottom: 1px solid #666699;
		padding: 7px;
		color: #666699;		
	}
	tbody tr:hover td{
		color:#000099;
	}

</style>
</head>
<body>
<?php

//Establecemos conexión con MySQL y seleccionamos base de datos
require_once('conexion1.php');

# recogemos en una variable el nombre de la TABLA
$tabla="prematriculas";

# Recogemos en una variable el nombre de la sede que quiere hacer la consulta, que es el mismo usuario que inicio sesion.

$sede=$_GET['sede'];
$pag=$_GET['pag'];

/* establecemos el criterio de SELECCION y recogemos los datos de la consulta en una variable.
El comodin (*) indica que se seleccionen todos los campos. */

$resultado= mysql_query("SELECT * FROM $tabla WHERE Sede='$sede'",$conexion);

$resultado= mysql_query("SELECT Contador,Fecha,Nombres,Apellidos,Telefono,Celular, Ciudad,Email,Programa,Horario,Comentario FROM $tabla WHERE Sede='$sede'",$conexion);

# Contamos los registros de la tabla (numero de filas). 

$filas=mysql_num_rows($resultado);

/* Dividimos elnumero de filas por el numero de registros a mostrar por pagina para calcular el numero de paginas a mostrar.
Como se requiere que siempre el numero de paginas sea un entero, este sera el siguiente entero al resultado con decimales;
por lo que se usa la funcion ceil() para redondear al siguiente entero   */

$f_mostrar=ceil($filas/20);


# Creamos la cabecera de la tabla que muestra los resultados de la consulta (codigo HTML)

echo "<h1 align='center'>Tabla de prematriculados de SISTEMAS INTERACTIVOS $sede</h1>
<table align=center border=0><thead>
<tr><th>#</th><th>Fecha</th><th>Nombres</th><th>Apellidos</th><th>Telefono</th><th>Celular</th>
<th>Ciudad</th><th>Correo Electr&oacute;nico</th><th>Programa de Interes</th><th>Horario</th><th>OBSERVACIONES</th><th>Ed</th><th>El</th>
</tr></thead>";

#Establecemos la condicion para mostrar la primer pagina con los 20 primeros registros.

if ($filas!=0 and $pag<=1)
{
			$n=0;
			$m=20;

/* Recogemos en una variable cada uno de los registros (filas)de la consulta.
Utilizamos la función mysql_fetch_row en vez de mysql_fetch_array  para EVITAR DUPLICADOS.
Recuerde que esta ultima funcion devuelve un array escalar  y otro asociativo con los resultados */

$resultado= mysql_query("SELECT Contador,Fecha,Nombres,Apellidos,Telefono,Celular, Ciudad,Email,Programa,Horario,Comentario FROM $tabla WHERE Sede='".$sede."' ORDER BY Contador DESC LIMIT $n,$m",$conexion);

//$filas=mysql_fetch_row($resultado);

/* Se comenta la linea anterior por que si deja activa en la consulta no se muestra
 el ultimo registro insertado en la base de datos */
 
 /* El problema que no muestra el ultimo registro en la consulta es porque se obtiene el 
 ultimo registro de primero antes del ciclo while en la linea 114  y este nunca lo muestra,
es decir, desperdicias siempre el ultimo registro.
Para solucionarlo se comenta la línea 114 ($filas=mysql_fetch_row($resultado);)  */
                    
/* establecemos un bucle que recoge en un array cada una de las LINEAS DEL RESULTADO DE LA CONSULTA */
 
 while ($registro=mysql_fetch_assoc($resultado)){
			echo "<tr>";
                        
/* Establecemos el bucle de lectura del ARRAY con los resultados de cada LINEA y 
encerramos cada  valor en etiquetas <td></td>  para que aparezcan en celdas distintas de la tabla */

		foreach($registro as $clave)
			{
				$valor = "-";
				if(isset($clave) || $clave ==""){
					$valor = $clave;
				}
				echo "<td>".$valor."</td>";
			}
			
			echo '<td><a href="" class="editar" data-edit="'.$registro['Contador'].'"><img src="edit.png" width="20"></a></td>';
			echo '<td><a href="" class="del" data-del="'.$registro['Contador'].'"><img src="del.png" width="20"></a></td>';
			echo "</tr>";
			
                        }
			echo "</table>";
			
			for ($pag=1;$pag<=$f_mostrar;$pag++)
			{
			echo "<a href='?sede=".$sede."&pag=".$pag."&filas=".$filas."&f_mostrar=".$f_mostrar."'>".$pag."|</a>";
			}
}
else if ($filas!=0 and $pag>1)
{
			$n=(($pag*20)-20);
			$m=20;
			$resultado2= mysql_query("SELECT Contador,Fecha,Nombres,Apellidos,Telefono,Celular, Ciudad,Email,Programa,Horario,Comentario FROM $tabla WHERE Sede='".$sede."' ORDER BY Contador DESC LIMIT $n,$m",$conexion);
			$registro2=mysql_fetch_row($resultado2);
			while ($registro=mysql_fetch_assoc($resultado2)){
				echo "<tr>";
/* Establecemos el bucle de lectura del ARRAY con los resultados de cada LINEA y
 encerramos cada  valor en etiquetas <td></td>  para que aparezcan en celdas distintas de la tabla */

				foreach($registro as $clave)
				{
					$valor = "-";
					if(isset($clave) || $clave ==""){
						$valor = $clave;
					}
					echo "<td>".$valor."</td>";
								
				}
			
			echo '<td><a href="" class="editar" data-edit="'.$registro['Contador'].'"><img src="edit.png" width="20"></a></td>';
			echo '<td><a href="" class="del" data-del="'.$registro['Contador'].'"><img src="del.png" width="20"></a></td>';
			echo "</tr>";
			
                        }

echo "</table>";
			for ($pag=1;$pag<=$f_mostrar;$pag++)
			{
			echo "<a href='?sede=".$sede."&pag=".$pag."&filas=".$filas."&f_mostrar=".$f_mostrar."'>".$pag."|</a>";
			}
}
echo '<br /><br />';
# cerramos la conexion
 mysql_close(); 
?>
</body>
</html>