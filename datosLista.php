<?php

//Todos los datos los vamos a crear desde clases
//y al final enviamos un arra con clases

class Edificio {
 public $numero;
 public $nombre;
 public $ubicacion;
 public $plantas;
 public $comentario;
}



/*$articulo = new Edificio();
$articulo[$i]->numero = 18;
$articulo->nombre = "Pablo Mutis";
$articulo->ubicacion = "latitul;longitud";
$articulo-plantas = "5";
$articulo->comentario = array('Comentario de edificio','Algo de interes','Que necesitas de el edificio');//en forma de array*/

//ahora una prueba en forma de array directa
if(isset($_GET['peticion'])){
$tipoDato=$_GET['peticion'];

	if($tipoDato=='edificios'){
		

				$edificio[0]["numero"]=100;
				$edificio[0]["nombre"]="Biblioteca";
				$edificio[0]["ubicacion"]="37.35785;-5.93600";
				$edificio[0]["plantas"]=2;
				$edificio[0]["comentario"]="Biblioteca de la Universidad Pablo de olavide";

				$edificio[1]["numero"]=99;
				$edificio[1]["nombre"]="Estacion de metro";
				$edificio[1]["ubicacion"]="37.35400;-5.94330";
				$edificio[1]["plantas"]=11;
				$edificio[1]["comentario"]="El metro va desde Ciudad expo hacia Monte Quinto";

				$edificio[2]["numero"]=1;
				$edificio[2]["nombre"]="Nombre Edificio 1";
				$edificio[2]["ubicacion"]="latitud_1;longitud_1";
				$edificio[2]["plantas"]=11;
				$edificio[2]["comentario"]="comentario e1";

				$edificio[2]["numero"]=2;
				$edificio[2]["nombre"]="Nombre Edificio 2";
				$edificio[2]["ubicacion"]="latitud_2;longitud_2";
				$edificio[2]["plantas"]=12;
				$edificio[2]["comentario"]="comentario e2";
				
				$edificio[3]["numero"]=3;
				$edificio[3]["nombre"]="Nombre Edificio 3";
				$edificio[3]["ubicacion"]="latitud_3;longitud_3";
				$edificio[3]["plantas"]=13;
				$edificio[3]["comentario"]="comentario e3";
				
				$edificio[4]["numero"]=4;
				$edificio[4]["nombre"]="Nombre Edificio 4";
				$edificio[4]["ubicacion"]="latitud_4;longitud_4";
				$edificio[4]["plantas"]=14;
				$edificio[4]["comentario"]="comentario e4";
				
				$edificio[5]["numero"]=5;
				$edificio[5]["nombre"]="Nombre Edificio 5";
				$edificio[5]["ubicacion"]="latitud_5;longitud_5";
				$edificio[5]["plantas"]=15;
				$edificio[5]["comentario"]="comentario e5";
				
				$edificio[6]["numero"]=6;
				$edificio[6]["nombre"]="Nombre Edificio 6";
				$edificio[6]["ubicacion"]="latitud_6;longitud_6";
				$edificio[6]["plantas"]=16;
				$edificio[6]["comentario"]="comentario e6";
				
				$edificio[7]["numero"]=7;
				$edificio[7]["nombre"]="Nombre Edificio 7";
				$edificio[7]["ubicacion"]="latitud_7;longitud_7";
				$edificio[7]["plantas"]=17;
				$edificio[7]["comentario"]="comentario e7";
				
				$edificio[8]["numero"]=8;
				$edificio[8]["nombre"]="Nombre Edificio 8";
				$edificio[8]["ubicacion"]="latitud_8;longitud_8";
				$edificio[8]["plantas"]=18;
				$edificio[8]["comentario"]="comentario e8";
				
				$edificio[9]["numero"]=9;
				$edificio[9]["nombre"]="Nombre Edificio 9";
				$edificio[9]["ubicacion"]="latitud_9;longitud_9";
				$edificio[9]["plantas"]=19;
				$edificio[9]["comentario"]="comentario e9";
				
				$edificio[10]["numero"]=10;
				$edificio[10]["nombre"]="Nombre Edificio 10";
				$edificio[10]["ubicacion"]="latitud_10;longitud_10";
				$edificio[10]["plantas"]=110;
				$edificio[10]["comentario"]="comentario e10";
				
				$edificio[11]["numero"]=11;
				$edificio[11]["nombre"]="Nombre Edificio 11";
				$edificio[11]["ubicacion"]="latitud_11;longitud_11";
				$edificio[11]["plantas"]=111;
				$edificio[11]["comentario"]="comentario e11";
				
				$edificio[12]["numero"]=12;
				$edificio[12]["nombre"]="Nombre Edificio 12";
				$edificio[12]["ubicacion"]="latitud_12;longitud_12";
				$edificio[12]["plantas"]=112;
				$edificio[12]["comentario"]="comentario e12";
				
				$edificio[13]["numero"]=13;
				$edificio[13]["nombre"]="Nombre Edificio 3";
				$edificio[13]["ubicacion"]="latitud_13;longitud_13";
				$edificio[13]["plantas"]=113;
				$edificio[13]["comentario"]="comentario e13";
				
				$edificio[14]["numero"]=14;
				$edificio[14]["nombre"]="Nombre Edificio 14";
				$edificio[14]["ubicacion"]="latitud_14;longitud_14";
				$edificio[14]["plantas"]=114;
				$edificio[14]["comentario"]="comentario e4";
				
				$edificio[15]["numero"]=15;
				$edificio[15]["nombre"]="Nombre Edificio 15";
				$edificio[15]["ubicacion"]="latitud_15;longitud_15";
				$edificio[15]["plantas"]=115;
				$edificio[15]["comentario"]="comentario e15";

				$articulo['edificios']=$edificio;
				//http://localhost/proyectos/trabajopa/datosLista.php?peticion=edificios
	}
	if($tipoDato=='profesores'){
		$tam=10;
		for ($i=0; $i <$tam ; $i++) { 
			$profesor[$i]["id"]="id-".$i;
			$profesor[$i]["nombre"]="Nombre Profesor ".$i;
			$profesor[$i]["apellido1"]="Apellido-1 Profesor ".$i;
			$profesor[$i]["apellido2"]="Apellido-2 Profesor ".$i;
			$profesor[$i]["asignatura"]="Asignatura Profesor ".$i;
			$profesor[$i]["despacho"]="despacho Profesor ".$i;
			$profesor[$i]["ubicacion"]="ubicacion".$i;//sacar de los despachos
		}
		$articulo['profesores']=$profesor;
		//http://localhost/proyectos/trabajopa/datosLista.php?peticion=profesores
	}

	if($tipoDato=='comida'){
		$tam=10;
		for ($i=0; $i <$tam ; $i++) { 
			$comida[$i]["id"]="id-Comida ".$i;
			$comida[$i]["tipo"]="tipo COMIDA ".$i;
			$comida[$i]["descripcion"]="Descripcion comida ".$i;
			$comida[$i]["ubicacion"]="Ubicacion comida ".$i;
		}
		$articulo['comida']=$comida;
		//http://localhost/proyectos/trabajopa/datosLista.php?peticion=comida
	}

	if($tipoDato=='transporte'){
		$tam=10;
		for ($i=0; $i <$tam ; $i++) { 
			$transporte[$i]["id"]="id-Transporte ".$i;
			$transporte[$i]["tipo"]="tipo Transporte ".$i;
			$transporte[$i]["descripcion"]="Descripcion Transporte ".$i;
			$transporte[$i]["ubicacion"]="Ubicacion Transporte ".$i;
		}
		$articulo['transporte']=$transporte;
		//http://localhost/proyectos/trabajopa/datosLista.php?peticion=transporte
	}

	if($tipoDato=='aparcamientos'){
		$tam=1000;
		for ($i=0; $i <$tam ; $i++) { 
			$aparcamiento[$i]["id"]="id-Aparcamiento ".$i;
			$aparcamiento[$i]["tipo"]="tipo Aparcamiento ".$i;
			$aparcamiento[$i]["descripcion"]="Descripcion Aparcamiento ".$i;
			$aparcamiento[$i]["ubicacion"]="Ubicacion Aparcamiento ".$i;
		}
		$articulo['aparcamientos']=$aparcamiento;
		//http://localhost/proyectos/trabajopa/datosLista.php?peticion=aparcamientos
	}

	if($tipoDato=='deportes'){
		$tam=10;
		for ($i=0; $i <$tam ; $i++) { 
			$deporte[$i]["id"]="id-Ins. Deportiva ".$i;
			$deporte[$i]["tipo"]="tipo Ins. Deportiva ".$i;
			$deporte[$i]["descripcion"]="Descripcion Ins. Deportiva ".$i;
			$deporte[$i]["ubicacion"]="Ubicacion Ins. Deportiva ".$i;
		}
		$articulo['deportes']=$deporte;
		//http://localhost/proyectos/trabajopa/datosLista.php?peticion=deportes
	}

	if($tipoDato=='estudiantes'){
		$tam=10;
		for ($i=0; $i <$tam ; $i++) { 
			$estudiante[$i]["id"]="id-Estudiantes ".$i;
			$estudiante[$i]["tipo"]="tipo Estudiantes ".$i;
			$estudiante[$i]["descripcion"]="Descripcion Estudiantes ".$i;
			$estudiante[$i]["ubicacion"]="Ubicacion Estudiantes ".$i;
		}
		$articulo['estudiantes']=$estudiante;
		//http://localhost/proyectos/trabajopa/datosLista.php?peticion=estudiantes
	}

/*nueva peticion a la API*/
	if($tipoDato=="edificio"){
		$identificador=$_GET['numero'];
			//con el numero hace la consulta

			$edificio["nombre"]="Nombre Edificio prueba ajax";
			$edificio["descripcion"]="Descripcion Edificio prueba ajax";
			
			$articulo['edificio']=$edificio;
	}

	if($tipoDato=='entidades'){
		//prueba con Entidades
		$articulo[0]="Edificios";
		$articulo[1]="Profesores";
		$articulo[2]="Comida";
		$articulo[3]="Transporte";
		$articulo[4]="Aparcamientos";
		$articulo[5]="Instalaciones Deportivas";
		$articulo[6]="Para Estudiantes";
		// http://localhost/proyectos/trabajopa/datosLista.php?peticion=entidades
	}

	//asi vamos añadiendo mas peticiones aunque 
	//por el momento vamos a jalar todos los datos en un solo json
	//url para hacer pruebas desde el php simpley cambiar parametro
	//http://localhost/proyectos/trabajopa/datosLista.php?peticion=entidades
}
echo json_encode($articulo);

?>