<?php 
function crearEdificio(){
	$numero_ed=$_POST['numero_ed'];
	$nombre_ed=$_POST['nombre_ed'];
	$latitud=$_POST['latitud'];
	$longitud=$_POST['longitud'];
	$ubicaciones=$latitud.";".$longitud;
	$plantas_ed=$_POST['plantas'];
	$comentario_ed=$_POST['comentario_ed'];

	$sql="INSERT INTO Edificio (numero_ed, nombre_ed, ubicaciones, plantas_ed, comentario_ed) VALUES ($numero_ed, '$nombre_ed', '$ubicaciones', $plantas_ed, '$comentario_ed')";
	
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
function eliminarEdificio(){
	$numero_ed=$_POST['edificio_num'];
	$sql="DELETE FROM Edificio WHERE numero_ed=$numero_ed";

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
function modificarEdificio(){
	$numero_ed=$_POST['numero_ed_mod'];
	$nombre_ed=$_POST['nombre_ed'];
	$latitud=$_POST['latitud'];
	$longitud=$_POST['longitud'];
	$ubicaciones=$latitud.";".$longitud;
	$plantas_ed=$_POST['plantas'];
	$comentario_ed=$_POST['comentario_ed'];

	$sql="UPDATE Edificio SET nombre_ed='$nombre_ed', ubicaciones='$ubicaciones', plantas_ed=$plantas_ed, comentario_ed='$comentario_ed' WHERE numero_ed=$numero_ed";
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

	$numero_ed=$_POST['numero_ed_mod'];
	$nombre_ed=$_POST['nombre_ed'];
	$ubicaciones="ubicacion del edificio ".$numero_ed;
	$plantas_ed=$_POST['plantas'];
	$comentario_ed=$_POST['comentario_ed'];
	/*echo $numero_ed."<br>";
	echo $nombre_ed."<br>";
	echo $ubicaciones."<br>";
	echo $plantas_ed."<br>";
	echo $comentario_ed."<br>";
*/
//echo "me llegan los siguientes parametros<br />";
//echo $_POST['eliminar']."<br />";

if (isset($_POST['eliminar'])) {
	if (eliminarEdificio()) {
		//echo "correcto";
		header("Location: gestion-edificios.php");
		exit;
	}else{
		echo "ocurio un error";
	}
}
if (isset($_POST['crear'])) {
	//echo "quieres crear";
	/*echo "crear <br/>";
	$numero_ed=$_POST['numero_ed'];
	$nombre_ed=$_POST['nombre_ed'];
	$ubicaciones="ubicacion del edificio ".$numero_ed;
	$plantas_ed=$_POST['plantas'];
	$comentario_ed=$_POST['comentario_ed'];
	echo $numero_ed."<br>";
	echo $nombre_ed."<br>";
	echo $ubicaciones."<br>";
	echo $plantas_ed."<br>";
	echo $comentario_ed."<br>";*/

	if (crearEdificio()) {
		//echo "correcto";
		header("Location: gestion-edificios.php");
		exit;
	}else{
		echo "ocurio un error";
	}
}
if (isset($_POST['editar'])) {
	
	/*echo "Editar <br/>";
	$numero_ed=$_POST['numero_ed_mod'];
	$nombre_ed=$_POST['nombre_ed'];
	$ubicaciones="ubicacion del edificio ".$numero_ed;
	$plantas_ed=$_POST['plantas'];
	$comentario_ed=$_POST['comentario_ed'];
	echo $numero_ed."<br>";
	echo $nombre_ed."<br>";
	echo $ubicaciones."<br>";
	echo $plantas_ed."<br>";
	echo $comentario_ed."<br>";*/

	if (modificarEdificio()) {
		//echo "correcto";
		header("Location: gestion-edificios.php");
		exit;
	}else{
		echo "ocurio un error";
	}
}

 ?>