<html>
    <head>
        <title></title>
        <link rel="stylesheet" type="text/css" href="../style.css">
        <script type="text/javascript">
            
            function validar(f){
                var regexp = /^[0-9a-zA-Z._.-]+\@[0-9a-zA-Z._.-]+\.[0-9a-zA-Z]+$/;
                
                var ok = true;
                var msg = "Error:\n";
                if(f.elements["nombr"].value == "") {
                    msg += "- nombre vacio\n";
                    
                    ok = false;                    
                }
                
                if(!regexp.test(f.elements["elcorreo"].value)){
                    msg += "- Formato de correo mal";
                    
                    ok = false;
                }
                
                if(ok == false){
                    alert(msg);
                    return ok;      
                }
                
            }
        </script>
    </head>
    <body>

        <?php
        echo '';
        //Si la variable de estado existe entrar y ver que valor tiene
        if (isset($_GET['estado'])) {
            if ($_GET['estado'] == 'enviado') {
                echo '<br><br>Su mensaje fue enviado correctamente';
                echo '<br><br><a href="../index.php">VOLVER</a>';
            } else if ($_GET['estado'] == 'no_enviado') {
                echo "<br><br><b>Upss!!,</b> Ocurrio un error. SU MENSAJE NO PUEDE SER ENVIADO EN ESTE MOMENTO.";
            }
        } else {
            ?>
            <fieldset><legend><h2>Sugerencias</h2></legend>
                    <form class="contact_form" name="comentarios" method="" action="enviar_correo.php" onsubmit="return validar(this)">
                        <ul>
                            <li>
                                <label for="nombr">
                                    Nombre:
                                </label>
                                <input type="text" name="nombr" value="" maxlength="90" size="30" placeholder="" required/>
                            </li>
                            <li>
                                <label for="elcorreo">
                                    Email:
                                </label>
                                <input type="email" name ="elcorreo" value="" maxlength="50"  size="30" placeholder="" required/>
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
            <?php
        }
        ?>
    </body>
</html>
         
        