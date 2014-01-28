<?php 
function creargrados(){
	$grado_id=$_POST['grados_id'];
	$nombre=$_POST['nombre_ed'];
	

	$sql="INSERT INTO grado (grado_id, nombre) VALUES (NULL, '$nombre')";
	
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
function eliminargrados(){
	$grado_id=$_POST['grados_id-eliminar'];
	
	$sql="DELETE FROM grado WHERE grado_id=$grado_id";

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
function modificargrados(){
	$grado_id=$_POST['grados_id_mod'];
	$nombre=$_POST['nombre_ed'];

	$sql="UPDATE grado SET nombre='$nombre' WHERE grado_id='$grado_id'";
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

if (isset($_POST['eliminar'])) {
	if (eliminargrados()) {
		//echo "correcto";
		header("Location: gestion-grados.php");
		exit;
	}else{
		echo "ocurio un error";
	}
}
if (isset($_POST['crear'])) {
	
	if (creargrados()) {
		//echo "correcto";
		header("Location: gestion-grados.php");
		exit;
	}else{
		echo "ocurio un error";
	}
}
if (isset($_POST['editar'])) {
	

	if (modificargrados()) {
		//echo "correcto";
		header("Location: gestion-grados.php");
		exit;
	}else{
		echo "ocurio un error";
	}
}

 ?>