<?php
include("includes/conectar.php");
session_start();
if (isset($_REQUEST['u']) && !empty($_REQUEST['u'])) {
  $u = $_REQUEST['u'];
  $p = $_REQUEST['p'];
  $res = mysqli_query($conect, "SELECT * FROM usuario WHERE dni='$u' AND clave='$p'");
  if (mysqli_num_rows($res) == 1) {
    $a = mysqli_fetch_assoc($res);
    $_SESSION['user'] = $u;
    header("Location:assets/pages/Dashboard/dashboard.php");
  }else{
    echo "<script>alert('Usuario o contraseña incorrecto')</script>";
  }

}
if(isset($_REQUEST['cerrarSession'])){
  
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
  <link rel="apple-touch-icon" sizes="180x180" href="assets/img/Favicon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="assets/img/Favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="assets/img/Favicon/favicon-16x16.png">
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="css/sb-admin-2.css" rel="stylesheet">
  <link rel="stylesheet" href="css/estilos.css">
  <title>SENAT | Ingreso al sistema</title>
</head>

<body class="bg-gradient-primary">
  <div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center">
      <div class="col-xl-10 col-lg-12 col-md-9">
        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block imgLoginSenat">
                <img src="assets/img/Logos/logo_senat_letrasNegras_LoginNB.png" alt="Logo Senat" class="bgLogin">
                <p class="sloganSenat">Sistema de Evaluación Nutricional Asistido por Tecnología</p>
              </div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Bienvenid@s!</h1>
                  </div>
                  <form class="user" action="index.php" method="POST">
                    <div class="form-group">
                      <input type="text" name="u" class="form-control form-control-user" id="loginInputUser" placeholder="Ingresa tu usuario..." required>
                    </div>
                    <div class="form-group">
                      <input type="password" name="p" class="form-control form-control-user" id="loginInputPassword" placeholder="Password" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block">Ingresar</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>