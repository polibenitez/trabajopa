<html>
    <head>
        <title></title>
        <link rel="stylesheet" type="text/css" href="../style.css">
    </head>
    <body>

        <?php
        echo '';
        //Si la variable de estado existe entrar y ver que valor tiene
        if (isset($_GET['estado'])) {
            if ($_GET['estado'] == 'enviado') {
                echo '<br><br>Su mensaje fue enviado correctamente';
                echo '<br><br><a href="sugerencias.php">VOLVER</a>';
            } else if ($_GET['estado'] == 'no_enviado') {
                echo "<br><br><b>Upss!!,</b> Ocurrio un error. SU MENSAJE NO PUEDE SER ENVIADO EN ESTE MOMENTO.";
            }
        } else {
            
            //muestra el formulario para capturar los datos del correo
            echo '<fieldset><legend><h2>Sugerencias</h2></legend>
                    <form class="contact_form" name="comentarios" method="POST" action="enviar_correo.php">
                        <ul>
                            <li>
                                <label for="nombr">
                                    Nombre:
                                </label>
                                <input type="text" name="nombr" value="" maxlength="90" size="30" placeholder="" required />
                            </li>
                            <li>
                                <label for="elcorreo">
                                    Email:
                                </label>
                                <input type="email" name ="elcorreo" value="" maxlength="50"  size="30" placeholder="" required />
                            </li>
                            <li>
                                <label for="asunt">
                                    Asunto:
                                </label>
                                <input type="text" name="asunt" maxlength="50"  size="30" required>
                            </li>
                            <li>
                                <label for="elmsg">
                                    Mensaje:
                                </label>
                                <textarea rows="10" cols= "23" name="elmsg" placeholder="Escribe el mensaje" required ></textarea>
                            </li>
                            <li>
                            <button class="submit" type="submit" name="enviar">
                                Enviar
                            </button>
                            </li>
                        </ul>
                    </form>
            ';
        }
        ?>
    </body>
</html>
         
        