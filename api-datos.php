<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
    </head>
    <body>
        <?php

function obtenerEdificios() {
    $con = mysql_connect("localhost", "root", "");
    if (!$con) {
        die(' No puedo conectar: ' . mysql_error());
    }
    $db_selected = mysql_select_db("upo", $con);
    if (!$db_selected) {
        die(' No puedo seleccionar con prueba: ' . mysql_error());
    }

    $result = mysql_query("SELECT numero_ed, nombre_ed, ubicaciones, plantas_ed, comentario_ed FROM Edificio", $con);
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

    $result = mysql_query("SELECT pro.profesor_id, pro.nombre_prof, pro.apellido1_prof, pro.apellido2_prof, asi.nombre_asi, des.numero_ed, des.planta_des, des.numero_des, edi.ubicaciones FROM Profesor pro, Asignatura asi, Despacho des, Edificio edi WHERE pro.despacho_id = des.despacho_id AND des.numero_ed=edi.numero_ed AND pro.asignatura_id=asi.asignatura_id", $con);
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

function obtenerComidas() {
    $con = mysql_connect("localhost", "root", "");
    if (!$con) {
        die(' No puedo conectar: ' . mysql_error());
    }
    $db_selected = mysql_select_db("upo", $con);
    if (!$db_selected) {
        die(' No puedo seleccionar con prueba: ' . mysql_error());
    }

    $result = mysql_query("SELECT lugar_id, tipo, descripcion, ubicacion FROM lugares WHERE tipo like upper('comida')", $con);
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

    $result = mysql_query("SELECT lugar_id, tipo, descripcion, ubicacion FROM lugares WHERE tipo like upper('transporte')", $con);
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

    $result = mysql_query("SELECT lugar_id, tipo, descripcion, ubicacion FROM lugares WHERE tipo like upper('aparcamientos')", $con);
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

    $result = mysql_query("SELECT lugar_id, tipo, descripcion, ubicacion FROM lugares WHERE tipo like upper('deportes')", $con);
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

    $result = mysql_query("SELECT lugar_id, tipo, descripcion, ubicacion FROM lugares WHERE tipo like upper('estudiantes')", $con);
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
                $edificio[$i]["numero"] = $ed[0];
                $edificio[$i]["nombre"] = $ed[1];
                $edificio[$i]["ubicacion"] = $ed[2];
                $edificio[$i]["plantas"] = $ed[3];
                $edificio[$i]["comentario"] = $ed[4];
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
                $profesor[$i]["id"] = $pro[0];
                $profesor[$i]["nombre"] = $pro[1];
                $profesor[$i]["apellido1"] = $pro[2];
                $profesor[$i]["apellido2"] = $pro[3];
                $profesor[$i]["asignatura"] = $pro[4];
                $profesor[$i]["despacho"] = $pro[5] . "." . $pro[6] . "." . $pro[7];
                $profesor[$i]["ubicacion"] = $pro[8];
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
                $comida[$i]["id"] = $com[0];
                $comida[$i]["tipo"] = $com[1];
                $comida[$i]["descripcion"] = $com[2];
                $comida[$i]["ubicacion"] = $com[3];
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
                $transporte[$i]["id"] = $tra[0];
                $transporte[$i]["tipo"] = $tra[1];
                $transporte[$i]["descripcion"] = $tra[2];
                $transporte[$i]["ubicacion"] = $tra[3];
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
                $aparcamiento[$i]["id"] = $apa[0];
                $aparcamiento[$i]["tipo"] = $apa[1];
                $aparcamiento[$i]["descripcion"] = $apa[2];
                $aparcamiento[$i]["ubicacion"] = $apa[3];
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
                $deporte[$i]["id"] = $dep[0];
                $deporte[$i]["tipo"] = $dep[1];
                $deporte[$i]["descripcion"] = $dep[2];
                $deporte[$i]["ubicacion"] = $dep[3];
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
                $estudiante[$i]["id"] = $est[0];
                $estudiante[$i]["tipo"] = $est[1];
                $estudiante[$i]["descripcion"] = $est[2];
                $estudiante[$i]["ubicacion"] = $est[3];
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
    echo json_encode($articulo);
?>
    </body>
</html>


