<?php
include("../../../includes/conectar.php");
include("../../../utils/menu.php");
include("../../../utils/navbar.php");
include("../../../utils/scrollToTopButton.php");
include("../../../utils/modalEndSession.php");
include("../../../utils/footer.php");

if (!isset($_SESSION['user'])) {
  header("Location:../../../index.php");
}

//Fecha
date_default_timezone_set("America/Argentina/Buenos_Aires");
$fechaActual = Date("Y-m-d h:i:s");

//Base de datos del usuario --> $dbUser
$u = $_SESSION['user'];
$queryUser = mysqli_query($conect, "SELECT * FROM usuario WHERE dni='$u'");
$dbUser = mysqli_fetch_assoc($queryUser);

if (isset($_REQUEST['cerrar'])) {
  session_destroy();
  header("Location:../../../index.php");
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Sistema desarrollado para la carrera de Nutrición de la Universidad del Centro Educativo Latinoamericano y presentado como proyecto final de los alumnos Leandro Donato, Sebastián Meza y Hernán Sosa, alumnos de la carrera de Ingeniería en Sistemas también de dicha Universidad.">
  <meta name="author" content="Leandro Donato, Sebastián Meza, Hernán Sosa, Juan Cruz Utge">
  <link href="../../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="../../../css/sb-admin-2.min.css" rel="stylesheet">
  <link href="../../../css/estilos.css" rel="stylesheet">
  <title>SENAT | Dashboard</title>
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar Index -->
    <?php
    echo $dashboard;
    ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
      <!-- Main Content -->
      <div id="content">
        <!-- Navbar Index -->
        <?php
        echo $navbar;
        ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">
          <div class="titlePrincipal">
            <h1 class="titleBienvenidos">Bienvenido al sistema SENAT</h1>
            <p class="parrafoPrincipal">Sistema de evaluación de nutricional asistido por tecnología</p>
            <hr class="sidebar-divider my-0">
          </div>
          <div class="row">

            <!-- Area Panel de usuarios -->
            <div class="col-xl-7 col-lg-7">
              <div class="card shadow mb-4 border-bottom-info">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Panel de usuarios</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <a class="dropdown-item" href="../Usuarios/gestionUsuarios.php">Ver panel de
                        usuarios</a>
                    </div>
                  </div>
                </div>
                <!-- End Card Header - Dropdown -->

                <!-- Card Body panel de usuarios -->
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th class="text-center" scope="col">DNI</th>
                          <th class="text-center" scope="col">Nombre</th>
                          <th class="text-center" scope="col">Apellido</th>
                          <th class="text-center" scope="col">Rol</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td class="text-center">36426466</td>
                          <td class="text-center">Hernán</td>
                          <td class="text-center">Sosa</td>
                          <td class="text-center">Nutricionista</td>
                        </tr>
                        <tr>
                          <td class="text-center">34466919</td>
                          <td class="text-center">Leandro</td>
                          <td class="text-center">Donato</td>
                          <td class="text-center">Administrador</td>
                        </tr>
                        <tr>
                          <td class="text-center">22658894</td>
                          <td class="text-center">Luciano</td>
                          <td class="text-center">Ripani</td>
                          <td class="text-center">Nutricionista</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                <!-- End Card Body panel de usuarios -->
              </div>
            </div>
            <!-- Fin Area Panel de usuarios -->


            <!-- Area Primeros pasos con SENAT -->
            <div class="col-xl-5 col-lg-5">
              <div class="card shadow mb-4 border-bottom-info">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Primeros pasos con SENAT</h6>
                </div>
                <div class="card-body">
                  <p>Manual de usuario: <a href="#">Descargar PDF</a></p>
                  <p>Video tutorial: <a href="#">Ver en Drive</a></p>
                  <hr class="sidebar-divider">
                  <p>Este sistema fue desarrollado por el equipo de Ingenieros:
                    Leandro Donato, Sebastián Meza y Hernán Sosa,
                    alumnos de la carrera ISI de la Universidad UCEL.</p>
                </div>
              </div>
            </div>
            <!-- End Area Primeros pasos con SENAT -->
          </div>


          <div class="row">

            <!-- Area Panel de alimentos -->
            <div class="col">
              <div class="card shadow mb-4 border-bottom-info">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Base de alimentos</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <a class="dropdown-item" href="../Alimentos/gestionAlimentos.html">Ver panel de
                        alimentos</a>
                    </div>
                  </div>
                </div>
                <!-- End Card Header - Dropdown -->

                <!-- Card Body panel de alimentos -->
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th class="text-center">Nombre</th>
                          <th class="text-center">Grupo</th>
                          <th class="text-center">Fuente</th>
                          <th class="text-center">Energía (kcal)</th>
                          <th class="text-center">Grasa (g)</th>
                          <th class="text-center">H. Carbono (g)</th>
                          <th class="text-center">Proteína (g)</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td class="text-center">Manzana</td>
                          <td class="text-center">Frutas</td>
                          <td class="text-center">UCEL</td>
                          <td class="text-center">51,887</td>
                          <td class="text-center">0,1887</td>
                          <td class="text-center">13,868</td>
                          <td class="text-center">0,283</td>
                        </tr>
                        <tr>
                          <td class="text-center">Leche</td>
                          <td class="text-center">Productos lácteos</td>
                          <td class="text-center">UCEL</td>
                          <td class="text-center">61,6716</td>
                          <td class="text-center">3,3336</td>
                          <td class="text-center">4,667</td>
                          <td class="text-center">3,2919</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                <!-- End Card Body panel de alimentos -->
              </div>
            </div>
            <!-- Fin Area Panel de alimentos -->
          </div>

          <div class="row">

            <!-- Area Encuestas -->
            <div class="col">
              <div class="card shadow mb-4 border-bottom-info">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Encuestas activas</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <a class="dropdown-item" href="../Encuestas/gestionDeEncuestas.php">Ver panel de
                        encuestas</a>
                    </div>
                  </div>
                </div>
                <!-- End Card Header - Dropdown -->

                <!-- Card Body panel de alimentos -->
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th class="text-center">Nombre encuesta</th>
                          <th class="text-center">Descripción</th>
                          <th class="text-center">Fecha creación</th>
                          <th class="text-center">Fecha último registro</th>
                          <th class="text-center">Estado</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td class="text-center">Lácteos</td>
                          <td class="text-center">Ingesta de calcio - Invierno 2021</td>
                          <td class="text-center">29/06/2021</td>
                          <td class="text-center">30/06/2021</td>
                          <td class="text-center text-success">Activa</td>
                        </tr>
                        <tr>
                          <td class="text-center">Frutas</td>
                          <td class="text-center">Ingesta azúcares - Primavera 2020</td>
                          <td class="text-center">15/10/2020</td>
                          <td class="text-center">23/11/2020</td>
                          <td class="text-center text-danger">Finalizada</td>
                        </tr>
                        <tr>
                          <td class="text-center">Lácteos</td>
                          <td class="text-center">Ingesta de calcio - Invierno 2020</td>
                          <td class="text-center">10/08/2020</td>
                          <td class="text-center">30/08/2020</td>
                          <td class="text-center text-danger">Finalizada</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                <!-- End Card Body panel de alimentos -->
              </div>
            </div>
            <!-- Fin Area Panel de alimentos -->
          </div>
        </div>
        <!-- End container-fluid -->
      </div>
      <!-- End content -->
      <!-- Footer -->
      <?php
      echo $footer;
      ?>
      <!-- End of Footer -->
    </div>
  </div>

  <!-- Scroll to Top Button-->
  <?php
  echo $scrollToTopButton;
  ?>

  <!-- Logout Modal-->
  <?php
  echo $logoutModal;
  ?>

  <!-- Bootstrap core JavaScript-->
  <script src="../../../vendor/jquery/jquery.min.js"></script>
  <script src="../../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../../../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../../../js/sb-admin-2.min.js"></script>

</body>

</html>