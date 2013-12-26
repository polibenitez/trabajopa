<?php
function leerfichero($fichero){
		$fichero="log/".$fichero;

        if(filesize($fichero) > 0 && filesize($fichero) < 500){			//para el tamaño && filesize($fichero) < 200
            $f = fopen($fichero,"r");

    											#Hasta que no lleguemos al final del fichero 
            if($f){
            	flock($f,LOCK_SH);
            	$lineas=array();
            	$i=0;
	            while(!feof($f)){ 				//recorremos el fichero linea a linea
	                $buffer = fgets($f,4096); 
	                $buffer=substr($buffer,0,159);	//solo 160 caracteres
	                $buffer=trim($buffer);
	                $lineas[$i]=$buffer;
	                $i++;
	            }
	            flock($f,LOCK_UN);
				fclose($f);
        	}else{
        		echo "No hay acceso al fichero";
        	}
        }else{
            echo "<h3>";
            echo "El tama&ñtielde;o del fichero no debe superar los 0.5KB";
            echo "</h3>";
        }


        return $lineas;
}

function codificar($texto,$nombre){
	$url = "http://qrcode.kaywa.com/img.php?s=8&d=".urlencode($texto);
	return copy($url,"./img/".$nombre.".jpg");
}

function generarQR($lineas,$fichero){
	$nombreFichero = explode(".", $fichero);
	$lineasProcesadas;
	$listaQR;
	$i=0;
	if (isset($lineas)) {
		foreach ($lineas as $linea) {
			if (!buscarRepetida($lineasProcesadas,$linea)) {	//para que no se solicite duplicadas
				
				$nombre=$nombreFichero[0].$i;
				codificar($linea,$nombre);
				$listaQR[$i]=$nombre.".jpg";
				$lineasProcesadas[$i]=$linea;

				$i++;
			}
			
		}
	}
	
	return $listaQR;
}

function buscarRepetida($lineasProcesadas,$linea){
	$encontrado=false;
	if (isset($lineasProcesadas)) {
			foreach ($lineasProcesadas as $aux) {
				if (strcmp(trim($aux), trim($linea))==0) {
					$encontrado=true;
					break;
				}
			}
	}
	return $encontrado;
}

function cargarFichero(){
	if (isset($_FILES['fichero'])) {
		
		$ubicacion = "log/".basename($_FILES['fichero']['name']) ;
		//print_r($_FILES);
		//echo "hola<br/>";
		//echo $ubicacion;
		//echo "<br/>";
		if (!move_uploaded_file($_FILES['fichero']['tmp_name'],$ubicacion)){
			echo "ERROR: no hay ningun fichero valido seleccionado<br/>"; 
		} 
	
	}else{
		echo "Debes seleccionar un fichero";
	}

	/*echo "nombre fichero <br/>";
	echo "nombre".$nombreFichero[0]."<br />";
	echo "extension".$nombreFichero[1];
	echo "<br/>";
	*/
	return basename($_FILES['fichero']['name']);
}
/*function escribir($listaQR,$titulo,$correo,$referencia){
	//echo "entra escritura";
	#Abrimos el fichero en modo de escritura 
	//echo $referencia;
    $fichero = fopen("imagenes.txt","a"); 
    $tam=filesize("imagenes.txt");
    
    if ($fichero) {
        flock($fichero,LOCK_SH);        
        $i=0;
        if(isset($listaQR)){
	        foreach ($listaQR as $imagen) {	//considero que el fichero debe contener mas informacion que la que se pide
	        								//en el enunciado porque no es muy claro.
	        	$linea=$titulo.$i.",".$imagen.",".$correo.",".$referencia.",".$i; 	//el fichero contiene
	        																		//titulo + un numero incremental
	        																		//nombre de imagen
	        	if($tam > 0 || $i>0){												//correo de autor
	            	$string = "\r\n".$linea;										//referencia al archivo de contenido
	        	}else{																//posicion de linea en fichero origen
	            	$string = $linea;
	        	}
	        
	        	fputs($fichero,$string);
	        	$i++;
	        }
        }

        #Bloqueo y cerramos el fichero 
    flock($fichero,LOCK_UN);
    fclose($fichero);
    //echo "guardado correctamente";
    }else{
        echo "No hay acceso al fichero";
    } 
}*/
function escribir($listaQR,$titulo,$correo,$referencia){
	$i=0;
        if(isset($listaQR)){
        	$con = mysql_connect("localhost","root","");
		        if (!$con) {
		            die(' No puedo conectar: ' . mysql_error());
		        }
		    $db_selected = mysql_select_db("test",$con);
		        if (!$db_selected) {
		            die(' No puedo seleccionar de la tabla imagenes: ' . mysql_error());
		        }
		    
    
	        foreach ($listaQR as $imagen) {	//considero que el fichero debe contener mas informacion que la que se pide
	        								//en el enunciado porque no es muy claro.
	        	$linea=$titulo.$i.",".$imagen.",".$correo.",".$referencia.",".$i; 	//el fichero contiene
	        																		//titulo + un numero incremental
	        																		//nombre de imagen
	        	$sql="INSERT INTO imagenes (valores) VALUES ('$linea')";
			    if (!mysql_query($sql,$con)){
			        die('Error: No se inserta la imagen' . mysql_error()); 
			    }
	        
	        	//fputs($fichero,$string);
	        	$i++;
	        }
	       mysql_close($con);
        }
}

$pagina='index.php';
$titulo=trim($_POST['titulo']);

if ((!empty($titulo)) && preg_match('/^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z.]{2,5}$/',$_POST['correo'])) {

	$fichero=cargarFichero();
	$lineas=leerfichero($fichero);
	if (isset($lineas)) {
		$listaQR=generarQR($lineas,$fichero);
		escribir($listaQR,$_POST['titulo'],$_POST['correo'], $fichero);
	}else{
		echo "ERROR: El fichero esta vacio";
	}
	
}else{
	echo "ERROR: Es necesario que completes correctamente el formulario";
	echo '<br /><a href="index.php">Regresar al formulario</a>';

	echo "<br />";
	echo "<br />";
	echo "<br />";
}

header("Location: $pagina");
exit;	
	
	
	/*Tareas que debe realizar

	1- cargar fichero 
	2- leer fichero y pasar a un array las lineas
	3- recorrer array y codificar cada una(ver que no se repita)
		3.1- guardar qr y nombrado correcto
		3.2- escribir fichero con nombres y titulos
	*/
?>
