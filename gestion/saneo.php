<?php
# Funcion para limpiar caractes no permitidos

function limpia($var){
	$var = strip_tags($var);
	$malo = array("\"",";","\'","'","\\","or","oR","Or","OR","and","AND","=","<",">","!","echo","php","PHP","pHp","<?","'"); // Aqui poner caracteres no permitidos
	$i=0;
	$o=count($malo);
	while($i<$o){
		$var = str_replace($malo[$i],"",$var);
		$i++;
	}
	return $var;
}
 

function LimpiarTodo($datos){
	if(is_array($datos)){
		$datos = array_map('limpia',$datos);
	}else{
		die("<font color=red><b>Error:</b></font> La funcion <b>LimpiarTodo</b> debe contener una tabla.");
	}
	return $datos;	
}
if($_POST){
	$_POST =& LimpiarTodo($_POST);
}
if($_GET){
	$_GET =& LimpiarTodo($_GET);
}
?>