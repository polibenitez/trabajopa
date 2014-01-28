<?php 
function imprimirgrados(){
	$grados=obtenergrados();
	if (isset($grados)) {
		$i=1;
		echo "<select name='grados' id='grados-list'>";
		foreach ($grados as $grados) {
			echo "<option value='".$i."'>".$grados[0]."</option>";
			$i++;
		}
		echo "</select>";
	}else{
		echo "No hay edificio, no es posible continuar";
	}
}
function obtenergrados(){
	$con = mysql_connect("localhost","root","");
	if (!$con) {
		die(' No puedo conectar: ' . mysql_error());
	}
	$db_selected = mysql_select_db("upo",$con);
	if (!$db_selected) {
		die(' No puedo seleccionar con prueba: ' . mysql_error());
	}
	$result=  mysql_query("select * from grado",$con);
	if (!$result) {
		die('no se pudo ejecutar la consulta' . mysql_error());
	}

	$objeto=null;
	$i=0;
	while($row = mysql_fetch_array($result)) {
		$objeto[$i]=$row;
		$i++;
	}
	return $objeto;
}

?>
<html>
<head>
	<title></title>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js">
	</script>
	<link rel="stylesheet" type="text/css" href="../style.css">  
	<script type="text/javascript">

	function seleccion(objeto){
		var dato=objeto.getElementsByTagName('td');
		

		//efecto de seleccion en la lista
		
		$(document).ready(function(){
				//$("#btn-editar").show();
  				//$("#btn-eliminar").show();
			/*
				1- pongo a blanco a toda la lista para distinguir los impares
				2- Ponemos los pares
				3- Coloreamos el seleccionado
				4- cargamos sus datos en el formualrio oculto y esperamos otro evento
				*/
				$(".tr-form").css("background-color","white");
				$(".tr-form:odd").css("background-color","lightblue");
				$("#"+objeto.id).css("background-color","orange");

  			//cargamos los datos
  			//$("#btn3").click(function(){
  				$("#gradosID-edit-form").val(dato[0].innerHTML);
  				$("#nombre-form").val(dato[1].innerHTML);
  				
  				
  				//$("#comentario-form").val(dato[4].innerHTML);
  				$("#btn-editar").show();
  				$("#btn-eliminar").show();
  				//el siguinete es para no editar la clave
  				$("#gradosID-edit-form").val(dato[0].innerHTML);
  				//el siguiente es para eliminar por el id
  				$("#gradosID-form-eliminar").val(dato[0].innerHTML);
  			});
		

		//cargamos datos en el formulario
		 //$("#btn3").click(function(){
    	 //$("#test3").val("Dolly Duck");

    	}
    	function confirmar(){
    		if(confirm('\xBFEstas seguro de eliminar el edificio?'))
    		{
			
			return true;
		}
		else
		{
			return false;
		}	
	}
	function procesaRespuesta(inResponse){
		alert(inResponse);
	}
	</script>
	<script>
	var vel=200;
	$(document).ready(function(){
		$(".tr-form:odd").css("background-color","lightblue");
		$("#btn-editar").hide();
		$("#btn-eliminar").hide();
		$(".submit").hide();

		/*eventos*/
  			//nuevo
  			$("#btn-nuevo").click(function(){
  				$(".tr-form").css("background-color","white");
				$(".tr-form:odd").css("background-color","lightblue");
				//$("#"+objeto.id).css("background-color","orange");
  				//quitamos evento de seleccion
  				$(".tr-form").attr('onclick','').unbind('click');
  				$(".caja-botones").hide(vel);
  				$(".submit").show(vel);
				//limpiamos el form
				$("#gradosID-form").val("auto");
				
				$("#nombre-form").val("");
				
				$("#btn-editar-form").hide();
				$("#btn-crear").show();
				$("#gradosID-form").show();
				$("#gradosID-edit-form").hide();
			});
  			//editar
  			$("#btn-editar").click(function(){
  				$(".tr-form").attr('onclick','').unbind('click');
  				$(".caja-botones").hide(vel);
  				$(".submit").show(vel);
  				$("#btn-editar-form").show();
				$("#btn-crear").hide();
				$("#gradosID-form").hide();
				$("#gradosID-edit-form").show();
  			});
  			//cancelar
  			$("#btn-cancelar").click(function(){
  				//restablecemos la tabla
  				$(".tr-form").css("background-color","white");
				$(".tr-form:odd").css("background-color","lightblue");
				//mostramos y ocultamos controles
  				$(".caja-botones").show(vel);
  				$("#btn-editar").hide();
  				$("#btn-eliminar").hide();
  				$(".submit").hide(vel);  				
  				$(".tr-form").attr('onclick','seleccion(this)').bind('click');
  			});
  			/*$("#btn-eliminar").click(function(){

echo "</td><td class='td-grados'>";
  			});*/
});
	</script>
</head>
<body>
	<div class="scroll-content">
		<?php 
		$grados=obtenergrados();
		echo "<table border='1'>";
		echo "<th>ID</th><th>nombre</th>";
		$i=0;
		if (isset($grados)) {

			foreach ($grados as $grados) {
				//for ($i=0; $i <10 ; $i++) { 
				echo "<tr id='fila".$i."'class='tr-form' onclick='seleccion(this)'><td class='td-grados'>";
				echo $grados[0];
				echo "</td><td>";
				echo $grados[1];
				
				echo "</td></tr>";
				//echo $grados[4];
				//echo "</td></tr>";
				//}
				$i++;

			}
			echo "</table>";
		}else{
			echo "</table>";
			echo "no hay datos";
		}
		
		?>
	</div>
	<div class="caja-botones">
		
		<form method="POST" action="gestion-grados-api.php">
			<input type="hidden" name="grados_id-eliminar" id="gradosID-form-eliminar" value="">
			<input class="boton-nuevo" type="button" id="btn-nuevo" />
			<input class="boton-editar" type="button" id="btn-editar" />
			<input class="boton-eliminar" value="" name="eliminar" id="btn-eliminar" onclick="return confirmar()" type="submit"/>
		</form>
		
	</div>
	<div class="submit">
		<form action="gestion-grados-api.php" method="POST">
			<fieldset><legend>Datos</legend>
				<table class="tabla-form">
					<tr>
						<td style="max-width: 80px;">
							ID. del grado:
						</td>
						<td>
							<input class="numerico" type="text" id="gradosID-form" name="grados_id" OnFocus="this.blur()"  />
							<input class="numerico" type="text" type="text" id="gradosID-edit-form" name="grados_id_mod" value="" min="1" OnFocus="this.blur()"  />
						</td>
					</tr>
					<tr>
						<td>
							Nombre:
						</td>
						<td>
							<input class="input-presonalizado" id="nombre-form" type="text" name="nombre_ed" required  />
						</td>
					</tr>
					
					<tr>
						<td>
							<br/>
							<br/>
							<input class="boton-formulario" type="submit" id="btn-crear" name="crear" value="Crear grado"/>
							<input class="boton-formulario" type="submit" id="btn-editar-form" name="editar" value="Guardar"/>
						</td>
						<td>
							<br/>
							<br/>
							<input class="boton-formulario-cancel" type="button" id="btn-cancelar" name="cancelar" value="Cancelar"/>
						</td>
					</tr>
				</table>
			</fieldset>
		</form>
	</div>
</body>
</html>