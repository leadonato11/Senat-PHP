<?php
session_start();
if(!isset($_SESSION['user'])){
    header("Location:index.php");
}
date_default_timezone_set("America/Argentina/Buenos_Aires");
$fechaActual=Date("Y-m-d");
$u=$_SESSION['user'];
$c=mysqli_query($conect, "SELECT * FROM usuario WHERE dni='$u'");
$a=mysqli_fetch_assoc($c);

$navbar='
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
  <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
    <i class="fa fa-bars"></i>
  </button>
  <ul class="navbar-nav ml-auto">
    <div class="topbar-divider d-none d-sm-block"></div>
    <li class="nav-item dropdown no-arrow">
      <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        <span class="mr-2 d-none d-lg-inline text-gray-600 small">'.$a['rol'].' | '.$a['apellido'].', '.$a['nombre'].'</span>
        <img class="img-profile rounded-circle" src="assets/img/undraw_profile_1.svg">
      </a>
      <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
          <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
          Cerrar sesión
        </a>
      </div>
    </li>
  </ul>
</nav>
';
