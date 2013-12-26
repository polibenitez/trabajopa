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
				Despachos
				<img src="../images/guia-menu.png">
			</div>
			<div class="entrar">
				<?php echo $_SESSION["usuario"]; ?>
				<a href="./salir.php">Salir</a>
			</div>
		</header>
		<section class="uso-gestion">
			<?php include("gestion-despachos-script.php"); ?>
		</section>
		<footer>
			create by MAMISHO copy-left 2013
		</footer>
	</div>
</body>
</html>