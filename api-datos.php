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

//if (isset($_GET['peticion'])) {
//    $tipoDato = $_GET['peticion'];
//    if ($tipoDato == 'edificios') {

        $edificiosAux = obtenerEdificios();

        if (isset($edificiosAux)) {
            //echo "<table border='1'>";
            //echo "<th>Numero</th><th>nombre</th><th>ubicacion</th><th>planta</th><th>comentario</th>";
            $i = 0;
            //$edificio=new array();
            foreach ($edificiosAux as $ed) {
                //for ($i=0; $i <10 ; $i++) { 
                //echo "<tr><td class='td-despacho'>";
                $edificio[$i]["numero"] = $ed[0];
                //echo "</td><td class='td-despacho'>";
                $edificio[$i]["nombre"] = $ed[1];
                //echo "</td><td class='td-despacho'>";
                $edificio[$i]["ubicacion"] = $ed[2];
                //echo "</td><td class='td-despacho'>";
                $edificio[$i]["plantas"] = $ed[3];
                //echo "</td><td class='td-despacho'>";
                $edificio[$i]["comentario"] = $ed[4];
                //echo "</td></tr>";
                $i++;
                
                
            }
            
            $articulo['edificios']=$edificio;
            echo json_encode($articulo);
            
        } else {
            echo "no se puede mostrar los datos";
        }
//    }
//}
        
?>
