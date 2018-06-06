<?php session_start();
	  unset($_SESSION);  // La función unset destruye las variables de sesión.
	  session_destroy(); /* destruye toda la información asociada con la sesión actual. 
							No destruye ninguna de las variables globales asociadas con la sesión. */
if ($_SESSION["autenticado"] != "SI") {   //Comprobación ya no esta autenticado. 
    //si ya no esta autenticado, envio a la pagina de autentificacion 
    header("Location:../index.php"); 
    //ademas salgo de este script 
    exit();
	}
?>