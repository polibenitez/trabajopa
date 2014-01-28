<?php

function crearProfesor() {
    $asignatura_id = $_POST['asignaturas'];
    $despacho_id = $_POST['despachos'];
    $nombre_prof = $_POST['nombre_prof'];
    $apellido1 = $_POST['apellido1'];
    $apellido2 = $_POST['apellido2'];
    
    $sql = "INSERT INTO profesor (profesor_id, nombre_prof, apellido1_prof, apellido2_prof, asignatura_id, despacho_id) VALUES (NULL, '$nombre_prof', '$apellido1', '$apellido2', '$asignatura_id', '$despacho_id')";

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

function eliminarProfesor() {
    $profesor_id = $_POST['profesor_id-eliminar'];

    $sql = "DELETE FROM profesor WHERE profesor_id=$profesor_id";

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

function modificarProfesor() {
    $profesor_id = $_POST['profesor_id_mod'];
    $nombre_prof = $_POST['nombre_prof'];
    $apellido1 = $_POST['apellido1'];
    $apellido2 = $_POST['apellido2'];
    $asignatura_id = $_POST['asignaturas'];
    $despacho_id = $_POST['despachos'];

    $sql = "UPDATE profesor SET profesor_id = $profesor_id, nombre_prof = '$nombre_prof', apellido1_prof = '$apellido1', apellido2_prof = '$apellido2', asignatura_id = $asignatura_id, despacho_id = $despacho_id WHERE profesor_id = $profesor_id";
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
	if (eliminarProfesor()) {
		//echo "correcto";
		header("Location: gestion-profesores.php");
		exit;
	}else{
		echo "ocurio un error";
	}
}

if (isset($_POST['crear'])) {
    if (crearProfesor()) {
		//echo "correcto";
		header("Location: gestion-profesores.php");
		exit;
	}else{
		echo "ocurio un error";
	}
}

if (isset($_POST['editar'])) {
    if (modificarProfesor()) {
		//echo "correcto";
		header("Location: gestion-profesores.php");
		exit;
	}else{
		echo "ocurio un error";
	}
}
?>
?>
