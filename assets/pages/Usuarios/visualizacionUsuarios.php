<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>SENAT | Gestión de alimentos</title>
    <!-- Custom fonts for this template-->
    <link href="../../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="../../../css/sb-admin-2.css" rel="stylesheet">
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">







        <!-- Comienzo del Sidebar -->

        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <div class="sidebar-brand-icon">
                    <img src="../../img/Logos/logo_senat_letrasBlancas.png" alt="Logo SENAT" width="80">
                </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.html">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUsers"
                    aria-expanded="true" aria-controls="collapseUsers">
                    <i class="fas fa-users"></i>
                    <span>Usuarios</span>
                </a>
                <div id="collapseUsers" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Menú usuarios:</h6>
                        <a class="collapse-item" href="buttons.html">Agregar nuevo</a>
                        <a class="collapse-item" href="#">Gestionar usuarios</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFoods"
                    aria-expanded="true" aria-controls="collapseFoods">
                    <!-- <i class="fas fa-fw fa-wrench"></i> -->
                    <i class="fas fa-apple-alt"></i>
                    <span>Alimentos</span>
                </a>
                <div id="collapseFoods" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Menú alimentos:</h6>
                        <a class="collapse-item" href="utilities-color.html">Agregar nuevo</a>
                        <a class="collapse-item" href="../Alimentos/gestionAlimentos.html">Gestionar alimentos</a>
                        <a class="collapse-item" href="utilities-animation.html">Ver fuentes de info</a>
                    </div>
                </div>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFoodGroups"
                    aria-expanded="true" aria-controls="collapseFoodGroups">
                    <!-- <i class="fas fa-fw fa-wrench"></i> -->
                    <i class="fas fa-database"></i>
                    <span>Grupos de alimentos</span>
                </a>
                <div id="collapseFoodGroups" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Menú grupo alimentos:</h6>
                        <a class="collapse-item" href="utilities-color.html">Visualizar grupos</a>
                        <a class="collapse-item" href="utilities-border.html">Gestionar grupos</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFolls"
                    aria-expanded="true" aria-controls="collapseFolls">
                    <!-- <i class="fas fa-fw fa-wrench"></i> -->
                    <i class="fas fa-poll"></i>
                    <span>Encuestas</span>
                </a>
                <div id="collapseFolls" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Menú encuestas:</h6>
                        <a class="collapse-item" href="#">Crear nueva encuesta</a>
                        <a class="collapse-item" href="#">Ver encuestas vigentes</a>
                        <a class="collapse-item" href="#">Ver encuestas finalizadas</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>

        <!-- Fin del Sidebar -->








        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Cecilia Torrent</span>
                                <img class="img-profile rounded-circle" src="../../img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Ver Perfil
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Opciones
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Cerrar sesión
                                </a>
                            </div>
                        </li>



                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Agregar nuevo alimento</h1>
                    <p class="mb-4">Rellena los campos de abajo con la información del alimento</p>


                    









                    <!-- DataTales Example -->
                    <!-- <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Agregar alimento</h6>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <img src="https://mdbootstrap.com/img/new/standard/city/047.jpg"
                                        class="img-fluid rounded mb-2" alt="foodImage" width="auto">
                                    <input type="file" name="foodImage" id="foodImage">
                                </div>
                                <div class="col">
                                    <div class="row">
                                        <div class="col">
                                            <div>
                                                <form class="form-inline">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text bg-dark text-light"
                                                                id="basic-addon1">Nombre del alimento</span>
                                                        </div>
                                                        <input type="text" class="form-control"
                                                            placeholder="Nombre del alimento..."
                                                            aria-label="nombreAlimento" aria-describedby="basic-addon1">
                                                    </div>
                                                </form>
                                            </div>
                                            <div>
                                                <form class="form-inline">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text bg-dark text-light"
                                                                id="basic-addon1">Cantidad</span>
                                                        </div>
                                                        <input type="text" class="form-control"
                                                            placeholder="Cantidad..." aria-label="cantidadAlimento"
                                                            aria-describedby="basic-addon1">
                                                        <select class="custom-select" id="inputGroupSelect01">
                                                            <option selected disabled>Elegir...</option>
                                                            <option value="1">gr</option>
                                                            <option value="2">cc</option>
                                                        </select>
                                                    </div>
                                                </form>
                                            </div>
                                            <div>
                                                <form class="form-inline">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text bg-dark text-light"
                                                                id="basic-addon1">Fuente</span>
                                                        </div>
                                                        <input type="text" class="form-control"
                                                            placeholder="UCEL - SENAT" aria-label="fuenteAlimento"
                                                            aria-describedby="basic-addon1" disabled>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <h3>Macronutrientes</h3>
                                    <div class="card-body d-flex justify-content-around">

                                        <div class="input-group m-3 w-100">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-dark text-light"
                                                    id="basic-addon1">Energía</span>
                                            </div>
                                            <input type="number" class="form-control" placeholder=""
                                                aria-label="fuenteAlimento" aria-describedby="basic-addon1">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-dark text-light"
                                                    id="basic-addon1">kcal</span>
                                            </div>
                                        </div>


                                        <div class="input-group m-3 w-100">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-dark text-light"
                                                    id="basic-addon1">Grasa</span>
                                            </div>
                                            <input type="number" class="form-control" placeholder=""
                                                aria-label="fuenteAlimento" aria-describedby="basic-addon1">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-dark text-light"
                                                    id="basic-addon1">g</span>
                                            </div>
                                        </div>


                                        <div class="input-group m-3 w-100">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-dark text-light" id="basic-addon1">H.
                                                    Carbono</span>
                                            </div>
                                            <input type="number" class="form-control" placeholder=""
                                                aria-label="fuenteAlimento" aria-describedby="basic-addon1">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-dark text-light"
                                                    id="basic-addon1">g</span>
                                            </div>
                                        </div>


                                        <div class="input-group m-3 w-100">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-dark text-light"
                                                    id="basic-addon1">Proteína</span>
                                            </div>
                                            <input type="number" class="form-control" placeholder=""
                                                aria-label="fuenteAlimento" aria-describedby="basic-addon1">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-dark text-light"
                                                    id="basic-addon1">g</span>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <h3>Micronutrientes</h3>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-4">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-dark text-light"
                                                id="basic-addon1">Colesterol</span>
                                        </div>
                                        <input type="number" class="form-control" placeholder=""
                                            aria-label="fuenteAlimento" aria-describedby="basic-addon1">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-dark text-light"
                                                id="basic-addon1">mg</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-4">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-dark text-light"
                                                id="basic-addon1">Colesterol</span>
                                        </div>
                                        <input type="number" class="form-control" placeholder=""
                                            aria-label="fuenteAlimento" aria-describedby="basic-addon1">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-dark text-light"
                                                id="basic-addon1">mg</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-4">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-dark text-light"
                                                id="basic-addon1">Colesterol</span>
                                        </div>
                                        <input type="number" class="form-control" placeholder=""
                                            aria-label="fuenteAlimento" aria-describedby="basic-addon1">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-dark text-light"
                                                id="basic-addon1">mg</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-4">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-dark text-light"
                                                id="basic-addon1">Colesterol</span>
                                        </div>
                                        <input type="number" class="form-control" placeholder=""
                                            aria-label="fuenteAlimento" aria-describedby="basic-addon1">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-dark text-light"
                                                id="basic-addon1">mg</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-4">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-dark text-light"
                                                id="basic-addon1">Colesterol</span>
                                        </div>
                                        <input type="number" class="form-control" placeholder=""
                                            aria-label="fuenteAlimento" aria-describedby="basic-addon1">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-dark text-light"
                                                id="basic-addon1">mg</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-4">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-dark text-light"
                                                id="basic-addon1">Colesterol</span>
                                        </div>
                                        <input type="number" class="form-control" placeholder=""
                                            aria-label="fuenteAlimento" aria-describedby="basic-addon1">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-dark text-light"
                                                id="basic-addon1">mg</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-4">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-dark text-light"
                                                id="basic-addon1">Colesterol</span>
                                        </div>
                                        <input type="number" class="form-control" placeholder=""
                                            aria-label="fuenteAlimento" aria-describedby="basic-addon1">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-dark text-light"
                                                id="basic-addon1">mg</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-4">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-dark text-light"
                                                id="basic-addon1">Colesterol</span>
                                        </div>
                                        <input type="number" class="form-control" placeholder=""
                                            aria-label="fuenteAlimento" aria-describedby="basic-addon1">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-dark text-light"
                                                id="basic-addon1">mg</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-4">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-dark text-light"
                                                id="basic-addon1">Colesterol</span>
                                        </div>
                                        <input type="number" class="form-control" placeholder=""
                                            aria-label="fuenteAlimento" aria-describedby="basic-addon1">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-dark text-light"
                                                id="basic-addon1">mg</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <button class="btn btn-outline-danger">Cancelar</button>
                                    <button class="btn btn-success">Agregar a la base de datos</button>
                                </div>
                            </div>

                        </div> -->





                        <!-- End content -->
                    </div>
                </div>
            </div>
        </div>
    </div>







































    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
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

    <!-- Page level plugins -->
    <script src="../../../vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../../../js/demo/chart-area-demo.js"></script>
    <script src="../../../js/demo/chart-pie-demo.js"></script>

</body>

</html>