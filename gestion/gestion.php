<html>
<head>
	<script type="text/javascript">
		function irAPagina(pagina){
			location.href = pagina + ".php";
		}
	</script>
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
				Gesti&oacute;n
				<img src="../images/guia-menu.png">
			</div>
			<div class="entrar">
				<?php echo $_SESSION["usuario"]; ?>
				<a href="./salir.php">Salir</a>
			</div>
		</header>
		<section class="login">
			<div class="cajas">
				<div class="caja" onclick="irAPagina('gestion-edificios')">
					<div class="caja-top">
						<div class="caja-titulo">Edificios</div>
						<div class="caja-descrip">Gestionar Edificios</div>
					</div>
					<div class="caja-imagen">
						<img draggable="false" class="caja-imagen-img" src="../images/gestion-img/edificio.jpg">
					</div>

				</div>
				<div class="caja" onclick="irAPagina('gestion-despachos')">
					<div class="caja-top">
						<div class="caja-titulo">Despachos</div>
						<div class="caja-descrip">Gestionar Despachos</div>
					</div>
					<div class="caja-imagen">
						<img draggable="false" class="caja-imagen-img" src="../images/gestion-img/despacho.jpg">
					</div>

				</div>
				<div class="caja" onclick="irAPagina('gestion-profesores')">
					<div class="caja-top">
						<div class="caja-titulo">Profesores</div>
						<div class="caja-descrip">Gestionar Profesores</div>
					</div>
					<div class="caja-imagen">
						<img draggable="false" class="caja-imagen-img" src="../images/gestion-img/profesor.png">
					</div>

				</div>
				<div class="caja" onclick="irAPagina('gestion-asignaturas')">
					<div class="caja-top">
						<div class="caja-titulo">Asignaturas</div>
						<div class="caja-descrip">Gestionar Asignaturas</div>
					</div>
					<div class="caja-imagen">
						<img draggable="false" class="caja-imagen-img" src="../images/gestion-img/asignatura.jpg">
					</div>

				</div>
				<div class="caja" onclick="irAPagina('gestion-grados')">
					<div class="caja-top">
						<div class="caja-titulo">Grados</div>
						<div class="caja-descrip">Gestionar Grados</div>
					</div>
					<div class="caja-imagen">
						<img draggable="false" class="caja-imagen-img" src="../images/gestion-img/grado.jpg">
					</div>

				</div>
				<div class="caja" onclick="irAPagina('gestion-aulas')">
					<div class="caja-top">
						<div class="caja-titulo">Aulas</div>
						<div class="caja-descrip">Gestionar Aulas</div>
					</div>
					<div class="caja-imagen">
						<img draggable="false" class="caja-imagen-img" src="../images/gestion-img/aula.jpg">
					</div>
				</div>
				<div class="caja" onclick="irAPagina('gestion-lugares')">
					<div class="caja-top">
						<div class="caja-titulo">Lugares</div>
						<div class="caja-descrip">Gestiona otros lugares de inter&eacute;s</div>
					</div>
					<div class="caja-imagen">
						<img draggable="false" class="caja-imagen-img" src="../images/gestion-img/lugar.jpg">
					</div>
				</div>
			</div>
		</section>
		<footer>
			create by Equipo2 copy-left 2013
		</footer>
	</div>
</body>
</html>