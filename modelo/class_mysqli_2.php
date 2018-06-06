<?php
class mysql
    {
    private $host="localhost";
    private $user="root";
    private $clave="123456";
    private $bd="biblioteca1";
    private $conexion;  //Se almacenará el apuntador a la conexion
     
     
    public function conectar() { // Metodo de conexión a MySQl y selección de la DB
$this->conexion=mysqli_connect($this->host,$this->user,$this->clave);
            mysqli_select_db($this->conexion,$this->bd);
        }
	public function consulta()  // Metódo para realizar la consulta a la tabla
        {
		$sql="select autor,titulo,precio,genero from libros";
        $this->conectar();  // Se invoca el metodo conectar
        global $consulta;
        $consulta=mysqli_query($this->conexion,$sql);
	}
}
$lista= new mysql();
$lista -> consulta();
?>
<html>
<head>
</head> 
<body> 
<table border="1" width="600" align="center">
<tr align="center" style="background-color:#666666;color:#ffffff" >
<td colspan="4"> Libros Biblioteca central</td>
</tr>
<tr align="center" >
<td>Titulo del libro</td>
<td>Autor</td>
<td>Precio</td>
<td>Genero</td>
</tr>
<?php
while($resultado= mysqli_fetch_array($consulta))
{
?>	
<tr align="left" style="background-color:#666666;color:#ffffff" >
<td><?php echo $resultado["titulo"];  ?></td>
<td><?php echo $resultado["autor"]; ?></td>
<td><?php echo $resultado["precio"];  ?></td>
<td><?php echo $resultado["genero"]; ?></td>
</tr>
<?php
}
?>
</table>
</body>
</html>