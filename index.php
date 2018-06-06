<!DOCTYPE html>
<html>
<head><title>Repositorio Sistemas Interactivos</title>
<meta charset="utf-8">
<style type="text/css">
		body {
			color:bluenavy;
			font-family:tahoma;
			font-size:14px;
			}
		
		
		input:required:invalid {
 
							border: 1px solid red;
 
							}
 
		input:required:valid {
 
							border: 1px solid bluenavy;
 
						}
						
		/* :required  -  selector de la seudoclase :required  para los input o elementos de un formulario con la propiedad "required" */
						
		/* :invalid  -  selector de la seudoclase :invalid  para los input o elementos de un formulario que no cumplen la regla de validación del contenido  */
		
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
		<script type="text/javascript">
		if(!("autofocus" in document.createElement("input")))
			document.getElementById("nombre").focus();
		</script>
		<script type="text/javascript" src="js/jquery.min.js"></script>
	      <script type="text/javascript">
		  $(document).ready( function(){
	   $('#show').attr('checked', false);
	   $('#show').click(function(){
	      name = $('#password').attr('name');
	      value = $('#password').attr('value');
	      if($(this).attr('checked'))
	      {
		  html = '<input type="text" name="'+ name + '" value="' + value + '" id="password"/>';
	         $('#password').after(html).remove();
			 }
	      else
	      {
		  html = '<input type="password" name="'+ name + '" value="' + value + '" id="password"/>';
	         $('#password').after(html).remove();
	      }
	   });
	});
	</script>
</head>
<body topmargin="0" vlink="#00FF66" alink="#00FFCC" >
<table border="1"  cellpadding="0" cellspacing="0" align="center" topmargin="0">
<tr><td valign="top" bgcolor="#336699">
<img src="imagenes/Sistemas_interactivos.jpg" width="100%">
<div id="titulo" align="center"><b>Sistema de Gestión Bibliografica</b></div>
</td></tr>
<tr><td valign="top" align="center">

<?php
if(empty($_GET['pagina'])){
include("vista/index1.php");
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
						  </td></tr>
</table>
</body>
</html>
