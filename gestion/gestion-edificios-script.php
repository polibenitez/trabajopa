<?php

function obtenerEdificios() {
    $con = mysql_connect("localhost", "root", "");
    if (!$con) {
        die(' No puedo conectar: ' . mysql_error());
    }
    $db_selected = mysql_select_db("upo", $con);
    if (!$db_selected) {
        die(' No puedo seleccionar con prueba: ' . mysql_error());
    }
    $result = mysql_query("select * from Edificio", $con);
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
    </script>
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
                var ubicacion=dato[2].innerHTML;
                var ubicacion=ubicacion.split(";");

                $(".tr-form").css("background-color","white");
                $(".tr-form:odd").css("background-color","lightblue");
                $("#"+objeto.id).css("background-color","orange");

                //cargamos los datos
                //$("#btn3").click(function(){
                $("#num_edit-form").val(dato[0].innerHTML);
                $("#num_p-form").val(dato[3].innerHTML);
                $("#nombre-form").val(dato[1].innerHTML);
                $("#comentario-form").val(dato[4].innerHTML);
                $("#latitud").val(ubicacion[0]);
                $("#longitud").val(ubicacion[1]);
                $("#btn-editar").show();
                $("#btn-eliminar").show();
                //el siguinete es para no editar la clave
                $("#num_edit-form").val(dato[0].innerHTML);
                //el siguiente es para eliminar por el id
                $("#num_e-from-eliminar").val(dato[0].innerHTML);
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
            $("#numero_error").text("");
            $("#numero_error").text("");
            $("#numero_error").text("");
            $("#planta_error").text("");
            $("#planta_error").text("");
            $("#latitud_error").text("");
            $("#longitud_error").text("");
					
            /*
            errores
            1--> ya existe edificio
            2--> edificio vacio
            3--> edificio debe ser un numero >0
            4--> planta vacia
            5--> planta numerica >0
            6--> latitud incorrecta
            7--> longitud incorrecta
             */
            var errores=new Array();
            //alert(errores.length);
            var cont=0;
            var numero=$("#num_e-form").val();
            var numero1=$("#num_edit-form").val();
            var plantas=$("#num_p-form").val();
            var nombre=$("#nombre-form").val();
            var comentario=$("#comentario-form").val();
            var latitud=$("#latitud").val();
            var longitud=$("#longitud").val();
            var edificiosAc=$("#listaEdificios").val().split(";");
            //console.log("numero alta:"+numero+"\nnumero edita:"+numero1+"\nplantas"+plantas+"\nnombre:"+nombre+"\ncomentario:"+comentario+"\nlatitud:"+latitud+"\nlongitud"+longitud);
		
            //console.log(edificiosAc);
            if(opcion=='crea'){
                var existe=0;

                if(!campoVacio(numero)){

                    if(!isNaN(numero)&&numero>0){
                        //alert(edificiosAc.length);
                        for (var i = 0; i<edificiosAc.length; i++) {

                            if(numero==edificiosAc[i]){
                                errores[cont]=1;
                                cont++;
                                //alert(opcion);
                                break;
                            }
                        }
                    }else{
                        errores[cont]=3;
                        cont++;
                    }
                }else{
                    errores[cont]=2;
                    cont++;
                }
            }

            if(campoVacio(plantas)){
                errores[cont]=4;
                cont++;
            }
            if(isNaN(parseInt(plantas))){//||plantas<0){
                errores[cont]=5;
                cont++;
            }

            if(isNaN(parseFloat(latitud))){
                errores[cont]=6;
                cont++;
            }

            if(isNaN(parseFloat(longitud))){
                errores[cont]=7;
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
            1--> ya existe edificio
            2--> edificio vacio
            3--> edificio debe ser un numero >0
            4--> planta vacia
            5--> planta numerica >0
            6--> latitud incorrecta
            7--> longitud incorrecta
                         */
                        case 1:
                            $("#numero_error").text("* El n\xfAmero ya existe");
                            break;
                        case 2:
                            $("#numero_error").text("* Complete el campo");
                            break;
                        case 3:
                            $("#numero_error").text("* El campo debe ser un n\xfAmero");
                            break;
                        case 4:
                            $("#planta_error").text("* Inserte un n\xfAmero de planta");
                            break;
                        case 5:
                            $("#planta_error").text("* El campo debe ser un n\xfAmero");
                            break;
                        case 6:
                            $("#latitud_error").text("* Latitud incorrecta");
                            break;
                        case 7:
                            $("#longitud_error").text("* Longitud incorrecta");
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
                $("#num_e-form").val("1");
                $("#num_p-form").val("0");
                $("#nombre-form").val("");
                $("#comentario-form").val("");
                $("#btn-editar-form").hide();
                $("#btn-crear").show();
                $("#num_e-form").show();
                $("#num_edit-form").hide();
            });
            //editar
            $("#btn-editar").click(function(){
                $(".tr-form").attr('onclick','').unbind('click');
                $(".caja-botones").hide(vel);
                $(".submit").show(vel);
                $("#btn-editar-form").show();
                $("#btn-crear").hide();
                $("#num_e-form").hide();
                $("#num_edit-form").show();
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
        $edificios = obtenerEdificios();
        echo "<table border='1'>";
        echo "<th>N&deg;</th><th>Nombre</th><th>Ubicaci&oacute;n</th><th>P.</th><th>Comentario</th>";
        $i = 0;
        if (isset($edificios)) {
            $num_ed = "";
            foreach ($edificios as $edificio) {
                //for ($i=0; $i <10 ; $i++) { 
                echo "<tr id='fila" . $i . "'class='tr-form' onclick='seleccion(this)'><td>";
                echo $edificio[0];
                echo "</td><td>";
                echo $edificio[1];
                echo "</td><td>";
                echo $edificio[2];
                echo "</td><td>";
                echo $edificio[3];
                echo "</td><td>";
                echo $edificio[4];
                echo "</td></tr>";
                //}
                if ($i > 0) {
                    $num_ed.=";" . $edificio[0];
                } else {
                    $num_ed.=$edificio[0];
                }

                $i++;
            }
            echo "</table>";
            echo '<input type="hidden" id="listaEdificios" name="listaEdificios" value="' . $num_ed . '" />';
            //en un sistema real esto se haría con ajax, pero aun no aprendemos, aunque ya lo hayamos implantado
            //en otras partes del programa, aqui lo vamos hacer con un hidden.
        } else {
            echo "</table>";
            echo "no hay datos";
        }
        ?>
    </div>
    <div class="caja-botones">

        <form method="POST" action="gestion-edificios-api.php">
            <input type="hidden" name="edificio_num" id="num_e-from-eliminar" value="">
            <input class="boton-nuevo" type="button" id="btn-nuevo" />
            <input class="boton-editar" type="button" id="btn-editar" />
            <input class="boton-eliminar" value="" name="eliminar" id="btn-eliminar" onclick="return confirmar()" type="submit"/>
        </form>

    </div>
    <div class="submit">
        <form action="gestion-edificios-api.php" method="POST">
            <fieldset><legend>Datos</legend>
                <table class="tabla-form" style="width:700px;">
                    <tr>
                        <td>
                            N&uacute;mero de edificio:
                        </td>
                        <td>
                            <input class="numerico" type="number" id="num_e-form" name="numero_ed" value="1" min="1" required  />
                            <input class="numerico" type="text" id="num_edit-form" name="numero_ed_mod" value="" min="1" OnFocus="this.blur()"  />
                            <label style="color:red;" id="numero_error"></label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            N&uacute;mero de plantas:
                        </td>
                        <td>
                            <input class="numerico" type="number" id="num_p-form" name="plantas" value="0" min="0" required  />
                            <label style="color:red;" id="planta_error"></label>
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
                            Comentario
                        </td>
                        <td>
                            <input class="input-presonalizado" id="comentario-form" type="text" name="comentario_ed" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Ubicaci&oacute;n
                        </td>
                        <td>
                            <input class="input-presonalizado" id="latitud" type="text" name="latitud" placeholder="Latitud" required />
                            <input class="input-presonalizado" id="longitud" type="text" name="longitud" placeholder="Longitud" required />
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
                            <input class="boton-formulario" type="submit" id="btn-crear" onclick="return validarFormulario('crea');" name="crear" value="Crear Edificio"/>
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