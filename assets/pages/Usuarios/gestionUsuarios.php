<?php 
include("../../../includes/conectar.php");
session_start();
if(!isset($_SESSION['user'])){
    header("Location:index.php");
}
date_default_timezone_set("America/Argentina/Buenos_Aires");
$fechaActual=Date("Y-m-d");
$u=$_SESSION['user'];
$c=mysqli_query($conect, "SELECT * FROM usuario WHERE dni='$u'");
$a=mysqli_fetch_assoc($c);
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description"
    content="Sistema desarrollado para la carrera de Nutrición de la Universidad del Centro Educativo Latinoamericano y presentado como proyecto final de los alumnos Leandro Donato, Sebastián Meza y Hernán Sosa, alumnos de la carrera de Ingeniería en Sistemas también de dicha Universidad.">
  <meta name="author" content="Leandro Donato, Sebastián Meza, Hernán Sosa, Juan Cruz Utge">
  <link href="../../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">
  <link href="../../../css/sb-admin-2.css" rel="stylesheet">
  <link rel="stylesheet" href="../../../css/estilos.css">
  <title>SENAT | Gestión de usuarios</title>
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
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUsers" aria-expanded="true"
          aria-controls="collapseUsers">
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
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFoods" aria-expanded="true"
          aria-controls="collapseFoods">
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
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFoodGroups"
          aria-expanded="true" aria-controls="collapseFoodGroups">
          <i class="fas fa-database"></i>
          <span>GruposDeAlimentos</span>
        </a>
        <div id="collapseFoodGroups" class="collapse" aria-labelledby="headingUtilities"
          data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Menú grupo alimentos:</h6>
            <a class="collapse-item" href="../GruposDeAlimentos/gestionGrupoDeAlimentos.html">Gestionar grupos</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSurveys"
          aria-expanded="true" aria-controls="collapseSurveys">
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
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseReports"
          aria-expanded="true" aria-controls="collapseReports">
          <i class="fas fa-file-excel"></i>
          <span>Reportes</span>
        </a>
        <div id="collapseReports" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Reportes:</h6>
            <a class="collapse-item" href="../Reportes/reportes.html">Ver reportes</a>
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
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Cecilia Torrent</span>
                <img class="img-profile rounded-circle" src="../../img/ImgUsuarios/<?php echo $a['dni']; ?>.jpg">
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
          <h1 class="h3 mb-2 text-gray-800">Gestión de usuarios</h1>
          <p class="mb-4">Busca, consulta y agrega nuevos usuarios al sistema. Si desea más información puede
            ver las <a target="_blank" href="#">instrucciones de uso</a>.</p>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Gestión de usuarios</h6>
            </div>
            <div class="row">
              <div class="col">
                <div class="navbar justify-content-start">
                  <a class="btn btn-success" href="crearUsuario.php" role="button"><i class="fas fa-plus"></i> Crear
                    usuario</a>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTableAlimentos" width="100%" cellspacing="0">
                  <thead class="thead-light">
                    <tr>
                      <th class="text-center">Nombre</th>
                      <th class="text-center">Apellido</th>
                      <th class="text-center">DNI</th>
                      <th class="text-center">Edad</th>
                      <th class="text-center">Correo</th>
                      <th class="text-center">Rol</th>
                      <th class="text-center">Estado</th>
                      <th class="text-center">Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    $c=mysqli_query($conect,"SELECT * FROM usuario ORDER BY idusuario DESC");
                    $n=mysqli_num_rows($c);
                    if($n>0){ 
                      while($userList=$c->fetch_assoc()){
                          $userListS[]=$userList;
                      }
                      foreach($userListS as $userList){  
                        //ESTADO
                        if($userList['estado']==1){
                          $estado='Activo';
                        }else{
                          $estado='Inactivo';
                        }
                        //ROL
                        if($userList['rol']==1){
                          $rol='Administrador';
                        }else{
                          $rol='Nutricionista';
                        }
                        echo '<tr>
                          <td class="text-center">'.$userList['nombre'].'</td>
                          <td class="text-center">'.$userList['apellido'].'</td>
                          <td class="text-center">'.$userList['dni'].'</td>
                          <td class="text-center">'.$userList['edad'].'</td>
                          <td class="text-center">'.$userList['correo'].'</td>
                          <td class="text-center">'.$rol.'</td>
                          <td class="text-center">'.$estado.'</td>
                          <td class="text-center">
                            <a class="btn btn-primary btn-sm" href="visualizacionUsuarios.php?visualizarUsuario='.$userList['idusuario'].'" role="button" title="Ver perfil"><i
                                class="fas fa-external-link-square-alt"></i></a>
                            <a class="btn btn-info btn-sm" href="editarUsuario.php?editarUsuario='.$userList['idusuario'].'" role="button" title="Editar datos de usuario"><i class="fas fa-edit"></i></a>
                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                              data-target="#deleteReport" title="Eliminar usuario">
                              <i class="fas fa-trash"></i>
                            </button>
                          </td>
                        </tr>';
                      }unset($userListS);
                    }
                    ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th class="text-center" colspan="8">Última actualización el 24/05/2021 a las
                        23:11 pm.</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>
          </div>
          <!-- End content -->
        </div> <!-- End Table -->
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
    </div>
  </div>

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">¿Ya te vas?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Hacé click en "Cerrar sesión" para salir.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
          <a class="btn btn-danger" href="login.html">Cerrar sesión</a>
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

  <!-- Page level plugins -->
  <script src="../../../vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="../../../vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="../../../js/demo/datatables-demo.js"></script>

</body>

</html>