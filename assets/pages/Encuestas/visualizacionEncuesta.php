<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Sistema desarrollado para la carrera de Nutrición de la Universidad del Centro Educativo Latinoamericano y presentado como proyecto final de los alumnos Leandro Donato, Sebastián Meza y Hernán Sosa, alumnos de la carrera de Ingeniería en Sistemas también de dicha Universidad.">
  <meta name="author" content="Leandro Donato, Sebastián Meza, Hernán Sosa, Juan Cruz Utge">
  <link href="../../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="../../../css/sb-admin-2.css" rel="stylesheet">
  <link rel="stylesheet" href="../../../css/estilos.css">
  <title>SENAT | Encuesta Activa</title>
</head>

<body id="page-top">

  <!-- Contenedor principal -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../../../index.html">
        <div class="sidebar-brand-icon">
          <img class="sidebar__logo" src="../../img/Logos/logo_senat_letrasBlancas.png" alt="Logo SENAT">
        </div>
      </a>
      <hr class="sidebar-divider my-0">
      <li class="nav-item active">
        <a class="nav-link" href="../../../index.html">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Interface
      </div>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUsers" aria-expanded="true" aria-controls="collapseUsers">
          <i class="fas fa-users"></i>
          <span>Usuarios</span>
        </a>
        <div id="collapseUsers" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Menú usuarios:</h6>
            <a class="collapse-item" href="../Usuarios/crearUsuario.html">Agregar nuevo</a>
            <a class="collapse-item" href="../Usuarios/gestionUsuarios.html">Gestionar usuarios</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFoods" aria-expanded="true" aria-controls="collapseFoods">
          <i class="fas fa-apple-alt"></i>
          <span>Alimentos</span>
        </a>
        <div id="collapseFoods" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Menú alimentos:</h6>
            <a class="collapse-item" href="crearAlimento.html">Agregar nuevo</a>
            <a class="collapse-item" href="gestionAlimentos.html">Gestionar alimentos</a>
          </div>
        </div>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFoodGroups" aria-expanded="true" aria-controls="collapseFoodGroups">
          <i class="fas fa-database"></i>
          <span>GruposDeAlimentos</span>
        </a>
        <div id="collapseFoodGroups" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Menú grupo alimentos:</h6>
            <a class="collapse-item" href="../GruposDeAlimentos/gestionGrupoDeAlimentos.html">Gestionar grupos</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSurveys" aria-expanded="true" aria-controls="collapseSurveys">
          <i class="fas fa-poll"></i>
          <span>Encuestas</span>
        </a>
        <div id="collapseSurveys" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Menú encuestas:</h6>
            <a class="collapse-item" href="../Encuestas/crearEncuesta.html">Crear nueva encuesta</a>
            <a class="collapse-item" href="../Encuestas/encuestasActivas.html">Encuestas activas</a>
            <a class="collapse-item" href="../Encuestas/encuestasFinalizadas.html">Encuestas finalizadas</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseReports" aria-expanded="true" aria-controls="collapseReports">
          <i class="fas fa-file-excel"></i>
          <span>Reportes</span>
        </a>
        <div id="collapseReports" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Reportes:</h6>
            <a class="collapse-item" href="../Reportes/gestionAlimentos.html">Ver reportes</a>
          </div>
        </div>
      </li>
      <hr class="sidebar-divider">
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>
    </ul> <!-- Fin Sidebar -->

    <!-- Contenedor de la section -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Contenido principal de la section -->
      <div id="content">

        <!-- Navbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          <ul class="navbar-nav ml-auto">
            <div class="topbar-divider d-none d-sm-block"></div>
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Cecilia Torrent</span>
                <img class="img-profile rounded-circle" src="../../img/undraw_profile_1.svg">
              </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Ver Perfil
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Opciones
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Cerrar sesión
                </a>
              </div>
            </li>
          </ul>
        </nav> <!-- Fin Navbar -->

        <!-- Contenido de la section -->
        <div class="container-fluid">

          <!-- Cabecera de la section -->
          <h1 class="h3 mb-2 text-gray-800">Encuesta en curso</h1>
          <p class="mb-4">Complete el cuestionario con los datos pedidos. <a href="#">Ver información de como completar cuestionario.</a></p>

          <!-- Cuestionario -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Encuesta en curso</h6>
            </div>
            <div class="row m-3 justify-content-center">
              <form action="visualizacionEncuesta.php" method="POST" enctype="multipart/form-data" id="formVisualizarEncuesta">
                <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                  <h1 class="tituloEncuestaCuestionario">NOMBRE ENCUESTA</h1>
                </div>

                <div class="col-lg-12 col-md-12 col-sm-12">
                  <div class="text-center">
                    <h3>NOMBRE ALIMENTO</h3>
                  </div>

                  <div class="seleccionPorciones">
                    <div class="porcSel">
                      <input type="radio" id="porcNro1" name="porcionEncuesta" value="Porcion1">
                      <label for="porcNro1">
                        <a href="../../img/ImgPorciones/Milanesaporcion1.jpg" data-lightbox="photos">
                          <img class="imgPorcSel" src="../../img/ImgPorciones/Milanesaporcion1.jpg" alt="foodImage">
                        </a>
                      </label>
                    </div>

                    <div class="porcSel">
                      <label for="porcNro2">
                        <a href="../../img/ImgPorciones/Milanesaporcion1.jpg" data-lightbox="photos">
                          <img class="imgPorcSel" src="../../img/ImgPorciones/Milanesaporcion1.jpg" alt="foodImage">
                        </a>
                      </label>
                      <div class="d-flex m-3 align-content-center justify-content-center">
                        <input type="radio" id="porcNro2" name="porcionEncuesta" value="Porcion2">
                      </div>
                    </div>

                    <div class="porcSel">
                      <input type="radio" id="porcNro3" name="porcionEncuesta" value="Porcion3">
                      <label for="porcNro3">
                        <a href="../../img/ImgPorciones/Milanesaporcion1.jpg" data-lightbox="photos">
                          <img class="imgPorcSel" src="../../img/ImgPorciones/Milanesaporcion1.jpg" alt="foodImage">
                        </a>
                      </label>
                    </div>

                    <div class="porcSel">
                      <label for="porcNro4">
                        <a href="../../img/ImgPorciones/Milanesaporcion1.jpg" data-lightbox="photos">
                          <img class="imgPorcSel" src="../../img/ImgPorciones/Milanesaporcion1.jpg" alt="foodImage">
                        </a>
                      </label>
                      <input type="radio" id="porcNro4" name="porcionEncuesta" value="Porcion4">
                    </div>

                  </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12 selectorFrecCuestionario">
                  <div class="alimento__dataInicial">
                    <h3>Frecuencia de ingesta</h3>
                  </div>
                  <div id="radio_frec" class="text-start">
                    <div class="form-check">
                      <input class="form-check-input" name="frecEncuesta" type="radio" value="" id="frec_nunca">
                      <label class="form-check-label" for="frec_nunca">
                        Nunca
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" name="frecEncuesta" type="radio" value="" id="frec_menosUnaVezPorSemana">
                      <label class="form-check-label" for="frec_menosUnaVezPorSemana">
                        Menos de 1 vez por semana
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" name="frecEncuesta" type="radio" value="" id="frec_unaVezPorSemana">
                      <label class="form-check-label" for="frec_unaVezPorSemana">
                        1 vez por semana
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" name="frecEncuesta" type="radio" value="" id="frec_dosTresVecesPorSemana">
                      <label class="form-check-label" for="frec_dosTresVecesPorSemana">
                        2-3 veces por semana
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" name="frecEncuesta" type="radio" value="" id="frec_cuatroSeisVecesPorSemana">
                      <label class="form-check-label" for="frec_cuatroSeisVecesPorSemana">
                        4-6 veces por semana
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" name="frecEncuesta" type="radio" value="" id="frec_diariamente">
                      <label class="form-check-label" for="frec_diariamente">
                        Diariamente
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" name="frecEncuesta" type="radio" value="" id="frec_unaVezPorSemana">
                      <label class="form-check-label" for="frec_unaVezPorSemana">
                        1 vez por semana
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" name="frecEncuesta" type="radio" value="" id="frec_masDeUnaVezAlDia">
                      <label class="form-check-label" for="frec_masDeUnaVezAlDia">
                        Más de una vez al día
                      </label>
                    </div>
                  </div>
                </div> <!-- End pregunta -->
            </div> <!-- End row -->

            <hr> <!-- Separador de alimentos -->

            <div class="row m-3 justify-content-center">
              <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="text-center">
                  <h3>NOMBRE ALIMENTO</h3>
                </div>

                <div class="seleccionPorciones">
                  <div class="porcSel">
                    <input type="radio" id="porcNro1" name="porcionEncuesta" value="Porcion1">
                    <label for="porcNro1">
                      <a href="../../img/ImgPorciones/Milanesaporcion1.jpg" data-lightbox="photos">
                        <img class="imgPorcSel" src="../../img/ImgPorciones/Milanesaporcion1.jpg" alt="foodImage">
                      </a>
                    </label>
                  </div>

                  <div class="porcSel">
                    <label for="porcNro2">
                      <a href="../../img/ImgPorciones/Milanesaporcion1.jpg" data-lightbox="photos">
                        <img class="imgPorcSel" src="../../img/ImgPorciones/Milanesaporcion1.jpg" alt="foodImage">
                      </a>
                    </label>
                    <div class="d-flex m-3 align-content-center justify-content-center">
                      <input type="radio" id="porcNro2" name="porcionEncuesta" value="Porcion2">
                    </div>
                  </div>

                  <div class="porcSel">
                    <input type="radio" id="porcNro3" name="porcionEncuesta" value="Porcion3">
                    <label for="porcNro3">
                      <a href="../../img/ImgPorciones/Milanesaporcion1.jpg" data-lightbox="photos">
                        <img class="imgPorcSel" src="../../img/ImgPorciones/Milanesaporcion1.jpg" alt="foodImage">
                      </a>
                    </label>
                  </div>

                  <div class="porcSel">
                    <label for="porcNro4">
                      <a href="../../img/ImgPorciones/Milanesaporcion1.jpg" data-lightbox="photos">
                        <img class="imgPorcSel" src="../../img/ImgPorciones/Milanesaporcion1.jpg" alt="foodImage">
                      </a>
                    </label>
                    <input type="radio" id="porcNro4" name="porcionEncuesta" value="Porcion4">
                  </div>

                </div>
              </div>

              <div class="col-lg-6 col-md-6 col-sm-12 selectorFrecCuestionario">
                <div class="alimento__dataInicial">
                  <h3>Frecuencia de ingesta</h3>
                </div>
                <div id="radio_frec" class="text-start">
                  <div class="form-check">
                    <input class="form-check-input" name="frecEncuesta" type="radio" value="" id="frec_nunca">
                    <label class="form-check-label" for="frec_nunca">
                      Nunca
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" name="frecEncuesta" type="radio" value="" id="frec_menosUnaVezPorSemana">
                    <label class="form-check-label" for="frec_menosUnaVezPorSemana">
                      Menos de 1 vez por semana
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" name="frecEncuesta" type="radio" value="" id="frec_unaVezPorSemana">
                    <label class="form-check-label" for="frec_unaVezPorSemana">
                      1 vez por semana
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" name="frecEncuesta" type="radio" value="" id="frec_dosTresVecesPorSemana">
                    <label class="form-check-label" for="frec_dosTresVecesPorSemana">
                      2-3 veces por semana
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" name="frecEncuesta" type="radio" value="" id="frec_cuatroSeisVecesPorSemana">
                    <label class="form-check-label" for="frec_cuatroSeisVecesPorSemana">
                      4-6 veces por semana
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" name="frecEncuesta" type="radio" value="" id="frec_diariamente">
                    <label class="form-check-label" for="frec_diariamente">
                      Diariamente
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" name="frecEncuesta" type="radio" value="" id="frec_unaVezPorSemana">
                    <label class="form-check-label" for="frec_unaVezPorSemana">
                      1 vez por semana
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" name="frecEncuesta" type="radio" value="" id="frec_masDeUnaVezAlDia">
                    <label class="form-check-label" for="frec_masDeUnaVezAlDia">
                      Más de una vez al día
                    </label>
                  </div>
                </div>
              </div> <!-- End pregunta -->
            </div> <!-- End row -->

            <hr> <!-- Separador de alimentos -->

            <div class="row m-3 justify-content-center">
              <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="text-center">
                  <h3>NOMBRE ALIMENTO</h3>
                </div>

                <div class="seleccionPorciones">
                  <div class="porcSel">
                    <input type="radio" id="porcNro1" name="porcionEncuesta" value="Porcion1">
                    <label for="porcNro1">
                      <a href="../../img/ImgPorciones/Milanesaporcion1.jpg" data-lightbox="photos">
                        <img class="imgPorcSel" src="../../img/ImgPorciones/Milanesaporcion1.jpg" alt="foodImage">
                      </a>
                    </label>
                  </div>

                  <div class="porcSel">
                    <label for="porcNro2">
                      <a href="../../img/ImgPorciones/Milanesaporcion1.jpg" data-lightbox="photos">
                        <img class="imgPorcSel" src="../../img/ImgPorciones/Milanesaporcion1.jpg" alt="foodImage">
                      </a>
                    </label>
                    <div class="d-flex m-3 align-content-center justify-content-center">
                      <input type="radio" id="porcNro2" name="porcionEncuesta" value="Porcion2">
                    </div>
                  </div>

                  <div class="porcSel">
                    <input type="radio" id="porcNro3" name="porcionEncuesta" value="Porcion3">
                    <label for="porcNro3">
                      <a href="../../img/ImgPorciones/Milanesaporcion1.jpg" data-lightbox="photos">
                        <img class="imgPorcSel" src="../../img/ImgPorciones/Milanesaporcion1.jpg" alt="foodImage">
                      </a>
                    </label>
                  </div>

                  <div class="porcSel">
                    <label for="porcNro4">
                      <a href="../../img/ImgPorciones/Milanesaporcion1.jpg" data-lightbox="photos">
                        <img class="imgPorcSel" src="../../img/ImgPorciones/Milanesaporcion1.jpg" alt="foodImage">
                      </a>
                    </label>
                    <input type="radio" id="porcNro4" name="porcionEncuesta" value="Porcion4">
                  </div>

                </div>
              </div>

              <div class="col-lg-6 col-md-6 col-sm-12 selectorFrecCuestionario">
                <div class="alimento__dataInicial">
                  <h3>Frecuencia de ingesta</h3>
                </div>
                <div id="radio_frec" class="text-start">
                  <div class="form-check">
                    <input class="form-check-input" name="frecEncuesta" type="radio" value="" id="frec_nunca">
                    <label class="form-check-label" for="frec_nunca">
                      Nunca
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" name="frecEncuesta" type="radio" value="" id="frec_menosUnaVezPorSemana">
                    <label class="form-check-label" for="frec_menosUnaVezPorSemana">
                      Menos de 1 vez por semana
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" name="frecEncuesta" type="radio" value="" id="frec_unaVezPorSemana">
                    <label class="form-check-label" for="frec_unaVezPorSemana">
                      1 vez por semana
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" name="frecEncuesta" type="radio" value="" id="frec_dosTresVecesPorSemana">
                    <label class="form-check-label" for="frec_dosTresVecesPorSemana">
                      2-3 veces por semana
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" name="frecEncuesta" type="radio" value="" id="frec_cuatroSeisVecesPorSemana">
                    <label class="form-check-label" for="frec_cuatroSeisVecesPorSemana">
                      4-6 veces por semana
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" name="frecEncuesta" type="radio" value="" id="frec_diariamente">
                    <label class="form-check-label" for="frec_diariamente">
                      Diariamente
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" name="frecEncuesta" type="radio" value="" id="frec_unaVezPorSemana">
                    <label class="form-check-label" for="frec_unaVezPorSemana">
                      1 vez por semana
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" name="frecEncuesta" type="radio" value="" id="frec_masDeUnaVezAlDia">
                    <label class="form-check-label" for="frec_masDeUnaVezAlDia">
                      Más de una vez al día
                    </label>
                  </div>
                </div>
              </div> <!-- End pregunta -->
            </div>
            <!-- Botonera -->
            <div class="row m-3 justify-content-center">
              <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="buttons__AlimentoAlta">
                  <a class="btn btn-outline-danger m-2" href="gestionDeEncuestas.php">Cancelar</a>
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

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>

</body>

</html>