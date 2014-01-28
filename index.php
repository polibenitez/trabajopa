<html>
<head>
	<title>MUPOS</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<script>/*
	var http_request = new XMLHttpRequest();
	var url = "./datosLista.php"; // Esta URL debería devolver datos JSON
	//alert(url);
	http_request.onreadystatechange = manejaJSON;
http_request.open("GET", url, true);
http_request.send(null);

function manejaJSON() {
  if (http_request.readyState == 4) {
    if (http_request.status == 200) {
      var cadCodificadaJSON = http_request.responseText; 
      var objDatos = eval("(" + cadCodificadaJSON + ")"); //Creamos el objeto utilizando la cadena codificada
      //Ahora con el objeto desplegamos los datos mandados desde el servidor
      /*document.getElementById("divId").innerHTML = objDatos.id;
      document.getElementById("divNombre").innerHTML = objDatos.nombre;
      document.getElementById("divCategoria").innerHTML = objDatos.categoria;
      document.getElementById("divPrecio").innerHTML = objDatos.precioDeSalida;
      document.getElementById("divDetalles").innerHTML = objDatos.detalles[0] + ", " + objDatos.detalles[1] + ", " + objDatos.detalles[2];*//*
      //alert(objDatos.nombre);
    } else {
      alert("Ocurrio un problema con la URL.");
    }
    http_request = null;
  }
}*/
	</script>
	<div class="contenedor">
		<header>
			<div class="titulos">
				<h1>MUPOS</h1>
			</div>
			<div class="entrar">
				<a href="gestion/entrar.php">Entrar</a>
			</div>
		</header>
		<section>
			<div class="mapa">
				<iframe src="./principal/index.html" style="width:99%;height:99%;"></iframe>
			</div>
		</section>
		<footer>
			create by MAMISHO copy-left 2013
		</footer>
	</div>
</body>
</html>