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

//Datos del usuario desde Tabla usuarios a traves de dni(Variable de Session) -> a
$u = $_SESSION['user'];
$queryUser = mysqli_query($conect, "SELECT * FROM usuario WHERE dni='$u'");
$dbUser = mysqli_fetch_assoc($queryUser);
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
  <title>SENAT | Reportes</title>
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
          <h1 class="h3 mb-2 text-gray-800">Reportes</h1>
          <p class="mb-4">Busca y consulta los últimos reportes de las encuestas realizadas. Si desea más información
            puede
            ver las <a target="_blank" href="#">instrucciones de uso</a>.</p>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Reportes</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTableAlimentos" width="100%" cellspacing="0">
                  <thead class="thead-light">
                    <tr>
                      <th class="text-center">Nombre</th>
                      <th class="text-center">Descripción</th>
                      <th class="text-center">Fecha de creación</th>
                      <th class="text-center">Cantidad de entradas</th>
                      <th class="text-center">Descargar</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $queryEncuentasFinalizadas = mysqli_query($conect, "SELECT * FROM encuesta WHERE estado=2");

                    if (mysqli_num_rows($queryEncuentasFinalizadas) != 0) {
                      while ($dbEncFin = $queryEncuentasFinalizadas->fetch_assoc()) {
                        $dbEncFinS[] = $dbEncFin;
                      }
                      foreach ($dbEncFinS as $dbEncFin) {
                        $idEncFin = $dbEncFin['idencuesta'];
                        $queryRep = mysqli_query($conect, "SELECT * FROM encuestado WHERE idencuesta='$idEncFin'");
                        $contResp = mysqli_num_rows($queryRep);
                        echo '
                    <tr>
                      <td class="text-center">' . $dbEncFin['nombre'] . '</td>
                      <td class="text-center">' . $dbEncFin['descripcion'] . '</td>
                      <td class="text-center">' . $dbEncFin['fechacreacion'] . '</td>
                      <td class="text-center">' . $contResp . '</td>
                      <td class="text-center">
                        <a class="btn btn-success btn-sm" href="reporte.php?imprimirReporte=' . $idEncFin . '" role="button"><i class="fas fa-file-download"></i></a>
                      </td>
                    </tr>
                  
                  ';
                      }
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

  <!-- deleteReport Modal -->
  <div class="modal fade" id="deleteReport" tabindex="-1" role="dialog" aria-labelledby="deleteReportLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deleteReportLabel">Eliminar reporte</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          ¿Está seguro que desea eliminar el reporte seleccionado?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <button type="button" class="btn btn-danger">Borrar reporte</button>
        </div>
      </div>
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