<?php
session_start();
//define('DB_USER', 'web');
//define('DB_PASS', 'WebG@rdenMKT');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'rrhh');
define('DB_TYPE', 'mysql');
define('DB_HOST', 'localhost');
include './Database.php';
$db = new Database(DB_TYPE, DB_HOST, DB_NAME, DB_USER, DB_PASS);

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
                <div class="about-desc" id="formularioTop">
                    <div class="row">
                        <div class="col-md-12" id="divFormulario">
                            <h4>Completa el formulario</h4>
                            <form method="POST" id="frmConcurso" enctype="multipart/form-data">
                                <div class="col-md-6">
                                    <h4 class="datosMiss">Datos Miss</h4>
                                    <div class="col-md-12 col-sm-12">
                                        <input type="text" class="form-control" id="nombre_miss" name="nombre_miss" placeholder="Nombre Miss">
                                    </div>
                                    <div class="col-md-12 col-sm-12">
                                        <input type="text" class="form-control" id="edad_miss" name="edad_miss" placeholder="Edad Miss">
                                    </div>
                                    <div class="col-md-12 col-sm-12">
                                        <select class="form-control" id="estado_civil_miss" name="estado_civil_miss">
                                            <option value="">Estado Civil Miss</option>
                                            <?php foreach ($estados as $item): ?>
                                                <option value="<?= $item['id']; ?>"><?= utf8_encode($item['descripcion']); ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col-md-12 col-sm-12">
                                        <input type="tel" class="form-control" id="sucursal_miss" name="sucursal_miss" placeholder="Sucursal Miss">
                                    </div>
                                    <div class="col-md-12 col-sm-12">
                                        <input type="tel" class="form-control" id="departamento_miss" name="departamento_miss" placeholder="Departamento Miss">
                                    </div>
                                    <div class="col-md-12 col-sm-12">
                                        <textarea class="form-control" rows="5" id="hobbies_miss" name="hobbies_miss" placeholder="Hobbies Miss"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h4 class="datosMiss">Datos Mister</h4>
                                    <div class="col-md-12 col-sm-6">
                                        <input type="text" class="form-control" id="nombre_mister" name="nombre_mister" placeholder="Nombre Mister">
                                    </div>
                                    <div class="col-md-12 col-sm-12">
                                        <input type="text" class="form-control" id="edad_mister" name="edad_mister" placeholder="Edad Mister">
                                    </div>
                                    <div class="col-md-12 col-sm-12">
                                        <select class="form-control" id="estado_civil_mister" name="estado_civil_mister">
                                            <option value="">Estado Civil Mister</option>
                                            <?php foreach ($estados as $item): ?>
                                                <option value="<?= $item['id']; ?>"><?= utf8_encode($item['descripcion']); ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col-md-12 col-sm-12">
                                        <input type="tel" class="form-control" id="sucursal_mister" name="sucursal_mister" placeholder="Sucursal Mister">
                                    </div>
                                    <div class="col-md-12 col-sm-12">
                                        <input type="tel" class="form-control" id="departamento_mister" name="departamento_mister" placeholder="Departamento Mister">
                                    </div>
                                    <div class="col-md-12 col-sm-12">
                                        <textarea class="form-control" rows="5" id="hobbies_mister" name="hobbies_mister" placeholder="Hobbies Mister"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label>Agrega tus imagenes <small style="font-size: 10px; color: #4f4e4e;">(Opcional)</small></label>
                                    <div class="html5fileupload demo_multi" data-form="true" data-multiple="true" style="width: 95%; margin: 0px auto;">
                                        <input type="file" name="file" />
                                    </div>
                                </div>
                                <div class="col-md-12" style="margin: 15px 0px;">
                                    <button id="btnEnviar" type="submit" class="btn btn-danger btn-block" name="submit">Enviar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Service 1 -->
        <div class="servicesbox bg1" id="imagenHipster">
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
            $(document).ready(function () {
                $('.html5fileupload.demo_multi').html5fileupload();
                $('#btnEnviar').click(function (e) {
                    e.preventDefault();
                    var nombre_miss = $('#nombre_miss');
                    var edad_miss = $('#edad_miss');
                    var estado_civil_miss = $('#estado_civil_miss');
                    var sucursal_miss = $('#sucursal_miss');
                    var departamento_miss = $('#departamento_miss');
                    var hobbies_miss = $('#hobbies_miss');
                    var nombre_mister = $('#nombre_mister');
                    var edad_mister = $('#edad_mister');
                    var estado_civil_mister = $('#estado_civil_mister');
                    var sucursal_mister = $('#sucursal_mister');
                    var departamento_mister = $('#departamento_mister');
                    var hobbies_mister = $('#hobbies_mister');
                    validarCampo(nombre_miss);
                    validarCampo(edad_miss);
                    validarCampo(estado_civil_miss);
                    validarCampo(sucursal_miss);
                    validarCampo(departamento_miss);
                    validarCampo(hobbies_miss);
                    validarCampo(nombre_mister);
                    validarCampo(edad_mister);
                    validarCampo(estado_civil_mister);
                    validarCampo(sucursal_mister);
                    validarCampo(departamento_mister);
                    validarCampo(hobbies_mister);
                    if (nombre_miss.val().trim().length > 0
                            && edad_miss.val().trim().length > 0
                            && estado_civil_miss.val().trim().length > 0
                            && sucursal_miss.val().trim().length > 0
                            && departamento_miss.val().trim().length > 0
                            && hobbies_miss.val().trim().length > 0
                            && nombre_mister.val().trim().length > 0
                            && edad_mister.val().trim().length > 0
                            && estado_civil_mister.val().trim().length > 0
                            && sucursal_mister.val().trim().length > 0
                            && departamento_mister.val().trim().length > 0
                            && hobbies_mister.val().trim().length > 0) {
                        if ($.isNumeric(edad_miss.val()) == true) {
                            if ($.isNumeric(edad_mister.val()) == true) {
                                //var data = new FormData($('#frmConcurso')[0]);
                                var ajaxData = new FormData($('#frmConcurso')[0]);
                                //ajaxData.append('action', 'uploadImages');
                                jQuery.each($("input[name^='file']")[0].files, function (i, file) {
                                    ajaxData.append('file[' + i + ']', file);
                                });
                                $.ajax({
                                    cache: false,
                                    contentType: false,
                                    processData: false,
                                    url: "ajax/saveData.php",
                                    async: true,
                                    type: "POST",
                                    data: ajaxData,
                                    beforeSend: function (xhr) {
                                        $('#imagenHipster').css('display', 'none');
                                        $('#formularioTop').html('<img src="images/loading.gif">');
                                    }
                                }).done(function (data) {
                                    $('#imagenHipster').css('display', 'none');
                                    $('#formularioTop').html(data);
                                });
                            } else {
                                edad_mister.css("border", "3px solid red");
                                edad_mister.val('Edad tiene que ser numerica');
                            }
                        } else {
                            edad_miss.css("border", "3px solid red");
                            edad_miss.val('Edad tiene que ser numerica');
                        }
                    }
                });
                function validarCampo(id) {
                    if (id.val().trim().length == 0) {
                        id.css("border", "3px solid red");
                    } else {
                        id.css("border", "1px solid #d2d6de");
                    }
                }
            });
        </script>
    </body>
</html>