<?php 
function obtenerlugares(){
	$con = mysql_connect("localhost","root","");
	if (!$con) {
		die(' No puedo conectar: ' . mysql_error());
	}
	$db_selected = mysql_select_db("upo",$con);
	if (!$db_selected) {
		die(' No puedo seleccionar con prueba: ' . mysql_error());
	}
	$result=  mysql_query("select * from lugares",$con);
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
		//alert(objeto.id);
		//alert(dato[1].innerHTML);

		//efecto de seleccion en la lista
		
		$(document).ready(function(){
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
  				$("#lugarID-edit-form").val(dato[0].innerHTML);
  				$("#tipo-form").val(dato[2].innerHTML);
  				$("#ubicacion-form").val(dato[1].innerHTML);
  				$("#descripcion-form").val(dato[3].innerHTML);
  				
  				$("#btn-editar").show();
  				$("#btn-eliminar").show();
  				//el siguinete es para no editar la clave
  				$("#lugarID-edit-form").val(dato[0].innerHTML);
  				//el siguiente es para eliminar por el id
  				$("#lugar_id-from-eliminar").val(dato[0].innerHTML);
  			});
  			
		

    	}



function validarFormulario(opcion){
						
						$("#tipo_error").text("");
						
						$("#ubicacion_error").text("");
						$("#ubicacion_error").text("");
						$("#descripcion_error").text("");
		//return true;			
		/*
		errores
		1--> tipo vacio
		2--> ubucacion vacio
		3--> ubicacion debe ser un numero 
		4--> descripcion vacia
		
		*/
		var errores=new Array();
		//alert(errores.length);
		var cont=0;
		
		
		var ubicacion=$("#ubicacion-form").val();
		var tipo=$("#tipo-form").val();
		var descripcion=$("#descripcion-form").val();


		
		if(campoVacio(tipo)){
            		errores[cont]=1;
            		cont++;
            	}
            	if(campoVacio(ubicacion)){
            		errores[cont]=2;
            		cont++;
            	}
            /*if(isNaN(parseFloat(ubicacion))){
                errores[cont]=3;
                cont++;
            }*/
            if(campoVacio(descripcion)){
            		errores[cont]=4;
            		cont++;
            	}
		
		if(errores.length>0){
			//alert(errores.length);
			for (var i = 0; i<cont; i++) {
				console.log(errores);
				error=errores[i];
				switch(error){
					/*
		
		errores
		1--> tipo vacio
		2--> ubucacion vacio
		3--> ubicacion debe ser un numero 
		4--> descripcion vacia
		*/
		
					case 1:
						$("#numero_error").text("* Complete el campo");
					break;
					case 2:
						$("#numero_error").text("* Complete el campo");
					break;
					case 3:
						$("#numero_error").text("* El campo debe ser un n\xfAmero");
					break;
					case 4:
						$("#planta_error").text("* Complete el campo");
					break;
					
				}
			}
			return false;
		}else{
			return true;	
		}
		
	}


    	function campoVacio(valor){
			if(valor.length<1){
				return true;
			}else{
				return false;
		}
		}
    	function confirmar(){
    		if(confirm('\xBFEstas seguro de eliminar el lugar?'))
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
				
				$("#lugarID-form").val("auto");
				$("#tipo-form").val("");
     			$("#ubicacion-form").val("");
				$("#descripcion-form").val("");

				$("#btn-editar-form").hide();
				$("#btn-crear").show();
				$("#lugarID-form").show();
				$("#lugarID-edit-form").hide();
			});
  			//editar
  			$("#btn-editar").click(function(){
  				$(".tr-form").attr('onclick','').unbind('click');
  				$(".caja-botones").hide(vel);
  				$(".submit").show(vel);
  				$("#btn-editar-form").show();
				$("#btn-crear").hide();
				$("#lugarID-form").hide();
				$("#lugarID-edit-form").show();
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


  			});*/
});
	</script>
</head>
<body>
	<div class="scroll-content">
		<?php 
		$lugares=obtenerlugares();
		echo "<table border='1'>";
		echo "<th>ID</th><th>Ubicaci&oacute;n</th><th>tipo</th><th>descripcion</th>";
		$i=0;
		if (isset($lugares)) {

			foreach ($lugares as $lugares) {
				//for ($i=0; $i <10 ; $i++) { 
				echo "<tr id='fila".$i."'class='tr-form' onclick='seleccion(this)'><td>";
				echo $lugares[0];
				echo "</td><td>";
				echo $lugares[1];
				echo "</td><td>";
				echo $lugares[2];
				echo "</td><td>";
				echo $lugares[3];
				echo "</td></tr>";
				
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
		
		<form method="POST" action="gestion-lugares-api.php">
			<input type="hidden" name="lugar_id-eliminar" id="lugar_id-from-eliminar" value="">
			<input class="boton-nuevo" type="button" id="btn-nuevo" />
			<input class="boton-editar" type="button" id="btn-editar" />
			<input class="boton-eliminar" value="" name="eliminar" id="btn-eliminar" onclick="return confirmar()" type="submit"/>
		</form>
		
	</div>
	<div class="submit">
		<form action="gestion-lugares-api.php" method="POST">
			<fieldset><legend>Datos</legend>
				<table class="tabla-form">
					<tr>
						<td style="max-width: 80px;">
							ID. del lugar:
						</td>
						<td>
							<input class="numerico" type="text" id="lugarID-form" name="lugar_id" OnFocus="this.blur()"  />
							<input class="numerico" type="text" type="text" id="lugarID-edit-form" name="lugar_id_mod" value="" min="1" OnFocus="this.blur()"  />
						</td>
					</tr>
					<tr>
						<td>
							Ubicaci&oacute;n:
						</td>
						<td>
							<input class="input-presonalizado" id="ubicacion-form" type="text" name="ubicacion" required  />
							<label style="color:red;" id="ubicacion_error"></label>
							<label style="color:red;" id="ubicacion_error"></label>
							
						</td>
					</tr>
					
					<tr>
						<td>
							Tipo:
						</td>
						<td>
							<!-- <input class="input-presonalizado" id="tipo-form" type="text" name="tipo" required  /> -->
							<select id="tipo-form" 	name="tipo" required >
							
					<option value='transportes'>transportes</option>
					<option value='comidas'>comidas</option>
					<option value='deportes'>deportes</option>
					<option value='estudiantes'>estudiantes</option></select>
					<label style="color:red;" id="tipo_error"></label>
						</td>
					</tr>
					<tr>
						<td>
							Descripci&oacute;n:
						</td>
						<td>
							<input class="input-presonalizado" id="descripcion-form" type="text" name="descripcion" required />
							<label style="color:red;" id="descripcion_error"></label>
						</td>
					</tr>
					<tr>
						<td>
							
						</td>
						<td>
							<label style="color:red;" id="latitud_error"></label>
							<label style="color:red;" id="longitud_error"></label>
						</td>
					</tr>
					<tr>
						<td>
							<br/>
							<br/>
							<input class="boton-formulario" type="submit" id="btn-crear" onclick="return validarFormulario('crea');" name="crear" value="Crear lugares"/>
							<input class="boton-formulario" type="submit" id="btn-editar-form" onclick="return validarFormulario('edita');" name="editar" value="Guardar"/>
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