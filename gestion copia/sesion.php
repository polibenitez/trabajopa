
<?php 
/*aqui controlamos que los usuarios esten autentificados*/
session_start();
	if (!$_SESSION["autentificado"]) {
		header("Location: salir.php");
	}
 ?>