<?php
include("../../../includes/conectar.php");
include("../../../utils/menu.php");
session_start();
if (!isset($_SESSION['user'])) {
  header("Location:../../../index.php");
}
date_default_timezone_set("America/Argentina/Buenos_Aires");
$fechaActual = Date("Y-m-d");
$u = $_SESSION['user'];
$c = mysqli_query($conect, "SELECT * FROM usuario WHERE dni='$u'");
$a = mysqli_fetch_assoc($c);

if (isset($_REQUEST['CargaUsuario']) && !empty($_REQUEST['CargaUsuario']) && $_REQUEST['CargaUsuario']=='yaExiste') {
  echo "<script>alert('Este Usuario ha sido registrado.')</script>";
}

if (isset($_REQUEST['dni']) && !empty($_REQUEST['dni'])) {
  $u = $_REQUEST['dni'];
  $p = $_REQUEST['pass'];
  $n = $_REQUEST['nombre'];
  $ap = $_REQUEST['apellido'];
  $c = $_REQUEST['correo'];
  $r = $_REQUEST['rol'];
  
  $f = $_FILES['fotoUsuario']['name'];
  $est = $_REQUEST['estado'];
  if ($est == '1') {
    $estInt = 1;
  } else {
    $estInt = 0;
  }

  $checcar = mysqli_query($conect, "SELECT dni FROM usuario");

  while ($row = $checcar->fetch_array()) {
    $rows[] = $row;
  }

  $booleana = 0;

  foreach ($rows as $row) {
    if ($row['dni'] == $u) {
      $booleana = 1;
    }
  }
  unset($rows);
  if ($booleana == 1) {
    header("Location:crearUsuario.php?CargaUsuario=yaExiste");
    
  } else {
    $insert = mysqli_query($conect, "INSERT INTO usuario VALUES (NULL, '$u', '$p', '$n', '$ap', '$r', '$c', '$f', '$estInt')");
    if ($insert == 1) {
      $arch = move_uploaded_file($_FILES['fotoUsuario']['tmp_name'], "../../img/ImgUsuarios/" . $u . ".jpg");
      if ($arch) {
        header("Location:gestionUsuarios.php?Carga=exitosa");
      } else {
        header("Location:gestionUsuarios.php?Carga=exitosaSinArchivo");
      }
    } else {
      header("Location:gestionUsuarios.php?Carga=Fallida");
    }
  }
}

if (isset($_REQUEST['e'])) {
  $consulta = mysqli_query($conect, "SELECT * FROM usuario WHERE idusuario='" . $_REQUEST['e'] . "'");
  $aa = mysqli_fetch_assoc($consulta);
  $dni = $aa['dni'];
  $est = 0;
  mysqli_query($conect, "UPDATE usuario SET estado='$est' WHERE dni='$dni' ");
}
if (isset($_REQUEST['ee'])) {
  $consulta = mysqli_query($conect, "SELECT * FROM usuario WHERE idusuario='" . $_REQUEST['ee'] . "'");
  $aa = mysqli_fetch_assoc($consulta);
  $dni = $aa['dni'];
  $est = 1;
  mysqli_query($conect, "UPDATE usuario SET estado='$est' WHERE dni='$dni' ");
}


if (isset($_REQUEST['cerrar'])) {
  session_destroy();
  header("Location:index.php");
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
  <link href="../../../css/sb-admin-2.css" rel="stylesheet">
  <link rel="stylesheet" href="../../../css/estilos.css">
  <title>SENAT | Crear nuevo usuario</title>
</head>

<body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">
    <!-- Sidebar Index -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
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
            <a class="collapse-item" href="crearUsuario.html">Agregar nuevo</a>
            <a class="collapse-item" href="gestionUsuarios.html">Gestionar usuarios</a>
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
            <a class="collapse-item" href="../Alimentos/crearAlimento.html">Agregar nuevo</a>
            <a class="collapse-item" href="../Alimentos/gestionAlimentos.html">Gestionar alimentos</a>
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
            <a class="collapse-item" href="../GruposDeAlimentos/gestionAlimentos.html">Gestionar grupos</a>
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
    </ul>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
      <!-- Main Content -->
      <div id="content">
        <!-- Navbar Index -->
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
        </nav>
        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Agregar nuevo usuario</h1>
          <p class="mb-4">Rellena los campos de abajo con los datos necesarios del usuario</p>
          <!-- Tabla usuarios Start -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Agregar nuevo usuario</h6>
            </div>
            <form action="crearUsuario.php" method="POST" enctype="multipart/form-data" class="form-inline d-flex flex-column align-items-center">
              <div class="row m-3 justify-content-center">
                <div class="col-lg-4 col-md-4 col-sm-12">
                  <div class="alimento__fotoPrincipal">
                    <h3>Foto de perfil</h3>
                    <img src="../../img/undraw_profile_2.svg" width="350" class="img-fluid rounded mb-2" alt="foodImage">
                    <div class="custom-file">
                      <input type="file" name="fotoUsuario" class="custom-file-input" id="imagenUsuario" required>
                      <label class="custom-file-label" for="imagenUsuario">Imagen Usuario</label>
                    </div>
                  </div>
                </div>

                <div class="col-lg-8 col-md-4 col-sm-12">
                  <div class="alimento__dataInicial">
                    <h3>Datos del usuario</h3>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-dark text-light labelMacroMicroNut" id="basic-addon1" title="Documento de identidad">DNI</span>
                      </div>
                      <input type="number" class="form-control" placeholder="Ingrese su DNI..." aria-describedby="basic-addon1" title="DNI (sin puntos ni espacios)" name="dni" required>
                    </div>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-dark text-light labelMacroMicroNut" id="basic-addon1">Nombre</span>
                      </div>
                      <input type="text" class="form-control" placeholder="Ingrese su nombre..." aria-describedby="basic-addon1" name="nombre" required>
                    </div>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-dark text-light labelMacroMicroNut" id="basic-addon1">Apellido</span>
                      </div>
                      <input type="text" class="form-control" placeholder="Ingrese su apellido..." aria-describedby="basic-addon1" name="apellido" required>
                    </div>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-dark text-light labelMacroMicroNut" id="basic-addon1">Correo</span>
                      </div>
                      <input type="email" class="form-control" placeholder="Ingrese su correo..." aria-describedby="basic-addon1" name="correo" required>
                    </div>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-dark text-light labelMacroMicroNut" id="basic-addon1">
                          Clave</span>
                      </div>
                      <input type="password" class="form-control" placeholder="Ingrese su clave..." aria-describedby="basic-addon1" name="pass" required>
                    </div>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-dark text-light labelMacroMicroNut" id="basic-addon1">Rol</span>
                      </div>
                      <select class="custom-select" id="inputGroupSelect01" name="rol" required>
                        <option value="">Seleccionar...</option>
                        <option value="1">Administrador</option>
                        <option value="2">Nutricionista</option>
                      </select>
                    </div>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-dark text-light labelMacroMicroNut" id="basic-addon1">Estado</span>
                      </div>
                      <div>
                        <select name="estado" class="custom-select inputCantGeneral" id="inputGroupSelect01" required>
                          <option value="">Seleccionar...</option>
                          <option value="1">Activo</option>
                          <option value="0">Inactivo</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row m-3 justify-content-center">
                <div class="col-lg-12 col-md-12 col-sm-12">
                  <div class="buttons__AlimentoAlta">
                    <a href="gestionUsuarios.php" class="btn btn-outline-danger m-2">Cancelar</a>
                    <a href="#" id="guardarUsuario" class="btn btn-success m-2" data-toggle="modal" data-target="#guardarUsuarioModal" role="button">Guardar usuario</a>
                  </div>
                </div>
              </div>
              <!-- Guardar Usuario Modal-->
              <div class="modal fade" id="guardarUsuarioModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Se guardarán los datos del usuario</h5>
                      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
                    </div>
                    <div class="modal-body">Estás seguro?</div>
                    <div class="modal-footer">
                      <button class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                      <button class="btn btn-success">Guardar</button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- End content -->
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- Carga usuarios End -->
  </div>
  <!-- Footer -->
  <footer class="sticky-footer bg-white">
    <div class="container my-auto">
      <div class="copyright text-center my-auto">
        <span>Desarrollado para UCEL por Leandro Donato, Sebastián Meza y Hernán Sosa &copy; Ingeniería en Sistemas
          UCEL</span>
      </div>
    </div>
  </footer>
  <!-- End of Footer -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Estás por cerrar tu sesión</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Para finalizar, hacé click en el botón "Cerrar sesión".</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
          <a class="btn btn-danger" href="assets/pages/Login/login.html">Cerrar sesión</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="../../../vendor/jquery/jquery.min.js"></script>
  <script src="../../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../../../vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="../../../js/helpers.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../../../js/sb-admin-2.min.js"></script>

</body>

</html>