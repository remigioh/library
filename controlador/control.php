<?php 
//Establecemos conexi�n con MySQL y seleccionamos base de datos
require_once('../modelo/class_mysqli.php');
//Recogemos las variables del username y password del formulario de acceso
$usuario=$_POST['usuario'];
$clave=$_POST['contrasena'];

//Sentencia SQL para buscar un usuario con esos datos de la tabla clientes
$sentencia = "SELECT * FROM clientes WHERE username='$usuario' and password='$clave'"; 
if(!($resultado = $conectar->query($sentencia))) {  // Ejecuta sentencia SQL para consulta
  echo "<p>Error al ejecutar la sentencia<b>$sentencia</b>:".$conectar->error;
 echo '</p>'; 
 exit;
}

//vemos si el usuario y contrase�a son validos 

//si la ejecuci�n de la sentencia SQL nos da alg�n resultado 

//es que si existe esa combinaci�n usuario/contrasena 

if (mysqli_num_rows($resultado)!=0){ 

//si se cumple la condici�n el usuario y la contrasena son validos 

//defino una sesion y guardo datos 

session_start();
$_SESSION["autenticado"]= "SI";
header("Location:../inicio.php?cliente=$usuario");
}
else
{ 
//si no existe le mando otra vez a la portada 

header("Location:../index.php?errorusuario=si"); 

} 

mysqli_free_result($resultado); 

$conectar->close();    // Cierra la conexi�n

?>