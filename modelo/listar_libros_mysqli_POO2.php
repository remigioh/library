<?php
class mysql{

private $host="localhost";
private $user="root";
private $clave="123456";
private $bd="biblioteca1";
private $conexion;

public function conectar(){
	$this->conexion=mysqli_connect($this->host,$this->user,$this->clave);
	mysqli_select_db($this->conexion,$this->bd);
	}

public function listar_libros() {
	$sql="select autor,titulo,precio,Genero from libros";
	$this->conectar();
	$consulta=mysqli_query($this->conexion,$sql);
	echo '<table border="1" width="600" align="center">
		<tr align="center" style="background-color:#666666;color:ffffff">
		<td colspan="4">Libros biblioteca central</td></tr>
		<tr align="center">
		<td>Titulo del libro</td>
		<td>Autor</td>
		<td>Precio</td>
		<td>Genero</td>
		</tr>';
while ($resultado=mysqli_fetch_array($consulta)){
echo '<tr align="left">
<td>'.$resultado["titulo"].'</td>
<td>'.$resultado["autor"].'</td>
<td>'.$resultado["precio"].'</td>
<td>'.$resultado["Genero"].'</td>
</tr>';}
unset ($consulta);
unset ($sql);
echo '</table></body></html>';
}
}
$lista=new mysql;
$lista->listar_libros();
?>