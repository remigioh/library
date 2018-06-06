<?php
include ("seguridad.php");
//require_once('../../Connections/principal.php');
?>
<html>
<head>

<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
<script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(e) {
		$("#enviar").on('click',function(){
			$.ajax({
				type: "POST",
				url: "borrar2.php",
				data: $("form").serialize()
				})
				.done(function( msg ) {
					confirmar(msg);
				})
				.fail(function() { alert("error al borrar"); });
			});
			$("#cancelar").on('click',function(){
				confirmar("");
				
				});
    });
	
	function confirmar(msg){ 
		confirmar=confirm(msg + " ¿Quieres Salir?"); 
		window.opener.location.reload();
		if (confirmar){
		// si pulsamos en aceptar					
		window.close();
		}else{
		window.location.reload();
		}
	}

</script>

</head>

<body>
<div align="center">
<h1>Borrar un registro</h1>
<br>
<?php
//Establecemos conexión con MySQL y seleccionamos base de datos
require_once('conexion1.php');

# Recogemos en una variable el numero del registro que se quiere borrar
$codigo = $_GET['cod'];

if(isset($codigo)){

//Creamos la sentencia SQL y la ejecutamos

$sql='SELECT * FROM prematriculas WHERE Contador ='.$codigo;

$resultados = mysql_query($sql,$conexion);

if(mysql_num_rows($resultados) > 0){
	echo '<form id="formulario"><table>';
	while($resul = mysql_fetch_assoc($resultados)){
		foreach($resul as $clave => $value){
			if($clave =="Contador"){
				echo '<tr><td>'.$clave.':</td><td>'.$value.'<input type="hidden" value="'.$value.'" id="campo_'.$clave.'" name="'.$clave.'" /></td></tr>';	
			}elseif($clave =="AceptaMails"){
				$chek="";
				if($value=="Si"){
					$chek = 'checked="checked"';	
				}
				echo '<tr><td>'.$clave.':</td><td><input type="checkbox" value="Si" id="campo_'.$clave.'" name="'.$clave.'" '.$chek.' />Si</td></tr>';		
			}
			else{
				echo '<tr><td>'.$clave.':</td><td><input type="text" value="'.$value.'" id="campo_'.$clave.'" name="'.$clave.'" /></td></tr>';	
			}
		}
	}
	echo '<tr><td colspan="2" align="right"><input type="button" id="enviar" value="Borrar" /><input type="button" id="cancelar" value="Cancelar" /></td></tr>';
	echo "</table></form>";
	}
				
}

?>
</div>

</body>
</html> 