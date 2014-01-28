<?php

function crearAsignatura() {
    $grado_id = $_POST['grados'];
    $nombre_asi = $_POST['nombre_asi'];
    
    $sql = "INSERT INTO asignatura (asignatura_id, grado_id, nombre_asi) VALUES (NULL, '$grado_id', '$nombre_asi')";

    $con = mysql_connect("localhost", "root", "");
    if (!$con) {
        die(' No puedo conectar: ' . mysql_error());
    }
    $db_selected = mysql_select_db("upo", $con);
    if (!$db_selected) {
        die(' No puedo seleccionar con prueba: ' . mysql_error());
    }
    $result = mysql_query($sql, $con);
    if (!$result) {
        die('no se pudo ejecutar la query create <br />' . mysql_error());
    }
    return true;
}

function eliminarAsignatura() {
    $asignatura_id = $_POST['asignatura_id-eliminar'];

    $sql = "DELETE FROM asignatura WHERE asignatura_id=$asignatura_id";

    $con = mysql_connect("localhost", "root", "");
    if (!$con) {
        die(' No puedo conectar: ' . mysql_error());
    }
    $db_selected = mysql_select_db("upo", $con);
    if (!$db_selected) {
        die(' No puedo seleccionar con prueba: ' . mysql_error());
    }
    $result = mysql_query($sql, $con);
    if (!$result) {
        die('no se pudo ejecutar delete en ' . mysql_error());
    }
    return true;
}

function modificarAsignatura() {
    $asignatura_id = $_POST['asignatura_id_mod'];
    $grado_id = $_POST['grados'];
    $nombre_asi = $_POST['nombre_asi'];

    $sql = "UPDATE asignatura SET asignatura_id = $asignatura_id, grado_id = $grado_id, nombre_asi = '$nombre_asi' WHERE asignatura_id = $asignatura_id";
    //$sql="INSERT INTO Edificio (numero_ed, nombre_ed, ubicaciones, plantas_ed, comentario_ed) VALUES ($numero_ed, '$nombre_ed', '$ubicaciones', $plantas_ed, '$comentario_ed')";
    //echo "<br/>".$sql;
    $con = mysql_connect("localhost", "root", "");
    if (!$con) {
        die(' No puedo conectar: ' . mysql_error());
    }
    $db_selected = mysql_select_db("upo", $con);
    if (!$db_selected) {
        die(' No puedo seleccionar con prueba: ' . mysql_error());
    }
    $result = mysql_query($sql, $con);
    if (!$result) {
        die('no se pudo ejecutar la modificiacion ' . mysql_error());
    }
    return true;
}

if (isset($_POST['eliminar'])) {
	if (eliminarAsignatura()) {
		//echo "correcto";
		header("Location: gestion-asignaturas.php");
		exit;
	}else{
		echo "ocurio un error";
	}
}

if (isset($_POST['crear'])) {
    if (crearAsignatura()) {
		//echo "correcto";
		header("Location: gestion-asignaturas.php");
		exit;
	}else{
		echo "ocurio un error";
	}
}

if (isset($_POST['editar'])) {
    if (modificarAsignatura()) {
		//echo "correcto";
		header("Location: gestion-asignaturas.php");
		exit;
	}else{
		echo "ocurio un error";
	}
}
?>
