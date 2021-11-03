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
//Usuario a Editar  
if (isset($_REQUEST['visualizarUsuario']) && !empty($_REQUEST['visualizarUsuario'])) {
  $_SESSION['visualizarUsuario'] = $_REQUEST['visualizarUsuario'];
}
$idUsuarioEdit = $_SESSION['visualizarUsuario'];
$userEditQuery = mysqli_query($conect, "SELECT * FROM usuario WHERE idusuario='$idUsuarioEdit'");
$userEdit = mysqli_fetch_assoc($userEditQuery);
//ROL
if ($userEdit['rol'] == 1) {
  $rol = 'Administrador';
} else {
  $rol = 'Nutricionista';
}
//ESTADO
if ($userEdit['estado'] == 1) {
  $estado = 'Activo';
} else {
  $estado = 'Inactivo';
}

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
  <link href="../../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="../../../css/sb-admin-2.min.css" rel="stylesheet">
  <link href="../../../css/estilos.css" rel="stylesheet">
  <title>SENAT | Visualización de usuario</title>
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
          <h1 class="h3 mb-2 text-gray-800">Visualización de usuario</h1>
          <p class="mb-4">Se muestran los datos correspondientes al Usuario. Si desea más información puede
            ver las <a target="_blank" href="#">instrucciones de uso</a>.</p>

          <!-- Tabla usuarios Start -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Visualización de usuario</h6>
            </div>
            <form action="editarUsuario.php" method="POST" enctype="multipart/form-data" class="form-inline d-flex flex-column align-items-center">
              <div class="row m-3 justify-content-center">
                <div class="col-lg-4 col-md-4 col-sm-12">
                  <div class="alimento__fotoPrincipal">
                    <h3>Foto de perfil</h3>
                    <img src="../../img/ImgUsuarios/<?php echo $userEdit['dni']; ?>.jpg" width="350" class="img-fluid rounded mb-2" alt="foodImage">
                  </div>
                </div>
                <div class="col-lg-8 col-md-4 col-sm-12">
                  <div class="alimento__dataInicial">
                    <h3>Datos del usuario</h3>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-dark text-light labelMacroMicroNut" id="basic-addon1" title="Documento de identidad">DNI</span>
                      </div>
                      <input disabled type="number" class="form-control" placeholder="Ingrese su DNI..." aria-describedby="basic-addon1" name="dni" title="DNI (sin puntos ni espacios)" value="<?php echo $userEdit['dni']; ?>">
                    </div>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-dark text-light labelMacroMicroNut" id="basic-addon1">Nombre</span>
                      </div>
                      <input disabled type="text" class="form-control" placeholder="Ingrese su nombre..." aria-describedby="basic-addon1" name="nombre" value="<?php echo $userEdit['nombre']; ?>">
                    </div>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-dark text-light labelMacroMicroNut" id="basic-addon1">Apellido</span>
                      </div>
                      <input disabled type="text" class="form-control" placeholder="Ingrese su apellido..." aria-describedby="basic-addon1" name="apellido" value="<?php echo $userEdit['apellido']; ?>">
                    </div>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-dark text-light labelMacroMicroNut" id="basic-addon1">Correo</span>
                      </div>
                      <input disabled type="email" class="form-control" placeholder="Ingrese su correo..." aria-describedby="basic-addon1" name="correo" value="<?php echo $userEdit['correo']; ?>">
                    </div>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-dark text-light labelMacroMicroNut" id="basic-addon1">Rol</span>
                      </div>
                      <select disabled name="rol" class="custom-select" id="inputGroupSelect01">
                        <option disabled>Seleccione...</option>
                        <option selected value="<?php echo $userEdit['rol']; ?>"><?php echo $rol; ?></option>
                        <?php
                        if ($rol == 'Nutricionista') {
                          echo '<option value="1">Administrador</option>';
                        }
                        if ($rol == 'Administrador') {
                          echo '<option value="2">Nutricionista</option>';
                        }
                        ?>
                      </select>
                    </div>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-dark text-light labelMacroMicroNut" id="basic-addon1">Estado</span>
                      </div>
                      <div>
                        <select disabled name="estado" class="custom-select inputCantGeneral" id="inputGroupSelect01">
                          <option disabled>Seleccione...</option>
                          <option selected value="<?php echo $userEdit['estado']; ?>"><?php echo $estado; ?></option>
                          <?php
                          if ($estado == 'Activo') {
                            echo '<option value="0">Inactivo</option>';
                          }
                          if ($estado == 'Inactivo') {
                            echo '<option value="1">Activo</option>';
                          }
                          ?>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row m-3 justify-content-center">
                <div class="col-lg-12 col-md-12 col-sm-12">
                  <div class="buttons__AlimentoAlta">
                    <a class="btn btn-outline-secondary m-2" href="gestionUsuarios.php" role="button">Volver</a>
                    <a class="btn btn-danger m-2" href="#" data-toggle="modal" data-target="#deleteUser" role="button">Eliminar usuario</a>
                  </div>
                </div>
              </div>
          </div>
        </div>
        </form>
        <!-- Carga usuarios End -->
        <!-- End content -->
      </div>
      <!-- Footer -->
      <?php
      echo $footer;
      ?>
      <!-- End of Footer -->
    </div>
  </div>

  <!-- deleteUser Modal -->
  <div class="modal fade" id="deleteUser" tabindex="-1" role="dialog" aria-labelledby="deleteGroupLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deleteGroupLabel">Eliminar usuario</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          ¿Está seguro que desea eliminar el usuario seleccionado?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <a type="button" class="btn btn-danger" href="gestionUsuarios.php?eliminarUsuario=<?php $userEdit['idusuario']; ?>">Borrar usuario</a>
        </div>
      </div>
    </div>
  </div>
  ';

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
  <script src="../../../js/helpers.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../../../js/sb-admin-2.min.js"></script>

</body>

</html>