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

$queryEncuestas = mysqli_query($conect, "SELECT * FROM encuesta");
$numEnc = mysqli_num_rows($queryEncuestas);
if ($numEnc > 0) {
  while ($dbE = $queryEncuestas->fetch_assoc()) {
    $dbEs[] = $dbE;
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
  <link href="../../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="../../../css/sb-admin-2.min.css" rel="stylesheet">
  <link href="../../../css/estilos.css" rel="stylesheet">
  <title>SENAT | Gestión de encuestas</title>
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Comienzo del Sidebar -->
    <?php
    echo $menuEncuestas;
    ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <?php
        echo $navbar;
        ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Gestión de encuestas</h1>
          <p class="mb-4">Busca, consulta y crea nuevas encuestas al sistema. Si desea más información puede
            ver las <a target="_blank" href="#">instrucciones de uso</a>.</p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Gestión de encuestas</h6>
            </div>

            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTableAlimentos" width="100%" cellspacing="0">
                  <thead class="thead-light">
                    <tr>
                      <th class="text-center">Nombre</th>
                      <th class="text-center">Descripción</th>
                      <th class="text-center">Fecha de creación</th>
                      <th class="text-center">Fecha últ. modif.</th>
                      <th class="text-center">Creado por</th>
                      <th class="text-center">Estado</th>
                      <th class="text-center">Acciones</th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php
                    foreach ($dbEs as $dbE) {
                      $idCreador=$dbE['idusuario'];
                      $creadorquery=mysqli_query($conect, "SELECT * FROM usuario WHERE idusuario='$idCreador'");
                      $dbCreador=mysqli_fetch_assoc($creadorquery);
                      $nombreC=$dbCreador['nombre'];
                      $apellidoC=$dbCreador['apellido'];
                      if($dbE['estado']==0){
                        $estado='Borrador';
                      }
                      if($dbE['estado']==1){
                        $estado='Activa';
                      }  
                      if($dbE['estado']==2){
                        $estado='Finalizada';
                      }      
                      echo '
                    
                    <tr>
                      <td class="text-center">' . $dbE['nombre'] . '</td>
                      <td class="text-center">' . $dbE['descripcion'] . '</td>
                      <td class="text-center">' . $dbE['fechacreacion'] . '</td>
                      <td class="text-center">' . $dbE['fechaumod'] . '</td>
                      <td class="text-center">' . $nombreC .' '.$apellidoC.'</td>
                      <td class="text-center">' . $estado . '</td>
                      <td class="text-center">
                          <a title="Pasar a estado Activa" class="btn btn-primary btn-sm" href="gestionEncuestas.php?activar='.$dbE['idencuesta'].'" role="button"><i class="fas fa-external-link-square-alt"></i></a>
                          <a title="Editar" class="btn btn-info btn-sm" href="editarEncuesta.php?editarEncuesta='.$dbE['idencuesta'].'" role="button"><i class="fas fa-edit"></i></a>
                          <a title="Comenzar encuesta" class="btn btn-info btn-sm" href="gestionEncuestas.php?idEncuesta='.$dbE['idencuesta'].'" role="button"><i class="fas fa-edit"></i></a>
                          <a title="Pasar a estado Finalizada" class="btn btn-info btn-sm" href="gestionEncuestas.php?finalizar='.$dbE['idencuesta'].'" role="button"><i class="fas fa-edit"></i></a>
                          <button title="Eliminar encuesta" type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#borrarAlimentoModal' . $dbE['idencuesta'] . '" ><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>';
                    }
                    unset($dbEs);
                    ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <td class="text-center" colspan="7">Última actualización el 24/05/2021 a las
                        23:11 pm.</td>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>
          </div> <!-- End card -->
        </div> <!-- End container -->
        <!-- Footer -->
        <?php echo $footer; ?>
        <!-- End of Footer -->
      </div> <!-- End content -->
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