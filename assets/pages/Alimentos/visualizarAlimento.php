<?php 
include("../../../includes/conectar.php");
session_start();
if(!isset($_SESSION['user'])){
    header("Location:index.php");
}
date_default_timezone_set("America/Argentina/Buenos_Aires");
$fechaActual=Date("Y-m-d");

//Datos del usuario desde Tabla usuarios a traves de dni(Variable de Session) -> a
$u=$_SESSION['user'];
$c=mysqli_query($conect, "SELECT * FROM usuario WHERE dni='$u'");
$a=mysqli_fetch_assoc($c);

//Datos del alimento desde Tabla alimentos a traves de idalimentos(Variable de Session) -> db
if(isset($_REQUEST['idAlimento']) && !empty($_REQUEST['idAlimento'])){
$_SESSION['alimento']=$_REQUEST['idAlimento'];
}
$idalimentos=$_SESSION['alimento'];
$dbquery=mysqli_query($conect, "SELECT * FROM alimentos WHERE idalimentos='$idalimentos'");
$db=mysqli_fetch_array($dbquery);


//TABLA grupos (ALL)-> gdbs[]
$gquery=mysqli_query($conect, "SELECT * FROM grupos ");
while($gdb=$gquery->fetch_array()){
        $gdbs[]=$gdb;
    }

//Eliminar Alimento
if(isset($_REQUEST['eliminarAlimento']) && !empty($_REQUEST['eliminarAlimento'])){
  $queryAlimentoBorrar=mysqli_connect($conect, "SELECT * FROM alimentos WHERE idalimentos='".$_REQUEST['eliminarAlimento']."'");
  $dbAliBorrar=mysqli_fetch_assoc($queryAlimentoBorrar);
  $nombre=$$dbALiBorrar['nombre'];
  $nombrePerfil=$nombre.'falimento.jpg';
  $nombreP1=$nombre.'porcion1.jpg';
  $nombreP2=$nombre.'porcion2.jpg';
  $nombreP3=$nombre.'porcion3.jpg';
  $nombreP4=$nombre.'porcion4.jpg';

  mysqli_query($conect, "DELETE FROM alimentos WHERE idalimentos  ='".$_REQUEST['eliminarAlimento']."'"); 
  header("Location:gestionAlimentos.php");
}
?>

<?php 
	//Volores de Nutrientes -> valueNutrientesdb[]
	//Coeficiente a multiplicar por la cantidad ingresada -> valueNutrientes[]
	if($db[2]!=0){
		for($k=1 ; $k<=40 ; $k++){
			$kdb=$k+8;
			$valueNutrientesdb[$k]=$db[$kdb];
			$valueNutrientes[$k]=$valueNutrientesdb[$k]/$db[2];	
		}
	}else{
		for($k=1 ; $k<=40 ; $k++){
		$kdb=$k+8;
		$valueNutrientes[$k]=$db[$kdb];
		}
	}		
?>
<!-- Generación de ID's para actualizar valores en timpo real (ver de hacer con una sentencia FOR)--> 
<script type="text/javascript">
	function cantidad(valor) 
	{	
		
		var val1 = '<?php echo strval($valueNutrientes[1]); ?>';
		document.getElementById("cant1").setAttribute("value", (parseFloat(valor)*parseFloat(val1)).toFixed(3));
		
		
		var val2 = '<?php echo strval($valueNutrientes[2])?>';
		document.getElementById("cant2").setAttribute("value", (parseFloat(valor)*parseFloat(val2)).toFixed(3));
		
		var val3 = '<?php echo strval($valueNutrientes[3]); ?>';
		document.getElementById("cant3").setAttribute("value", (parseFloat(valor)*parseFloat(val3)).toFixed(3));
		
		var val4 = '<?php echo strval($valueNutrientes[4]); ?>';
		document.getElementById("cant4").setAttribute("value", (parseFloat(valor)*parseFloat(val4)).toFixed(3));
		
		var val5 = '<?php echo strval($valueNutrientes[5]); ?>';
		document.getElementById("cant5").setAttribute("value", (parseFloat(valor)*parseFloat(val5)).toFixed(3));
		
		var val6 = '<?php echo strval($valueNutrientes[6]); ?>';
		document.getElementById("cant6").setAttribute("value", (parseFloat(valor)*parseFloat(val6)).toFixed(3));
		
		var val7 = '<?php echo strval($valueNutrientes[7]); ?>';
		document.getElementById("cant7").setAttribute("value", (parseFloat(valor)*parseFloat(val7)).toFixed(3));
		
		var val8 = '<?php echo strval($valueNutrientes[8]); ?>';
		document.getElementById("cant8").setAttribute("value", (parseFloat(valor)*parseFloat(val8)).toFixed(3));
		
		var val9 = '<?php echo strval($valueNutrientes[9]); ?>';
		document.getElementById("cant9").setAttribute("value", (parseFloat(valor)*parseFloat(val9)).toFixed(3));
		
		var val10 = '<?php echo strval($valueNutrientes[10]); ?>';
		document.getElementById("cant10").setAttribute("value", (parseFloat(valor)*parseFloat(val10)).toFixed(3));
		
		var val11 = '<?php echo strval($valueNutrientes[11]); ?>';
		document.getElementById("cant11").setAttribute("value", (parseFloat(valor)*parseFloat(val11)).toFixed(3));
		
		var val12 = '<?php echo strval($valueNutrientes[12]); ?>';
		document.getElementById("cant12").setAttribute("value", (parseFloat(valor)*parseFloat(val12)).toFixed(3));
		
		var val13 = '<?php echo strval($valueNutrientes[13]); ?>';
		document.getElementById("cant13").setAttribute("value", (parseFloat(valor)*parseFloat(val13)).toFixed(3));
		
		var val14 = '<?php echo strval($valueNutrientes[14]); ?>';
		document.getElementById("cant14").setAttribute("value", (parseFloat(valor)*parseFloat(val14)).toFixed(3));
		
		var val15 = '<?php echo strval($valueNutrientes[15]); ?>';
		document.getElementById("cant15").setAttribute("value", (parseFloat(valor)*parseFloat(val15)).toFixed(3));
		
		var val16 = '<?php echo strval($valueNutrientes[16]); ?>';
		document.getElementById("cant16").setAttribute("value", (parseFloat(valor)*parseFloat(val16)).toFixed(3));
		
		var val17 = '<?php echo strval($valueNutrientes[17]); ?>';
		document.getElementById("cant17").setAttribute("value", (parseFloat(valor)*parseFloat(val17)).toFixed(3));
		
		var val18 = '<?php echo strval($valueNutrientes[18]); ?>';
		document.getElementById("cant18").setAttribute("value", (parseFloat(valor)*parseFloat(val18)).toFixed(3));
		
		var val19 = '<?php echo strval($valueNutrientes[19]); ?>';
		document.getElementById("cant19").setAttribute("value", (parseFloat(valor)*parseFloat(val19)).toFixed(3));
		
		var val20 = '<?php echo strval($valueNutrientes[20]); ?>';
		document.getElementById("cant20").setAttribute("value", (parseFloat(valor)*parseFloat(val20)).toFixed(3));
		
		var val21 = '<?php echo strval($valueNutrientes[21]); ?>';
		document.getElementById("cant21").setAttribute("value", (parseFloat(valor)*parseFloat(val21)).toFixed(3));
		
		var val22 = '<?php echo strval($valueNutrientes[22]); ?>';
		document.getElementById("cant22").setAttribute("value", (parseFloat(valor)*parseFloat(val22)).toFixed(3));
		
		var val23 = '<?php echo strval($valueNutrientes[23]); ?>';
		document.getElementById("cant23").setAttribute("value", (parseFloat(valor)*parseFloat(val23)).toFixed(3));
		
		var val24 = '<?php echo strval($valueNutrientes[24]); ?>';
		document.getElementById("cant24").setAttribute("value", (parseFloat(valor)*parseFloat(val24)).toFixed(3));
		
		var val25 = '<?php echo strval($valueNutrientes[25]); ?>';
		document.getElementById("cant25").setAttribute("value", (parseFloat(valor)*parseFloat(val25)).toFixed(3));
		
		var val26 = '<?php echo strval($valueNutrientes[26]); ?>';
		document.getElementById("cant26").setAttribute("value", (parseFloat(valor)*parseFloat(val26)).toFixed(3));
		
		var val27 = '<?php echo strval($valueNutrientes[27]); ?>';
		document.getElementById("cant27").setAttribute("value", (parseFloat(valor)*parseFloat(val27)).toFixed(3));
		
		var val28 = '<?php echo strval($valueNutrientes[28]); ?>';
		document.getElementById("cant28").setAttribute("value", (parseFloat(valor)*parseFloat(val28)).toFixed(3));
		
		var val29 = '<?php echo strval($valueNutrientes[29]); ?>';
		document.getElementById("cant29").setAttribute("value", (parseFloat(valor)*parseFloat(val29)).toFixed(3));
		
		var val30 = '<?php echo strval($valueNutrientes[30]); ?>';
		document.getElementById("cant30").setAttribute("value", (parseFloat(valor)*parseFloat(val30)).toFixed(3));
		
		var val31 = '<?php echo strval($valueNutrientes[31]); ?>';
		document.getElementById("cant31").setAttribute("value", (parseFloat(valor)*parseFloat(val31)).toFixed(3));
		
		var val32 = '<?php echo strval($valueNutrientes[32]); ?>';
		document.getElementById("cant32").setAttribute("value", (parseFloat(valor)*parseFloat(val32)).toFixed(3));
		
		var val33 = '<?php echo strval($valueNutrientes[33]); ?>';
		document.getElementById("cant33").setAttribute("value", (parseFloat(valor)*parseFloat(val33)).toFixed(3));
		
		var val34 = '<?php echo strval($valueNutrientes[34]); ?>';
		document.getElementById("cant34").setAttribute("value", (parseFloat(valor)*parseFloat(val34)).toFixed(3));
		
		var val35 = '<?php echo strval($valueNutrientes[35]); ?>';
		document.getElementById("cant35").setAttribute("value", (parseFloat(valor)*parseFloat(val35)).toFixed(3));
		
		var val36 = '<?php echo strval($valueNutrientes[36]); ?>';
		document.getElementById("cant36").setAttribute("value", (parseFloat(valor)*parseFloat(val36)).toFixed(3));
		
		var val37 = '<?php echo strval($valueNutrientes[37]); ?>';
		document.getElementById("cant37").setAttribute("value", (parseFloat(valor)*parseFloat(val37)).toFixed(3));
		
		var val38 = '<?php echo strval($valueNutrientes[38]); ?>';
		document.getElementById("cant38").setAttribute("value", (parseFloat(valor)*parseFloat(val38)).toFixed(3));
		
		var val39 = '<?php echo strval($valueNutrientes[39]); ?>';
		document.getElementById("cant39").setAttribute("value", (parseFloat(valor)*parseFloat(val39)).toFixed(3));
        
        var val40 = '<?php echo strval($valueNutrientes[40]); ?>';
		document.getElementById("cant40").setAttribute("value", (parseFloat(valor)*parseFloat(val40)).toFixed(3));
	}	
</script>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="../../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">
  <link href="../../../css/sb-admin-2.css" rel="stylesheet">
  <link rel="stylesheet" href="../../../css/estilos.css">
  <title>SENAT | Visualizar alimento</title>
  <script type='text/javascript'>
  function borrarAlimento()
  {
    var respuesta;

    if(respuesta==true)
    {
        return true;
    }
    else
    {
        return false;
    }
  }
</script>
</head>

<body id="page-top">

  <!-- Contenedor principal -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../../../index.html">
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
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUsers" aria-expanded="true"
          aria-controls="collapseUsers">
          <i class="fas fa-users"></i>
          <span>Usuarios</span>
        </a>
        <div id="collapseUsers" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Menú usuarios:</h6>
            <a class="collapse-item" href="../Usuarios/crearUsuario.html">Agregar nuevo</a>
            <a class="collapse-item" href="../Usuarios/gestionUsuarios.html">Gestionar usuarios</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFoods" aria-expanded="true"
          aria-controls="collapseFoods">
          <i class="fas fa-apple-alt"></i>
          <span>Alimentos</span>
        </a>
        <div id="collapseFoods" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Menú alimentos:</h6>
            <a class="collapse-item" href="crearAlimento.html">Agregar nuevo</a>
            <a class="collapse-item" href="gestionAlimentos.html">Gestionar alimentos</a>
          </div>
        </div>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFoodGroups"
          aria-expanded="true" aria-controls="collapseFoodGroups">
          <i class="fas fa-database"></i>
          <span>GruposDeAlimentos</span>
        </a>
        <div id="collapseFoodGroups" class="collapse" aria-labelledby="headingUtilities"
          data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Menú grupo alimentos:</h6>
            <a class="collapse-item" href="../GruposDeAlimentos/gestionGrupoDeAlimentos.html">Gestionar grupos</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSurveys"
          aria-expanded="true" aria-controls="collapseSurveys">
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
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseReports"
          aria-expanded="true" aria-controls="collapseReports">
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
    </ul> <!-- Fin Sidebar -->

    <!-- Contenedor de la section -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Contenido principal de la section -->
      <div id="content">

        <!-- Navbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          <ul class="navbar-nav ml-auto">
            <div class="topbar-divider d-none d-sm-block"></div>
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Cecilia Torrent</span>
                <img class="img-profile rounded-circle" src="../../img/undraw_profile_1.svg">
              </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
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
        </nav> <!-- Fin Navbar -->

        <!-- Contenido de la section -->
        <div class="container-fluid">

          <!-- Cabecera de la section -->
          <h1 class="h3 mb-2 text-gray-800">Agregar nuevo alimento</h1>
          <p class="mb-4">Rellena los campos de abajo con la información del alimento</p>

          <!-- Tabla Alimentos -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Agregar alimento</h6>
            </div>
            <div class="row m-3 justify-content-center">
              <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                <h1><?php echo $db['nombre']; ?></h1>
              </div>
              <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="alimento__fotoPrincipal">
                  <img class="img-fluid rounded mb-2 imgAlimentoProfile"
                    src="../../img/imgAlimentos/<?php echo $db['nombre']; ?>falimento.jpg" alt="foodImage">
                </div>
              </div>
              <div class="col-lg-8 col-md-4 col-sm-12">
                <div class="alimento__dataInicial">
                  <h3>Datos del alimento</h3>
                  <form class="form-inline d-flex flex-column align-items-center">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-dark text-light labelMacroMicroNut"
                          id="basic-addon1">Cantidad</span>
                      </div>
                      
                        <input type="number" class="form-control inputCantGeneral"
                         aria-label="cantidadAlimento"
                          aria-describedby="basic-addon1" value="<?php echo strval($db[2]); ?>" name="cant"  onkeyup='cantidad(this.value);'>
                        <select class="custom-select" id="inputGroupSelect01" disabled>
                          <option selected disabled><?php echo $db['umedida'] ?></option>
                        </select>
                     
                    </div>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-dark text-light labelMacroMicroNut"
                          id="basic-addon1">Grupo</span>
                      </div>
                      <select class="custom-select" id="inputGroupSelect01" disabled>
                        <option selected disabled><?php echo $db['grupo'] ?></option>
                      </select>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="row m-3 justify-content-center">
              <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="porciones__data">
                  <h3>Porciones</h3>
                  <div class="imgPorcionesFiles">
                    <div class="col-lg-3 col-md-6 col-sm-12">
                      <div class="porcion">
                        <img class="img-fluid rounded mb-2 imgAlimentoProfile"
                          src="../../img/imgPorciones/<?php echo $db['nombre']; ?>porcion1.jpg"
                          alt="foodImage">
                        <div class="InputInfoPorcion">
                          <input type="number" class="form-control"
                            aria-label="fuenteAlimento" aria-describedby="basic-addon1" value="<?php echo $db['porcion1'] ?>" disabled>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12">
                      <div class="porcion">
                        <img class="img-fluid rounded mb-2 imgAlimentoProfile"
                          src="../../img/imgPorciones/<?php echo $db['nombre']; ?>porcion2.jpg"
                          alt="foodImage">
                        <div class="InputInfoPorcion">
                          <input type="number" class="form-control" 
                            aria-label="fuenteAlimento" aria-describedby="basic-addon1" value="<?php echo $db['porcion2'] ?>" disabled>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12">
                      <div class="porcion">
                        <img class="img-fluid rounded mb-2 imgAlimentoProfile"
                          src="../../img/imgPorciones/<?php echo $db['nombre']; ?>porcion3.jpg"
                          alt="foodImage">
                        <div class="InputInfoPorcion">
                          <input type="number" class="form-control" 
                            aria-label="fuenteAlimento" aria-describedby="basic-addon1" value="<?php echo $db['porcion3'] ?>" disabled>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12">
                      <div class="porcion">
                        <img class="img-fluid rounded mb-2 imgAlimentoProfile"
                          src="../../img/imgPorciones/<?php echo $db['nombre']; ?>porcion4.jpg"
                          alt="foodImage">
                        <div class="InputInfoPorcion">
                          <input type="number" class="form-control" 
                            aria-label="fuenteAlimento" aria-describedby="basic-addon1" value="<?php echo $db['porcion4'] ?>" disabled>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Contenedor Macronutrientes -->
              <div class="row m-3 justify-content-center">
                <div class="col-lg-12 col-md-12 col-sm-12">
                  <div class="macronutrientes__data">
                    <h3>Macronutrientes</h3>
                    <div class="inputMacroData">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text labelMacroNut bg-dark text-light"
                            id="basic-addon1">Energía</span>
                        </div>
                        <input type="number" id="cant1" name="1" class="form-control" aria-label="fuenteAlimento"
                          aria-describedby="basic-addon1" value="<?php echo $db['energia']; ?>" disabled>
                        <div class="input-group-prepend">
                          <span class="input-group-text labelUnidMed bg-dark text-light" id="basic-addon1">kcal</span>
                        </div>
                      </div>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text labelMacroNut bg-dark text-light" id="basic-addon1">Grasa</span>
                        </div>
                        <input type="number" id="cant2" name="2" class="form-control" aria-label="fuenteAlimento"
                          aria-describedby="basic-addon1" value="<?php echo $db['grasa'] ?>" disabled>
                        <div class="input-group-prepend">
                          <span class="input-group-text labelUnidMed bg-dark text-light" id="basic-addon1">g</span>
                        </div>
                      </div>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text labelMacroNut bg-dark text-light" id="basic-addon1">H.
                            Carb.</span>
                        </div>
                        <input type="number" disabled id="cant3" name="3" class="form-control" aria-label="fuenteAlimento"
                          aria-describedby="basic-addon1" value="<?php echo $db['hcarbono'] ?>">
                        <div class="input-group-prepend">
                          <span class="input-group-text labelUnidMed bg-dark text-light" id="basic-addon1">g</span>
                        </div>
                      </div>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text labelMacroNut bg-dark text-light"
                            id="basic-addon1">Proteína</span>
                        </div>
                        <input type="number" disabled id="cant4" name="4" class="form-control" aria-label="fuenteAlimento"
                          aria-describedby="basic-addon1" value="<?php echo $db['proteina'] ?>">
                        <div class="input-group-prepend">
                          <span class="input-group-text labelUnidMed bg-dark text-light" id="basic-addon1">g</span>
                        </div>
                      </div>
                    </div> <!-- Fin macronutrientes -->
                  </div>
                </div>
              </div> <!-- Fin Contenedor Macronutrientes -->
              <div class="row m-3 justify-content-center">
                <h3>Micronutrientes</h3>
                <div class="col-lg-12 col-md-12 col-sm-12 inputMicroData">
                  <!-- Columna 1 micronutrientes -->
                  <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-dark text-light labelMacroMicroNut"
                          id="basic-addon1">Colesterol</span>
                      </div>
                      <input type="number" disabled id="cant5" name="5" class="form-control" aria-label="fuenteAlimento"
                        aria-describedby="basic-addon1" value="<?php echo $db['colesterol'] ?>">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-dark text-light labelUnidMed" id="basic-addon1">mg</span>
                      </div>
                    </div>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-dark text-light labelMacroMicroNut" id="basic-addon1"
                          title="Fibra alimentaria">Fibra
                          Alim.</span>
                      </div>
                      <input type="number" disabled id="cant6" name="6" class="form-control" aria-label="fuenteAlimento"
                        aria-describedby="basic-addon1" value="<?php echo $db['falimentaria'] ?>">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-dark text-light labelUnidMed" id="basic-addon1">g</span>
                      </div>
                    </div>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-dark text-light labelMacroMicroNut"
                          id="basic-addon1">Sodio</span>
                      </div>
                      <input type="number" disabled id="cant7" name="7" class="form-control" aria-label="fuenteAlimento"
                        aria-describedby="basic-addon1" value="<?php echo $db['sodio'] ?>">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-dark text-light labelUnidMed" id="basic-addon1">mg</span>
                      </div>
                    </div>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-dark text-light labelMacroMicroNut"
                          id="basic-addon1">Agua</span>
                      </div>
                      <input type="number" disabled id="cant8" name="8" class="form-control" aria-label="fuenteAlimento"
                        aria-describedby="basic-addon1" value="<?php echo $db['agua'] ?>">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-dark text-light labelUnidMed" id="basic-addon1">g</span>
                      </div>
                    </div>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-dark text-light labelMacroMicroNut" id="basic-addon1">Vitamina
                          A</span>
                      </div>
                      <input type="number" disabled id="cant9" name="9" class="form-control" aria-label="fuenteAlimento"
                        aria-describedby="basic-addon1" value="<?php echo $db['vitaminaa'] ?>">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-dark text-light labelUnidMed" id="basic-addon1">µg</span>
                      </div>
                    </div>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-dark text-light labelMacroMicroNut" id="basic-addon1">Vitamina
                          B6</span>
                      </div>
                      <input type="number" disabled id="cant10" name="10" class="form-control" aria-label="fuenteAlimento"
                        aria-describedby="basic-addon1" value="<?php echo $db['vitaminab6'] ?>">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-dark text-light labelUnidMed" id="basic-addon1">mg</span>
                      </div>
                    </div>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-dark text-light labelMacroMicroNut" id="basic-addon1">Vitamina
                          B12</span>
                      </div>
                      <input type="number" disabled id="cant11" name="11" class="form-control" aria-label="fuenteAlimento"
                        aria-describedby="basic-addon1" value="<?php echo $db['vitaminab12'] ?>">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-dark text-light labelUnidMed" id="basic-addon1">µg</span>
                      </div>
                    </div>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-dark text-light labelMacroMicroNut" id="basic-addon1">Vitamina
                          C</span>
                      </div>
                      <input type="number" disabled id="cant12" name="12" class="form-control" aria-label="fuenteAlimento"
                        aria-describedby="basic-addon1" value="<?php echo $db['vitaminac'] ?>">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-dark text-light labelUnidMed" id="basic-addon1">mg</span>
                      </div>
                    </div>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-dark text-light labelMacroMicroNut" id="basic-addon1">Vitamina
                          D</span>
                      </div>
                      <input type="number" disabled id="cant13" name="13" class="form-control" aria-label="fuenteAlimento"
                        aria-describedby="basic-addon1" value="<?php echo $db['vitaminad'] ?>">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-dark text-light labelUnidMed" id="basic-addon1">µg</span>
                      </div>
                    </div>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-dark text-light labelMacroMicroNut"
                          id="basic-addon1">Cloruro</span>
                      </div>
                      <input type="number" disabled id="cant39" name="39" class="form-control" aria-label="fuenteAlimento"
                        aria-describedby="basic-addon1" value="<?php echo $db['cloruro'] ?>">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-dark text-light labelUnidMed" id="basic-addon1">mg</span>
                      </div>
                    </div>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-dark text-light labelMacroMicroNut"
                          id="basic-addon1">Folato</span>
                      </div>
                      <input type="number" disabled id="cant34" name="34" class="form-control" aria-label="fuenteAlimento"
                        aria-describedby="basic-addon1" value="<?php echo $db['folato'] ?>">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-dark text-light labelUnidMed" id="basic-addon1">µg</span>
                      </div>
                    </div>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-dark text-light labelMacroMicroNut" id="basic-addon1">Ácido
                          fólico</span>
                      </div>
                      <input type="number" disabled id="cant35" name="35" class="form-control" aria-label="fuenteAlimento"
                        aria-describedby="basic-addon1" value="<?php echo $db['acfolico'] ?>">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-dark text-light labelUnidMed" id="basic-addon1">µg</span>
                      </div>
                    </div>
                  </div> <!-- Fin columna 1 micronutrientes -->
                  <!-- Columna 2 micronutrientes -->
                  <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-dark text-light labelMacroMicroNut" id="basic-addon1">Vitamina
                          E</span>
                      </div>
                      <input type="number" disabled id="cant14" name="14" class="form-control" aria-label="fuenteAlimento"
                        aria-describedby="basic-addon1" value="<?php echo $db['vitaminae'] ?>">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-dark text-light labelUnidMed" id="basic-addon1">mg</span>
                      </div>
                    </div>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-dark text-light labelMacroMicroNut" id="basic-addon1">Vitamina
                          K</span>
                      </div>
                      <input type="number" disabled id="cant15" name="15" class="form-control" aria-label="fuenteAlimento"
                        aria-describedby="basic-addon1" value="<?php echo $db['vitaminak'] ?>">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-dark text-light labelUnidMed" id="basic-addon1">µg</span>
                      </div>
                    </div>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-dark text-light labelMacroMicroNut"
                          id="basic-addon1">Almidón</span>
                      </div>
                      <input type="number" disabled id="cant16" name="16" class="form-control" aria-label="fuenteAlimento"
                        aria-describedby="basic-addon1" value="<?php echo $db['almidon'] ?>">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-dark text-light labelUnidMed" id="basic-addon1">g</span>
                      </div>
                    </div>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-dark text-light labelMacroMicroNut"
                          id="basic-addon1">Lactosa</span>
                      </div>
                      <input type="number" disabled id="cant17" name="17" class="form-control" aria-label="fuenteAlimento"
                        aria-describedby="basic-addon1" value="<?php echo $db['lactosa'] ?>">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-dark text-light labelUnidMed" id="basic-addon1">g</span>
                      </div>
                    </div>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-dark text-light labelMacroMicroNut"
                          id="basic-addon1">Alcohol</span>
                      </div>
                      <input type="number" disabled id="cant18" name="18" class="form-control" aria-label="fuenteAlimento"
                        aria-describedby="basic-addon1" value="<?php echo $db['alcohol'] ?>">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-dark text-light labelUnidMed" id="basic-addon1">g</span>
                      </div>
                    </div>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-dark text-light labelMacroMicroNut"
                          id="basic-addon1">Cafeína</span>
                      </div>
                      <input type="number" disabled id="cant19" name="19" class="form-control" aria-label="fuenteAlimento"
                        aria-describedby="basic-addon1" value="<?php echo $db['cafeina'] ?>">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-dark text-light labelUnidMed" id="basic-addon1">mg</span>
                      </div>
                    </div>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-dark text-light labelMacroMicroNut"
                          id="basic-addon1">Azúcares</span>
                      </div>
                      <input type="number" disabled id="cant20" name="20" class="form-control" aria-label="fuenteAlimento"
                        aria-describedby="basic-addon1" value="<?php echo $db['azucares'] ?>">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-dark text-light labelUnidMed" id="basic-addon1">g</span>
                      </div>
                    </div>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-dark text-light labelMacroMicroNut"
                          id="basic-addon1">Calcio</span>
                      </div>
                      <input type="number" disabled id="cant21" name="21" class="form-control" aria-label="fuenteAlimento"
                        aria-describedby="basic-addon1" value="<?php echo $db['calcio'] ?>">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-dark text-light labelUnidMed" id="basic-addon1">mg</span>
                      </div>
                    </div>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-dark text-light labelMacroMicroNut"
                          id="basic-addon1">Hierro</span>
                      </div>
                      <input type="number" disabled id="cant22" name="22" class="form-control" aria-label="fuenteAlimento"
                        aria-describedby="basic-addon1" value="<?php echo $db['hierro'] ?>">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-dark text-light labelUnidMed" id="basic-addon1">mg</span>
                      </div>
                    </div>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-dark text-light labelMacroMicroNut" id="basic-addon1">Grasas
                          trans</span>
                      </div>
                      <input type="number" disabled id="cant36" name="36" class="form-control" aria-label="fuenteAlimento"
                        aria-describedby="basic-addon1" value="<?php echo $db['grasast'] ?>">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-dark text-light labelUnidMed" id="basic-addon1">g</span>
                      </div>
                    </div>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-dark text-light labelMacroMicroNut" id="basic-addon1"
                          title="Grasas monoinsaturadas">Grasas
                          mono.</span>
                      </div>
                      <input type="number" disabled id="cant37" name="37" class="form-control" aria-label="fuenteAlimento"
                        aria-describedby="basic-addon1" value="<?php echo $db['grasasmi'] ?>">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-dark text-light labelUnidMed" id="basic-addon1">g</span>
                      </div>
                    </div>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-dark text-light labelMacroMicroNut" id="basic-addon1"
                          title="Grasas poliinsaturadas">Grasas
                          poli.</span>
                      </div>
                      <input type="number" disabled id="cant38" name="38" class="form-control" aria-label="fuenteAlimento"
                        aria-describedby="basic-addon1" value="<?php echo $db['grasaspi'] ?>">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-dark text-light labelUnidMed" id="basic-addon1">g</span>
                      </div>
                    </div>
                  </div> <!-- Fin Columna 2 micronutrientes -->
                  <!-- Columna 3 micronutrientes -->
                  <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-dark text-light labelMacroMicroNut"
                          id="basic-addon1">Magnesio</span>
                      </div>
                      <input type="number" disabled id="cant23" name="23" class="form-control" aria-label="fuenteAlimento"
                        aria-describedby="basic-addon1" value="<?php echo $db['magnesio'] ?>">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-dark text-light labelUnidMed" id="basic-addon1">mg</span>
                      </div>
                    </div>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-dark text-light labelMacroMicroNut"
                          id="basic-addon1">Fósforo</span>
                      </div>
                      <input type="number" disabled id="cant24" name="24" class="form-control" aria-label="fuenteAlimento"
                        aria-describedby="basic-addon1" value="<?php echo $db['fosforo'] ?>">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-dark text-light labelUnidMed" id="basic-addon1">mg</span>
                      </div>
                    </div>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-dark text-light labelMacroMicroNut"
                          id="basic-addon1">Cinc</span>
                      </div>
                      <input type="number" disabled id="cant25" name="25" class="form-control" aria-label="fuenteAlimento"
                        aria-describedby="basic-addon1" value="<?php echo $db['cinc'] ?>">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-dark text-light labelUnidMed" id="basic-addon1">mg</span>
                      </div>
                    </div>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-dark text-light labelMacroMicroNut"
                          id="basic-addon1">Cobre</span>
                      </div>
                      <input type="number" disabled id="cant26" name="26" class="form-control" aria-label="fuenteAlimento"
                        aria-describedby="basic-addon1" value="<?php echo $db['cobre'] ?>">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-dark text-light labelUnidMed" id="basic-addon1">mg</span>
                      </div>
                    </div>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-dark text-light labelMacroMicroNut"
                          id="basic-addon1">Fluor</span>
                      </div>
                      <input type="number" disabled id="cant27" name="27" class="form-control" aria-label="fuenteAlimento"
                        aria-describedby="basic-addon1" value="<?php echo $db['fluor'] ?>">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-dark text-light labelUnidMed" id="basic-addon1">µg</span>
                      </div>
                    </div>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-dark text-light labelMacroMicroNut"
                          id="basic-addon1">Manganeso</span>
                      </div>
                      <input type="number" disabled id="cant28" name="28" class="form-control" aria-label="fuenteAlimento"
                        aria-describedby="basic-addon1" value="<?php echo $db['manganeso'] ?>">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-dark text-light labelUnidMed" id="basic-addon1">mg</span>
                      </div>
                    </div>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-dark text-light labelMacroMicroNut"
                          id="basic-addon1">Selenio</span>
                      </div>
                      <input type="number" disabled id="cant29" name="29" class="form-control" aria-label="fuenteAlimento"
                        aria-describedby="basic-addon1" value="<?php echo $db['selenio'] ?>">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-dark text-light labelUnidMed" id="basic-addon1">µg</span>
                      </div>
                    </div>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-dark text-light labelMacroMicroNut"
                          id="basic-addon1">Tiamina</span>
                      </div>
                      <input type="number" disabled id="cant30" name="30" class="form-control" aria-label="fuenteAlimento"
                        aria-describedby="basic-addon1" value="<?php echo $db['tiamina'] ?>">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-dark text-light labelUnidMed" id="basic-addon1">mg</span>
                      </div>
                    </div>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-dark text-light labelMacroMicroNut"
                          id="basic-addon1">Riboflavina</span>
                      </div>
                      <input type="number" disabled id="cant32" name="32" class="form-control" aria-label="fuenteAlimento"
                        aria-describedby="basic-addon1" value="<?php echo $db['riboflavina'] ?>">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-dark text-light labelUnidMed" id="basic-addon1">mg</span>
                      </div>
                    </div>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-dark text-light labelMacroMicroNut"
                          id="basic-addon1">Niacina</span>
                      </div>
                      <input type="number" disabled id="cant33" name="33" class="form-control" aria-label="fuenteAlimento"
                        aria-describedby="basic-addon1" value="<?php echo $db['niacina'] ?>">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-dark text-light labelUnidMed" id="basic-addon1">mg</span>
                      </div>
                    </div>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-dark text-light labelMacroMicroNut" id="basic-addon1"
                          title="Ácido pantetónico">Ácido pant.</span>
                      </div>
                      <input type="number" disabled id="cant31" name="31" class="form-control" aria-label="fuenteAlimento"
                        aria-describedby="basic-addon1" value="<?php echo $db['acpant'] ?>">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-dark text-light labelUnidMed" id="basic-addon1">mg</span>
                      </div>
                    </div>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-dark text-light labelMacroMicroNut" id="basic-addon1"
                          title="">Carotenos</span>
                      </div>
                      <input type="number" disabled id="cant40" name="40" class="form-control" aria-label="fuenteAlimento"
                        aria-describedby="basic-addon1" value="<?php echo $db['caroteno'] ?>">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-dark text-light labelUnidMed" id="basic-addon1">µg</span>
                      </div>
                    </div>
                  </div> <!-- Fin Columna 3 micronutrientes -->
                </div> <!-- Fin micronutrientes -->
                <!-- Botonera -->
                <div class="row m-3 justify-content-center">
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="buttons__AlimentoAlta">
                      <a class="btn btn-outline-secondary m-2" href="gestionAlimentos.php" role="button">Volver</a>
                      <a class="btn btn-danger m-2" href="#" data-toggle="modal" data-target="#borrarAlimentoModal"
                        role="button">Eliminar alimento</a>
                    </div>
                  </div>
                </div> <!-- Fin Botonera -->
              </div>
            </div> <!-- Fin Tabla Alimentos -->
          </div>
        </div>
      </div>
      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Desarrollado para UCEL por Leandro Donato, Sebastián Meza y Hernán Sosa &copy; Ingeniería en Sistemas
              UCEL</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->
    </div>
  </div> <!-- Fin Contenedor principal -->

  <!-- Borrar alimento Modal-->
  <div class="modal fade" id="borrarAlimentoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Estás por borrar el alimento</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Estás seguro?</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
          <a class="btn btn-danger" href="visualizarAlimento.php?eliminarAlimento=<?php echo $db['idalimentos']; ?>">Estoy seguro, borralo</a>
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
          <h5 class="modal-title" id="exampleModalLabel">Estás por cerrar tu sesión</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Para finalizar, hacé click en el botón "Cerrar sesión".</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
          <a class="btn btn-danger" href="assets/pages/Login/login.html">Cerrar sesión</a>
        </div>
      </div>
    </div>
  </div>



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