<?php 
include("../../../includes/conectar.php");
session_start();
if(!isset($_SESSION['user'])){
    header("Location:../../../index.php");
}
date_default_timezone_set("America/Argentina/Buenos_Aires");
$fechaActual=Date("Y-m-d");

//Datos del usuario desde Tabla usuarios a traves de dni(Variable de Session) -> a
$u=$_SESSION['user'];
$c=mysqli_query($conect, "SELECT * FROM usuario WHERE dni='$u'");
$a=mysqli_fetch_assoc($c);

//Datos del alimento desde Tabla alimentos a traves de idalimentos(Variable de Session) -> db
if(isset($_REQUEST['e']) && !empty($_REQUEST['e'])){
$_SESSION['editarAlimento']=$_REQUEST['e'];
}else{
    $_SESSION['editarAlimento']=""; 
}
$idalimentos=$_SESSION['editarAlimento'];
$dbquery=mysqli_query($conect, "SELECT * FROM alimentos WHERE idalimentos='$idalimentos'");
$db=mysqli_fetch_array($dbquery);

//Tabla alimentos(ALL) -> alimentoss[]
$aquery=mysqli_query($conect, "SELECT * FROM alimentos");
while($alimento=$aquery->fetch_array()){
        $alimentos[]=$alimento;
    }

//TABLA grupos (ALL)-> gdbs[]
$gquery=mysqli_query($conect, "SELECT * FROM grupos ");
while($gdb=$gquery->fetch_array()){
        $gdbs[]=$gdb;
    }

//LECTURA, VALIDACION Y CARGA (FORMULARIO)	
if(isset($_REQUEST['nombre']) && !empty($_REQUEST['nombre'])){
	//Nombre, Grupo, Cantidad de referencia y Unidad de Medida:
	
	//nombre
		$nombre=$_REQUEST['nombre'];
	
	//Validacion contra base de datos (Tabla Alimentos): nombre debe ser unico.
		$validar=true;
		foreach($alimentos as $alimento){
			if($nombre==$alimento['nombre'] && $nombre!=$db['nombre']){
				$validar=false;
			}
		}unset($alimentos);
        if($nombre!=$db['nombre']){
            $cambiarNombreFoto=true;
        }else{
            $cambiarNombreFoto=false;
        }
	//grupo
			$idgrupos=$_REQUEST['grupo'];
			//Datos del Grupo desde Tabla grupos a traves de idgrupos -> grupodb
			$grupoquery=mysqli_query($conect, "SELECT * FROM grupos WHERE idgrupos='$idgrupos'");
			$grupodb=mysqli_fetch_assoc($grupoquery);
	
		$grupo=$grupodb['nombres'];
	
	//umedida	
		$umedida=$_REQUEST['umedida'];
		
	//cantidad
		$cant=$_REQUEST['cant'];
		
	//Porciones	
		$porcion1=$_REQUEST['porcion1'];
		$porcion2=$_REQUEST['porcion2'];
		$porcion3=$_REQUEST['porcion3'];
		$porcion4=$_REQUEST['porcion4'];
		//nombres con que se guardarán
		$namef=$nombre."falimento";
		$name1=$nombre."porcion1";
		$name2=$nombre."porcion2";
		$name3=$nombre."porcion3";
		$name4=$nombre."porcion4";
	//Nutrientes(40):(4 Macro y 36 Micro) -> nutrientes[]
		for($i=1 ; $i<=40 ; $i++){
			$j=strval($i);	
			$nutrientes[$i]=$_REQUEST[$j];
            
		}
		
	//edicion VALIDADA. 
	
		
			$update=mysqli_query($conect, "UPDATE alimentos SET  nombre='$nombre', cant='$cant', umedida='$umedida', porcion1='$porcion1', porcion2='$porcion2', porcion3='$porcion3', porcion4='$porcion4', grupo='$grupo', energia='$nutrientes[1]', grasa='$nutrientes[2]', hcarbono='$nutrientes[3]', proteina='$nutrientes[4]', colesterol='$nutrientes[5]', falimentaria='$nutrientes[6]', sodio='$nutrientes[7]', agua='$nutrientes[8]', vitaminaa='$nutrientes[9]', vitaminab6='$nutrientes[10]', vitaminab12='$nutrientes[11]', vitaminac='$nutrientes[12]', vitaminad='$nutrientes[13]', vitaminae='$nutrientes[14]', vitaminak='$nutrientes[15]', almidon='$nutrientes[16]', lactosa='$nutrientes[17]', alcohol='$nutrientes[18]', cafeina='$nutrientes[19]', azucares='$nutrientes[20]', calcio='$nutrientes[21]', hierro='$nutrientes[22]', magnesio='$nutrientes[23]', fosforo='$nutrientes[24]', cinc='$nutrientes[25]', cobre='$nutrientes[26]', fluor='$nutrientes[27]', manganeso='$nutrientes[28]', selenio='$nutrientes[29]', tiamina='$nutrientes[30]', acpant='$nutrientes[31]', riboflavina='$nutrientes[32]', niacina='$nutrientes[33]', folato='$nutrientes[34]', acfolico='$nutrientes[35]', grasast='$nutrientes[36]', grasasmi='$nutrientes[37]', grasaspi='$nutrientes[38]', cloruro='$nutrientes[39]', caroteno='$nutrientes[40]' WHERE idalimentos='$idalimentos'");
				
						
			
			if($_FILES['fotoalimento']['name']!="" || $cambiarNombreFoto){
            $arch01="../../img/imgAlimentos/".$db['nombre']."falimento.jpg";
			$arch1=move_uploaded_file($_FILES['fotoalimento']['tmp_name'],"../../img/imgAlimentos/".$namef.".jpg");
                if($cambiarNombreFoto){
                    unlink($arch01);
                }
            }
			if($_FILES['fotoporcion1']['name']!="" || $cambiarNombreFoto){
			$arch02="../../img/imgAlimentos/".$db['nombre']."porcion1.jpg";
                $arch2=move_uploaded_file($_FILES['fotoporcion1']['tmp_name'],"../../img/imgPorciones/".$name1.".jpg");
			 if($cambiarNombreFoto){
                    unlink($arch02);
                }
            }
			if($_FILES['fotoporcion2']['name']!="" || $cambiarNombreFoto){
			$arch03="../../img/imgAlimentos/".$db['nombre']."porcion2.jpg";
            $arch3=move_uploaded_file($_FILES['fotoporcion2']['tmp_name'],"../../img/imgPorciones/".$name2.".jpg");
		    if($cambiarNombreFoto){
                    unlink($arch03);
                }	
            }
			if($_FILES['fotoporcion3']['name']!="" || $cambiarNombreFoto){
			$arch04="../../img/imgAlimentos/".$db['nombre']."porcion3.jpg";
            $arch4=move_uploaded_file($_FILES['fotoporcion3']['tmp_name'],"../../img/imgPorciones/".$name3.".jpg");
                if($cambiarNombreFoto){
                        unlink($arch04);
                    }	
            }
			if($_FILES['fotoporcion4']['name']!="" || $cambiarNombreFoto){
			$arch05="../../img/imgAlimentos/".$db['nombre']."porcion4.jpg";
            $arch5=move_uploaded_file($_FILES['fotoporcion4']['tmp_name'],"../../img/imgPorciones/".$name4.".jpg");
                if($cambiarNombreFoto){
                        unlink($arch05);
                    }	
            }			
				
		
        if($update>0){
		    header("Location:gestionAlimentos.php?modificado=exitoso");
        }else{
            header("Location:gestionAlimentos.php?modificado=".$nutrientes[5]);
        }
}
?>

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
  <title>SENAT | Crear alimento</title>

  <script type='text/javascript'>
function confirmChanges()
{
 var respuesta=confirm("¿Está Seguro?");

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
          <span>Grupos de alimentos</span>
        </a>
        <div id="collapseFoodGroups" class="collapse" aria-labelledby="headingUtilities"
          data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Menú grupo alimentos:</h6>
            <a class="collapse-item" href="../Grupos de Alimentos/gestionGrupoDeAlimentos.html">Gestionar grupos</a>
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
            <form action="editarAlimento.php" method="POST" enctype="multipart/form-data" id="formCrearAlimento" class="form-inline d-flex flex-column align-items-center">
              <div class="row m-3 justify-content-center">
                <div class="col-lg-6 col-md-4 col-sm-12">
                  <div class="alimento__fotoPrincipal">
                    <h3>Imagen representativa</h3>
                    <img class="img-fluid rounded mb-2 imgAlimentoProfile"
                      src="../../img/imgAlimentos/<?php echo $db['nombre'] ?>falimento.jpg" alt="foodImage">
                    <div class="custom-file">
                      <input type="file" name="fotoalimento" class="custom-file-input" id="imagenAlimento">
                      <label class="custom-file-label justify-content-start" for="imagenAlimento">Imagen
                        alimento</label>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 col-md-4 col-sm-12">
                  <div class="alimento__dataInicial">
                    <h3>Datos del alimento</h3>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-dark text-light labelMacroMicroNut"
                          id="basic-addon1">Nombre</span>
                      </div>
                      <input type="text" class="form-control" name="nombre" placeholder="Nombre del alimento..." value="<?php echo $db['nombre'] ?>"
                        aria-label="nombreAlimento" aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-dark text-light labelMacroMicroNut"
                          id="basic-addon1">Cantidad</span>
                      </div>
                      <input type="number" step="any" min="0" class="form-control inputCantGeneral" name="cant" value="<?php echo $db['cant'] ?>" placeholder="Cantidad porción gral..."
                        aria-label="cantidadAlimento" aria-describedby="basic-addon1" title="Cantidad porción gral...">
                      <select class="custom-select" name="umedida" id="inputGroupSelect01" title="Unidad de medida">
                        <option selected><?php echo $db['umedida'] ?></option>
                        <option value="gr">gr</option>
                        <option value="cc">cc</option>
                      </select>
                    </div>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-dark text-light labelMacroMicroNut"
                          id="basic-addon1">Grupo</span>
                      </div>
                      <select class="custom-select" name="grupo" id="inputGroupSelect01">
                        <option selected><?php echo $db['grupo'] ?></option>
                        <?php 
												foreach($gdbs as $gdb){
													echo '<option value="'.$gdb["idgrupos"].'">'.$gdb["nombres"].'</option>';
												}unset($gdbs);
												?>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row m-3 justify-content-center">
                <div class="col-lg-12 col-md-12 col-sm-12">
                  <div class="porciones__data">
                    <h3>Porciones</h3>
                    <p>Indique las fotos de las porciones con su respectivo peso/volumen para el
                      alimento de referencia
                    </p>
                    <div class="imgPorcionesFiles">
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="porcion">
                                <img class="img-fluid rounded mb-2 imgAlimentoProfile"
                                src="../../img/imgPorciones/<?php echo $db['nombre']; ?>porcion1.jpg"
                                alt="foodImage">
                                <div class="custom-file">
                            <input type="file" class="custom-file-input" id="inputGroupFile01" name="fotoporcion1">
                            <label class="custom-file-label" for="inputGroupFile01">Porción
                              01</label>
                          </div>
                          <div class="InputInfoPorcion">
                            <input type="number" step="any" min="0" value="<?php echo $db['porcion1']; ?>" class="form-control" name="porcion2" value="" placeholder="Peso/Volumen porción 01"
                              aria-label="fuenteAlimento" aria-describedby="basic-addon1">
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="porcion">
                            <img class="img-fluid rounded mb-2 imgAlimentoProfile"
                                src="../../img/imgPorciones/<?php echo $db['nombre']; ?>porcion2.jpg"
                                alt="foodImage">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" name="fotoporcion2" id="inputGroupFile02">
                            <label class="custom-file-label" for="inputGroupFile02">Porción
                              02</label>
                          </div>
                          <div class="InputInfoPorcion">
                            <input type="number" step="any" min="0" value="<?php echo $db['porcion2']; ?>" class="form-control" name="porcion2" placeholder="Peso/Volumen porción 02"
                              aria-label="fuenteAlimento" aria-describedby="basic-addon1">
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="porcion">
                            <img class="img-fluid rounded mb-2 imgAlimentoProfile"
                                src="../../img/imgPorciones/<?php echo $db['nombre']; ?>porcion3.jpg"
                                alt="foodImage">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="inputGroupFile03" name="fotoporcion3">
                            <label class="custom-file-label" for="inputGroupFile03">Porción
                              03</label>
                          </div>
                          <div class="InputInfoPorcion">
                            <input type="number" step="any" min="0"  value="<?php echo $db['porcion3']; ?>" class="form-control" name="porcion3" placeholder="Peso/Volumen porción 03"
                              aria-label="fuenteAlimento" aria-describedby="basic-addon1">
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="porcion">
                            <img class="img-fluid rounded mb-2 imgAlimentoProfile"
                                src="../../img/imgPorciones/<?php echo $db['nombre']; ?>porcion4.jpg"
                                alt="foodImage">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" name="fotoporcion4" id="inputGroupFile04">
                            <label class="custom-file-label" for="inputGroupFile04">Porción
                              04</label>
                          </div>
                          <div class="InputInfoPorcion">
                            <input type="number" step="any" min="0"  value="<?php echo $db['porcion4']; ?>" class="form-control" name="porcion4" placeholder="Peso/Volumen porción 04"
                              aria-label="fuenteAlimento" aria-describedby="basic-addon1">
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
                        <input type="number" step="any" min="0" id="cant1" name="1" class="form-control" aria-label="fuenteAlimento"
                          aria-describedby="basic-addon1" value="<?php echo $db['energia']; ?>">
                        <div class="input-group-prepend">
                          <span class="input-group-text labelUnidMed bg-dark text-light" id="basic-addon1">kcal</span>
                        </div>
                      </div>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text labelMacroNut bg-dark text-light" id="basic-addon1">Grasa</span>
                        </div>
                        <input type="number" step="any" min="0" id="cant2" name="2" class="form-control" aria-label="fuenteAlimento"
                          aria-describedby="basic-addon1" value="<?php echo $db['grasa'] ?>">
                        <div class="input-group-prepend">
                          <span class="input-group-text labelUnidMed bg-dark text-light" id="basic-addon1">g</span>
                        </div>
                      </div>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text labelMacroNut bg-dark text-light" id="basic-addon1">H.
                            Carb.</span>
                        </div>
                        <input type="number" step="any" min="0" id="cant3" name="3" class="form-control" aria-label="fuenteAlimento"
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
                        <input type="number" step="any" min="0" id="cant4" name="4" class="form-control" aria-label="fuenteAlimento"
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
                      <input type="number" step="any" min="0" id="cant5" name="5" class="form-control" aria-label="fuenteAlimento"
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
                      <input type="number" step="any" min="0" id="cant6" name="6" class="form-control" aria-label="fuenteAlimento"
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
                      <input type="number" step="any" min="0" id="cant7" name="7" class="form-control" aria-label="fuenteAlimento"
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
                      <input type="number" step="any" min="0" id="cant8" name="8" class="form-control" aria-label="fuenteAlimento"
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
                      <input type="number" step="any" min="0" id="cant9" name="9" class="form-control" aria-label="fuenteAlimento"
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
                      <input type="number" step="any" min="0" id="cant10" name="10" class="form-control" aria-label="fuenteAlimento"
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
                      <input type="number" step="any" min="0" id="cant11" name="11" class="form-control" aria-label="fuenteAlimento"
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
                      <input type="number" step="any" min="0" id="cant12" name="12" class="form-control" aria-label="fuenteAlimento"
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
                      <input type="number" step="any" min="0" id="cant13" name="13" class="form-control" aria-label="fuenteAlimento"
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
                      <input type="number" step="any" min="0" id="cant39" name="39" class="form-control" aria-label="fuenteAlimento"
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
                      <input type="number" step="any" min="0" id="cant34" name="34" class="form-control" aria-label="fuenteAlimento"
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
                      <input type="number" step="any" min="0" id="cant35" name="35" class="form-control" aria-label="fuenteAlimento"
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
                      <input type="number" step="any" min="0" id="cant14" name="14" class="form-control" aria-label="fuenteAlimento"
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
                      <input type="number" step="any" min="0" id="cant15" name="15" class="form-control" aria-label="fuenteAlimento"
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
                      <input type="number" step="any" min="0" id="cant16" name="16" class="form-control" aria-label="fuenteAlimento"
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
                      <input type="number" step="any" min="0" id="cant17" name="17" class="form-control" aria-label="fuenteAlimento"
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
                      <input type="number" step="any" min="0" id="cant18" name="18" class="form-control" aria-label="fuenteAlimento"
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
                      <input type="number" step="any" min="0" id="cant19" name="19" class="form-control" aria-label="fuenteAlimento"
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
                      <input type="number" step="any" min="0" id="cant20" name="20" class="form-control" aria-label="fuenteAlimento"
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
                      <input type="number" step="any" min="0" id="cant21" name="21" class="form-control" aria-label="fuenteAlimento"
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
                      <input type="number" step="any" min="0" id="cant22" name="22" class="form-control" aria-label="fuenteAlimento"
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
                      <input type="number" step="any" min="0" id="cant36" name="36" class="form-control" aria-label="fuenteAlimento"
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
                      <input type="number" step="any" min="0" id="cant37" name="37" class="form-control" aria-label="fuenteAlimento"
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
                      <input type="number" step="any" min="0" id="cant38" name="38" class="form-control" aria-label="fuenteAlimento"
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
                      <input type="number" step="any" min="0" id="cant23" name="23" class="form-control" aria-label="fuenteAlimento"
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
                      <input type="number" step="any" min="0" id="cant24" name="24" class="form-control" aria-label="fuenteAlimento"
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
                      <input type="number" step="any" min="0" id="cant25" name="25" class="form-control" aria-label="fuenteAlimento"
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
                      <input type="number" step="any" min="0" id="cant26" name="26" class="form-control" aria-label="fuenteAlimento"
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
                      <input type="number" step="any" min="0" id="cant27" name="27" class="form-control" aria-label="fuenteAlimento"
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
                      <input type="number" step="any" min="0" id="cant28" name="28" class="form-control" aria-label="fuenteAlimento"
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
                      <input type="number" step="any" min="0" id="cant29" name="29" class="form-control" aria-label="fuenteAlimento"
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
                      <input type="number" step="any" min="0" id="cant30" name="30" class="form-control" aria-label="fuenteAlimento"
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
                      <input type="number" step="any" min="0" id="cant32" name="32" class="form-control" aria-label="fuenteAlimento"
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
                      <input type="number" step="any" min="0" id="cant33" name="33" class="form-control" aria-label="fuenteAlimento"
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
                      <input type="number" step="any" min="0" id="cant31" name="31" class="form-control" aria-label="fuenteAlimento"
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
                      <input type="number" step="any" min="0" id="cant40" name="40" class="form-control" aria-label="fuenteAlimento"
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
                        <a class="btn btn-outline-danger m-2" href="gestionAlimentos.php">Cancelar</a>
                        <button class="btn btn-success m-2" onclick="return confirmChanges()">Guardar Cambios</button>
                      </div>
                    </div>
                  </div> <!-- Fin Botonera -->
                </div>
              </div> <!-- Fin Tabla Alimentos -->
            </form>
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

  <!-- Guardar alimento Modal-->
  <div class="modal fade" id="guardarAlimentoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Se guardarán los datos del alimento</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Estás seguro?</div>
        <div class="modal-footer">
          <button class="btn btn-secondary"data-dismiss="modal">Cancelar</button>
          <a class="btn btn-success">Guardar</a>
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
  <!-- <script src="../../../js/helpers.js"></script> -->

  <!-- Custom scripts for all pages-->
  <script src="../../../js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="../../../vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="../../../js/demo/chart-area-demo.js"></script>
  <script src="../../../js/demo/chart-pie-demo.js"></script>

</body>

</html>