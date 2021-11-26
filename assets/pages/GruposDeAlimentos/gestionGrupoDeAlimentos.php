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
$fechaActual = Date("Y-m-d H:i:s");
$u = $_SESSION['user'];
$c = mysqli_query($conect, "SELECT * FROM usuario WHERE dni='$u'");
$a = mysqli_fetch_assoc($c);


//TABLA grupos (ALL)-> gdbs[]
$gquery = mysqli_query($conect, "SELECT * FROM grupos ");
$nGrupo = mysqli_num_rows($gquery);
while ($gdb = $gquery->fetch_array()) {
  $gdbs[] = $gdb;
}


//BAJA (Sólo de la tabla Grupos)
if (isset($_REQUEST['eliminarGrupo'])) {
  $idGrupoEliminar = $_REQUEST['eliminarGrupo'];
  mysqli_query($conect, "DELETE FROM grupos WHERE idgrupos='$idGrupoEliminar'");
  header("Location:gestionGrupoDeAlimentos.php?GrupoEliminado=" . $idGrupoEliminar . "Exitoso");
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
  <link rel="apple-touch-icon" sizes="180x180" href="../../img/Favicon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="../../img/Favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="../../img/Favicon/favicon-16x16.png">
  <link href="../../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="../../../css/sb-admin-2.min.css" rel="stylesheet">
  <link href="../../../css/estilos.css" rel="stylesheet">
  <title>SENAT | Gestionar grupo de alimentos</title>
</head>

<body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">
    <!-- Sidebar Index -->
    <?php
    echo $menuGrupoDeAlimentos;
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
          <h1 class="h3 mb-2 text-gray-800">Gestión de grupo de alimentos</h1>
          <p class="mb-4">Busca, consulta y agrega nuevos GruposDeAlimentos al sistema. Si desea más información puede
            ver las <a target="_blank" href="#">instrucciones de uso</a>.</p>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Gestión de grupo de alimentos</h6>
            </div>
            <div class="row">
              <div class="col">
                <div class="navbar justify-content-start">
                  <a class="btn btn-success" href="crearGrupoDeAlimento.php" role="button"><i class="fas fa-plus"></i>
                    Crear nuevo grupo</a>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered tableGrupos" id="dataTableAlimentos">
                  <thead class="thead-light">
                    <tr>
                      <th class="text-center">Nombre grupo</th>
                      <th class="text-center">Acciones</th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php
                    if ($nGrupo > 0) {
                      foreach ($gdbs as $gdb) {
                        echo ' <tr>
                        <td class="text-center">' . $gdb['nombres'] . '</td>
                        <td class="text-center">
                          <a class="btn btn-primary btn-sm" href="editarGrupoDeAlimento.php?editarGrupo=' . $gdb['idgrupos'] . '" role="button"><i
                              class="fas fa-edit"></i></a>
                          <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                            data-target="#deleteGroup' . $gdb['idgrupos'] . '">
                            <i class="fas fa-trash"></i>
                          </button>
                        </td>
                      </tr>';
                        echo '
                      <!-- deleteGroup Modal -->
                      <div class="modal fade" id="deleteGroup' . $gdb['idgrupos'] . '" tabindex="-1" role="dialog" aria-labelledby="deleteGroupLabel"
                        aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="deleteGroupLabel">Eliminar grupo de alimentos</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              ¿Está seguro que desea eliminar el grupo: <b> '.$gdb['nombres'].'</b>?
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                              <a type="button" href="gestionGrupoDeAlimentos.php?eliminarGrupo=' . $gdb['idgrupos'] . '" class="btn btn-danger">Borrar grupo de alimentos</a>
                            </div>
                          </div>
                        </div>
                      </div>
                      ';
                      }
                      unset($gdbs);
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