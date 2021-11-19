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
$idUser=$dbUser['idusuario'];
if (isset($_REQUEST['idEncuesta']) && !empty($_REQUEST['idEncuesta'])) {
  $_SESSION['idEncuesta']=$_REQUEST['idEncuesta'];
}else{
  header("gestionEncuestas.php");
}
$idEncuesta=$_SESSION['idEncuesta'];
//Descripción de la encuesta
$queryEnc=mysqli_query($conect,"SELECT * FROM encuesta WHERE idencuesta='$idEncuesta'");
$dbEncuesta=mysqli_fetch_assoc($queryEnc);
$nombreEncuesta=$dbEncuesta['nombre'];

//Tabla encuesta-frecuencia
$queryFrecEnc=mysqli_query($conect,"SELECT * FROM encuestafrecuencia WHERE idencuesta='$idEncuesta'");
$cantFrecEnc=mysqli_num_rows($queryFrecEnc);
if($cantFrecEnc!=0){
  while($dbFrecEnc=$queryFrecEnc->fetch_assoc()){
    $dbFrecEncS[]=$dbFrecEnc;
  }
}
//Tabla alimento-encuesta
$queryAliEnc=mysqli_query($conect,"SELECT * FROM alimentoencuesta WHERE idencuesta='$idEncuesta'");
$cantAliEnc=mysqli_num_rows($queryAliEnc);
if($cantAliEnc!=0){
  while($dbAliEnc=$queryAliEnc->fetch_assoc()){
    $dbAliEncS[]=$dbAliEnc;
  }
}
//Recepción del formulario de RESPUESTA
if (isset($_REQUEST['edad']) && !empty($_REQUEST['edad'])) {  
  $edad=$_REQUEST['edad'];
  $sexo=$_REQUEST['sexo'];
  $insertEncuestado=mysqli_query($conect, "INSERT INTO encuestado VALUES(NULL, '$idUser', '$idEncuesta', '$edad', '$sexo')");
  if ($insertEncuestado) {
    $queryLastEncuestado = mysqli_query($conect, "SELECT MAX(idencuestado) FROM encuestado ");
    $rowE = mysqli_fetch_row($queryLastEncuestado);
    $idLastEncuestado = $rowE[0];
    
    //Carga de alimentos
    $queryA = mysqli_query($conect, "SELECT * FROM alimentos");
    $cantAlimentos = mysqli_num_rows($queryA);
    if ($cantAlimentos > 0) {
      while ($dbA = $queryA->fetch_assoc()) {
        $dbAs[] = $dbA;
      }
      foreach ($dbAs as $dbA) {
        $idA = $dbA['idalimentos'];
        for($i=1; $i<=4; $i++){
          $porcion='porcion'.$i;
          if (isset($_REQUEST[$porcion . $idA]) && !empty($_REQUEST[$porcion . $idA])) {
            $idporcion=$_REQUEST[$porcion . $idA];
            $idfrecuencia=$_REQUEST['frecEncuesta'.$idA];
            $idEncuestado=$idLastEncuestado;

            mysqli_query($conect, "INSERT INTO respuestas VALUES(NULL, '$idEncuestado', '$idA', '$idfrecuencia', '$idporcion') ");
          }
          
        }
      
      }unset($dbAs);
    }
  }else{
    header("Location:gestionEncuestas.php?CargaEncuestado=Fallida");
  }
  header("Location:gestionEncuestas.php?CargaEncuestado=".$idLastEncuestado);
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
  <title>SENAT | Encuesta Activa</title>
</head>

<body id="page-top">

  <!-- Contenedor principal -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php
    echo $menuEncuestas;
    ?>

    <!-- Contenedor de la section -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Contenido principal de la section -->
      <div id="content">

        <!-- Navbar -->
        <?php
        echo $navbar;
        ?>

        <!-- Contenido de la section -->
        <div class="container-fluid">

          <!-- Cabecera de la section -->
          <h1 class="h3 mb-2 text-gray-800">Encuesta en curso</h1>
          <p class="mb-4">Complete el cuestionario con los datos correspondientes. <a href="#">Ver información de como completar cuestionario.</a></p>
          <form action="visualizacionEncuesta.php" method="POST" enctype="multipart/form-data" id="formVisualizarEncuesta">

            <div class="card shadow mb-4">
              <div class="row m-3 justify-content-center">
                <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                  <h1 class="tituloEncuestaCuestionario"><?php echo $nombreEncuesta; ?></h1>
                </div>
              </div>
            </div>

            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Datos del encuestado</h6>
              </div>
              <div class="row m-3 justify-content-center">
                <div class="col-lg-3">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-dark text-light labelMacroMicroNut" id="basic-addon1">Edad</span>
                    </div>
                    <input type="number" name="edad" class="form-control" placeholder="Edad..." aria-label="edad" aria-describedby="basic-addon1" required>
                  </div>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-dark text-light labelMacroMicroNut" id="basic-addon1">Sexo</span>
                    </div>
                    <div>
                      <select class="custom-select" name="sexo" id="inputGroupSelect01" title="Sexo" required>
                        <option selected disabled value="">Elija sexo...</option>
                        <option value="femenino">Femenino</option>
                        <option value="masculino">Masculino</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Cuestionario -->
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Encuesta en curso</h6>
              </div>
              <div class="row m-3 justify-content-center">

                <div class="col-lg-12 col-md-12 col-sm-12">
                  
                  <?php
                  
                  if($cantAliEnc!=0){
                    
                   foreach($dbAliEncS as $dbAliEnc){
                     $idAlimento=$dbAliEnc['idalimento'];
                     $queryAli=mysqli_query($conect, "SELECT * FROM alimentos WHERE idalimentos='$idAlimento'");
                     $dbAlimento=mysqli_fetch_assoc($queryAli);
                     $nombreAli=$dbAlimento['nombre'];
                    echo '
                    <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                      <h1 class="tituloEncuestaCuestionario">'.$nombreAli.'</h1>
                    </div>';
                    for($i=1; $i<=4; $i++){
                      $porcion='porcion'.$i;
                      $dbAlimento[$porcion];
                      if($dbAlimento[$porcion]!=0){
                      $fotoPorcion='../../img/ImgPorciones/'.$dbAlimento['nombre'].$porcion.'.jpg';
                      $valuePorcion=$dbAlimento[$porcion];
                     
                      echo '
                      <div class="seleccionPorciones">
                      <div class="porcSel">
                        <input type="radio" id="porcNro1" name="'.$porcion.$idAlimento.'" value="'.$valuePorcion.'">
                        <label for="porcNro1">
                          <a href="'.$fotoPorcion.'" data-lightbox="photos">
                            <img class="imgPorcSel" src="'.$fotoPorcion.'" alt="foodImage">
                          </a>
                        </label>
                      </div>
                      ';
                      }
                    }
                    
                    
                    
                    
                    echo '
                    </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 selectorFrecCuestionario">
                    <div class="alimento__dataInicial">
                    <h3>Frecuencia de ingesta</h3>
                    </div>
                <div id="radio_frec" class="text-start">';
                
                foreach($dbFrecEncS as $dbFrecEnc){
                  $idFrec=$dbFrecEnc['idfrecuencia'];
                  $queryFrec=mysqli_query($conect, "SELECT * FROM frecuencias WHERE idfrecuencia='$idFrec'");
                  $dbFrec=mysqli_fetch_assoc($queryFrec);  
                  
                  echo '
                  <div class="form-check">
                  <input class="form-check-input" name="frecEncuesta'.$idAlimento.'" type="radio" value="'.$dbFrec['valorfrec'].'" id="frec_nunca">
                  <label class="form-check-label" for="frec_nunca">
                  '.$dbFrec['nombrefrec'].'
                  </label>
                  </div>';
                }
                
                echo '    
                
                </div>
                </div> <!-- End pregunta -->
                </div> <!-- End row -->
                
                <hr> <!-- Separador de alimentos -->
                
                ';
              }unset($dbAliEncS); 
            }
            ?>
              <!-- Botonera -->
              <div class="row m-3 justify-content-center">
                <div class="col-lg-12 col-md-12 col-sm-12">
                  <div class="buttons__AlimentoAlta">
                    <a class="btn btn-outline-danger m-2" href="gestionEncuestas.php">Cancelar</a>
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