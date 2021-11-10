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




//TABLA grupos (ALL)-> gdbs[]
$gquery = mysqli_query($conect, "SELECT * FROM grupos ");
while ($gdb = $gquery->fetch_array()) {
  $gdbs[] = $gdb;
}

//Eliminar Alimento

//Eliminar Alimento
if (isset($_REQUEST['eliminarAlimento']) && !empty($_REQUEST['eliminarAlimento'])) {
  $idAlimentoEliminar = $_REQUEST['eliminarAlimento'];
  $queryAlimentoBorrar = mysqli_query($conect, "SELECT * FROM alimentos WHERE idalimentos='$idalimentos'");
  $dbAliBorrar = mysqli_fetch_assoc($queryAlimentoBorrar);
  $nombre = $$dbAliBorrar['nombre'];
  $nombrePerfil = $nombre . "falimento.jpg";
  $nombreP1 = $nombre . "porcion1.jpg";
  $nombreP2 = $nombre . "porcion2.jpg";
  $nombreP3 = $nombre . "porcion3.jpg";
  $nombreP4 = $nombre . "porcion4.jpg";
  $archFotoA="../../img/ImgAlimentos/".$nombrePerfil;
  $archFotoP1="../../img/ImgAlimentos/".$nombreP1;
  $archFotoP2="../../img/ImgAlimentos/".$nombreP2;
  $archFotoP3="../../img/ImgAlimentos/".$nombreP3;
  $archFotoP4="../../img/ImgAlimentos/".$nombreP4;
  //Eliminar alimento
  $deleteAlimento=mysqli_query($conect, "DELETE FROM alimentos WHERE idalimentos  ='$idAlimentoEliminar'");
  //Eliminar fotos
  unlink($archFotoA);
  unlink($archFotoP1);
  unlink($archFotoP2);
  unlink($archFotoP3);
  unlink($archFotoP4);
  if($deleteAlimento){
    header("Location:gestionAlimentos.php?eliminar=" . $idAlimentoEliminar . "exitoso");
  }else{
    header("Location:gestionAlimentos.php?eliminar=" . $idAlimentoEliminar . "Fallido");
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
  <link href="../../../css/sb-admin-2.css" rel="stylesheet">
  <link rel="stylesheet" href="../../../css/estilos.css">
  <title>SENAT | Gestión de alimentos</title>
  <script type='text/javascript'>
    function borrarAlimento() {
      var respuesta;

      if (respuesta == true) {
        return true;
      } else {
        return false;
      }
    }
  </script>
</head>

<body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">
    <!-- Sidebar Index -->
    <?php
    echo $menuAlimentos;
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
          <h1 class="h3 mb-2 text-gray-800">Gestión de alimentos</h1>
          <p class="mb-4">Busca, consulta y agrega nuevos alimentos al sistema. Si desea más información puede
            ver las <a target="_blank" href="#">instrucciones de uso</a>.</p>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Gestión de alimentos</h6>
            </div>
            <div class="row">
              <div class="col">
                <div class="navbar justify-content-start">
                  <a class="btn btn-success" href="crearAlimento.php" role="button"><i class="fas fa-plus"></i> Crear
                    alimento</a>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTableAlimentos" width="100%" cellspacing="0">
                  <thead class="thead-light">
                    <tr>
                      <th class="text-center">Nombre</th>
                      <th class="text-center">Grupo</th>
                      <th class="text-center">Energía (kcal)</th>
                      <th class="text-center">Grasa (g)</th>
                      <th class="text-center">H. Carbono (g)</th>
                      <th class="text-center">Proteína (g)</th>
                      <th class="text-center">Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    //Tabla alimentos(ALL) -> dbs[]
                    $dbquery = mysqli_query($conect, "SELECT * FROM alimentos");
                    $cantA = mysqli_num_rows($dbquery);
                    if ($cantA > 0) {
                      while ($db = $dbquery->fetch_array()) {
                        $dbs[] = $db;
                      }

                      foreach ($dbs as $db) {
                        if($db['estado']==1){

                        
                        echo '<tr>
                        <td class="text-center">' . $db['nombre'] . '</td>
                        <td class="text-center">' . $db['grupo'] . '</td>
                        <td class="text-center">' . $db['energia'] . '</td>
                        <td class="text-center">' . $db['grasa'] . '</td>
                        <td class="text-center">' . $db['hcarbono'] . '</td>
                        <td class="text-center">' . $db['proteina'] . '</td>
                        <td class="text-center">
                          <a class="btn btn-primary btn-sm" href="visualizarAlimento.php?idAlimento=' . $db['idalimentos'] . '" role="button"><i
                              class="fas fa-external-link-square-alt"></i></a>
                          <a class="btn btn-info btn-sm" href="editarAlimento.php?editarAlimento=' . $db['idalimentos'] . '" role="button"><i class="fas fa-edit"></i></a>
                          <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                            data-target="#borrarAlimentoModal' . $db['idalimentos'] . '" >
                            <i class="fas fa-trash"></i>
                          </button>
                        </td>
                      </tr>';
                        echo '<!-- Borrar alimento Modal-->
                      <div class="modal fade" id="borrarAlimentoModal' . $db['idalimentos'] . '" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                       aria-hidden="true">
                       <div class="modal-dialog" role="document">
                         <div class="modal-content">
                           <div class="modal-header">
                             <h5 class="modal-title" id="exampleModalLabel">Estás por borrar el alimento</h5>
                             <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                               <span aria-hidden="true">×</span>
                             </button>
                           </div>
                           <div class="modal-body">Estás seguro?</div>
                           <div class="modal-footer">
                             <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                             <a class="btn btn-danger" onclick="borrarAlimento()" href="gestionAlimentos.php?eliminarAlimento=' . $db['idalimentos'] . '">Estoy seguro, borralo</a>
                           </div>
                         </div>
                       </div>
                     </div>
                   ';
                      }
                      }
                      unset($dbs);
                    }
                    ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th class="text-center" colspan="7">Última actualización:</th>
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
      <?php echo $footer; ?>
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