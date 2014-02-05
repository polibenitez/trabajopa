<?php

function imprimirEdificios() {
    $edificios = obtenerEdificios();
    $plant = 0;
    if (isset($edificios)) {
        $i = 1;

        $cadena = "";
        echo "<select name='edificios' id='edificios-list' onChange='cambioEdificio(this)'>";
        foreach ($edificios as $edificio) {
            echo "<option value='" . $i . "'>" . $edificio[0] . "</option>";
            //echo "<option value='".$i."'>".$edificio[1]."</option>";
            if ($i > 1) {
                $cadena = $cadena . ";" . $edificio[0] . "," . $edificio[1];
            } else {
                $cadena = $edificio[0] . "," . $edificio[1];
                $plant = $edificio[1];
            }
            $i++;
        }
        echo "</select>";
        //echo $cadena;
        echo "<input type='hidden' name='plantasTotales' value='" . $cadena . "' id='plantasTotales'/>";
    } else {
        echo "No hay edificio, no es posible continuar";
    }
    return $plant;
}

function imprimirPlantas($valor) {
    echo "<select name='planta_des' id='planta-form'>";
    for ($i = 0; $i <= $valor; $i++) {
        echo "<option value='" . $i . "'>Planta " . $i . "</option>";
    }
    echo "</select>";
}

function obtenerEdificios() {
    $con = mysql_connect("localhost", "root", "");
    if (!$con) {
        die(' No puedo conectar: ' . mysql_error());
    }
    $db_selected = mysql_select_db("upo", $con);
    if (!$db_selected) {
        die(' No puedo seleccionar con prueba: ' . mysql_error());
    }
    $result = mysql_query("select numero_ed, plantas_ed from Edificio", $con);
    if (!$result) {
        die('no se pudo ejecutar la consulta' . mysql_error());
    }

    $objeto = null;
    $i = 0;
    while ($row = mysql_fetch_array($result)) {
        $objeto[$i] = $row;
        $i++;
    }
    return $objeto;
}

function obtenerDespachos() {
    $con = mysql_connect("localhost", "root", "");
    if (!$con) {
        die(' No puedo conectar: ' . mysql_error());
    }
    $db_selected = mysql_select_db("upo", $con);
    if (!$db_selected) {
        die(' No puedo seleccionar con prueba: ' . mysql_error());
    }
    $result = mysql_query("select * from Despacho", $con);
    if (!$result) {
        die('no se pudo ejecutar la consulta' . mysql_error());
    }

    $objeto = null;
    $i = 0;
    while ($row = mysql_fetch_array($result)) {
        $objeto[$i] = $row;
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
                    $("#despachoID-edit-form").val(dato[0].innerHTML);
                    $("#edificios-list").val(dato[1].innerHTML);
                    $("#planta-form").val(dato[2].innerHTML);
                    $("#numero_des-form").val(dato[3].innerHTML);
                    //$("#comentario-form").val(dato[4].innerHTML);
                    $("#btn-editar").show();
                    $("#btn-eliminar").show();
                    //el siguinete es para no editar la clave
                    $("#despachoID-edit-form").val(dato[0].innerHTML);
                    //el siguiente es para eliminar por el id
                    $("#despachoID-form-eliminar").val(dato[0].innerHTML);
                });
		

                //cargamos datos en el formulario
                //$("#btn3").click(function(){
                //$("#test3").val("Dolly Duck");

            }
            function confirmar(){
                if(confirm('\xBFEstas seguro de eliminar el edificio?'))
                {
                    //window.location=url;
                    /*var edificio_num=document.getElementsByTagName('num_e-form').value;
                        $.ajax({
                                url: 'gestion-edificios-api.php',
                                type: 'POST',
                                async: true,
                                data: 'accion=eliminar&edificio=v'+edificio_num,
                                success: procesaRespuesta,
                                error: muestraError
                        });*/
			
                    //alert("edificio eliminado");
                    return true;
                }
                else
                {
                    return false;
                }	
            }

            function validarFormulario(opcion){
            	$("#despacho_error").text("");
            	var desp=$("#numero_des-form").val();
            	var cont=0;
            	var errores=new Array();
            	if(campoVacio(desp)){
            		errores[cont]=2;
            		cont++;
            	}
            	if(desp<1){
            		errores[cont]=1;
            		cont++;
            	}
            	if(errores.length>0){
                //alert(errores.length);
                for (var i = 0; i<cont; i++) {
                    //console.log(errores);
                    error=errores[i];
                    switch(error){
                        case 1:
                            $("#despacho_error").text("* Inserte un despacho");
                            break;
                        case 2:
                            $("#despacho_error").text("* el despacho debe ser mayor a 0");
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

	        function controlDespachos(e) {
	            key = e.keyCode || e.which;
	            tecla = String.fromCharCode(key).toLowerCase();
	            letras = "0123456789";
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
            function cambioEdificio(inEvent){
                var p=document.getElementById('plantasTotales').value;
                var pl=p.split(";");
                var cad="";
                var indice;
                var pla=new Array();
                for(var i=0;i<pl.length;i++){
                    pla[i]=pl[i].split(",");
                }
                for(var i=0;i<pla.length;i++){
                    if(inEvent.value==pla[i][0]){
                        //cad="el edificio "+inEvent.value+" tiene "+pla[i][1]+"plantas";
                        indice=i;
                        break;
                    }
                    //pla[i]=pl[i].split(",");
                }
                //alert(cad);
                var opciones = document.getElementById("planta-form");
                if ( opciones.hasChildNodes() )
                {
                    while ( opciones.childNodes.length >= 1 )
                    {
                        opciones.removeChild( opciones.firstChild );
                    }
                }
                for (var i = 0; i <=pla[indice][1]; i++) {
                    var opcion=$('<option>');
                    opcion.attr('value',i);
                    opcion.text("Planta "+i);
                    $('#planta-form').append(opcion);
                };
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
                    $("#despachoID-form").val("auto");
                    $("#edificios-list").val("1");
                    $("#planta-form").val("0");
                    $("#numero_des-form").val("");
                    $("#btn-editar-form").hide();
                    $("#btn-crear").show();
                    $("#despachoID-form").show();
                    $("#despachoID-edit-form").hide();
                });
                //editar
                $("#btn-editar").click(function(){
                    $(".tr-form").attr('onclick','').unbind('click');
                    $(".caja-botones").hide(vel);
                    $(".submit").show(vel);
                    $("#btn-editar-form").show();
                    $("#btn-crear").hide();
                    $("#despachoID-form").hide();
                    $("#despachoID-edit-form").show();
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
            $despachos = obtenerDespachos();
            echo "<table border='1'>";
            echo "<th>ID</th><th>Edificio</th><th>Planta</th><th>Despacho</th>";
            $i = 0;
            if (isset($despachos)) {

                foreach ($despachos as $despacho) {
                    //for ($i=0; $i <10 ; $i++) { 
                    echo "<tr id='fila" . $i . "'class='tr-form' onclick='seleccion(this)'><td class='td-despacho'>";
                    echo $despacho[0];
                    echo "</td><td class='td-despacho'>";
                    echo $despacho[1];
                    echo "</td><td class='td-despacho'>";
                    echo $despacho[2];
                    echo "</td><td class='td-despacho'>";
                    echo $despacho[3];
                    echo "</td></tr>";
                    //echo $despacho[4];
                    //echo "</td></tr>";
                    //}
                    $i++;
                }
                echo "</table>";
            } else {
                echo "</table>";
                echo "no hay datos";
            }
            ?>
        </div>
        <div class="caja-botones">

            <form method="POST" action="gestion-despachos-api.php">
                <input type="hidden" name="despacho_id-eliminar" id="despachoID-form-eliminar" value="">
                <input class="boton-nuevo" type="button" id="btn-nuevo" />
                <input class="boton-editar" type="button" id="btn-editar" />
                <input class="boton-eliminar" value="" name="eliminar" id="btn-eliminar" onclick="return confirmar()" type="submit"/>
            </form>

        </div>
        <div class="submit">
            <form action="gestion-despachos-api.php" method="POST">
                <fieldset><legend>Datos</legend>
                    <table class="tabla-form" style="width:600px;">
                        <tr>
                            <td>
                                ID. del Despacho:
                            </td>
                            <td>
                                <input class="numerico" type="text" id="despachoID-form" name="despacho_id" OnFocus="this.blur()"  />
                                <input class="numerico" type="text" type="text" id="despachoID-edit-form" name="despacho_id_mod" value="" min="1" OnFocus="this.blur()"  />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                N&uacute;mero de edificio:
                            </td>
                            <td>
                                <?php $plantaCero = imprimirEdificios(); ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Planta:
                            </td>
                            <td>
                                <?php imprimirPlantas($plantaCero) ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                N&uacute;mero de despacho:
                            </td>
                            <td>
                                <input class="numerico" type="number" id="numero_des-form" type="text" name="numero_des" onkeypress="return controlDespachos(event)" min="1" required />
                                <label style="color:red;" id="despacho_error"></label>
                            </td>
                        </tr>
                        <tr>
                            <td style="width:10px;">
                                <br/>
                                <br/>
                                <input class="boton-formulario" type="submit" id="btn-crear" onclick="return validarFormulario('crea');" name="crear" value="Crear Despacho"/>
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