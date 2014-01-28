<?php 
function crearDespacho(){
	$numero_ed=$_POST['edificios'];
	$planta_des=$_POST['planta_des'];
	$numero_des=$_POST['numero_des'];

	$sql="INSERT INTO Despacho (despacho_id, numero_ed, planta_des, numero_des) VALUES (NULL, $numero_ed, $planta_des, $numero_des)";
	
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
function eliminarDespacho(){
	$despacho_id=$_POST['despacho_id-eliminar'];
	
	$sql="DELETE FROM Despacho WHERE despacho_id=$despacho_id";

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
function modificarDespacho(){
	$despacho_id=$_POST['despacho_id_mod'];
	$numero_ed=$_POST['edificios'];
	$planta_des=$_POST['planta_des'];
	$numero_des=$_POST['numero_des'];

	$sql="UPDATE Despacho SET numero_ed=$numero_ed, planta_des=$planta_des, numero_des=$numero_des WHERE despacho_id=$despacho_id";
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
//echo "me llegan los siguientes parametros<br />";
//echo $_POST['eliminar']."<br />";

if (isset($_POST['eliminar'])) {
	if (eliminarDespacho()) {
		//echo "correcto";
		header("Location: gestion-despachos.php");
		exit;
	}else{
		echo "ocurio un error";
	}
}
if (isset($_POST['crear'])) {
	//echo "quieres crear";
	/*echo "crear <br/>";
	$despacho_id=$_POST['despacho_id'];
	$numero_ed=$_POST['edificios'];
	$planta_des=$_POST['planta_des'];
	$numero_des=$_POST['numero_des'];
	//$comentario_ed=$_POST['comentario_ed'];
	echo $despacho_id."<br>";
	echo $numero_ed."<br>";
	echo $planta_des."<br>";
	echo $numero_des."<br>";
	//echo $comentario_ed."<br>";*/

	if (crearDespacho()) {
		//echo "correcto";
		header("Location: gestion-despachos.php");
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

	if (modificarDespacho()) {
		//echo "correcto";
		header("Location: gestion-despachos.php");
		exit;
	}else{
		echo "ocurio un error";
	}
}

 ?>