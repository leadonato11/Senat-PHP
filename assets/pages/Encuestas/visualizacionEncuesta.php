<?php
include("../../../includes/conectar.php");
include("../../../utils/menu.php");
include("../../../utils/navbar.php");
include("../../../utils/scrollToTopButton.php");
include("../../../utils/modalEndSession.php");
include("../../../utils/footer.php");

if (!isset($_SESSION['user'])) {
  header("Location:index.php");
}
date_default_timezone_set("America/Argentina/Buenos_Aires");
$fechaActual = Date("Y-m-d");

?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Sistema desarrollado para la carrera de Nutrición de la Universidad del Centro Educativo Latinoamericano y presentado como proyecto final de los alumnos Leandro Donato, Sebastián Meza y Hernán Sosa, alumnos de la carrera de Ingeniería en Sistemas también de dicha Universidad.">
  <meta name="author" content="Leandro Donato, Sebastián Meza, Hernán Sosa, Juan Cruz Utge">
  <link rel="apple-touch-icon" sizes="180x180" href="../../img/Favicon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="../../img/Favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="../../img/Favicon/favicon-16x16.png">
  <link href="../../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="../../../css/sb-admin-2.min.css" rel="stylesheet">
  <link href="../../../css/estilos.css" rel="stylesheet">
  <link href="../../../css/lightbox.css" rel="stylesheet" />
  <title>SENAT | Encuesta Activa</title>
</head>

<body id="page-top">

  <!-- Contenedor principal -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php
    echo $menuEncuestas;
    ?>

    <!-- Contenedor de la section -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Contenido principal de la section -->
      <div id="content">

        <!-- Navbar -->
        <?php
        echo $navbar;
        ?>

        <!-- Contenido de la section -->
        <div class="container-fluid">

          <!-- Cabecera de la section -->
          <h1 class="h3 mb-2 text-gray-800">Encuesta en curso</h1>
          <p class="mb-4">Complete el cuestionario con los datos correspondientes. <a href="#">Ver información de como completar cuestionario.</a></p>
          <form action="visualizacionEncuesta.php" method="POST" enctype="multipart/form-data" id="formVisualizarEncuesta">

            <div class="card shadow mb-4">
              <div class="row m-3 justify-content-center">
                <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                  <h1 class="tituloEncuestaCuestionario">Nombre de la encuesta</h1>
                </div>
              </div>
            </div>

            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Datos del encuestado</h6>
              </div>
              <div class="row m-3 justify-content-center">
                <div class="col-lg-6">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-dark text-light labelMacroMicroNut" id="basic-addon1">Edad</span>
                    </div>
                    <input type="number" name="edad" class="form-control" placeholder="Edad..." aria-label="edad" aria-describedby="basic-addon1" required>
                  </div>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-dark text-light labelMacroMicroNut" id="basic-addon1">Sexo</span>
                    </div>
                    <div>
                      <select class="custom-select sexSelect" name="sexo" id="inputGroupSelect01" title="Sexo" required>
                        <option selected disabled value="">Elija sexo...</option>
                        <option value="Femenino">Femenino</option>
                        <option value="Masculino">Masculino</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Encuesta en curso | Alimento 01 </h6>
              </div>
              <div class="row m-3 justify-content-center">
                <div class="col-lg-12 col-md-12 col-sm-12">
                  <h1 class="tituloEncuestaCuestionario">Alimento 01</h1>

                  <div class="contenedorImagenesPorciones">
                    <a href="../../img/ImgPorciones/Lechugaporcion1.jpg" alt="" data-lightbox="alimento1">
                      <img class="imgPorcionesEnEncuesta" src="../../img/ImgPorciones/Lechugaporcion1.jpg" alt="">
                    </a>
                    <a href="../../img/ImgPorciones/Lechugaporcion2.jpg" alt="" data-lightbox="alimento1">
                      <img class="imgPorcionesEnEncuesta" src="../../img/ImgPorciones/Lechugaporcion2.jpg" alt="">
                    </a>
                    <a href="../../img/ImgPorciones/Lechugaporcion3.jpg" alt="" data-lightbox="alimento1">
                      <img class="imgPorcionesEnEncuesta" src="../../img/ImgPorciones/Lechugaporcion3.jpg" alt="">
                    </a>
                    <a href="../../img/ImgPorciones/Lechugaporcion4.jpg" alt="" data-lightbox="alimento1">
                      <img class="imgPorcionesEnEncuesta" src="../../img/ImgPorciones/Lechugaporcion4.jpg" alt="">
                    </a>
                  </div>

                  <hr class="dividerPorcFrec">

                  <div class="selectorYfrecuencias">
                    <div class="contenedorSelectorPorciones">
                      <h4>Selector de porciones</h4>
                      <select class="selectorPorciones">
                        <option value="0">Ninguna</option>
                        <option value="1">Porción 1</option>
                        <option value="2">Porción 2</option>
                        <option value="3">Porción 3</option>
                        <option value="4">Porción 4</option>
                      </select>
                    </div>

                    <div class="contenedorFrecuenciasPorciones">
                      <h4>Selector de frecuencias</h4>
                      <div id="radio_frec" class="text-start">

                        <div class="form-check">
                          <input class="form-check-input" name="frecEncuesta" type="radio" value="2" id="frec_menosUnaVezPorSemana">
                          <label class="form-check-label" for="frec_menosUnaVezPorSemana">
                            Menos de 1 vez por semana
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" name="frecEncuesta" type="radio" value="3" id="frec_unaVezPorSemana">
                          <label class="form-check-label" for="frec_unaVezPorSemana">
                            1 vez por semana
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" name="frecEncuesta" type="radio" value="4" id="frec_dosTresVecesPorSemana">
                          <label class="form-check-label" for="frec_dosTresVecesPorSemana">
                            2-3 veces por semana
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" name="frecEncuesta" type="radio" value="5" id="frec_cuatroSeisVecesPorSemana">
                          <label class="form-check-label" for="frec_cuatroSeisVecesPorSemana">
                            4-6 veces por semana
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" name="frecEncuesta" type="radio" value="6" id="frec_diariamente">
                          <label class="form-check-label" for="frec_diariamente">
                            Diariamente
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" name="frecEncuesta" type="radio" value="7" id="frec_masDeUnaVezAlDia">
                          <label class="form-check-label" for="frec_masDeUnaVezAlDia">
                            Más de 1 vez al día
                          </label>
                        </div>
                      </div>
                    </div>



                  </div> <!-- fin selectorYfrecuencias -->
                </div> <!-- fin col -->

              </div> <!-- fin row -->
            </div> <!-- fin card alimento 01 -->

            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Encuesta en curso | Alimento 02 </h6>
              </div>
              <div class="row m-3 justify-content-center">
                <div class="col-lg-12 col-md-12 col-sm-12">
                  <h1 class="tituloEncuestaCuestionario">Alimento 02</h1>

                  <div class="contenedorImagenesPorciones">
                    <a href="../../img/ImgPorciones/Lechugaporcion1.jpg" alt="" data-lightbox="alimento2">
                      <img class="imgPorcionesEnEncuesta" src="../../img/ImgPorciones/Lechugaporcion1.jpg" alt="">
                    </a>
                    <a href="../../img/ImgPorciones/Lechugaporcion2.jpg" alt="" data-lightbox="alimento2">
                      <img class="imgPorcionesEnEncuesta" src="../../img/ImgPorciones/Lechugaporcion2.jpg" alt="">
                    </a>
                    <a href="../../img/ImgPorciones/Lechugaporcion3.jpg" alt="" data-lightbox="alimento2">
                      <img class="imgPorcionesEnEncuesta" src="../../img/ImgPorciones/Lechugaporcion3.jpg" alt="">
                    </a>
                    <a href="../../img/ImgPorciones/Lechugaporcion4.jpg" alt="" data-lightbox="alimento2">
                      <img class="imgPorcionesEnEncuesta" src="../../img/ImgPorciones/Lechugaporcion4.jpg" alt="">
                    </a>
                  </div>

                  <hr class="dividerPorcFrec">

                  <div class="selectorYfrecuencias">
                    <div class="contenedorSelectorPorciones">
                      <h4>Selector de porciones</h4>
                      <select class="selectorPorciones">
                        <option value="0">Ninguna</option>
                        <option value="1">Porción 1</option>
                        <option value="2">Porción 2</option>
                        <option value="3">Porción 3</option>
                        <option value="4">Porción 4</option>
                      </select>
                    </div>

                    <div class="contenedorFrecuenciasPorciones">
                      <h4>Selector de frecuencias</h4>
                      <div id="radio_frec" class="text-start">

                        <div class="form-check">
                          <input class="form-check-input" name="frecEncuesta" type="radio" value="2" id="frec_menosUnaVezPorSemana">
                          <label class="form-check-label" for="frec_menosUnaVezPorSemana">
                            Menos de 1 vez por semana
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" name="frecEncuesta" type="radio" value="3" id="frec_unaVezPorSemana">
                          <label class="form-check-label" for="frec_unaVezPorSemana">
                            1 vez por semana
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" name="frecEncuesta" type="radio" value="4" id="frec_dosTresVecesPorSemana">
                          <label class="form-check-label" for="frec_dosTresVecesPorSemana">
                            2-3 veces por semana
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" name="frecEncuesta" type="radio" value="5" id="frec_cuatroSeisVecesPorSemana">
                          <label class="form-check-label" for="frec_cuatroSeisVecesPorSemana">
                            4-6 veces por semana
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" name="frecEncuesta" type="radio" value="6" id="frec_diariamente">
                          <label class="form-check-label" for="frec_diariamente">
                            Diariamente
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" name="frecEncuesta" type="radio" value="7" id="frec_masDeUnaVezAlDia">
                          <label class="form-check-label" for="frec_masDeUnaVezAlDia">
                            Más de 1 vez al día
                          </label>
                        </div>
                      </div>
                    </div>



                  </div> <!-- fin selectorYfrecuencias -->
                </div> <!-- fin col -->

              </div> <!-- fin row -->
            </div> <!-- fin card alimento 02 -->

            <!-- Cuestionario -->
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Finalizar encuesta</h6>
              </div>
              <div class="row m-3 justify-content-center">
                <!-- Botonera -->
                <div class="row m-3 justify-content-center">
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="buttons__AlimentoAlta">
                      <a class="btn btn-outline-danger m-2" href="gestionEncuestas.php" data-toggle="modal" data-target="#cancelarCuestionarioModal" role="button">Salir de la encuesta</a>
                      <a href="#" id="guardarCuestionario" class="btn btn-success m-2" data-toggle="modal" data-target="#guardarCuestionarioModal" role="button">Guardar cuestionario</a>
                    </div>
                  </div>
                </div> <!-- Fin Botonera -->
              </div> <!-- Fin Cuestionario -->
              <!-- Guardar Cuestionario Modal-->
              <div class="modal fade" id="guardarCuestionarioModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Se guardarán los datos de la encuesta realizada</h5>
                      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
                    </div>
                    <div class="modal-body">Estás seguro?</div>
                    <div class="modal-footer">
                      <button class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                      <button class="btn btn-success">Si, guardar</button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Cancelar Cuestionario Modal-->
              <div class="modal fade" id="cancelarCuestionarioModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Se perderán los datos de la encuesta realizada</h5>
                      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
                    </div>
                    <div class="modal-body">Estás seguro? Los datos no guardados se perderán.</div>
                    <div class="modal-footer">
                      <button class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                      <button class="btn btn-danger">Si, estoy seguro</button>
                    </div>
                  </div>
                </div>
              </div>

            </div> <!-- Fin Cuestionario -->
            <!-- Guardar Cuestionario Modal-->
            <div class="modal fade" id="guardarCuestionarioModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Se guardarán los datos de la encuesta realizada</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <div class="modal-body">Estás seguro?</div>
                  <div class="modal-footer">
                    <button class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button class="btn btn-success">Si, guardar</button>
                  </div>
                </div>
              </div>
            </div>
        </div>
        </form>
        <!-- Footer -->
        <footer class="sticky-footer bg-white">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Desarrollado para UCEL por Leandro Donato, Sebastián Meza y Hernán Sosa &copy; Ingeniería en Sistemas
                UCEL</span>
            </div>
          </div>
        </footer> <!-- End of Footer -->
      </div>
    </div>
  </div>



  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="../../../vendor/jquery/jquery.min.js"></script>
  <script src="../../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../../../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../../../js/sb-admin-2.min.js"></script>
  <script src="../../../js/helper.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
  <script src="../../../js/lightbox.js"></script>

</body>

</html>