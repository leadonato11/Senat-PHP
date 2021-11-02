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

//Editar  
if (isset($_REQUEST['editarGrupo']) && !empty($_REQUEST['editarGrupo'])) {
  $_SESSION['editarGrupo'] = $_REQUEST['editarGrupo'];
}
$idGrupo = $_SESSION['editarGrupo'];
//Grupo
$grupoQuery = mysqli_query($conect, "SELECT * FROM grupos WHERE idgrupos='$idGrupo'");
$grupo = mysqli_fetch_assoc($grupoQuery);
$nombreGrupo = $grupo['nombres'];
//TABLA grupos (ALL)-> gdbs[]
$gquery = mysqli_query($conect, "SELECT * FROM grupos ");
while ($gdb = $gquery->fetch_array()) {
  $gdbs[] = $gdb;
}
//Edicion VALIDADA	
if (isset($_REQUEST['nombreGrupo']) && !empty($_REQUEST['nombreGrupo'])) {
  $n = $_REQUEST['nombreGrupo'];

  $validar = true;

  foreach ($gdbs as $gdb) {
    if (strcasecmp($n, $gdb['nombres']) == 0 && strcasecmp($n, $nombreGrupo) != 0) {
      $validar = false;
    }
  }
  unset($gbds);

  //carga
  if ($validar == false) {
    echo "<script>alert('Ya se registro un grupo con este nombre.')</script>";
  } else {
    $insert = mysqli_query($conect, "UPDATE grupos SET nombres='$n' WHERE idgrupos='$idGrupo'");
    if ($insert == 1) {
      header("Location:gestionGrupoDeAlimentos.php?editarNuevoGrupo=Exitosa");
    } else {
      header("Location:gestionGrupoDeAlimentos.php?editarNuevoGrupo=HuboUnError" . $n . $idGrupo);
    }
  }
}

//BAJA (Sólo de la tabla Grupos)
if (isset($_REQUEST['e'])) {
  mysqli_query($conect, "DELETE FROM grupos WHERE idgrupos='" . $_REQUEST['e'] . "'");
  header("Location:grupos.php");
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
  <link href="../../../css/sb-admin-2.min.css" rel="stylesheet">
  <link href="../../../css/estilos.css" rel="stylesheet">
  <title>SENAT | Editar grupo de alimentos</title>
</head>

<body id="page-top">

  <!-- Contenedor principal -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php
    echo $menuGrupoDeAlimentos;
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
          <h1 class="h3 mb-2 text-gray-800">Agregar nuevo grupo de alimentos</h1>
          <p class="mb-4">Rellena los campos de abajo con la información del grupo del alimento</p>

          <!-- Tabla Alimentos -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Agregar nuevo grupo de alimentos</h6>
            </div>
            <div class="row m-3 justify-content-center">
              <div class="col-lg-8 col-md-4 col-sm-12">
                <div class="alimento__dataInicial">
                  <form action="editarGrupoDeAlimento.php" class="form-inline d-flex flex-column align-items-center">
                    <h3>Datos del grupo de alimentos</h3>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-dark text-light labelMacroMicroNut" id="basic-addon1">Nombre</span>
                      </div>
                      <input type="text" name="nombreGrupo" class="form-control" placeholder="Nombre del grupo..." aria-label="nombreAlimento" aria-describedby="basic-addon1" value="<?php echo $grupo['nombres']; ?>">
                    </div>
                </div>
              </div>
            </div>
            <!-- Botonera -->
            <div class="row m-3 justify-content-center">
              <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="buttons__AlimentoAlta">
                  <a class="btn btn-outline-danger m-2" href="gestionGrupoDeAlimentos.php">Cancelar</a>
                  <button class="btn btn-success m-2">Guardar cambios</button>
                </div>
              </div>
            </div> <!-- Fin Botonera -->
            </form>
          </div>
        </div> <!-- Fin alta de grupos -->
      </div>
      <!-- Footer -->
      <?php
      echo $footer;
      ?>
      <!-- End of Footer -->
    </div>
  </div> <!-- Fin Contenedor principal -->

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