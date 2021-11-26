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
$u = $_SESSION['user'];
$c = mysqli_query($conect, "SELECT * FROM usuario WHERE dni='$u'");
$a = mysqli_fetch_assoc($c);

if (isset($_REQUEST['eliminarUsuario'])) {
  $idUserEliminar = $_REQUEST['eliminarUsuario'];
  $update = mysqli_query($conect, "UPDATE usuario SET estado='0' WHERE idusuario='$idUserEliminar' ");
  if ($update) {
    header("Location:gestionUsuarios.php?BajadeUsuario=" . $idUserEliminar . "Exitoso");
  } else {
    header("Location:gestionUsuarios.php?BajadeUsuario=" . $idUserEliminar . "Fallido");
  }
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
  <link rel="apple-touch-icon" sizes="180x180" href="../../img/Favicon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="../../img/Favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="../../img/Favicon/favicon-16x16.png">
  <link href="../../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="../../../css/sb-admin-2.min.css" rel="stylesheet">
  <link href="../../../css/estilos.css" rel="stylesheet">
  <title>SENAT | Gestión de usuarios</title>
</head>

<body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">
    <!-- Sidebar Index -->
    <?php
    echo $menuUsuarios;
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
                      <th class="text-center">Correo</th>
                      <th class="text-center">Rol</th>
                      <th class="text-center">Estado</th>
                      <th class="text-center">Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $c = mysqli_query($conect, "SELECT * FROM usuario ORDER BY idusuario DESC");
                    $n = mysqli_num_rows($c);
                    if ($n > 0) {
                      while ($userList = $c->fetch_assoc()) {
                        $userListS[] = $userList;
                      }
                      foreach ($userListS as $userList) {
                        //ESTADO
                        if ($userList['estado'] == 1) {
                          $estado = 'Activo';
                        } else {
                          $estado = '<span class="usuarioInactivo">Inactivo</span>';
                        }
                        //ROL
                        if ($userList['rol'] == 1) {
                          $rol = 'Administrador';
                        } else {
                          $rol = 'Nutricionista';
                        }
                        echo '<tr>
                          <td class="text-center">' . $userList['nombre'] . '</td>
                          <td class="text-center">' . $userList['apellido'] . '</td>
                          <td class="text-center">' . $userList['dni'] . '</td>
                          <td class="text-center">' . $userList['correo'] . '</td>
                          <td class="text-center">' . $rol . '</td>
                          <td class="text-center">' . $estado . '</td>
                          <td class="text-center">
                            <a class="btn btn-primary btn-sm" href="visualizacionUsuarios.php?visualizarUsuario=' . $userList['idusuario'] . '" role="button" title="Ver perfil"><i
                                class="fas fa-external-link-square-alt"></i></a>
                            <a class="btn btn-info btn-sm" href="editarUsuario.php?editarUsuario=' . $userList['idusuario'] . '" role="button" title="Editar datos de usuario"><i class="fas fa-edit"></i></a>
                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                              data-target="#deleteUser' . $userList['idusuario'] . '" title="Eliminar usuario">
                              <i class="fas fa-trash"></i>
                            </button>
                          </td>
                        </tr>';
                        echo '
                        <!-- deleteUser Modal -->
                        <div class="modal fade" id="deleteUser' . $userList['idusuario'] . '" tabindex="-1" role="dialog" aria-labelledby="deleteGroupLabel"
                          aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="deleteGroupLabel">Dar de baja usuario</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                ¿Está seguro que desea dar de baja el usuario: <b>'.$userList['nombre'].' '. $userList['apellido'].'</b>?
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                <a type="button" href="gestionUsuarios.php?eliminarUsuario=' . $userList['idusuario'] . '" class="btn btn-danger">Dar de baja usuario</a>
                              </div>
                            </div>
                          </div>
                        </div>
                        ';
                      }
                      unset($userListS);
                    }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <!-- End content -->
        </div> <!-- End Table -->
      </div>
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

  <!-- Page level plugins -->
  <script src="../../../vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="../../../vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="../../../js/demo/datatables-demo.js"></script>

</body>

</html>