<?php include("../controlador/seguridad.php");

include('class_mysqli3.php');

$i=$_POST['id'];

mysqli_query($conectar,"delete from archivos where id=$i");

echo "<script>
alert('El registro se elimino de la base de datos');
window.location='../inicio.php';
</script>"
 ?>