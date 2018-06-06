<?php
class mysql
    {
    private $host="localhost";
    private $user="root";
    private $clave="123456";
    private $bd="biblioteca";
    private $conexion;  //Se almacenará el apuntador a la conexion
     
     
    public function conectar() { // Metodo de conexión a MySQl y selección de la DB
	        $this->conexion=mysqli_connect($this->host,$this->user,$this->clave);
            mysqli_select_db($this->conexion,$this->bd);
        }
	public function listar_libros()  // Metódo para consultar los libros
        {
		$sql="select autor,titulo from libros";
		$this->conectar();  // Se invoca el metodo de conexión
		$consulta=mysqli_query($this->conexion,$sql);
		
		echo '<html><head></head><body> 
<table border="1" width="600" align="center">
<tr align="center" style="background-color:#666666;color:#ffffff " >
<td colspan="2"> Libros Biblioteca central</td></tr>
<tr align="center" ><td>Titulo del libro</td><td>Autor</td></tr>';
		
		while ($resultado=mysqli_fetch_array($consulta)){
            echo '<tr align="left" style="background-color:#666666;color:#ffffff " >
<td>'.$resultado["titulo"].'</td><td>'.$resultado["autor"].'</td></tr>';
			}
            unset ($consulta);
			unset ($sql);
			echo '</table></body></html>';
		}
		}
$lista= new mysql();
$lista -> listar_libros();
?>