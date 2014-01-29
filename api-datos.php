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
        $objeto[$i] = $row;
        $i++;
    }
    return $objeto;
}

        $edificiosAux = obtenerEdificios();

        if (isset($edificiosAux)) {
            $i = 0;
            
            foreach ($edificiosAux as $ed) {
                $edificio[$i]["numero"]=$ed[0];
                $edificio[$i]["nombre"]=$ed[1];
                $edificio[$i]["ubicacion"]=$ed[2];
                $edificio[$i]["plantas"]=$ed[3];
                $edificio[$i]["comentario"]=$ed[4];
                $i++;
                
                
            }
            
            $articulo['edificios']=$edificio;
            echo json_encode($articulo);
            
        } else {
            echo "no se puede mostrar los datos";
        }    
?>
