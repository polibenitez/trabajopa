<?php 
function crearlugar(){
	$tipo=$_POST['tipo'];
	$ubicacion=$_POST['ubicacion'];
	
	$descripcion=$_POST['descripcion'];

	$sql="INSERT INTO lugares (ubicacion, tipo, descripcion) VALUES ('$ubicacion', '$tipo','$descripcion')";
	
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
function eliminarlugar(){
	$lugar_id=$_POST['lugar_id-eliminar'];
	$sql="DELETE FROM lugares WHERE lugar_id=$lugar_id";

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
function modificarlugar(){
	$tipo=$_POST['tipo'];
	$ubicacion=$_POST['ubicacion'];
	
	$descripcion=$_POST['descripcion'];
	$lugar_id=$_POST['lugar_id_mod'];

	$sql="UPDATE lugares SET ubicacion='$ubicacion', tipo='$tipo', descripcion='$descripcion' WHERE lugar_id=$lugar_id";
	//$sql="INSERT INTO lugar (numero_ed, ubicacion_ed, ubicaciones, plantas_ed, descripcion) VALUES ($numero_ed, '$ubicacion_ed', '$ubicaciones', $plantas_ed, '$descripcion')";
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

	
	/*echo $numero_ed."<br>";
	echo $ubicacion_ed."<br>";
	echo $ubicaciones."<br>";
	echo $plantas_ed."<br>";
	echo $descripcion."<br>";
*/
//echo "me llegan los siguientes parametros<br />";
//echo $_POST['eliminar']."<br />";

if (isset($_POST['eliminar'])) {
	if (eliminarlugar()) {
		//echo "correcto";
		header("Location: gestion-lugares.php");
		exit;
	}else{
		echo "ocurio un error";
	}
}
if (isset($_POST['crear'])) {
	//echo "quieres crear";
	/*echo "crear <br/>";
	$numero_ed=$_POST['numero_ed'];
	$ubicacion_ed=$_POST['ubicacion_ed'];
	$ubicaciones="ubicacion del lugar ".$numero_ed;
	$plantas_ed=$_POST['plantas'];
	$descripcion=$_POST['descripcion'];
	echo $numero_ed."<br>";
	echo $ubicacion_ed."<br>";
	echo $ubicaciones."<br>";
	echo $plantas_ed."<br>";
	echo $descripcion."<br>";*/

	if (crearlugar()) {
		//echo "correcto";
		header("Location: gestion-lugares.php");
		exit;
	}else{
		echo "ocurio un error";
	}
}
if (isset($_POST['editar'])) {
	
	/*echo "Editar <br/>";
	$numero_ed=$_POST['numero_ed_mod'];
	$ubicacion_ed=$_POST['ubicacion_ed'];
	$ubicaciones="ubicacion del lugar ".$numero_ed;
	$plantas_ed=$_POST['plantas'];
	$descripcion=$_POST['descripcion'];
	echo $numero_ed."<br>";
	echo $ubicacion_ed."<br>";
	echo $ubicaciones."<br>";
	echo $plantas_ed."<br>";
	echo $descripcion."<br>";*/

	if (modificarlugar()) {
		//echo "correcto";
		header("Location: gestion-lugares.php");
		exit;
	}else{
		echo "ocurio un error";
	}
}

 ?>