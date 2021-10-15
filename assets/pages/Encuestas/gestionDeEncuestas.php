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

    <link href="../../../css/datatables/dataTables.bootstrap5.min.css" rel="stylesheet">

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
                MENÚES DISPONIBLES
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
                        <a class="collapse-item" href="../Alimentos/crearAlimento.html">Agregar nuevo</a>
                        <a class="collapse-item" href="../Alimentos/gestionAlimentos.html">Gestionar alimentos</a>
                        <a class="collapse-item" href="utilities-animation.html">Ver fuentes de info</a>
                    </div>
                </div>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFoodGroups"
                    aria-expanded="true" aria-controls="collapseFoodGroups">
                    <!-- <i class="fas fa-fw fa-wrench"></i> -->
                    <i class="fas fa-database"></i>
                    <span>GruposDeAlimentos</span>
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
                    <h1 class="h3 mb-2 text-gray-800">Gestión de alimentos</h1>
                    <p class="mb-4">Busca, consulta y agrega nuevos alimentos al sistema. Si desea más información puede
                        ver las <a target="_blank" href="#">instrucciones de uso</a>.</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Gestión de alimentos</h6>
                        </div>
                        <nav class="navbar navbar-light bg-light justify-content-between">
                            <form class="form-inline">
                                <input class="form-control mr-sm-2" type="search" placeholder="Buscar alimento"
                                    aria-label="Search">
                                <div class="dropdown">
                                    <button class="btn btn-outline-primary dropdown-toggle" type="button"
                                        id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false" disabled>
                                        Todas las fuentes de alimentos
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#">SENAT - UCEL</a>
                                    </div>
                                </div>
                            </form>
                            <button type="button" class="btn btn-success"><i class="fas fa-plus"></i> Crear
                                Alimento</button>
                        </nav>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTableAlimentos" width="100%"
                                    cellspacing="0">
                                    <thead class="thead-light">
                                        <tr>
                                            <th class="text-center">Nombre</th>
                                            <th class="text-center">Grupo</th>
                                            <th class="text-center">Energía (kcal)</th>
                                            <th class="text-center">Grasa (g)</th>
                                            <th class="text-center">H. Carbono (g)</th>
                                            <th class="text-center">Proteína (g)</th>
                                            <th class="text-center">Acceder <i
                                                    class="fas fa-external-link-square-alt"></i></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-center">Manzana</td>
                                            <td class="text-center">Frutas</td>
                                            <td class="text-center">51,887</td>
                                            <td class="text-center">0,1887</td>
                                            <td class="text-center">13,868</td>
                                            <td class="text-center">0,283</td>
                                            <td class="text-center"><a href=""><i
                                                        class="fas fa-external-link-square-alt"></i></a></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">Manzana</td>
                                            <td class="text-center">Frutas</td>
                                            <td class="text-center">51,887</td>
                                            <td class="text-center">0,1887</td>
                                            <td class="text-center">13,868</td>
                                            <td class="text-center">0,283</td>
                                            <td class="text-center"><a href=""><i
                                                        class="fas fa-external-link-square-alt"></i></a></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">Manzana</td>
                                            <td class="text-center">Frutas</td>
                                            <td class="text-center">51,887</td>
                                            <td class="text-center">0,1887</td>
                                            <td class="text-center">13,868</td>
                                            <td class="text-center">0,283</td>
                                            <td class="text-center"><a href=""><i
                                                        class="fas fa-external-link-square-alt"></i></a></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">Manzana</td>
                                            <td class="text-center">Frutas</td>
                                            <td class="text-center">51,887</td>
                                            <td class="text-center">0,1887</td>
                                            <td class="text-center">13,868</td>
                                            <td class="text-center">0,283</td>
                                            <td class="text-center"><a href=""><i
                                                        class="fas fa-external-link-square-alt"></i></a></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">Manzana</td>
                                            <td class="text-center">Frutas</td>
                                            <td class="text-center">51,887</td>
                                            <td class="text-center">0,1887</td>
                                            <td class="text-center">13,868</td>
                                            <td class="text-center">0,283</td>
                                            <td class="text-center"><a href=""><i
                                                        class="fas fa-external-link-square-alt"></i></a></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">Manzana</td>
                                            <td class="text-center">Frutas</td>
                                            <td class="text-center">51,887</td>
                                            <td class="text-center">0,1887</td>
                                            <td class="text-center">13,868</td>
                                            <td class="text-center">0,283</td>
                                            <td class="text-center"><a href=""><i
                                                        class="fas fa-external-link-square-alt"></i></a></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">Manzana</td>
                                            <td class="text-center">Frutas</td>
                                            <td class="text-center">51,887</td>
                                            <td class="text-center">0,1887</td>
                                            <td class="text-center">13,868</td>
                                            <td class="text-center">0,283</td>
                                            <td class="text-center"><a href=""><i
                                                        class="fas fa-external-link-square-alt"></i></a></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">Manzana</td>
                                            <td class="text-center">Frutas</td>
                                            <td class="text-center">51,887</td>
                                            <td class="text-center">0,1887</td>
                                            <td class="text-center">13,868</td>
                                            <td class="text-center">0,283</td>
                                            <td class="text-center"><a href=""><i
                                                        class="fas fa-external-link-square-alt"></i></a></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">Manzana</td>
                                            <td class="text-center">Frutas</td>
                                            <td class="text-center">51,887</td>
                                            <td class="text-center">0,1887</td>
                                            <td class="text-center">13,868</td>
                                            <td class="text-center">0,283</td>
                                            <td class="text-center"><a href=""><i
                                                        class="fas fa-external-link-square-alt"></i></a></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">Manzana</td>
                                            <td class="text-center">Frutas</td>
                                            <td class="text-center">51,887</td>
                                            <td class="text-center">0,1887</td>
                                            <td class="text-center">13,868</td>
                                            <td class="text-center">0,283</td>
                                            <td class="text-center"><a href=""><i
                                                        class="fas fa-external-link-square-alt"></i></a></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">Manzana</td>
                                            <td class="text-center">Frutas</td>
                                            <td class="text-center">51,887</td>
                                            <td class="text-center">0,1887</td>
                                            <td class="text-center">13,868</td>
                                            <td class="text-center">0,283</td>
                                            <td class="text-center"><a href=""><i
                                                        class="fas fa-external-link-square-alt"></i></a></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">Manzana</td>
                                            <td class="text-center">Frutas</td>
                                            <td class="text-center">51,887</td>
                                            <td class="text-center">0,1887</td>
                                            <td class="text-center">13,868</td>
                                            <td class="text-center">0,283</td>
                                            <td class="text-center"><a href=""><i
                                                        class="fas fa-external-link-square-alt"></i></a></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">Manzana</td>
                                            <td class="text-center">Frutas</td>
                                            <td class="text-center">51,887</td>
                                            <td class="text-center">0,1887</td>
                                            <td class="text-center">13,868</td>
                                            <td class="text-center">0,283</td>
                                            <td class="text-center"><a href=""><i
                                                        class="fas fa-external-link-square-alt"></i></a></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">Leche</td>
                                            <td class="text-center">Productos lácteos</td>
                                            <td class="text-center">61,6716</td>
                                            <td class="text-center">3,3336</td>
                                            <td class="text-center">4,667</td>
                                            <td class="text-center">3,2919</td>
                                            <td class="text-center"><a href=""><i
                                                        class="fas fa-external-link-square-alt"></i></a></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">Leche</td>
                                            <td class="text-center">Productos lácteos</td>
                                            <td class="text-center">61,6716</td>
                                            <td class="text-center">3,3336</td>
                                            <td class="text-center">4,667</td>
                                            <td class="text-center">3,2919</td>
                                            <td class="text-center"><a href=""><i
                                                        class="fas fa-external-link-square-alt"></i></a></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">Leche</td>
                                            <td class="text-center">Productos lácteos</td>
                                            <td class="text-center">61,6716</td>
                                            <td class="text-center">3,3336</td>
                                            <td class="text-center">4,667</td>
                                            <td class="text-center">3,2919</td>
                                            <td class="text-center"><a href=""><i
                                                        class="fas fa-external-link-square-alt"></i></a></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">Leche</td>
                                            <td class="text-center">Productos lácteos</td>
                                            <td class="text-center">61,6716</td>
                                            <td class="text-center">3,3336</td>
                                            <td class="text-center">4,667</td>
                                            <td class="text-center">3,2919</td>
                                            <td class="text-center"><a href=""><i
                                                        class="fas fa-external-link-square-alt"></i></a></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">Leche</td>
                                            <td class="text-center">Productos lácteos</td>
                                            <td class="text-center">61,6716</td>
                                            <td class="text-center">3,3336</td>
                                            <td class="text-center">4,667</td>
                                            <td class="text-center">3,2919</td>
                                            <td class="text-center"><a href=""><i
                                                        class="fas fa-external-link-square-alt"></i></a></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">Leche</td>
                                            <td class="text-center">Productos lácteos</td>
                                            <td class="text-center">61,6716</td>
                                            <td class="text-center">3,3336</td>
                                            <td class="text-center">4,667</td>
                                            <td class="text-center">3,2919</td>
                                            <td class="text-center"><a href=""><i
                                                        class="fas fa-external-link-square-alt"></i></a></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">Leche</td>
                                            <td class="text-center">Productos lácteos</td>
                                            <td class="text-center">61,6716</td>
                                            <td class="text-center">3,3336</td>
                                            <td class="text-center">4,667</td>
                                            <td class="text-center">3,2919</td>
                                            <td class="text-center"><a href=""><i
                                                        class="fas fa-external-link-square-alt"></i></a></td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td class="text-center" colspan="7">Última actualización el 24/05/2021 a las
                                                23:11 pm.</td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="navbar justify-content-end">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End content -->







































                    <!-- Scroll to Top Button-->
                    <a class="scroll-to-top rounded" href="#page-top">
                        <i class="fas fa-angle-up"></i>
                    </a>

                    <!-- Logout Modal-->
                    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">¿Ya te vas?</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">Hacé click en "Cerrar sesión" para salir.</div>
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" type="button"
                                        data-dismiss="modal">Cancelar</button>
                                    <a class="btn btn-danger" href="login.html">Cerrar sesión</a>
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

                    <!-- DataTable scripts -->
                    <script src="../../../js/datatables/jquery.dataTables.js"></script>
                    <script src="../../../js/datatables.min.js"></script>
                    <script>
                        $(document).ready(function () {
                            $('#dataTableAlimentos').DataTable({
                                "paging":   true,
                                "ordering": true,
                                "info":     true,
                                "language": {
                                    "lengthMenu": "Mostrando _MENU_ registros por página",
                                    "zeroRecords": "No se encontraron resultados.",
                                    "info": "Mostrando página _PAGE_ de _PAGES_",
                                    "infoEmpty": "No hay información disponible",
                                    "infoFiltered": "(Filtrado de _MAX_ del total de registros.)",
                                    "sSearch": "Buscar",
                                    "oPaginate": {
                                        "sFirst": "Primera pág.",
                                        "sLast": "Última pág.",
                                        "sNext": "Siguiente",
                                        "sPrevious": "Anterior",
                                    },
                                    "sProcessing": "Procesando..."
                                }
                            });
                        });
                    </script>

</body>

</html>