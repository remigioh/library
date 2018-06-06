<?php 
//Establecemos conexión con MySQL y seleccionamos base de datos
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

//vemos si el usuario y contraseña son validos 

//si la ejecución de la sentencia SQL nos da algún resultado 

//es que si existe esa combinación usuario/contrasena 

if (mysqli_num_rows($resultado)!=0){ 

//si se cumple la condición el usuario y la contrasena son validos 

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

$conectar->close();    // Cierra la conexión

?>