<?php
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'rrhh');
define('DB_TYPE', 'mysql');
define('DB_HOST', 'localhost');
include './Database.php';
$db = new Database(DB_TYPE, DB_HOST, DB_NAME, DB_USER, DB_PASS);
$error = false;
$absolutedir = dirname(__FILE__);
$dir = 'archivos/';
$serverdir = $absolutedir . $dir;
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
    if (!empty($_FILES['file'])) {
        foreach ($_FILES as $inputname => $file) {
            $newname = $_POST[$inputname . '_name'];
            $extension = strtolower(end(explode('.', $file['name'])));
            $fname = $newname . '.' . $extension;

            $contents = file_get_contents($file['tmp_name']);

            $handle = fopen($serverdir . $fname, 'w');
            fwrite($handle, $contents);
            fclose($handle);

            $filename[] = $fname;
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

$estados = $db->select("select * from 2017_estado_civil where estado = 1");
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Concurso Miss y Mister Garden</title>
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta name="description" content="Concurso Miss y Mister Garden">
        <meta name="keywords" content="concurso, miss garden, mister garden">
        <meta name="author" content="Marketing Garden">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <!-- Bootstrap css -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <!-- Fontawesome css -->
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <!-- Magnific-popup css -->
        <link rel="stylesheet" href="css/magnific-popup.css">
        <!-- Owl Carousel css -->
        <link rel="stylesheet" href="css/owl.theme.css">
        <link rel="stylesheet" href="css/owl.carousel.css">
        <!-- Main css -->
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/custom.css">
        <link rel="stylesheet" href="html5fileupload/html5fileupload.css">
    </head>
    <body data-spy="scroll" data-target=".navbar-collapse" data-offset="50">
        <!-- PRE LOADER -->
        <div class="preloader">
            <div class="cssload-dots">
                <div class="cssload-dot"></div>
                <div class="cssload-dot"></div>
                <div class="cssload-dot"></div>
                <div class="cssload-dot"></div>
                <div class="cssload-dot"></div>
            </div>
        </div>
        <!-- Navigation Section -->
        <div class="navbar custom-navbar wow fadeInDown" data-wow-duration="2s" role="navigation" id="header">
            <div class="container"> 
                <!-- NAVBAR HEADER -->
                <div class="navbar-header">
                    <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="icon icon-bar"></span> <span class="icon icon-bar"></span> <span class="icon icon-bar"></span> </button>
                    <!-- lOGO TEXT HERE --> 
                    <a href="/" class="navbar-brand"><img src="images/logo-garden.png" style="width: 120px;"></a>
                </div>
            </div>
        </div>
        <!-- Home Section -->
        <div id="home" class="parallax-section"> 
            <!--     <div class="overlay"></div>-->
            <div class="container">
                <div class="row">
                    <div class="col-md-offset-1 col-md-10 col-sm-12">
                        <div class="slide-text">
                            <h1>¿Querés ser la Miss Garden?</h1>
                            <h2 style="color: #fff;">Buscá para tu Míster…</h2>
                            <a href="#about" class="btn btn-default section-btn">Completa el formulario YA!</a> </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- About section -->
        <div id="about">
            <div class="container">
                <div class="section-title">
                    <h3>Anota tu nombre y el de tu pareja </h3>
                    <p>Las primeras en inscribirse participarán del certamen</p>
                </div>
                <div class="about-desc">
                    <div class="row">
                        <div class="col-md-12">
                            <h4>Completa el formulario</h4>
                            <form method="POST" class="row">
                                <div class="col-md-6">
                                    <h4 class="datosMiss">Datos Miss</h4>
                                    <div class="col-md-12 col-sm-12">
                                        <input type="text" class="form-control" name="nombre_miss" placeholder="Nombre Miss">
                                    </div>
                                    <div class="col-md-12 col-sm-12">
                                        <input type="tel" class="form-control" name="edad_miss" placeholder="Edad Miss">
                                    </div>
                                    <div class="col-md-12 col-sm-12">
                                        <select class="form-control" name="estado_civil_miss">
                                            <option value="">Estado Civil Miss</option>
                                            <?php foreach ($estados as $item): ?>
                                                <option value="<?= $item['id']; ?>"><?= utf8_encode($item['descripcion']); ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col-md-12 col-sm-12">
                                        <input type="tel" class="form-control" name="sucursal_miss" placeholder="Sucursal Miss">
                                    </div>
                                    <div class="col-md-12 col-sm-12">
                                        <input type="tel" class="form-control" name="departamento_miss" placeholder="Departamento Miss">
                                    </div>
                                    <div class="col-md-12 col-sm-12">
                                        <textarea class="form-control" rows="5" name="hobbies_miss" placeholder="Hobbies Miss"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h4 class="datosMiss">Datos Mister</h4>
                                    <div class="col-md-12 col-sm-6">
                                        <input type="text" class="form-control" name="nombre_mister" placeholder="Nombre Mister">
                                    </div>
                                    <div class="col-md-12 col-sm-12">
                                        <input type="text" class="form-control" name="edad_mister" placeholder="Edad Mister">
                                    </div>
                                    <div class="col-md-12 col-sm-12">
                                        <select class="form-control" name="estado_civil_mister">
                                            <option value="">Estado Civil Mister</option>
                                            <?php foreach ($estados as $item): ?>
                                                <option value="<?= $item['id']; ?>"><?= utf8_encode($item['descripcion']); ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col-md-12 col-sm-12">
                                        <input type="tel" class="form-control" name="sucursal_mister" placeholder="Sucursal Mister">
                                    </div>
                                    <div class="col-md-12 col-sm-12">
                                        <input type="tel" class="form-control" name="departamento_mister" placeholder="Departamento Mister">
                                    </div>
                                    <div class="col-md-12 col-sm-12">
                                        <textarea class="form-control" rows="5" name="hobbies_mister" placeholder="Hobbies Mister"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label>Agrega tus imagenes</label>
                                    <div class="html5fileupload demo_multi" data-form="true" data-multiple="true" style="width: 95%; margin: 0px auto;">
                                        <input type="file" name="file" />
                                    </div>
                                </div>
                                <div class="col-md-12" style="margin: 15px 0px;">
                                    <button id="submit" type="submit" class="btn btn-danger btn-block" name="submit">Enviar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Service 1 -->
        <div class="servicesbox bg1">
            <div class="container">
                <div class="row">
                    <div style="height: 300px;"></div>
                </div>
            </div>
        </div>
        <!-- Footer Section -->
        <footer>
            <div class="container"> 
                <!-- social Section -->
                <div class="row">
                    <div class="col-md-12 col-sm-12">

                        <div class="footer-copyright">
                            <p>&copy; Desarrollado por MKT Garden.</p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Bootstrap --> 
        <script src="js/jquery-2.1.4.min.js"></script> 
        <script src="js/bootstrap.min.js"></script> 
        <!-- Popup --> 
        <script src="js/jquery.magnific-popup.min.js"></script> 
        <script src="js/magnific-popup-options.js"></script> 
        <!-- Carousel --> 
        <script src="js/owl.carousel.js"></script> 
        <!-- Sticky Header --> 
        <script src="js/jquery.sticky.js"></script> 
        <!-- Parallax --> 
        <script src="js/jquery.parallax.js"></script> 
        <!-- Counter --> 
        <script src="js/counter.js"></script> 
        <script src="js/smoothscroll.js"></script> 
        <!-- Custom --> 
        <script src="js/custom.js"></script>
        <script src="html5fileupload/html5fileupload.min.js"></script>
        <script type="text/javascript">
            $('.html5fileupload.demo_multi').html5fileupload();
        </script>
    </body>
</html>