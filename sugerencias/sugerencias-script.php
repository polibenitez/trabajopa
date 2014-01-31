<html>
    <head>
        <title></title>
        <link rel="stylesheet" type="text/css" href="../style.css">
    </head>
    <body>

        <?php
        echo '<div class="scroll-content">';
        echo '<br><h2 align=center>Contacto</h2>';
        //Si la variable de estado existe entrar y ver que valor tiene
        if (isset($_GET['estado'])) {
            if ($_GET['estado'] == 'enviado') {
                echo "<br><br>Su mensaje fue enviado correctamente";
                echo "<br><br><a href='sugerencias.php'>VOLVER</a>";
            } else if ($_GET['estado'] == 'no_enviado') {
                echo "<br><br><b>Upss!!,</b> Ocurrio un error. SU MENSAJE NO PUEDE SER ENVIADO EN ESTE MOMENTO.";
            }
        } else {
            
            //muestra el formulario para capturar los datos del correo
            echo '<FORM id="comentarios" name="comentarios" method="POST" action="enviar_correo.php" >
<table bgcolor="#C2E5FF" border="1">
<tr><td>
    <table bgcolor="#C2E5FF"> 
        <tr>
        <td>Su nombre:</td><td><input type="text" id="nombr" name="nombr" value="" maxlength="90" size="30"><br></td>
        </tr>
        <tr>
        <td>Su correo electr&oacute;nico:</td><td><input type="text" id="elcorreo" name="elcorreo" value="" maxlength="50"  size="30"><br></td>
        </tr>
        <tr>
        <td>Asunto:</td><td><input type="text" id="asunt" name="asunt" maxlength="50"  size="30"><br></td>
        </tr>
        <tr>
        <td>Su mensaje:<br><br> (Puede usar HTML) </td><td><textarea  rows="10" cols= "23" id="elmsg" name="elmsg" >Su comentario...</textarea><br></td>
        </tr>
    </table>
</td></tr>
</table>
</div>
    <div class="caja-botones">


    <input class="enviar" type="submit" value="Enviar Comentario" name="enviar">



        </div>
</FORM>';
        }
        echo '   <BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR>';
        ?>
        
         
        