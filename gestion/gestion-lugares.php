<html>
<head>
	<title>MUPOS-gestion</title>
	<link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
	<?php 
		include("sesion.php");
	 ?>
	<div class="contenedor">
		<header>
			<div class="titulos">
				<h1>MUPOS</h1>
				<a href="../index.php">Principal</a>
				<img src="../images/guia-menu.png">
				<a href="./gestion.php">Gesti&oacute;n</a>
				<img src="../images/guia-menu.png">
				Lugares
				<img src="../images/guia-menu.png">
			</div>
			<div class="entrar">
				<?php echo $_SESSION["usuario"]; ?>
				<a href="./salir.php">Salir</a>
			</div>
		</header>
		<section class="login">
			aqui va los formularios con ocultando con javascript
		</section>
		<footer>
			create by MAMISHO copy-left 2013
		</footer>
	</div>
</body>
</html>