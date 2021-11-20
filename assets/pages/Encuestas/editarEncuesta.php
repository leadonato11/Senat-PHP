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
$idUser = $a['idusuario'];
if (isset($_REQUEST['editarEncuesta']) && !empty($_REQUEST['editarEncuesta'])) {
  $_SESSION['editarEncuesta']=$_REQUEST['editarEncuesta'];
}else{
  header("gestionEncuestas.php");
}
$idEncuesta=$_SESSION['editarEncuesta'];
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


              //Frecuencias por defecto
                $nunca='';
                $menosDeUnaVezSemana='';
                $unaVezSemana='';
                $dosAtresVecesSemana='';
                $cuatroAseisVecesSemana='';
                $diariamente='';
                $masDeUnaVezDia='';
                for ($k = 1; $k <= 7; $k++) {
                $frec[$k]=0;
                }
                foreach($dbFrecEncS as $dbFrecEnc){
                  if($dbFrecEnc['idfrecuencia']==1){
                    $nunca='checked';
                    $frec[1]=1;
                  }
                  if($dbFrecEnc['idfrecuencia']==2){
                    $menosDeUnaVezSemana='checked';
                    $frec[2]=1;
                  }
                  if($dbFrecEnc['idfrecuencia']==3){
                    $unaVezSemana='checked';
                    $frec[3]=1;
                  }
                  if($dbFrecEnc['idfrecuencia']==4){
                    $dosAtresVecesSemana='checked';
                    $frec[4]=1;
                  }
                  if($dbFrecEnc['idfrecuencia']==5){
                    $cuatroAseisVecesSemana='checked';
                    $frec[5]=1;
                  }
                  if($dbFrecEnc['idfrecuencia']==6){
                    $diariamente='checked';
                    $frec[6]=1;
                  }
                  if($dbFrecEnc['idfrecuencia']==7){
                    $masDeUnaVezDia='checked';
                    $frec[7]=1;
                  }
                }unset($dbFrecEncS);
              
if (isset($_REQUEST['nombre']) && !empty($_REQUEST['nombre'])) {
  $nombre = $_REQUEST['nombre'];
  $descripcion = $_REQUEST['descripcion'];

 //Frecuencias por defecto
 $nunca='';
 $menosDeUnaVezSemana='';
 $unaVezSemana='';
 $dosAtresVecesSemana='';
 $cuatroAseisVecesSemana='';
 $diariamente='';
 $masDeUnaVezDia='';
 for ($k = 1; $k <= 7; $k++) {
 $frec[$k]=0;
 }
 $queryFrecEnc=mysqli_query($conect,"SELECT * FROM encuestafrecuencia WHERE idencuesta='$idEncuesta'");
$cantFrecEnc=mysqli_num_rows($queryFrecEnc);
if($cantFrecEnc!=0){
  while($dbFrecEnc=$queryFrecEnc->fetch_assoc()){
    $dbFrecEncS[]=$dbFrecEnc;
  }
  

 foreach($dbFrecEncS as $dbFrecEnc){
   if($dbFrecEnc['idfrecuencia']==1){
     $nunca='checked';
     $frec[1]=1;
   }
   if($dbFrecEnc['idfrecuencia']==2){
     $menosDeUnaVezSemana='checked';
     $frec[2]=1;
   }
   if($dbFrecEnc['idfrecuencia']==3){
     $unaVezSemana='checked';
     $frec[3]=1;
   }
   if($dbFrecEnc['idfrecuencia']==4){
     $dosAtresVecesSemana='checked';
     $frec[4]=1;
   }
   if($dbFrecEnc['idfrecuencia']==5){
     $cuatroAseisVecesSemana='checked';
     $frec[5]=1;
   }
   if($dbFrecEnc['idfrecuencia']==6){
     $diariamente='checked';
     $frec[6]=1;
   }
   if($dbFrecEnc['idfrecuencia']==7){
     $masDeUnaVezDia='checked';
     $frec[7]=1;
   }
 }unset($dbFrecEncS);
}
  $editarEncuesta = mysqli_query($conect, "UPDATE encuesta SET nombre='$nombre', descripcion='$descripcion' WHERE idencuesta='$idEncuesta'");
  
    //Editar frecuencias
    for ($i = 1; $i <= 7; $i++) {
      if (isset($_REQUEST['frecuencia' . $i]) && !empty($_REQUEST['frecuencia' . $i])) {
        if($frec[$i]==0){
          $idFrec = $i;
          mysqli_query($conect, "INSERT INTO encuestafrecuencia VALUES(NULL, '$idFrec', '$idEncuesta') ");
        }
      }else{
        if($frec[$i]==1){
          $idFrec = $i;
          mysqli_query($conect, "DELETE FROM encuestafrecuencia WHERE idencuesta='$idEncuesta' AND idfrecuencia='$idFrec'");
        }
      }
    }
    

    //Carga de alimentos
    $queryA = mysqli_query($conect, "SELECT * FROM alimentos");
    $cantAlimentos = mysqli_num_rows($queryA);
    if ($cantAlimentos > 0) {
      while ($dbA = $queryA->fetch_assoc()) {
        $dbAs[] = $dbA;
      }
      foreach ($dbAs as $dbA) {
        //Tabla alimento-encuesta
        $queryAliEnc=mysqli_query($conect,"SELECT * FROM alimentoencuesta WHERE idencuesta='$idEncuesta'");
        $cantAliEnc=mysqli_num_rows($queryAliEnc);
        if($cantAliEnc!=0){
        while($dbAliEnc=$queryAliEnc->fetch_assoc()){
          $dbAliEncS[]=$dbAliEnc;
        }
        $idA = $dbA['idalimentos'];
        $alimento[$idA]=0;
                
        foreach($dbAliEncS as $dbAliEnc){
          $idAliEnc=$dbAliEnc['idalimentoencuesta'];
          if($idA==$dbAliEnc['idalimento']){
            $alimento[$idA]=1;
          }
        }unset($dbAliEncS);
        } 
        if (isset($_REQUEST['alimento' . $idA]) && !empty($_REQUEST['alimento' . $idA])) {
          if($alimento[$idA]==0){
           mysqli_query($conect, "INSERT INTO alimentoencuesta VALUES(NULL, '$idEncuesta', '$idA') ");
          }
        }else{
          if($alimento[$idA]==1){
            mysqli_query($conect, "DELETE FROM alimentoencuesta WHERE idencuesta='$idEncuesta' AND idalimento='$idA'");
          }
        }
      }
      unset($dbAs);
    }
  
  header("Location:gestionEncuestas.php?idEnc=" . $idEncuesta);
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
  <title>SENAT | Crear encuesta</title>
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar Index -->
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
          <h1 class="h3 mb-2 text-gray-800">Crear nueva encuesta</h1>
          <p class="mb-4">Complete los campos de abajo con la información de la encuesta</p>

          <!-- Tabla Alimentos -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Crear nueva encuesta</h6>
            </div>
            <form>
              <div class="row m-3 justify-content-center">
                <div class="col-lg-8 col-md-4 col-sm-12">
                  <div class="alimento__dataInicial">
                    <h3>Datos de la encuesta</h3>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-dark text-light labelMacroMicroNut" id="basic-addon1">Nombre</span>
                      </div>
                      <input type="text" class="form-control" placeholder="Nombre de la encuesta..." aria-label="nombreAlimento" aria-describedby="basic-addon1" name="nombre" value="<?php echo $nombreEncuesta; ?>" required>
                    </div>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-dark text-light labelMacroMicroNut" id="basic-addon1">Descripción</span>
                      </div>
                      <textarea class="form-control" aria-label="descripcionEncuesta" aria-describedby="basic-addon1" name="descripcion" id="" cols="20" rows="5" name="descripcion" placeholder="Descripción de la encuesta..." required><?php echo $dbEncuesta['descripcion']; ?></textarea>
                    </div>
                  </div>
                </div>
              </div>
              
              <div class="row m-3 justify-content-center">
                <div class="col-lg-8 col-md-4 col-sm-12">
                  <div class="alimento__dataInicial">
                    <h3>Información para el cuestionario</h3>
                    <h4>Selector de frecuencia</h4>
                    <p>Indique qué frecuencias desea que figuren en el cuestionario (2 como mínimo)</p>
                    <div id="checkbox_frec" class="text-left">
                      <div class="form-check">
                        <input class="form-check-input" name="frecuencia1" type="checkbox" value="1" id="frec_nunca" <?php echo $nunca; ?>>
                        <label class="form-check-label" for="frec_nunca">
                          Nunca
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" name="frecuencia2" type="checkbox" value="2" id="frec_menosUnaVezPorSemana" <?php echo $menosDeUnaVezSemana; ?>>
                        <label class="form-check-label" for="frec_menosUnaVezPorSemana">
                          Menos de 1 vez por semana
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" name="frecuencia3" type="checkbox" value="3" id="frec_unaVezPorSemana" <?php echo $unaVezSemana; ?>>
                        <label class="form-check-label" for="frec_unaVezPorSemana">
                          1 vez por semana
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" name="frecuencia4" type="checkbox" value="4" id="frec_dosTresVecesPorSemana" <?php echo $dosAtresVecesSemana; ?>>
                        <label class="form-check-label" for="frec_dosTresVecesPorSemana">
                          2-3 veces por semana
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" name="frecuencia5" type="checkbox" value="5" id="frec_cuatroSeisVecesPorSemana" <?php echo $cuatroAseisVecesSemana; ?>>
                        <label class="form-check-label" for="frec_cuatroSeisVecesPorSemana">
                          4-6 veces por semana
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" name="frecuencia6" type="checkbox" value="6" id="frec_diariamente" <?php echo $diariamente; ?>>
                        <label class="form-check-label" for="frec_diariamente">
                          Diariamente
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" name="frecuencia7" type="checkbox" value="7" id="frec_masDeUnaVezAlDia" <?php echo $masDeUnaVezDia; ?>>
                        <label class="form-check-label" for="frec_masDeUnaVezAlDia">
                          Más de 1 vez al día
                        </label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row m-3 justify-content-center">
                <div class="col-lg-8 col-md-4 col-sm-12">
                  <div class="alimento__dataInicial">
                    <h3>Alimentos para el cuestionario</h3>
                    <p>Indique qué alimentos formarán parte del cuestionario (2 como mínimo)</p>
                    <div class="text-left">
                      <div class="card-body">
                        <div class="table-responsive">
                          <table class="table table-bordered" id="dataTableAlimentos" width="100%" cellspacing="0">
                            <thead class="thead-light">
                              <tr>
                                <th class="text-center">Nombre</th>
                                <th class="text-center">Grupo</th>
                                <th class="text-center">Seleccionar</th>
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
                                  $id=$db['idalimentos'];
                                  
                                    $checked='';
                                    //Tabla alimento-encuesta
                                    $queryAliEnc=mysqli_query($conect,"SELECT * FROM alimentoencuesta WHERE idencuesta='$idEncuesta'");
                                    $cantAliEnc=mysqli_num_rows($queryAliEnc);
                                    if($cantAliEnc!=0){
                                      while($dbAliEnc=$queryAliEnc->fetch_assoc()){
                                        $dbAliEncS[]=$dbAliEnc;
                                      }
                                    
                                      foreach($dbAliEncS as $dbAliEnc){
                                        if($id==$dbAliEnc['idalimento']){
                                          $checked='checked';
                                        }
                                    }unset($dbAliEncS);
                                    }
                                
                                  echo '<tr><td class="text-center">' . $db['nombre'] . '</td>
                                  <td class="text-center">' . $db['grupo'] . '</td>
                                  <td class="text-center">
                                    <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="alimento' . $db['idalimentos'] . '" value="' . $db['idalimentos'] . '" '.$checked.'>

                                    </div>
                                  </td></tr>';
                                }
                                unset($dbs);
                              }
                              ?>

                            </tbody>
                          </table>

                        </div> <!-- End Table -->

                        <!-- Divider -->
                        <hr class="sidebar-divider my-0">

                        <!-- Botonera -->
                        <div class="row m-3 justify-content-center">
                          <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="buttons__AlimentoAlta">
                              <a href="gestionEncuestas.php" id="salirDeCrearEncuestaModal" class="btn btn-outline-danger m-2" data-toggle="modal" data-target="#salirCrearEncuestaModal" role="button">Cancelar</a>
                              <a href="#" id="guardarEncuesta" class="btn btn-success m-2" data-toggle="modal" data-target="#guardarEncuestaModal" role="button">Guardar encuesta</a>
                            </div>
                          </div>
                        </div> <!-- Fin Botonera -->

                        <!-- Guardar alimento Modal-->
                        <div class="modal fade" id="guardarEncuestaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Se guardarán los datos de la encuesta</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">×</span>
                                </button>
                              </div>
                              <div class="modal-body">Estás seguro?</div>
                              <div class="modal-footer">
                                <a class="btn btn-secondary" 1 data-dismiss="modal">Cancelar</a>
                                <button type="submit" class="btn btn-success">Si, guardar encuesta</button>
                              </div>
                            </div>
                          </div>
                        </div>

                        <!-- Salir de crear encuesta Modal-->
                        <div class="modal fade" id="salirCrearEncuestaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Se perderán los datos de la encuesta creada</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">×</span>
                                </button>
                              </div>
                              <div class="modal-body">Estás seguro?</div>
                              <div class="modal-footer">
                                <button class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                <a href="gestionEncuestas.php" class="btn btn-danger" role="button">Si, volver</a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div> <!-- End Card body -->
                    </div> <!-- End content -->
                  </div>
                </div>
              </div> <!-- End row -->
            </form>
          </div>
        </div>
        <!-- Footer -->
        <?php
        echo $footer;
        ?>
        <!-- End of Footer -->
      </div>
    </div> <!-- Fin alta de encuesta -->
  </div> <!-- End wrapper -->

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