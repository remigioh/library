<?php
include('class_mysqli.php');

$name=$_POST['nombre'];
$idcliente=$_POST['id'];
$adress=$_POST['dir'];
$phone=$_POST['telefono'];
$email=$_POST['email'];
$ciudad=$_POST['ciudad'];
$username=$_POST['username'];
$password=$_POST['password'];

$sql="insert into clientes (idcliente,nombre,direccion,telefono,email,ciudad,username,password) values ('$idcliente','$nombre','$direccion','$telefono','$email','$ciudad','$username','$password')"; 
mysqli_query($conectar,$sql);

echo "<script>
alert('Los datos se insertarón correctamente');
window.location='../index.php';
</script>"
 ?>