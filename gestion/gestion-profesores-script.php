<?php

function imprimirAsignaturas() {
    $con = mysql_connect("localhost", "root");
    if (!$con) {
        die(' No puedo conectar: ' . mysql_error());
    }
    $db_selected = mysql_select_db("upo", $con);
    if (!$db_selected) {
        die(' No puedo seleccionar con prueba: ' . mysql_error());
    }

    $result = mysql_query("SELECT asignatura_id, nombre_asi FROM asignatura order by nombre_asi", $con);
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
        echo "No hay asignaturas, no es posible continuar";
    }
}

function imprimirDespachos() {
    $con = mysql_connect("localhost", "root");
    if (!$con) {
        die(' No puedo conectar: ' . mysql_error());
    }
    $db_selected = mysql_select_db("upo", $con);
    if (!$db_selected) {
        die(' No puedo seleccionar con prueba: ' . mysql_error());
    }
    $result = mysql_query("SELECT despacho_id, numero_ed, planta_des, numero_des  FROM despacho order by numero_ed, planta_des, numero_des", $con);
    if (!$result) {
        die('no se pudo ejecutar la consulta' . mysql_error());
    }

    if ((mysql_num_rows($result) > 0)) {
        echo "<select name='despachos' id='despachos-list'>";
        while ($tipo = mysql_fetch_array($result)) {
            echo "<option value ='$tipo[despacho_id]'>$tipo[numero_ed].$tipo[planta_des].$tipo[numero_des]</option>";
        }
        echo "</select>";
    } else {
        echo "No hay despachos, no es posible continuar";
    }
}

function obtenerProfesores() {
    $con = mysql_connect("localhost", "root", "");
    if (!$con) {
        die(' No puedo conectar: ' . mysql_error());
    }
    $db_selected = mysql_select_db("upo", $con);
    if (!$db_selected) {
        die(' No puedo seleccionar con prueba: ' . mysql_error());
    }
    $result = mysql_query("SELECT pro.profesor_id, pro.nombre_prof, pro.apellido1_prof, pro.apellido2_prof, asi.nombre_asi, des.numero_ed, des.planta_des, des.numero_des FROM profesor pro, asignatura asi, despacho des WHERE pro.asignatura_id=asi.asignatura_id and pro.despacho_id=des.despacho_id", $con);
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
                    $("#profesorID-edit-form").val(dato[0].innerHTML);
                    $("#nombre-form").val(dato[1].innerHTML);
                    $("#apellido1-form").val(dato[2].innerHTML);
                    $("#apellido2-form").val(dato[3].innerHTML);
                    $("#asignaturas-list").val(dato[4].innerHTML);
                    $("#despachos-list").val(dato[5].innerHTML);
                    //$("#comentario-form").val(dato[4].innerHTML);
                    $("#btn-editar").show();
                    $("#btn-eliminar").show();
                    //el siguinete es para no editar la clave
                    $("#profesorID-edit-form").val(dato[0].innerHTML);
                    //el siguiente es para eliminar por el id
                    $("#profesorID-form-eliminar").val(dato[0].innerHTML);
                });
		

                //cargamos datos en el formulario
                //$("#btn3").click(function(){
                //$("#test3").val("Dolly Duck");

            }
            function confirmar(){
                if(confirm('\xBFEstas seguro de eliminar el profesor?'))
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
                
                $("#nombre_error").text("");
                $("#nombre_error").text("");
                $("#nombre_error").text("");
                $("#apellido1_error").text("");
                $("#apellido1_error").text("");
                $("#apellido1_error").text("");
                $("#apellido2_error").text("");
                $("#apellido2_error").text("");
                $("#apellido2_error").text("");
                
                var errores=new Array();
                //alert(errores.length);
                var cont=0;
                var nombre=$("#nombre-form").val();
                var apellido1=$("#apellido1-form").val();
                var apellido2=$("#apellido2-form").val();
                
                if(opcion=='crea'){

                    if(!campoVacio(nombre)){

                        if(!campoMenor(nombre)){
                            
                        }else{
                            errores[cont]=2;
                            cont++;
                        }
                    }else{
                        errores[cont]=1;
                        cont++;
                    }
                }
                
                if(nombre.charAt(0)=='1' || nombre.charAt(0)=='2' || nombre.charAt(0)=='3' || nombre.charAt(0)=='4' || nombre.charAt(0)=='5' || nombre.charAt(0)=='6' || nombre.charAt(0)=='7' || nombre.charAt(0)=='8' || nombre.charAt(0)=='9' || nombre.charAt(0)=='0'){
                    errores[cont]=3;
                    cont++;
                }
                
                if(opcion=='crea'){

                    if(!campoVacio(apellido1)){

                        if(!campoMenor(apellido1)){
                            
                        }else{
                            errores[cont]=5;
                            cont++;
                        }
                    }else{
                        errores[cont]=4;
                        cont++;
                    }
                }
                
                if(apellido1.charAt(0)=='1' || apellido1.charAt(0)=='2' || apellido1.charAt(0)=='3' || apellido1.charAt(0)=='4' || apellido1.charAt(0)=='5' || apellido1.charAt(0)=='6' || apellido1.charAt(0)=='7' || apellido1.charAt(0)=='8' || apellido1.charAt(0)=='9' || apellido1.charAt(0)=='0'){
                    errores[cont]=6;
                    cont++;
                }
                
                if(opcion=='crea'){

                    if(!campoVacio(apellido2)){

                        if(!campoMenor(apellido2)){
                            
                        }else{
                            errores[cont]=8;
                            cont++;
                        }
                    }else{
                        errores[cont]=7;
                        cont++;
                    }
                }
                
                if(apellido2.charAt(0)=='1' || apellido2.charAt(0)=='2' || apellido2.charAt(0)=='3' || apellido2.charAt(0)=='4' || apellido2.charAt(0)=='5' || apellido2.charAt(0)=='6' || apellido2.charAt(0)=='7' || apellido2.charAt(0)=='8' || apellido2.charAt(0)=='9' || apellido2.charAt(0)=='0'){
                    errores[cont]=9;
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
            1--> Nombre vacio
            2--> Nombre Menor que 4
            3--> Nombre empieza por numero
                             */
                            case 1:
                                $("#nombre_error").text("* Complete el campo.");
                                break;
                            case 2:
                                $("#nombre_error").text("* El nombre tiene que tener al menos 3 letras.");
                                break;
                            case 3:
                                $("#nombre_error").text("* El nombre no puede empezar por un n\xfAmero.");
                                break;
                            case 4:
                                $("#apellido1_error").text("* Complete el campo.");
                                break;
                            case 5:
                                $("#apellido1_error").text("* El primer apellido tiene que tener al menos 3 letras.");
                                break;
                            case 6:
                                $("#apellido1_error").text("* El primer apellido no puede empezar por un n\xfAmero.");
                                break;
                            case 7:
                                $("#apellido2_error").text("* Complete el campo.");
                                break;
                            case 8:
                                $("#apellido2_error").text("* El segundo apellido tiene que tener al menos 3 letras.");
                                break;
                            case 9:
                                $("#apellido2_error").text("* El segundo apellido no puede empezar por un n\xfAmero.");
                                break;
                                
                        }
                    }
                    return false;
                }else{
                    return true;	
                }
		
            }
            
            function soloLetras(e) {
                var key = e.keyCode || e.which;
                var tecla = String.fromCharCode(key).toLowerCase();
                var letras = "abcdefghijklmn±opqrstuvwxyz0123456789";
                var especiales = [8, 37, 39, 46];

                var tecla_especial = false
                for(var i in especiales) {
                    if(key == especiales[i]) {
                        tecla_especial = true;
                        break;
                    }
                }



                if(letras.indexOf(tecla) == -1 && !tecla_especial){
                    return false;
                }
            }
            
            function campoVacio(valor){
                if(valor.length<1){
                    return true;
                }else{
                    return false;
                }
            }
            
            function campoMenor(valor){
                if(valor.length<3){
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
                    $("#profesorID-form").val("auto");//auto incremento del id de la asignatura
                    $("#nombre-form").val("");
                    $("#apellido1-form").val("");// valor del grado
                    $("#apellido2-form").val("");//valor del grado
                    $("#btn-editar-form").hide();
                    $("#btn-crear").show();
                    $("#profesorID-form").show();
                    $("#profesorID-edit-form").hide();
                });
                //editar
                $("#btn-editar").click(function(){
                    $(".tr-form").attr('onclick','').unbind('click');
                    $(".caja-botones").hide(vel);
                    $(".submit").show(vel);
                    $("#nombre-form").val("");
                    $("#apellido1-form").val("");// valor del grado
                    $("#apellido2-form").val("");//valor del grado
                    $("#btn-editar-form").show();
                    $("#btn-crear").hide();
                    $("#profesorID-form").hide();
                    $("#profesorID-edit-form").show();
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
            $profesores = obtenerProfesores();
            echo "<table border='1'>";
            echo "<th>ID</th><th>Nombre</th><th>Primer Apellido</th><th>Segundo Apellido</th><th>Nombre Asignatura</th><th>Numero de Edificio</th><th>Numero de Despacho</th>";
            $i = 0;
            if (isset($profesores)) {

                foreach ($profesores as $profesor) {
                    //for ($i=0; $i <10 ; $i++) { 
                    echo "<tr id='fila" . $i . "'class='tr-form' onclick='seleccion(this)'><td class='td-despacho'>";
                    echo $profesor[0];
                    echo "</td><td class='td-despacho'>";
                    echo $profesor[1];
                    echo "</td><td class='td-despacho'>";
                    echo $profesor[2];
                    echo "</td><td class='td-despacho'>";
                    echo $profesor[3];
                    echo "</td><td class='td-despacho'>";
                    echo $profesor[4];
                    echo "</td><td class='td-despacho'>";
                    echo $profesor[5];
                    echo "</td><td class='td-despacho'>";
                    echo $profesor[6] . "." . $profesor[7];
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

            <form method="POST" action="gestion-profesores-api.php">
                <input type="hidden" name="profesor_id-eliminar" id="profesorID-form-eliminar" value="">
                <input class="boton-nuevo" type="button" id="btn-nuevo" />
                <input class="boton-editar" type="button" id="btn-editar" />
                <input class="boton-eliminar" value="" name="eliminar" id="btn-eliminar" onclick="return confirmar()" type="submit"/>
            </form>

        </div>
        <div class="submit">
            <form action="gestion-profesores-api.php" method="POST">
                <fieldset><legend>Datos</legend>
                    <table class="tabla-form">
                        <tr>
                            <td style="max-width: 80px;">
                                ID. del Profesor:
                            </td>
                            <td>
                                <input class="numerico" type="text" id="profesorID-form" name="profesor_id" OnFocus="this.blur()"  />
                                <input class="numerico" type="text" id="profesorID-edit-form" name="profesor_id_mod" value="" min="1" OnFocus="this.blur()"  />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Nombre Profesor:
                            </td>
                            <td>
                                <input class="input-presonalizado" type="text" id="nombre-form" type="text" name="nombre_prof" onkeypress="return soloLetras(event)" required  />
                                <label style="color:red;" id="nombre_error"></label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Primer Apellido:
                            </td>
                            <td>
                                <input class="input-presonalizado" type="text" id="apellido1-form" type="text" name="apellido1" onkeypress="return soloLetras(event)" required  />
                                <label style="color:red;" id="apellido1_error"></label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Segundo Apellido:
                            </td>
                            <td>
                                <input class="input-presonalizado" type="text" id="apellido2-form" type="text" name="apellido2" onkeypress="return soloLetras(event)" required  />
                                <label style="color:red;" id="apellido2_error"></label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Nombre Asignatura:
                            </td>
                            <td>
                                <?php imprimirAsignaturas(); ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Numero de despacho:
                            </td>
                            <td>
                                <?php imprimirDespachos(); ?>
                            </td>
                        </tr>                      
                        <tr>
                            <td>
                                <br/>
                                <br/>
                                <input class="boton-formulario" type="submit" id="btn-crear" name="crear" value="Crear Profesor" onclick="return validarFormulario('crea');"/>
                                <input class="boton-formulario" type="submit" id="btn-editar-form" name="editar" value="Guardar" onclick="return validarFormulario('edita');"/>
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
