<?php session_start();
if ($_SESSION["autenticado"] != "SI") {   //Comprobaci�n QUE EL USUARIO ESTA AUTENTIFICADO 
    //si no existe, envio a la pagina de autentificacion 
    header("Location:../index.php"); 
    //ademas salgo de este script 
    exit();
	}
?>