<?php
$menuAlimentos= '
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../dashboard/dashboard.php">
    <div class="sidebar-brand-icon">
      <img class="sidebar__logo" src="../../img/Logos/logo_senat_letrasBlancas.png" alt="Logo SENAT">
    </div>
  </a>
  <hr class="sidebar-divider my-0">
  <li class="nav-item active">
    <a class="nav-link" href="../dashboard/dashboard.php">
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
        <a class="collapse-item" href="../Usuarios/crearUsuario.php">Agregar nuevo</a>
        <a class="collapse-item" href="../Usuarios/gestionUsuarios.php">Gestionar usuarios</a>
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
        <a class="collapse-item" href="crearAlimento.php">Agregar nuevo</a>
        <a class="collapse-item" href="gestionAlimentos.php">Gestionar alimentos</a>
      </div>
    </div>
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFoodGroups" aria-expanded="true" aria-controls="collapseFoodGroups">
      <i class="fas fa-database"></i>
      <span>Grupos de Alimentos</span>
    </a>
    <div id="collapseFoodGroups" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Menú grupo alimentos:</h6>
        <a class="collapse-item" href="../GruposDeAlimentos/gestionGrupoDeAlimentos.php">Gestionar grupos</a>
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
        <a class="collapse-item" href="../Encuestas/crearEncuesta.php">Crear nueva encuesta</a>
        <a class="collapse-item" href="../Encuestas/gestionEncuestas.php">Gestión de encuestas</a>
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
        <a class="collapse-item" href="../Reportes/gestionReportes.php">Ver reportes</a>
      </div>
    </div>
  </li>
  <hr class="sidebar-divider">
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>
</ul>
';

$menuUsuarios= '
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../dashboard/dashboard.php">
    <div class="sidebar-brand-icon">
      <img class="sidebar__logo" src="../../img/Logos/logo_senat_letrasBlancas.png" alt="Logo SENAT">
    </div>
  </a>
  <hr class="sidebar-divider my-0">
  <li class="nav-item active">
    <a class="nav-link" href="../dashboard/dashboard.php">
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
        <a class="collapse-item" href="crearUsuario.php">Agregar nuevo</a>
        <a class="collapse-item" href="gestionUsuarios.php">Gestionar usuarios</a>
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
        <a class="collapse-item" href="../Alimentos/crearAlimento.php">Agregar nuevo</a>
        <a class="collapse-item" href="../Alimentos/gestionAlimentos.php">Gestionar alimentos</a>
      </div>
    </div>
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFoodGroups" aria-expanded="true" aria-controls="collapseFoodGroups">
      <i class="fas fa-database"></i>
      <span>Grupos de Alimentos</span>
    </a>
    <div id="collapseFoodGroups" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Menú grupo alimentos:</h6>
        <a class="collapse-item" href="../GruposDeAlimentos/gestionGrupoDeAlimentos.php">Gestionar grupos</a>
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
        <a class="collapse-item" href="../Encuestas/crearEncuesta.php">Crear nueva encuesta</a>
        <a class="collapse-item" href="../Encuestas/gestionEncuestas.php">Gestión de encuestas</a>
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
        <a class="collapse-item" href="../Reportes/gestionReportes.php">Ver reportes</a>
      </div>
    </div>
  </li>
  <hr class="sidebar-divider">
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>
</ul>
';

$menuGrupoDeAlimentos= '
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../dashboard/dashboard.php">
    <div class="sidebar-brand-icon">
      <img class="sidebar__logo" src="../../img/Logos/logo_senat_letrasBlancas.png" alt="Logo SENAT">
    </div>
  </a>
  <hr class="sidebar-divider my-0">
  <li class="nav-item active">
    <a class="nav-link" href="../dashboard/dashboard.php">
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
        <a class="collapse-item" href="../Usuarios/crearUsuario.php">Agregar nuevo</a>
        <a class="collapse-item" href="../Usuarios/gestionUsuarios.php">Gestionar usuarios</a>
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
        <a class="collapse-item" href="../Alimentos/crearAlimento.php">Agregar nuevo</a>
        <a class="collapse-item" href="../Alimentos/gestionAlimentos.php">Gestionar alimentos</a>
      </div>
    </div>
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFoodGroups" aria-expanded="true" aria-controls="collapseFoodGroups">
      <i class="fas fa-database"></i>
      <span>Grupos de Alimentos</span>
    </a>
    <div id="collapseFoodGroups" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Menú grupo alimentos:</h6>
        <a class="collapse-item" href="gestionGrupoDeAlimentos.php">Gestionar grupos</a>
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
        <a class="collapse-item" href="../Encuestas/crearEncuesta.php">Crear nueva encuesta</a>
        <a class="collapse-item" href="../Encuestas/gestionEncuestas.php">Gestión de encuestas</a>
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
        <a class="collapse-item" href="../Reportes/gestionReportes.php">Ver reportes</a>
      </div>
    </div>
  </li>
  <hr class="sidebar-divider">
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>
</ul>
';

$menuEncuestas= '
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../dashboard/dashboard.php">
    <div class="sidebar-brand-icon">
      <img class="sidebar__logo" src="../../img/Logos/logo_senat_letrasBlancas.png" alt="Logo SENAT">
    </div>
  </a>
  <hr class="sidebar-divider my-0">
  <li class="nav-item active">
    <a class="nav-link" href="../dashboard/dashboard.php">
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
        <a class="collapse-item" href="../Usuarios/crearUsuario.php">Agregar nuevo</a>
        <a class="collapse-item" href="../Usuarios/gestionUsuarios.php">Gestionar usuarios</a>
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
        <a class="collapse-item" href="../Alimentos/crearAlimento.php">Agregar nuevo</a>
        <a class="collapse-item" href="../Alimentos/gestionAlimentos.php">Gestionar alimentos</a>
      </div>
    </div>
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFoodGroups" aria-expanded="true" aria-controls="collapseFoodGroups">
      <i class="fas fa-database"></i>
      <span>Grupos de Alimentos</span>
    </a>
    <div id="collapseFoodGroups" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Menú grupo alimentos:</h6>
        <a class="collapse-item" href="../GruposDeAlimentos/gestionGrupoDeAlimentos.php">Gestionar grupos</a>
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
        <a class="collapse-item" href="crearEncuesta.php">Crear nueva encuesta</a>
        <a class="collapse-item" href="gestionEncuestas.php">Gestión de encuestas</a>
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
        <a class="collapse-item" href="../Reportes/gestionReportes.php">Ver reportes</a>
      </div>
    </div>
  </li>
  <hr class="sidebar-divider">
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>
</ul>
';

$menuReportes='
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../dashboard/dashboard.php">
    <div class="sidebar-brand-icon">
      <img class="sidebar__logo" src="../../img/Logos/logo_senat_letrasBlancas.png" alt="Logo SENAT">
    </div>
  </a>
  <hr class="sidebar-divider my-0">
  <li class="nav-item active">
    <a class="nav-link" href="../dashboard/dashboard.php">
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
        <a class="collapse-item" href="../Usuarios/crearUsuario.php">Agregar nuevo</a>
        <a class="collapse-item" href="../Usuarios/gestionUsuarios.php">Gestionar usuarios</a>
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
        <a class="collapse-item" href="../Alimentos/crearAlimento.php">Agregar nuevo</a>
        <a class="collapse-item" href="../Alimentos/gestionAlimentos.php">Gestionar alimentos</a>
      </div>
    </div>
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFoodGroups" aria-expanded="true" aria-controls="collapseFoodGroups">
      <i class="fas fa-database"></i>
      <span>Grupos de Alimentos</span>
    </a>
    <div id="collapseFoodGroups" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Menú grupo alimentos:</h6>
        <a class="collapse-item" href="../GruposDeAlimentos/gestionGrupoDeAlimentos.php">Gestionar grupos</a>
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
        <a class="collapse-item" href="../Encuestas/crearEncuesta.php">Crear nueva encuesta</a>
        <a class="collapse-item" href="../Encuestas/gestionEncuestas.php">Gestión de encuestas</a>
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
        <a class="collapse-item" href="gestionReportes.php">Ver reportes</a>
      </div>
    </div>
  </li>
  <hr class="sidebar-divider">
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>
</ul>;
';

$dashboard='
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard.php">
    <div class="sidebar-brand-icon">
      <img class="sidebar__logo" src="../../img/Logos/logo_senat_letrasBlancas.png" alt="Logo SENAT">
    </div>
  </a>
  <hr class="sidebar-divider my-0">
  <li class="nav-item active">
    <a class="nav-link" href="dashboard.php">
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
        <a class="collapse-item" href="../Usuarios/crearUsuario.php">Agregar nuevo</a>
        <a class="collapse-item" href="../Usuarios/gestionUsuarios.php">Gestionar usuarios</a>
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
        <a class="collapse-item" href="../Alimentos/crearAlimento.php">Agregar nuevo</a>
        <a class="collapse-item" href="../Alimentos/gestionAlimentos.php">Gestionar alimentos</a>
      </div>
    </div>
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFoodGroups" aria-expanded="true" aria-controls="collapseFoodGroups">
      <i class="fas fa-database"></i>
      <span>Grupos de Alimentos</span>
    </a>
    <div id="collapseFoodGroups" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Menú grupo alimentos:</h6>
        <a class="collapse-item" href="../GruposDeAlimentos/gestionGrupoDeAlimentos.php">Gestionar grupos</a>
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
        <a class="collapse-item" href="../Encuestas/crearEncuesta.php">Crear nueva encuesta</a>
        <a class="collapse-item" href="../Encuestas/gestionEncuestas.php">Gestión de encuestas</a>
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
        <a class="collapse-item" href="../Reportes/gestionReportes.php">Ver reportes</a>
      </div>
    </div>
  </li>
  <hr class="sidebar-divider">
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>
</ul>
';