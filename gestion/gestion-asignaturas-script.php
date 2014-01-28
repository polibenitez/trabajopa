<?php

function imprimirGrados() {
    $con = mysql_connect("localhost", "root");
    if (!$con) {
        die(' No puedo conectar: ' . mysql_error());
    }
    $db_selected = mysql_select_db("upo", $con);
    if (!$db_selected) {
        die(' No puedo seleccionar con prueba: ' . mysql_error());
    }

    $result = mysql_query("SELECT grado_id, nombre FROM Grado", $con);
    if (!$result) {
        die('no se pudo ejecutar la consulta' . mysql_error());
    }

    if ((mysql_num_rows($result) > 0)) {
        echo "<select name='grados' id='grados-list'>";
        while ($tipo = mysql_fetch_array($result)) {
            echo "<option value ='$tipo[grado_id]'>$tipo[nombre]</option>";
        }
        echo "</select>";
    }else{
        echo "No hay grados, no es posible continuar";
    }
}

function obtenerAsignaturas() {
    $con = mysql_connect("localhost", "root", "");
    if (!$con) {
        die(' No puedo conectar: ' . mysql_error());
    }
    $db_selected = mysql_select_db("upo", $con);
    if (!$db_selected) {
        die(' No puedo seleccionar con prueba: ' . mysql_error());
    }

    $result = mysql_query("select asi.asignatura_id, gra.nombre, asi.nombre_asi from asignatura asi, grado gra where gra.grado_id = asi.grado_id;", $con);
    $result = mysql_query("select * from asignatura", $con);
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
                    $("#asignaturaID-edit-form").val(dato[0].innerHTML);
                    $("#grados-list").val(dato[1].innerHTML);
                    $("#nombre-form").val(dato[2].innerHTML);
                    //$("#comentario-form").val(dato[4].innerHTML);
                    $("#btn-editar").show();
                    $("#btn-eliminar").show();
                    //el siguinete es para no editar la clave
                    $("#asignaturaID-edit-form").val(dato[0].innerHTML);
                    //el siguiente es para eliminar por el id
                    $("#asignaturaID-form-eliminar").val(dato[0].innerHTML);
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
                    $("#asignaturaID-form").val("auto");//auto incremento del id de la asignatura
                    //$("#planta-list").val("0");// valor del grado
                    //$("#planta-list").val("");//valor del grado
                    $("#btn-editar-form").hide();
                    $("#btn-crear").show();
                    $("#asignaturaID-form").show();
                    $("#asignaturaID-edit-form").hide();
                });
                //editar
                $("#btn-editar").click(function(){
                    $(".tr-form").attr('onclick','').unbind('click');
                    $(".caja-botones").hide(vel);
                    $(".submit").show(vel);
                    $("#btn-editar-form").show();
                    $("#btn-crear").hide();
                    $("#asignaturaID-form").hide();
                    $("#asignaturaID-edit-form").show();
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
            $asignaturas = obtenerAsignaturas();
            echo "<table border='1'>";
            echo "<th>ID</th><th>Nombre Grado</th><th>Nombre Asignatura</th>";
            echo "<th>ID</th><th>ID Grado</th><th>Nombre Asignatura</th>";
            $i = 0;
            if (isset($asignaturas)) {

                foreach ($asignaturas as $asignatura) {
                    //for ($i=0; $i <10 ; $i++) { 
                    echo "<tr id='fila" . $i . "'class='tr-form' onclick='seleccion(this)'><td class='td-despacho'>";
                    echo $asignatura[0];
                    echo "</td><td class='td-despacho'>";
                    echo $asignatura[1];
                    echo "</td><td class='td-despacho'>";
                    echo $asignatura[2];
                    echo "</td></tr>";
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

            <form method="POST" action="gestion-asignaturas-api.php">
                <input type="hidden" name="asignatura_id-eliminar" id="asignaturaID-form-eliminar" value="">
                <input class="boton-nuevo" type="button" id="btn-nuevo" />
                <input class="boton-editar" type="button" id="btn-editar" />
                <input class="boton-eliminar" value="" name="eliminar" id="btn-eliminar" onclick="return confirmar()" type="submit"/>
            </form>

        </div>

        <div class="submit">
            <form action="gestion-asignaturas-api.php" method="POST">
                <fieldset><legend>Datos</legend>
                    <table class="tabla-form">
                        <tr>
                            <td style="max-width: 80px;">
                                ID. de la Asignatura:
                            </td>
                            <td>
                                <input class="numerico" type="text" id="asignaturaID-form" name="asignatura_id" OnFocus="this.blur()"  />
                                <input class="numerico" type="text" id="asignaturaID-edit-form" name="asignatura_id_mod" value="" min="1" OnFocus="this.blur()"  />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Nombre de grado:
                            </td>
                            <td>
                                <?php imprimirGrados(); ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Nombre Asignatura
                            </td>
                            <td>
                                <input class="numerico" type="text" id="nombre-form" type="text" name="nombre_asi" required  />
                            </td>
                        </tr>                      
                        <tr>
                            <td>
                                <br/>
                                <br/>
                                <input class="boton-formulario" type="submit" id="btn-crear" name="crear" value="Crear Asignatura"/>
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
