<?php
include('class_mysqli3.php');

$titulo=$_POST['titulo'];
$autor=$_POST['autor'];
$genero=$_POST['genero'];

// Para recibir archivos se usa el array supergoblal $_FILES['name']
//$archivo=$_FILES["enlace"]; 

/* Once the form is submitted information about the uploaded file can be accessed via PHP
   superglobal array called $_FILES. For example, our upload form contains a file select 
  field called photo (i.e. name="enlace"), if any user uploaded a file using this field, we
  can obtains its details like the name, type, size, temporary name or any error occurred
  while attempting the upload via the $_FILES["photo"] associative array, like this:

$_FILES["enlace"]["name"] — This array value specifies the original name of the file, including the file extension. It doesn't include the file path.
$_FILES["enlace"]["type"] — This array value specifies the MIME type of the file.
$_FILES["enlace"]["size"] — This array value specifies the file size, in bytes.
$_FILES["enlace"]["tmp_name"] — This array value specifies the temporary name including full path that is assigned to the file once it has been uploaded to the server.
$_FILES["enlace"]["error"] — This array value specifies error or status code associated with the file upload, e.g. it will be 0, if there is no error.

$_FILES[“enlace”][“error”] stores any error code resulting from the transfer
 */
// En la siguiente variable guardamos nombre temporal que se le asigno al archivo. Este nombre es generado por el servidor
// Si el archivo a subir se llama libro.pdf el tmp_name no sera libro.pdf sino un nombre como SI12349712983.tmp, por decir un ejemplo.

$archivo = $_FILES["enlace"]["tmp_name"];

/* La ubicación del archivo temporal que se crea cuando se sube un archivo al servidor.
 Es en esta variable de donde se leen los datos del archivo en sí. Si estos datos no son
 copiados o movidos a otro lugar, o en nuestro caso, almacenados en una base de datos, se
 pueden perder, ya que PHP elimina este archivo después de un determinado tiempo. */

//Verificamos que se selecciono algún archivo
if(sizeof($_FILES)==0){
	echo "No se puede subir el archivo";
	exit();
}

//Definimos un array para almacenar el tamaño del archivo
$size=array();
//OBTENEMOS EL TAMAÑO DEL ARCHIVO en Bytes
$size = $_FILES["enlace"]["size"];  // stores the file’s size (in bytes)

//OBTENEMOS EL TIPO MIME DEL ARCHIVO
$tipo = $_FILES["enlace"]["type"]; // stores the file’s MIME-type

//Obtenemos el nombre original del archivo
$nombre_archivo = $_FILES["enlace"]["name"]; //stores the original filename from the client

//PARA HACERNOS LA VIDA MAS FACIL EXTRAEMOS LOS DATOS DEL REQUEST
extract($_REQUEST);

//VERIFICAMOS DE NUEVO QUE SE SELECCIONO ALGUN ARCHIVO
if ( $archivo != "none" ){
	//Abrimos el archivo en modo solo lectura
	$fp = fopen($archivo, "rb");
	//LEEMOS EL CONTENIDO DEL ARCHIVO
	$contenido = fread($fp, $size);
	//CON LA FUNCION addslashes AGREGAMOS UN \ A CADA COMILLA SIMPLE ' PORQUE DE OTRA MANERA
	//NOS MARCARIA ERROR A LA HORA DE REALIZAR EL INSERT EN NUESTRA TABLA
	$contenido = addslashes($contenido);
	//CERRAMOS EL ARCHIVO
	fclose($fp);

	//CREAMOS NUESTRO INSERT
	
$sql="insert into archivos (archivo,titulo,autor,contenido,tipo,genero) values ('$nombre_archivo', '$titulo','$autor','$contenido','$tipo','$genero')"; 
mysqli_query($conectar,$sql);

	//NOTIFICAMOS AL USUARIO QUE EL ARCHVO SE HA ENVIADO O REDIRIGIMOS A OTRO LADO ETC.
	echo 
	"<script>
alert('Los datos se insertarón correctamente');
</script>";
}else{
	echo "No fue posible subir el archivo";
}
echo "<script>
window.location='../inicio.php';
</script>"
 ?>