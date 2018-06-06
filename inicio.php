<?php include ("controlador/seguridad.php"); ?>
<!DOCTYPE html>
<html>
<head><title>Repositorio Sistemas Interactivos</title>
<meta charset="utf-8">
<style type="text/css"> 
a {
	color: #FFFFFF;
  text-decoration:none;
}
table {
		margin:auto;
		width:100%;
		max-width:1300px;
		}
		
#titulo {
		font-size:24px;
		color:white; 
		font-family:tahoma;
	}	
@media screen and (max-width:650px)   {
	#titulo {
		font-size:14px;
	}
}
</style>
</head>
<body topmargin="0" vlink="#00FF66" alink="#00FFCC" >
<table border="1"  cellpadding="0" cellspacing="0" align="center" topmargin="0">
<tr><td colspan='2' valign="top" bgcolor="#336699">
<img src="imagenes/Sistemas_interactivos.jpg" width="100%">
<div id="titulo" align="center"><b>Sistema de Gestión Bibliografica</b></div>
</td></tr>
<tr>
<td valign="top" bgcolor="#336699">
<div align="center"><font size="+2" color="#99FF00">
 <a href="?pagina=principal">Inicio</a></font></div>
 <hr color="#FFFFFF">
<div align="center"><font size="+2" color="#99FF00">
 <a href="?pagina=ConsultaPaginacion_mysqli">Listar libros</a></font></div>
 <hr color="#FFFFFF">
 <div align="center"><font size="+2" color="#99FF00">
 <a href="?pagina=buscar">Buscar libro</a></font></div>
 <hr color="#FFFFFF">
<div align="center"><font size="+2" color="#99FF00">
<a href="?pagina=adicion">Agregar un Libro</a></font></div>
<hr color="#FFFFFF">
<div align="center"><font size="+2" color="#99FF00">
<a href="controlador/salir.php">Salir</a></font></div>
</td>
<td valign="top">
<?php
if(empty($_GET['pagina'])){
include("vista/principal.html");
}
else{
if(file_exists("vista/".$_GET['pagina'].".php"))
{
include("vista/".$_GET['pagina'].".php");
}
else if(file_exists("vista/".$_GET['pagina'].".html"))
{
include("vista/".$_GET['pagina'].".html");
} 
else{
echo 'Lo sentimos, la pagina no se encuentra disponible en el momento';
}
}
?>
</td>
</tr>
</table>
</body>
</html>
