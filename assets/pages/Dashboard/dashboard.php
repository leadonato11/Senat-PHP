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
$fechaActual = Date("d-m-Y h:i:s");

//Base de datos del usuario --> $dbUser
$u = $_SESSION['user'];
$queryUser = mysqli_query($conect, "SELECT * FROM usuario WHERE dni='$u'");
$dbUser = mysqli_fetch_assoc($queryUser);

if (isset($_REQUEST['cerrar'])) {
  session_destroy();
  header("Location:../../../index.php");
}

//LastUpdate
$queryLast=mysqli_query($conect, "SELECT * FROM lastupdate WHERE idlastupdate=1");
$dbLastUpdate=mysqli_fetch_assoc($queryLast);
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

            <!-- Area Primeros pasos con SENAT -->
            <div class="col-xl-12 col-lg-12">
              <div class="card shadow mb-4 border-bottom-info">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Primeros pasos con SENAT</h6>
                </div>
                <div class="card-body text-center">
                  <p>Manual de usuario: <a href="https://drive.google.com/file/d/1lxSyKtSv5qOHhf96zhiHie60IbHSkyz0" target="_blank">Descargar PDF</a></p>
                  <hr class="sidebar-divider">
                  <p class="primerosPasosDesc1">Este sistema fue desarrollado por el equipo de Ingenieros:
                    Leandro Donato, Sebastián Meza y Hernán Sosa,
                    alumnos de la carrera ISI de la Universidad UCEL.</p>
                  <p class="primerosPasosDesc1">Agradecimientos a:</p>
                  <p>Luciano Ripani</p>
                  <p>María Cecilia Torrent</p>
                  <p>Antonio Rial</p>
                  <p>Juan Francisco Plá</p>
                  <p>Juan Cruz Utge</p>
                  <p>Ezequiel Barrales</p>
                </div>
              </div>
            </div>
            <!-- End Area Primeros pasos con SENAT -->

            <!-- Area Panel de usuarios -->
            <?php
            if($dbUser['rol']==1){
              echo '
            <div class="col-xl-12 col-lg-12">
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
                      <tbody>';
                      
                        $contU = 0;
                        $queryUserTotal = mysqli_query($conect, "SELECT * FROM usuario ORDER BY idusuario DESC");
                        
                        while ($dbUsuariosTotal = $queryUserTotal->fetch_assoc()) {
                          if($dbUsuariosTotal['rol']==1){
                            $rol='Administrador';
                            }else{
                              $rol='Nutricionista';
                            }
                          $contU = $contU+1;
                          if ($contU <= 5) {
                            echo '
                            <tr>
                              <td class="text-center">' . $dbUsuariosTotal['dni'] . '</td>
                              <td class="text-center">' . $dbUsuariosTotal['nombre'] . '</td>
                              <td class="text-center">' . $dbUsuariosTotal['apellido'] . '</td>
                              <td class="text-center">' . $rol . '</td>
                            </tr>';
                          }
                        }
                       
                        echo '
                      </tbody>
                      <tfoot>
                        <tr>
                          <th class="text-center" colspan="4">Última actualización:'.$dbLastUpdate['usuarios'].'</th>
                        </tr>
                      </tfoot>
                    </table>
                  </div>
                </div>
                <!-- End Card Body panel de usuarios -->
              </div>
            </div>
            <!-- Fin Area Panel de usuarios -->';
                      }
                      ?>
            
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
                      <a class="dropdown-item" href="../Alimentos/gestionAlimentos.php">Ver panel de
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
                          <th class="text-center">Energía (kcal)</th>
                          <th class="text-center">Grasa (g)</th>
                          <th class="text-center">H. Carbono (g)</th>
                          <th class="text-center">Proteína (g)</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $contA = 0;
                        $queryAliTotal = mysqli_query($conect, "SELECT * FROM alimentos ORDER BY idalimentos DESC");
                        while ($dbAlimentosTotal = $queryAliTotal->fetch_assoc()) {
                          $contA = $contA+1;
                          if ($contA <= 5) {
                            echo '
                              <tr>
                                <td class="text-center">' . $dbAlimentosTotal['nombre'] . '</td>
                                <td class="text-center">' . $dbAlimentosTotal['grupo'] . '</td>
                                <td class="text-center">' . $dbAlimentosTotal['energia'] . '</td>
                                <td class="text-center">' . $dbAlimentosTotal['grasa'] . '</td>
                                <td class="text-center">' . $dbAlimentosTotal['hcarbono'] . '</td>
                                <td class="text-center">' . $dbAlimentosTotal['proteina'] . '</td>
                              </tr>';
                          }
                        }
                        ?>
                      <tfoot>
                        <tr>
                          <th class="text-center" colspan="6">Última actualización: <?php echo $dbLastUpdate['alimentos'];?></th>
                        </tr>
                      </tfoot>
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
                      <a class="dropdown-item" href="../Encuestas/gestionEncuestas.php">Ver panel de
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
                      <?php
                      
                        $contE = 0;
                        $queryEncTotal = mysqli_query($conect, "SELECT * FROM encuesta ORDER BY idencuesta DESC");
                        while ($dbEncTotal = $queryEncTotal->fetch_assoc()) {
                          if($dbEncTotal['estado']==0){
                            $estado='Borrador';
                            $formatoEstado='estadoEncuestaBorrador';
                          }
                          if($dbEncTotal['estado']==1){
                            $estado='Activa';
                            $formatoEstado='estadoEncuestaActiva';
                          }  
                          if($dbEncTotal['estado']==2){
                            $estado='Finalizada';
                            $formatoEstado='estadoEncuestaFinalizada';
                          }
                          $contE = $contE+1;
                          if ($contE <= 5) {
                            echo '
                        <tr>
                          <td class="text-center">'.$dbEncTotal['nombre'].'</td>
                          <td class="text-center">'.$dbEncTotal['descripcion'].'</td>
                          <td class="text-center">'.$dbEncTotal['fechacreacion'].'</td>
                          <td class="text-center">'.$dbEncTotal['fechaumod'].'</td>
                          <td class="text-center '.$formatoEstado.'">'.$estado.'</td>
                        </tr>';
                          }
                        }
                      ?>
                        
                      </tbody>
                      <tfoot>
                        <tr>
                          <th class="text-center" colspan="5">Última actualización: <?php echo $dbLastUpdate['encuestas'];?></th>
                        </tr>
                      </tfoot>
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