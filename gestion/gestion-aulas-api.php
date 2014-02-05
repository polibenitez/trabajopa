<?php 
function crearaulas(){
	$aula_id=$_POST['aulas_id'];
	$numero_ed=$_POST['edificios'];
	$id_asignatura=$_POST['asignaturas'];
	$numero_planta=$_POST['numero_pla'];
	$comentario=$_POST['comentario_au'];
	

	$sql="INSERT INTO aulas (aula_id, asignatura_id, numero_ed, planta_aul, comentario_aul) VALUES (NULL, '$id_asignatura','$numero_ed','$numero_planta','$comentario')";
	
	$con = mysql_connect("localhost","root","");
	if (!$con) {
		die(' No puedo conectar: ' . mysql_error());
	}
	$db_selected = mysql_select_db("upo",$con);
	if (!$db_selected) {
		die(' No puedo seleccionar con prueba: ' . mysql_error());
	}
	$result=  mysql_query($sql,$con);
	if (!$result) {
		die('no se pudo ejecutar la query create <br />' . mysql_error());
	}
	return true;

}
function eliminaraulas(){
	$aula_id=$_POST['aulas_id-eliminar'];
	
	$sql="DELETE FROM aulas WHERE aula_id=$aula_id";

	$con = mysql_connect("localhost","root","");
	if (!$con) {
		die(' No puedo conectar: ' . mysql_error());
	}
	$db_selected = mysql_select_db("upo",$con);
	if (!$db_selected) {
		die(' No puedo seleccionar con prueba: ' . mysql_error());
	}
	$result=  mysql_query($sql,$con);
	if (!$result) {
		die('no se pudo ejecutar delete en ' . mysql_error());
	}
	return true;
}
function modificaraulas(){
	$aula_id=$_POST['aulas_id_mod'];
	
	$numero_ed=$_POST['edificios'];
	$id_asignatura=$_POST['asignaturas'];
	$numero_planta=$_POST['numero_pla'];
	$comentario=$_POST['comentario_au'];

	$sql="UPDATE aulas SET asignatura_id='$id_asignatura', numero_ed='$numero_ed', planta_aul='$numero_planta', comentario_aul='$comentario' WHERE aula_id='$aula_id'";
	//$sql="INSERT INTO Edificio (numero_ed, nombre_ed, ubicaciones, plantas_ed, comentario_ed) VALUES ($numero_ed, '$nombre_ed', '$ubicaciones', $plantas_ed, '$comentario_ed')";
	//echo "<br/>".$sql;
	$con = mysql_connect("localhost","root","");
	if (!$con) {
		die(' No puedo conectar: ' . mysql_error());
	}
	$db_selected = mysql_select_db("upo",$con);
	if (!$db_selected) {
		die(' No puedo seleccionar con prueba: ' . mysql_error());
	}
	$result=  mysql_query($sql,$con);
	if (!$result) {
		die('no se pudo ejecutar la modificiacion ' . mysql_error());
	}
	return true;
}

include("saneo.php");

if (isset($_POST['eliminar'])) {
	if (eliminaraulas()) {
		//echo "correcto";
		header("Location: gestion-aulas.php");
		exit;
	}else{
		echo "ocurio un error";
	}
}
if (isset($_POST['crear'])) {
	
	if (crearaulas()) {
		//echo "correcto";
		header("Location: gestion-aulas.php");
		exit;
	}else{
		echo "ocurio un error";
	}
}
if (isset($_POST['editar'])) {
	

	if (modificaraulas()) {
		//echo "correcto";
		header("Location: gestion-aulas.php");
		exit;
	}else{
		echo "ocurio un error";
	}
}

 ?>