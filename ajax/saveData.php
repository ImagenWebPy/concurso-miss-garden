<?php

define('DB_USER', 'web');
define('DB_PASS', 'WebG@rdenMKT');
//define('DB_USER', 'root');
//define('DB_PASS', '');
define('DB_NAME', 'rrhh');
define('DB_TYPE', 'mysql');
define('DB_HOST', 'localhost');
include '../Database.php';
$db = new Database(DB_TYPE, DB_HOST, DB_NAME, DB_USER, DB_PASS);
$error = false;
$dir = '../archivos/';
$serverdir = $dir;
$filename = array();
if (!empty($_POST)) {

    $nombre_miss = cleanInput($_POST['nombre_miss']);
    $edad_miss = cleanInput($_POST['edad_miss']);
    $estado_civil_miss = cleanInput($_POST['estado_civil_miss']);
    $sucursal_miss = cleanInput($_POST['sucursal_miss']);
    $departamento_miss = cleanInput($_POST['departamento_miss']);
    $hobbies_miss = cleanInput($_POST['hobbies_miss']);
    $nombre_mister = cleanInput($_POST['nombre_mister']);
    $edad_mister = cleanInput($_POST['edad_mister']);
    $estado_civil_mister = cleanInput($_POST['estado_civil_mister']);
    $sucursal_mister = cleanInput($_POST['sucursal_mister']);
    $departamento_mister = cleanInput($_POST['departamento_mister']);
    $hobbies_mister = cleanInput($_POST['hobbies_mister']);
    #Insertamos los datos de la miss
    $db->insert('2017_miss_garden', array(
        'id_estado_civil' => $estado_civil_miss,
        'nombre' => utf8_decode($nombre_miss),
        'edad' => utf8_decode($edad_miss),
        'sucursal' => utf8_decode($sucursal_miss),
        'departamento' => utf8_decode($departamento_miss),
        'hobbies' => utf8_decode($hobbies_miss),
        'fecha' => date('Y-m-d H:i:s')
    ));
    $idMiss = $db->lastInsertId();
    #Insertamos los datos del Mister
    $db->insert('2017_mr_garden', array(
        'id_estado_civil' => $estado_civil_mister,
        'id_miss_garden' => $idMiss,
        'nombre' => utf8_decode($nombre_mister),
        'edad' => utf8_decode($edad_mister),
        'sucursal' => utf8_decode($sucursal_mister),
        'departamento' => utf8_decode($departamento_mister),
        'hobbies' => utf8_decode($hobbies_mister),
        'fecha' => date('Y-m-d H:i:s')
    ));
    if (!empty($_FILES['file'])) {
        $cantImagenes = count($_FILES['file']['name']) - 1;
        for ($i = 0; $i <= $cantImagenes; $i++) {
            $newname = $idMiss . '_' . $_FILES['file']['name'][$i];
            $fname = cleanUrl($newname);
            $contents = file_get_contents($_FILES['file']['tmp_name'][$i]);
            $handle = fopen($serverdir . $fname, 'w');
            fwrite($handle, $contents);
            fclose($handle);
            $db->insert('2017_imagenes_miss_mr', array(
                'id_miss_garden' => $idMiss,
                'img' => $fname,
                'fecha_add' => date('Y-m-d H:i:s'),
                'estado' => 1
            ));
        }
    }
}

function cleanUrl($String) {
    $String = str_replace(array('á', 'à', 'â', 'ã', 'ª', 'ä'), "a", $String);
    $String = str_replace(array('Á', 'À', 'Â', 'Ã', 'Ä'), "A", $String);
    $String = str_replace(array('Í', 'Ì', 'Î', 'Ï'), "I", $String);
    $String = str_replace(array('í', 'ì', 'î', 'ï'), "i", $String);
    $String = str_replace(array('é', 'è', 'ê', 'ë'), "e", $String);
    $String = str_replace(array('É', 'È', 'Ê', 'Ë'), "E", $String);
    $String = str_replace(array('ó', 'ò', 'ô', 'õ', 'ö', 'º'), "o", $String);
    $String = str_replace(array('Ó', 'Ò', 'Ô', 'Õ', 'Ö'), "O", $String);
    $String = str_replace(array('ú', 'ù', 'û', 'ü'), "u", $String);
    $String = str_replace(array('Ú', 'Ù', 'Û', 'Ü'), "U", $String);
    $String = str_replace(array('?', '[', '^', '´', '`', '¨', '~', ']', '¿', '!', '¡'), "", $String);
    $String = str_replace("ç", "c", $String);
    $String = str_replace("Ç", "C", $String);
    $String = str_replace("ñ", "n", $String);
    $String = str_replace("Ñ", "N", $String);
    $String = str_replace("Ý", "Y", $String);
    $String = str_replace("ý", "y", $String);

    $String = str_replace("'", "", $String);
    //$String = str_replace(".", "_", $String);
    $String = str_replace(" ", "_", $String);
    $String = str_replace("/", "_", $String);

    $String = str_replace("&aacute;", "a", $String);
    $String = str_replace("&Aacute;", "A", $String);
    $String = str_replace("&eacute;", "e", $String);
    $String = str_replace("&Eacute;", "E", $String);
    $String = str_replace("&iacute;", "i", $String);
    $String = str_replace("&Iacute;", "I", $String);
    $String = str_replace("&oacute;", "o", $String);
    $String = str_replace("&Oacute;", "O", $String);
    $String = str_replace("&uacute;", "u", $String);
    $String = str_replace("&Uacute;", "U", $String);
    return $String;
}

function cleanInput($data) {
    $data = trim($data);
    $data = str_replace("'", "\'", $data);
    $data = htmlspecialchars($data);
    $data = stripslashes($data);

    return $data;
}

$data = '<p>&nbsp;</p><h2>Gracias por completar el formulario... Se han agregado los datos.</h2><p>&nbsp;</p>';
echo $data;
