<?php
$menuAlimentos= '
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    <div class="sidebar-brand-icon">
      <img class="sidebar__logo" src="../../img/Logos/logo_senat_letrasBlancas.png" alt="Logo SENAT">
    </div>
  </a>
  <hr class="sidebar-divider my-0">
  <li class="nav-item active">
    <a class="nav-link" href="../../../index.html">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
  </li>
  <hr class="sidebar-divider">
  <div class="sidebar-heading">
    Interface
  </div>
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUsers" aria-expanded="true" aria-controls="collapseUsers">
      <i class="fas fa-users"></i>
      <span>Usuarios</span>
    </a>
    <div id="collapseUsers" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Menú usuarios:</h6>
        <a class="collapse-item" href="crearUsuario.html">Agregar nuevo</a>
        <a class="collapse-item" href="gestionUsuarios.html">Gestionar usuarios</a>
      </div>
    </div>
  </li>
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFoods" aria-expanded="true" aria-controls="collapseFoods">
      <i class="fas fa-apple-alt"></i>
      <span>Alimentos</span>
    </a>
    <div id="collapseFoods" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Menú alimentos:</h6>
        <a class="collapse-item" href="../Alimentos/crearAlimento.html">Agregar nuevo</a>
        <a class="collapse-item" href="../Alimentos/gestionAlimentos.html">Gestionar alimentos</a>
      </div>
    </div>
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFoodGroups" aria-expanded="true" aria-controls="collapseFoodGroups">
      <i class="fas fa-database"></i>
      <span>GruposDeAlimentos</span>
    </a>
    <div id="collapseFoodGroups" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Menú grupo alimentos:</h6>
        <a class="collapse-item" href="../GruposDeAlimentos/gestionAlimentos.html">Gestionar grupos</a>
      </div>
    </div>
  </li>
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSurveys" aria-expanded="true" aria-controls="collapseSurveys">
      <i class="fas fa-poll"></i>
      <span>Encuestas</span>
    </a>
    <div id="collapseSurveys" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Menú encuestas:</h6>
        <a class="collapse-item" href="../Encuestas/crearEncuesta.html">Crear nueva encuesta</a>
        <a class="collapse-item" href="../Encuestas/encuestasActivas.html">Encuestas activas</a>
        <a class="collapse-item" href="../Encuestas/encuestasFinalizadas.html">Encuestas finalizadas</a>
      </div>
    </div>
  </li>
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseReports" aria-expanded="true" aria-controls="collapseReports">
      <i class="fas fa-file-excel"></i>
      <span>Reportes</span>
    </a>
    <div id="collapseReports" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Reportes:</h6>
        <a class="collapse-item" href="../Reportes/gestionAlimentos.html">Ver reportes</a>
      </div>
    </div>
  </li>
  <hr class="sidebar-divider">
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>
</ul>
';

$menuUsuarios

?>