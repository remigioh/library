<?php session_start();
	  unset($_SESSION);  // La funci�n unset destruye las variables de sesi�n.
	  session_destroy(); /* destruye toda la informaci�n asociada con la sesi�n actual. 
							No destruye ninguna de las variables globales asociadas con la sesi�n. */
if ($_SESSION["autenticado"] != "SI") {   //Comprobaci�n ya no esta autenticado. 
    //si ya no esta autenticado, envio a la pagina de autentificacion 
    header("Location:../index.php"); 
    //ademas salgo de este script 
    exit();
	}
?>