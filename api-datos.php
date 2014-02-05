<?php

//header("Content-Type: text/html;charset=utf-8"); //por el tema de las tildes. tambien tenemos que tener encuenta que la bd este en utf8_general_ci todas las tablas tambien

function obtenerEdificios() {
    $con = mysql_connect("localhost", "root", "");
    if (!$con) {
        die(' No puedo conectar: ' . mysql_error());
    }
    $db_selected = mysql_select_db("upo", $con);
    if (!$db_selected) {
        die(' No puedo seleccionar con prueba: ' . mysql_error());
    }
    
    if(isset($_GET['numero'])){
        $num = $_GET['numero'];
        $result = mysql_query("SELECT numero_ed, nombre_ed, ubicaciones, plantas_ed, comentario_ed FROM Edificio WHERE numero_ed = $num", $con);
    } else {
        $result = mysql_query("SELECT numero_ed, nombre_ed, ubicaciones, plantas_ed, comentario_ed FROM Edificio", $con);
    }
    if (!$result) {
        die('no se pudo ejecutar la consulta' . mysql_error());
    }

    $objeto = null;
    $i = 0;
    while ($row = mysql_fetch_array($result)) {
        $objeto[$i] = array_map('utf8_encode', $row);
        $i++;
    }
    return $objeto;
}

function obtenerProfesores() {
    $con = mysql_connect("localhost", "root", "");
    if (!$con) {
        die(' No puedo conectar: ' . mysql_error());
    }
    $db_selected = mysql_select_db("upo", $con);
    if (!$db_selected) {
        die(' No puedo seleccionar con prueba: ' . mysql_error());
    }
    
    if(isset($_GET['id'])){
        $ide = $_GET['id'];
        $result = mysql_query("SELECT pro.profesor_id, pro.nombre_prof, pro.apellido1_prof, pro.apellido2_prof, asi.nombre_asi, des.numero_ed, des.planta_des, des.numero_des, edi.ubicaciones FROM Profesor pro, Asignatura asi, Despacho des, Edificio edi WHERE pro.profesor_id = $ide AND pro.despacho_id = des.despacho_id AND des.numero_ed=edi.numero_ed AND pro.asignatura_id=asi.asignatura_id", $con);
    } else {
        $result = mysql_query("SELECT pro.profesor_id, pro.nombre_prof, pro.apellido1_prof, pro.apellido2_prof, asi.nombre_asi, des.numero_ed, des.planta_des, des.numero_des, edi.ubicaciones FROM Profesor pro, Asignatura asi, Despacho des, Edificio edi WHERE pro.despacho_id = des.despacho_id AND des.numero_ed=edi.numero_ed AND pro.asignatura_id=asi.asignatura_id", $con);
    }
    if (!$result) {
        die('no se pudo ejecutar la consulta' . mysql_error());
    }

    $objeto = null;
    $i = 0;
    while ($row = mysql_fetch_array($result)) {
        $objeto[$i] = array_map('utf8_encode', $row);
        //$objeto[$i]=$row;
        $i++;
    }
    return $objeto;
}

function obtenerComidas() {
    $con = mysql_connect("localhost", "root", "");
    if (!$con) {
        die(' No puedo conectar: ' . mysql_error());
    }
    $db_selected = mysql_select_db("upo", $con);
    if (!$db_selected) {
        die(' No puedo seleccionar con prueba: ' . mysql_error());
    }

    $result = mysql_query("SELECT lugar_id, tipo, descripcion, ubicacion, tag FROM lugares WHERE tipo like upper('comida')", $con);
    if (!$result) {
        die('no se pudo ejecutar la consulta' . mysql_error());
    }

    $objeto = null;
    $i = 0;
    while ($row = mysql_fetch_array($result)) {
        $objeto[$i] = array_map('utf8_encode', $row);
        $i++;
    }
    return $objeto;
}

function obtenerTransportes() {
    $con = mysql_connect("localhost", "root", "");
    if (!$con) {
        die(' No puedo conectar: ' . mysql_error());
    }
    $db_selected = mysql_select_db("upo", $con);
    if (!$db_selected) {
        die(' No puedo seleccionar con prueba: ' . mysql_error());
    }

    $result = mysql_query("SELECT lugar_id, tipo, descripcion, ubicacion,tag FROM lugares WHERE tipo like upper('transporte')", $con);
    if (!$result) {
        die('no se pudo ejecutar la consulta' . mysql_error());
    }

    $objeto = null;
    $i = 0;
    while ($row = mysql_fetch_array($result)) {
        $objeto[$i] = array_map('utf8_encode', $row);
        $i++;
    }
    return $objeto;
}

function obtenerAparcamientos() {
    $con = mysql_connect("localhost", "root", "");
    if (!$con) {
        die(' No puedo conectar: ' . mysql_error());
    }
    $db_selected = mysql_select_db("upo", $con);
    if (!$db_selected) {
        die(' No puedo seleccionar con prueba: ' . mysql_error());
    }

    $result = mysql_query("SELECT lugar_id, tipo, descripcion, ubicacion,tag FROM lugares WHERE tipo like upper('aparcamientos')", $con);
    if (!$result) {
        die('no se pudo ejecutar la consulta' . mysql_error());
    }

    $objeto = null;
    $i = 0;
    while ($row = mysql_fetch_array($result)) {
        $objeto[$i] = array_map('utf8_encode', $row);
        $i++;
    }
    return $objeto;
}

function obtenerDeportes() {
    $con = mysql_connect("localhost", "root", "");
    if (!$con) {
        die(' No puedo conectar: ' . mysql_error());
    }
    $db_selected = mysql_select_db("upo", $con);
    if (!$db_selected) {
        die(' No puedo seleccionar con prueba: ' . mysql_error());
    }

    $result = mysql_query("SELECT lugar_id, tipo, descripcion, ubicacion,tag FROM lugares WHERE tipo like upper('deportes')", $con);
    if (!$result) {
        die('no se pudo ejecutar la consulta' . mysql_error());
    }

    $objeto = null;
    $i = 0;
    while ($row = mysql_fetch_array($result)) {
        $objeto[$i] = array_map('utf8_encode', $row);
        $i++;
    }
    return $objeto;
}

function obtenerEstudiantes() {
    $con = mysql_connect("localhost", "root", "");
    if (!$con) {
        die(' No puedo conectar: ' . mysql_error());
    }
    $db_selected = mysql_select_db("upo", $con);
    if (!$db_selected) {
        die(' No puedo seleccionar con prueba: ' . mysql_error());
    }

    $result = mysql_query("SELECT lugar_id, tipo, descripcion, ubicacion,tag FROM lugares WHERE tipo like upper('estudiantes')", $con);
    if (!$result) {
        die('no se pudo ejecutar la consulta' . mysql_error());
    }

    $objeto = null;
    $i = 0;
    while ($row = mysql_fetch_array($result)) {
        $objeto[$i] = array_map('utf8_encode', $row);
        $i++;
    }
    return $objeto;
}

if (isset($_GET['peticion'])) {
    $tipoDato = $_GET['peticion'];

    if ($tipoDato == 'edificios') {
        
            $edificiosAux = obtenerEdificios();

            if (isset($edificiosAux)) {
                $i = 0;
                foreach ($edificiosAux as $ed) {
                    $edificio[$i]["numero"] = htmlentities($ed[0]); //htmlentities para ver las tildes en json
                    $edificio[$i]["nombre"] = htmlentities($ed[1]);
                    $edificio[$i]["ubicacion"] = htmlentities($ed[2]);
                    $edificio[$i]["plantas"] = htmlentities($ed[3]);
                    $edificio[$i]["comentario"] = htmlentities($ed[4]);
                    $i++;
                }

                $articulo['edificios'] = $edificio;
            } else {
                echo "no se puede mostrar los datos";
            }
        }

    if ($tipoDato == 'profesores') {
        
        $profesoresAux = obtenerProfesores();

        if (isset($profesoresAux)) {
            $i = 0;
            foreach ($profesoresAux as $pro) {
                $profesor[$i]["id"] = htmlentities($pro[0]);
                $profesor[$i]["nombre"] = htmlentities($pro[1]);
                $profesor[$i]["apellido1"] = htmlentities($pro[2]);
                $profesor[$i]["apellido2"] = htmlentities($pro[3]);
                $profesor[$i]["asignatura"] = htmlentities($pro[4]);
                $profesor[$i]["despacho"] = htmlentities($pro[5] . "." . $pro[6] . "." . $pro[7]);
                $profesor[$i]["ubicacion"] = htmlentities($pro[8]);
                $i++;
            }

            $articulo['profesores'] = $profesor;
        } else {
            echo "no se puede mostrar los datos";
        }
    }

    if ($tipoDato == 'comida') {
        $comidasAux = obtenerComidas();

        if (isset($comidasAux)) {
            $i = 0;
            foreach ($comidasAux as $com) {
                $comida[$i]["id"] = htmlentities($com[0]);
                $comida[$i]["tipo"] = htmlentities($com[1]);
                $comida[$i]["descripcion"] = htmlentities($com[2]);
                $comida[$i]["ubicacion"] = htmlentities($com[3]);
                $comida[$i]["tag"] = htmlentities($com[4]);
                $i++;
            }

            $articulo['comida'] = $comida;
        } else {
            echo "no se puede mostrar los datos";
        }
    }

    if ($tipoDato == 'transporte') {
        $transportesAux = obtenerTransportes();

        if (isset($transportesAux)) {
            $i = 0;
            foreach ($transportesAux as $tra) {
                $transporte[$i]["id"] = htmlentities($tra[0]);
                $transporte[$i]["tipo"] = htmlentities($tra[1]);
                $transporte[$i]["descripcion"] = htmlentities($tra[2]);
                $transporte[$i]["ubicacion"] = htmlentities($tra[3]);
                $transporte[$i]["tag"] = htmlentities($tra[4]);
                $i++;
            }

            $articulo['transporte'] = $transporte;
        } else {
            echo "no se puede mostrar los datos";
        }
    }

    if ($tipoDato == 'aparcamientos') {
        $aparcamientosAux = obtenerAparcamientos();

        if (isset($aparcamientosAux)) {
            $i = 0;
            foreach ($aparcamientosAux as $apa) {
                $aparcamiento[$i]["id"] = htmlentities($apa[0]);
                $aparcamiento[$i]["tipo"] = htmlentities($apa[1]);
                $aparcamiento[$i]["descripcion"] = htmlentities($apa[2]);
                $aparcamiento[$i]["ubicacion"] = htmlentities($apa[3]);
                $aparcamiento[$i]["tag"] = htmlentities($apa[4]);
                $i++;
            }

            $articulo['aparcamientos'] = $aparcamiento;
        } else {
            echo "no se puede mostrar los datos";
        }
    }

    if ($tipoDato == 'deportes') {
        $deportesAux = obtenerDeportes();

        if (isset($deportesAux)) {
            $i = 0;
            foreach ($deportesAux as $dep) {
                $deporte[$i]["id"] = htmlentities($dep[0]);
                $deporte[$i]["tipo"] = htmlentities($dep[1]);
                $deporte[$i]["descripcion"] = htmlentities($dep[2]);
                $deporte[$i]["ubicacion"] = htmlentities($dep[3]);
                $deporte[$i]["tag"] = htmlentities($dep[4]);
                $i++;
            }

            $articulo['deportes'] = $deporte;
        } else {
            echo "no se puede mostrar los datos";
        }
    }

    if ($tipoDato == 'estudiantes') {
        $estudiantesAux = obtenerEstudiantes();

        if (isset($estudiantesAux)) {
            $i = 0;
            foreach ($estudiantesAux as $est) {
                $estudiante[$i]["id"] = htmlentities($est[0]);
                $estudiante[$i]["tipo"] = htmlentities($est[1]);
                $estudiante[$i]["descripcion"] = htmlentities($est[2]);
                $estudiante[$i]["ubicacion"] = htmlentities($est[3]);
                $estudiante[$i]["tag"] = htmlentities($est[4]);
                $i++;
            }

            $articulo['estudiantes'] = $estudiante;
        } else {
            echo "no se puede mostrar los datos";
        }
    }


    if ($tipoDato == 'entidades') {
        //prueba con Entidades
        $articulo[0] = "Edificios";
        $articulo[1] = "Profesores";
        $articulo[2] = "Comida";
        $articulo[3] = "Transporte";
        $articulo[4] = "Aparcamientos";
        $articulo[5] = "Instalaciones Deportivas";
        $articulo[6] = "Para Estudiantes";
    }
}
    print(json_encode($articulo));
?>



