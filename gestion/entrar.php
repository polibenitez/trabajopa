<?php
//error_reporting(E_ALL ^ E_NOTICE);
function identificar(){
	$con = mysql_connect("localhost","root","");
	if (!$con) {
		die(' No puedo conectar: ' . mysql_error());
	}
	$db_selected = mysql_select_db("upo",$con);
	if (!$db_selected) {
		die(' No puedo seleccionar con prueba: ' . mysql_error());
	}
	$result=  mysql_query("SELECT usuario,contrasenya FROM usuarios where usuario='".$_POST['user']."' and contrasenya='".$_POST['pass']."'",$con);
	if (!$result) {
		die('no se pudo ejecutar la consulta' . mysql_error());
	}

	$usuario=null;
	//$i=0;
	while($row = mysql_fetch_array($result)) {
		$usuario=$row[0];
		//$usuario[$i]['pass']=$row[1];
		//$i++;
	}
	return $usuario;
}
?>
<html>
<head>
	<title>MUPOS</title>
	<link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
	<?php
	include("saneo.php");
	if (isset($_POST['login'])) {
		//echo "estas son las variables <br/>";
		//echo "usuario =".$_POST['user']."<br />";
		//echo "password =".$_POST['pass']."<br />";

		/*
			nota de actualizacion
			1-)pasar la contraseña a hash y comparar con los hash de la bbdd
			2-) hay que pasarlo como parametro
			3-)sanear los campos y variables.
		*/
		$usuario=identificar();

		if (isset($usuario)) {
			/*	
				nota de actualizacion
				3-)Para pasar el susuario tenemos que usar sesiones
			*/
			session_start();
			$_SESSION["autentificado"]=true;
			$_SESSION["usuario"]=$usuario;
			$pagina="gestion.php";
			header("Location: $pagina");
		}else{
			?>	
	<div class="contenedor">
		<header>
			<div class="titulos">
				<h1>MUPOS</h1>
				<a href="../index.php">Principal</a>
				<img src="../images/guia-menu.png">
				Login
				<img src="../images/guia-menu.png">
			</div>
		</header>
		<section class="login">
			<div class="formulario">
				<form action="#" method="POST">
					<fieldset>
						<img src="../images/avatar_login.png">
						<legend>Inicia sesi&oacute;n con tu cuenta</legend>
						<input class="textbox" type="text" name="user" placeholder="Usuario.." autofocus required  />
						<input class="textbox" type="password" name="pass" placeholder="Contrase&ntilde;a" required />
						<input class="boton" type="submit" name="login" value="Iniciar sesi&oacute;n"/>
					</fieldset>
					<p style="color:red;">El usuario o contrase&ntilde;a no coinciden</p>
				</form>
			</div>
		</section>
		<footer>
			create by Equipo 2 copy-left 2013
		</footer>
	</div>
	<?php 
	} 
	}else{
	?>	
	<div class="contenedor">
		<header>
			<div class="titulos">
				<h1>MUPOS</h1>
				<a href="../plantilla.php">Principal</a>
				<img src="../images/guia-menu.png">
				Login
				<img src="../images/guia-menu.png">
			</div>
		</header>
		<section class="login">
			<div class="formulario">
				<form action="#" method="POST">
					<fieldset>
						<img src="../images/avatar_login.png">
						<legend>Inicia sesi&oacute;n con tu cuenta</legend>
						<input class="textbox" type="text" name="user" placeholder="Usuario.." autofocus required  />
						<input class="textbox" type="password" name="pass" placeholder="Contrase&ntilde;a" required />
						<input class="boton" type="submit" name="login" value="Iniciar sesi&oacute;n"/>
					</fieldset>
				</form>
			</div>
		</section>
		<footer>
			create by MAMISHO copy-left 2013
		</footer>
	</div>
	<?php 
	} 
	?>
</body>
</html>