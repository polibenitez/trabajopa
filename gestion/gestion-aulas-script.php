<?php 
function imprimirEdificios(){
	$edificios=obtenerEdificios();
	if (isset($edificios)) {
		$i=1;
		echo "<select name='edificios' id='edificios-list'>";
		foreach ($edificios as $edificio) {
			echo "<option value='".$i."'>".$edificio[0]."</option>";
			$i++;
		}
		echo "</select>";
	}else{
		echo "No hay edificio, no es posible continuar";
	}
}
//function imprimirAsignatura(){
//	$asignaturas=obtenerAsignaturas();
//	if (isset($asignaturas)) {
//		$i=1;
//		echo "<select name='asignaturas' id='asignaturas-list'>";
//		foreach ($asignaturas as $asignaturas) {
//			echo "<option value='".$i."'>".$asignaturas[0]."</option>";
//			$i++;
//		}
//		echo "</select>";
//	}else{
//		echo "No hay asignaturas, no es posible continuar";
//	}
//}



function imprimirAsignatura() {
    $con = mysql_connect("localhost", "root");
    if (!$con) {
        die(' No puedo conectar: ' . mysql_error());
    }
    $db_selected = mysql_select_db("upo", $con);
    if (!$db_selected) {
        die(' No puedo seleccionar con prueba: ' . mysql_error());
    }

    $result = mysql_query("SELECT asignatura_id, nombre_asi FROM Asignatura", $con);
    if (!$result) {
        die('no se pudo ejecutar la consulta' . mysql_error());
    }

    if ((mysql_num_rows($result) > 0)) {
        echo "<select name='asignaturas' id='asignaturas-list'>";
        while ($tipo = mysql_fetch_array($result)) {
            echo "<option value ='$tipo[asignatura_id]'>$tipo[nombre_asi]</option>";
        }
        echo "</select>";
    } else {
        echo "No hay grados, no es posible continuar";
    }
}











function obtenerEdificios(){
	$con = mysql_connect("localhost","root","");
	if (!$con) {
		die(' No puedo conectar: ' . mysql_error());
	}
	$db_selected = mysql_select_db("upo",$con);
	if (!$db_selected) {
		die(' No puedo seleccionar con prueba: ' . mysql_error());
	}
	$result=  mysql_query("select numero_ed from Edificio",$con);
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
//function obtenerAsignaturas(){
//	$con = mysql_connect("localhost","root","");
//	if (!$con) {
//		die(' No puedo conectar: ' . mysql_error());
//	}
//	$db_selected = mysql_select_db("upo",$con);
//	if (!$db_selected) {
//		die(' No puedo seleccionar con prueba: ' . mysql_error());
//	}
//	$result=  mysql_query("select nombre_asi from asignatura",$con);
//	if (!$result) {
//		die('no se pudo ejecutar la consulta' . mysql_error());
//	}
//
//	$objeto=null;
//	$i=0;
//	while($row = mysql_fetch_array($result)) {
//		$objeto[$i]=$row;
//		$i++;
//	}
//	return $objeto;
//}
function obteneraulas(){
	$con = mysql_connect("localhost","root","");
	if (!$con) {
		die(' No puedo conectar: ' . mysql_error());
	}
	$db_selected = mysql_select_db("upo",$con);
	if (!$db_selected) {
		die(' No puedo seleccionar con prueba: ' . mysql_error());
	}
	$result=  mysql_query("select * from aulas",$con);
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
  				$("#aulasID-edit-form").val(dato[0].innerHTML);
  				$("#nombre-form").val(dato[1].innerHTML);
  				$("#edificios-list").val(dato[2].innerHTML);
  				$("#asignaturas-list").val(dato[2].innerHTML);
  				
  				
  				//$("#comentario-form").val(dato[4].innerHTML);
  				$("#btn-editar").show();
  				$("#btn-eliminar").show();
  				//el siguinete es para no editar la clave
  				$("#aulasID-edit-form").val(dato[0].innerHTML);
  				//el siguiente es para eliminar por el id
  				$("#aulasID-form-eliminar").val(dato[0].innerHTML);
  			});
		

		//cargamos datos en el formulario
		 //$("#btn3").click(function(){
    	 //$("#test3").val("Dolly Duck");

    	}
    	function confirmar(){
    		if(confirm('\xBFEstas seguro de eliminar la asignatura?'))
    		{
			
			return true;
		}
		else
		{
			return false;
		}	
	}



            function validarFormulario(opcion){
            	$("#numeropla_error").text("");
            	$("#comentario_error").text("");
            	var npla=$("#numero_pla-form").val();
            	var comen=$("#comentario-form").val();
            	/*
            errores
            1--> numero planta vacio
            2--> numero de planta menor que 1
            3--> comentario vacio
             */
            	var cont=0;
            	var errores=new Array();
            	if(campoVacio(pla)){
            		errores[cont]=1;
            		cont++;
            	}
            	if(npla<1){
            		errores[cont]=2;
            		cont++;
            	}
            	if(campoVacio(comen)){
            		errores[cont]=3;
            		cont++;
            	}
            	if(errores.length>0){
                //alert(errores.length);
                for (var i = 0; i<cont; i++) {
                    //console.log(errores);
                    error=errores[i];
                    switch(error){
                        case 1:
                            $("#despacho_error").text("* Inserte una planta");
                            break;
                        case 2:
                            $("#despacho_error").text("* la planta debe ser mayor a 0");
                            break;
                            case 3:
                            $("#despacho_error").text("* inserte un comentario");
                            break;
                        }
                    }
                    return false;
                }else{
                	return true;
                }
            }

            function campoVacio(valor){

	            if( valor == null || valor.length == 0 || /^\s+$/.test(valor) ) {
	                return true;

	            }else{
	                return false;
	            }
	        }

	        function controlUbicacion(e) {
            key = e.keyCode || e.which;
            tecla = String.fromCharCode(key).toLowerCase();
            letras = "0123456789-.";
            especiales = [8, 37, 39, 46];

            tecla_especial = false
            for(var i in especiales) {
                if(key == especiales[i]) {
                    tecla_especial = true;
                    break;
                }
            }

            if(letras.indexOf(tecla) == -1 && !tecla_especial)
                return false;
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
				$("#aulasID-form").val("auto");
				
				$("#nombre-form").val("");
				
				$("#btn-editar-form").hide();
				$("#btn-crear").show();
				$("#aulasID-form").show();
				$("#aulasID-edit-form").hide();
			});
  			//editar
  			$("#btn-editar").click(function(){
  				$(".tr-form").attr('onclick','').unbind('click');
  				$(".caja-botones").hide(vel);
  				$(".submit").show(vel);
  				$("#btn-editar-form").show();
				$("#btn-crear").hide();
				$("#aulasID-form").hide();
				$("#aulasID-edit-form").show();
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

echo "</td><td class='td-aulas'>";
  			});*/
});
	</script>
</head>
<body>
	<div class="scroll-content">
		<?php 
		$aulas=obteneraulas();
		echo "<table border='1'>";
		echo "<th>ID</th><th>asignatura</th><th>n edificio</th><th>planta</th><th>comentario</th>";
		$i=0;
		if (isset($aulas)) {

			foreach ($aulas as $aulas) {
				//for ($i=0; $i <10 ; $i++) { 
				echo "<tr id='fila".$i."'class='tr-form' onclick='seleccion(this)'><td class='td-aulas'>";
				echo $aulas[0];
				echo "</td><td>";
				echo $aulas[1];
				echo "</td><td>";
				echo $aulas[2];
				echo "</td><td>";
				echo $aulas[3];
				echo "</td><td>";
				echo $aulas[4];
				
				echo "</td></tr>";
				//echo $aulas[4];
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
		
		<form method="POST" action="gestion-aulas-api.php">
			<input type="hidden" name="aulas_id-eliminar" id="aulasID-form-eliminar" value="">
			<input class="boton-nuevo" type="button" id="btn-nuevo" />
			<input class="boton-editar" type="button" id="btn-editar" />
			<input class="boton-eliminar" value="" name="eliminar" id="btn-eliminar" onclick="return confirmar()" type="submit"/>
		</form>
		
	</div>
	<div class="submit">
		<form action="gestion-aulas-api.php" method="POST">
			<fieldset><legend>Datos</legend>
				<table class="tabla-form">
					<tr>
						<td style="max-width: 80px;">
							ID. del aula:
						</td>
						<td>
							<input class="numerico" type="text" id="aulasID-form" name="aulas_id" OnFocus="this.blur()"  />
							<input class="numerico" type="text" type="text" id="aulasID-edit-form" name="aulas_id_mod" value="" min="1" OnFocus="this.blur()"  />
						</td>
					</tr>
					<tr>
						<td>
							N&uacute;mero de edificio:
						</td>
						<td>
							<?php imprimirEdificios(); ?>
						</td>
					</tr>
					<tr>
						<td>
							Asignatura id:
						</td>
						<td>
							<?php imprimirAsignatura(); ?>
						</td>
					</tr>
					<tr>
						<td>
							N&uacute;mero de planta:
						</td>
						<td>
							<input class="numerico" type="number" id="numero_pla-form" type="text" name="numero_pla" min="1" onkeypress="return controlUbicacion(event)" required />
							<label style="color:red;" id="numeropla_error"></label>
						</td>
					</tr>
					<tr>
						<td>
							Comentario aula:
						</td>
						<td>
							<input class="input-presonalizado" id="comentario-form" type="text" name="comentario_au" required  />
							<label style="color:red;" id="comentario_error"></label>
						</td>
					</tr>
					
					<tr>
						<td>
							<br/>
							<br/>
							<input class="boton-formulario" type="submit" id="btn-crear" onclick="return validarFormulario('crea');" name="crear" value="Crear aula"/>
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
</html>s