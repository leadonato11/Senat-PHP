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

//Datos del usuario desde Tabla usuarios a traves de dni(Variable de Session) -> a
$u = $_SESSION['user'];
$c = mysqli_query($conect, "SELECT * FROM usuario WHERE dni='$u'");
$dbUser = mysqli_fetch_assoc($c);


//Tabla alimentos(ALL) -> dbs[]
$dbquery = mysqli_query($conect, "SELECT * FROM alimentos");
$numQueryAlim = mysqli_num_rows($dbquery);
if ($numQueryAlim != 0) {
  $validarCant = true;
} else {
  $validarCant = false;
}
if ($validarCant) {
  while ($db = $dbquery->fetch_array()) {
    $dbs[] = $db;
  }
  foreach ($dbs as $db) {

    $validarConJS[] = $db['nombre'];
  }
  unset($dbs);
}
//TABLA grupos (ALL)-> gdbs[]
$gquery = mysqli_query($conect, "SELECT * FROM grupos ");
while ($gdb = $gquery->fetch_array()) {
  $gdbs[] = $gdb;
}

//Aviso de reiteración de nombre
if (isset($_REQUEST['cargaAlimento']) && !empty($_REQUEST['cargaAlimento'])) {
  if ($_REQUEST['cargaAlimento'] == 'yaExiste') {
    echo '<script>alert("Ya existe un alimento con ese nombre. Por favor verifique.")</script>';
  }
}

//LECTURA, VALIDACION Y CARGA (FORMULARIO)	
if (isset($_REQUEST['nombre']) && !empty($_REQUEST['nombre'])) {
  //Nombre, Grupo, Cantidad de referencia y Unidad de Medida, estado:
  //nombre
  $nombre = $_REQUEST['nombre'];
  //Estado
  $estado = 1;
  //Base de datos Alimento
  $dbquery2 = mysqli_query($conect, "SELECT * FROM alimentos");
  $numQueryAlim2 = mysqli_num_rows($dbquery2);
  if ($numQueryAlim2 != 0) {
    $validarCant2 = true;
  } else {
    $validarCant2 = false;
  }
  if ($validarCant2) {
    while ($db2 = $dbquery2->fetch_assoc()) {
      $db2s[] = $db2;
    }
    //Validacion contra base de datos (Tabla Alimentos): nombre debe ser unico.
    $validar = true;

    foreach ($db2s as $db2) {
      $dbNombre = $db2['nombre'];

      if (strcasecmp($nombre, $dbNombre) == 0) {
        $validar = false;
      }
    }
    unset($db2s);
  } else {
    $validar = true;
  }
  //grupo
  $idgrupos = $_REQUEST['grupo'];
  //Datos del Grupo desde Tabla grupos a traves de idgrupos -> grupodb
  $grupoquery = mysqli_query($conect, "SELECT * FROM grupos WHERE idgrupos='$idgrupos'");
  $grupodb = mysqli_fetch_assoc($grupoquery);

  $grupo = $grupodb['nombres'];

  //umedida	
  $umedida = $_REQUEST['umedida'];

  //cantidad
  $cant = $_REQUEST['cant'];

  //Porciones	y Alimento

  $porcion1 = $_REQUEST['porcion1'];
  $porcion2 = $_REQUEST['porcion2'];
  $porcion3 = $_REQUEST['porcion3'];
  $porcion4 = $_REQUEST['porcion4'];
  //nombre de archivos por si son requeridos.. 
  $fotoalimento = $_FILE['fotoalimento']['name'];
  $fotoporcion1 = $_FILE['fotoporcion1']['name'];
  $fotoporcion2 = $_FILE['fotoporcion2']['name'];
  $fotoporcion3 = $_FILE['fotoporcion3']['name'];
  $fotoporcion4 = $_FILE['fotoporcion4']['name'];
  //nombres con que se guardarán
  $namef = $nombre . "falimento";
  $name1 = $nombre . "porcion1";
  $name2 = $nombre . "porcion2";
  $name3 = $nombre . "porcion3";
  $name4 = $nombre . "porcion4";
  //Nutrientes(40):(4 Macro y 36 Micro) -> nutrientes[]
  for ($i = 1; $i <= 40; $i++) {
    $j = strval($i);
    $nutrientes[$i] = $_REQUEST[$j];
  }

  //CARGA VALIDADA. 

  if ($validar == True) {
    $insert = mysqli_query($conect, "INSERT INTO alimentos VALUES (NULL, '$nombre', '$cant', '$umedida', '$porcion1', '$porcion2', '$porcion3', '$porcion4', '$grupo', '$nutrientes[1]', '$nutrientes[2]', '$nutrientes[3]', '$nutrientes[4]', '$nutrientes[5]', '$nutrientes[6]', '$nutrientes[7]', '$nutrientes[8]', '$nutrientes[9]', '$nutrientes[10]', '$nutrientes[11]', '$nutrientes[12]', '$nutrientes[13]', '$nutrientes[14]', '$nutrientes[15]', '$nutrientes[16]', '$nutrientes[17]', '$nutrientes[18]', '$nutrientes[19]', '$nutrientes[20]', '$nutrientes[21]', '$nutrientes[22]', '$nutrientes[23]', '$nutrientes[24]', '$nutrientes[25]', '$nutrientes[26]', '$nutrientes[27]', '$nutrientes[28]', '$nutrientes[29]', '$nutrientes[30]', '$nutrientes[31]', '$nutrientes[32]', '$nutrientes[33]', '$nutrientes[34]', '$nutrientes[35]', '$nutrientes[36]', '$nutrientes[37]', '$nutrientes[38]', '$nutrientes[39]', '$nutrientes[40]', '$estado')");
    if ($insert == 1) {

      mysqli_query($conect, "UPDATE lastupdate SET alimentos='$fechaActual' WHERE idlastupdate=1");
      $archf = move_uploaded_file($_FILES['fotoalimento']['tmp_name'], "../../img/ImgAlimentos/" . $namef . ".jpg");
      $arch1 = move_uploaded_file($_FILES['fotoporcion1']['tmp_name'], "../../img/ImgPorciones/" . $name1 . ".jpg");
      $arch2 = move_uploaded_file($_FILES['fotoporcion2']['tmp_name'], "../../img/ImgPorciones/" . $name2 . ".jpg");
      $arch3 = move_uploaded_file($_FILES['fotoporcion3']['tmp_name'], "../../img/ImgPorciones/" . $name3 . ".jpg");
      $arch4 = move_uploaded_file($_FILES['fotoporcion4']['tmp_name'], "../../img/ImgPorciones/" . $name4 . ".jpg");
      if ($arch1 == 1 && $arch2 == 1 && $arch3 == 1 && $arch4 == 1 && $archf == 1) {
        header("Location:gestionAlimentos.php?cargaAlimento=exitosa");
      } else {
        header("Location:gestionAlimentos.php?cargaAlimento=exitosaSinArchivos");
      }
    } else {
      header("Location:gestionAlimentos.php?cargaAlimento=fallida");
    }
  } else {
    header("Location:crearAlimento.php?cargaAlimento=yaExiste");
  }
}

?>


<script type="text/javascript">
  var validarJS = <?php echo json_encode($validarConJS); ?>;
  let nombreAlimento = document.getElementById('nombreAlimento');
  let buttonGuardarAlimento = document.getElementById('guardarAlimento');
  nombreAlimento.addEventListener('change', stateHandle);

  function stateHandle() {
    validarJS.forEach(function(date) {
      if (nombreAlimento.value === date) {

        buttonGuardarAlimento.classList.add(disabled);
        console.log('nombre repetido, boton deshabilitado');
      } else {
        console.log('nombre NO repetido, boton habilitado');
      }
    });
  }
</script>



<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Sistema desarrollado para la carrera de Nutrición de la Universidad del Centro Educativo Latinoamericano y presentado como proyecto final de los alumnos Leandro Donato, Sebastián Meza y Hernán Sosa, alumnos de la carrera de Ingeniería en Sistemas también de dicha Universidad.">
  <meta name="author" content="Leandro Donato, Sebastián Meza, Hernán Sosa, Juan Cruz Utge">
  <link rel="apple-touch-icon" sizes="180x180" href="../../img/Favicon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="../../img/Favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="../../img/Favicon/favicon-16x16.png">
  <link href="../../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="../../../css/sb-admin-2.min.css" rel="stylesheet">
  <link href="../../../css/estilos.css" rel="stylesheet">
  <title>SENAT | Crear Alimento</title>
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar Index -->
    <?php
    echo $menuAlimentos;
    ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
      <!-- Main Content -->
      <div id="content">
        <!-- Navbar Index -->
        <?php
        echo $navbar;
        ?>

        <!-- Contenido de la section -->
        <div class="container-fluid">

          <!-- Cabecera de la section -->
          <h1 class="h3 mb-2 text-gray-800">Agregar nuevo alimento</h1>
          <p class="mb-4">Rellena los campos de abajo con la información del alimento. Si desea más información puede
            ver las <a target="_blank" href="#">instrucciones de uso</a>.</p>

          <!-- Tabla Alimentos -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Agregar alimento</h6>
            </div>
            <form action="crearAlimento.php" method="POST" enctype="multipart/form-data" id="formCrearAlimento" class="form-inline d-flex flex-column align-items-center">
              <div class="row m-3 justify-content-center">
                <div class="col-lg-6 col-md-4 col-sm-12">
                  <div class="alimento__fotoPrincipal">
                    <h3>Imagen representativa</h3>
                    <img class="img-fluid rounded mb-2 imgAlimentoProfile" id="imagePreview" src="https://www.eluniversal.com.mx/sites/default/files/2016/09/07/manzana.jpg" alt="foodImage">
                    <div class="custom-file">
                      <input type="file" name="fotoalimento" class="custom-file-input" id="imagenAlimento" accept="image/png, image/gif, image/jpeg">
                      <label class="custom-file-label justify-content-start" for="imagenAlimento" id="imagenLabel">Imagen
                        alimento</label>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 col-md-4 col-sm-12">
                  <div class="alimento__dataInicial">
                    <h3>Datos del alimento</h3>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-dark text-light labelMacroMicroNut" id="basic-addon1">Nombre</span>
                      </div>
                      <input type="text" class="form-control" name="nombre" placeholder="Nombre del alimento..." aria-label="nombreAlimento" aria-describedby="basic-addon1" id="nombreAlimento" required>
                    </div>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-dark text-light labelMacroMicroNut" id="basic-addon1">Cantidad</span>
                      </div>
                      <input type="number" step="any" min="0" class="form-control inputCantGeneral" name="cant" placeholder="Cantidad porción gral..." aria-label="cantidadAlimento" aria-describedby="basic-addon1" title="Cantidad porción gral..." required>
                      <select class="custom-select" name="umedida" id="inputGroupSelect01" title="Unidad de medida" required>
                        <option selected disabled value="">Unidad de medida</option>
                        <option value="gr">gr</option>
                        <option value="cc">cc</option>
                      </select>
                    </div>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-dark text-light labelMacroMicroNut" id="basic-addon1">Grupo</span>
                      </div>
                      <select class="custom-select" name="grupo" id="inputGroupSelect01" required>
                        <option selected disabled value="">Seleccionar...</option>
                        <?php
                        foreach ($gdbs as $gdb) {
                          echo '<option value="' . $gdb["idgrupos"] . '">' . $gdb["nombres"] . '</option>';
                        }
                        unset($gdbs);
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
                        <div class="porcion text-center">
                          <img class="img-fluid rounded mb-2 imgAlimentoProfile" id="outputPorc01" src="" alt="foodImage">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="inputGroupFile01" name="fotoporcion1" accept="image/png, image/gif, image/jpeg" required>
                            <label class="custom-file-label" id="imagenLabelPorc01" for="inputGroupFile01">Porción
                              01</label>
                          </div>
                          <div class="InputInfoPorcion">
                            <input type="number" step="any" min="0" id="cantPorcion1" class="form-control" name="porcion1" placeholder="Peso/Volumen porción 01" aria-label="fuenteAlimento" aria-describedby="basic-addon1" required>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="porcion text-center">
                          <img class="img-fluid rounded mb-2 imgAlimentoProfile" id="outputPorc02" src="" alt="foodImage">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" name="fotoporcion2" id="inputGroupFile02" accept="image/png, image/gif, image/jpeg" required>
                            <label class="custom-file-label" id="imagenLabelPorc02" for="inputGroupFile02">Porción
                              02</label>
                          </div>
                          <div class="InputInfoPorcion">
                            <input type="number" step="any" min="0" id="cantPorcion2" class="form-control" name="porcion2" placeholder="Peso/Volumen porción 02" aria-label="fuenteAlimento" aria-describedby="basic-addon1" required>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="porcion text-center">
                          <img class="img-fluid rounded mb-2 imgAlimentoProfile" id="outputPorc03" src="" alt="foodImage">
                          <div class="custom-file" id="contenedorPorcion3">
                            <input type="file" class="custom-file-input" name="fotoporcion3" id="inputGroupFile03" accept="image/png, image/gif, image/jpeg">
                            <label class="custom-file-label" id="imagenLabelPorc03" for="inputGroupFile03">Porción
                              03</label>
                          </div>
                          <div class="InputInfoPorcion">
                            <input type="number" step="any" min="0" id="cantPorcion3" class="form-control" name="porcion3" placeholder="Peso/Volumen porción 03" aria-label="fuenteAlimento" aria-describedby="basic-addon1" required>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="porcion text-center">
                          <img class="img-fluid rounded mb-2 imgAlimentoProfile" id="outputPorc04" src="" alt="foodImage">
                          <div class="custom-file" id="contenedorPorcion4">
                            <input type="file" class="custom-file-input" name="fotoporcion4" id="inputGroupFile04" accept="image/png, image/gif, image/jpeg">
                            <label class="custom-file-label" id="imagenLabelPorc04" for="inputGroupFile04">Porción
                              04</label>
                          </div>
                          <div class="InputInfoPorcion">
                            <input type="number" step="any" min="0" id="cantPorcion4" class="form-control" name="porcion4" placeholder="Peso/Volumen porción 04" aria-label="fuenteAlimento" aria-describedby="basic-addon1" requierd>
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
                            <span class="input-group-text labelMacroNut bg-dark text-light" id="basic-addon1">Energía</span>
                          </div>
                          <input type="number" step="any" min="0" id="cant1" name="1" class="form-control" aria-label="fuenteAlimento" aria-describedby="basic-addon1" required>
                          <div class="input-group-prepend">
                            <span class="input-group-text labelUnidMed bg-dark text-light" id="basic-addon1">kcal</span>
                          </div>
                        </div>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text labelMacroNut bg-dark text-light" id="basic-addon1">Grasa</span>
                          </div>
                          <input type="number" step="any" min="0" id="cant2" name="2" class="form-control" aria-label="fuenteAlimento" aria-describedby="basic-addon1" required>
                          <div class="input-group-prepend">
                            <span class="input-group-text labelUnidMed bg-dark text-light" id="basic-addon1">g</span>
                          </div>
                        </div>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text labelMacroNut bg-dark text-light" id="basic-addon1">H.
                              Carb.</span>
                          </div>
                          <input type="number" step="any" min="0" id="cant3" name="3" class="form-control" aria-label="fuenteAlimento" aria-describedby="basic-addon1" required>
                          <div class="input-group-prepend">
                            <span class="input-group-text labelUnidMed bg-dark text-light" id="basic-addon1">g</span>
                          </div>
                        </div>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text labelMacroNut bg-dark text-light" id="basic-addon1">Proteína</span>
                          </div>
                          <input type="number" step="any" min="0" id="cant4" name="4" class="form-control" aria-label="fuenteAlimento" aria-describedby="basic-addon1" required>
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
                          <span class="input-group-text bg-dark text-light labelMacroMicroNut" id="basic-addon1">Colesterol</span>
                        </div>
                        <input type="number" step="any" min="0" id="cant5" name="5" class="form-control" aria-label="fuenteAlimento" aria-describedby="basic-addon1">
                        <div class="input-group-prepend">
                          <span class="input-group-text bg-dark text-light labelUnidMed" id="basic-addon1">mg</span>
                        </div>
                      </div>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text bg-dark text-light labelMacroMicroNut" id="basic-addon1" title="Fibra alimentaria">Fibra
                            Alim.</span>
                        </div>
                        <input type="number" step="any" min="0" id="cant6" name="6" class="form-control" aria-label="fuenteAlimento" aria-describedby="basic-addon1">
                        <div class="input-group-prepend">
                          <span class="input-group-text bg-dark text-light labelUnidMed" id="basic-addon1">g</span>
                        </div>
                      </div>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text bg-dark text-light labelMacroMicroNut" id="basic-addon1">Sodio</span>
                        </div>
                        <input type="number" step="any" min="0" id="cant7" name="7" class="form-control" aria-label="fuenteAlimento" aria-describedby="basic-addon1">
                        <div class="input-group-prepend">
                          <span class="input-group-text bg-dark text-light labelUnidMed" id="basic-addon1">mg</span>
                        </div>
                      </div>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text bg-dark text-light labelMacroMicroNut" id="basic-addon1">Agua</span>
                        </div>
                        <input type="number" step="any" min="0" id="cant8" name="8" class="form-control" aria-label="fuenteAlimento" aria-describedby="basic-addon1">
                        <div class="input-group-prepend">
                          <span class="input-group-text bg-dark text-light labelUnidMed" id="basic-addon1">g</span>
                        </div>
                      </div>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text bg-dark text-light labelMacroMicroNut" id="basic-addon1">Vitamina
                            A</span>
                        </div>
                        <input type="number" step="any" min="0" id="cant9" name="9" class="form-control" aria-label="fuenteAlimento" aria-describedby="basic-addon1">
                        <div class="input-group-prepend">
                          <span class="input-group-text bg-dark text-light labelUnidMed" id="basic-addon1">µg</span>
                        </div>
                      </div>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text bg-dark text-light labelMacroMicroNut" id="basic-addon1">Vitamina
                            B6</span>
                        </div>
                        <input type="number" step="any" min="0" id="cant10" name="10" class="form-control" aria-label="fuenteAlimento" aria-describedby="basic-addon1">
                        <div class="input-group-prepend">
                          <span class="input-group-text bg-dark text-light labelUnidMed" id="basic-addon1">mg</span>
                        </div>
                      </div>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text bg-dark text-light labelMacroMicroNut" id="basic-addon1">Vitamina
                            B12</span>
                        </div>
                        <input type="number" step="any" min="0" id="cant11" name="11" class="form-control" aria-label="fuenteAlimento" aria-describedby="basic-addon1">
                        <div class="input-group-prepend">
                          <span class="input-group-text bg-dark text-light labelUnidMed" id="basic-addon1">µg</span>
                        </div>
                      </div>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text bg-dark text-light labelMacroMicroNut" id="basic-addon1">Vitamina
                            C</span>
                        </div>
                        <input type="number" step="any" min="0" id="cant12" name="12" class="form-control" aria-label="fuenteAlimento" aria-describedby="basic-addon1">
                        <div class="input-group-prepend">
                          <span class="input-group-text bg-dark text-light labelUnidMed" id="basic-addon1">mg</span>
                        </div>
                      </div>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text bg-dark text-light labelMacroMicroNut" id="basic-addon1">Vitamina
                            D</span>
                        </div>
                        <input type="number" step="any" min="0" id="cant13" name="13" class="form-control" aria-label="fuenteAlimento" aria-describedby="basic-addon1">
                        <div class="input-group-prepend">
                          <span class="input-group-text bg-dark text-light labelUnidMed" id="basic-addon1">µg</span>
                        </div>
                      </div>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text bg-dark text-light labelMacroMicroNut" id="basic-addon1">Cloruro</span>
                        </div>
                        <input type="number" step="any" min="0" id="cant39" name="39" class="form-control" aria-label="fuenteAlimento" aria-describedby="basic-addon1">
                        <div class="input-group-prepend">
                          <span class="input-group-text bg-dark text-light labelUnidMed" id="basic-addon1">mg</span>
                        </div>
                      </div>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text bg-dark text-light labelMacroMicroNut" id="basic-addon1">Folato</span>
                        </div>
                        <input type="number" step="any" min="0" id="cant34" name="34" class="form-control" aria-label="fuenteAlimento" aria-describedby="basic-addon1">
                        <div class="input-group-prepend">
                          <span class="input-group-text bg-dark text-light labelUnidMed" id="basic-addon1">µg</span>
                        </div>
                      </div>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text bg-dark text-light labelMacroMicroNut" id="basic-addon1">Ácido
                            fólico</span>
                        </div>
                        <input type="number" step="any" min="0" id="cant35" name="35" class="form-control" aria-label="fuenteAlimento" aria-describedby="basic-addon1">
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
                        <input type="number" step="any" min="0" id="cant14" name="14" class="form-control" aria-label="fuenteAlimento" aria-describedby="basic-addon1">
                        <div class="input-group-prepend">
                          <span class="input-group-text bg-dark text-light labelUnidMed" id="basic-addon1">mg</span>
                        </div>
                      </div>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text bg-dark text-light labelMacroMicroNut" id="basic-addon1">Vitamina
                            K</span>
                        </div>
                        <input type="number" step="any" min="0" id="cant15" name="15" class="form-control" aria-label="fuenteAlimento" aria-describedby="basic-addon1">
                        <div class="input-group-prepend">
                          <span class="input-group-text bg-dark text-light labelUnidMed" id="basic-addon1">µg</span>
                        </div>
                      </div>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text bg-dark text-light labelMacroMicroNut" id="basic-addon1">Almidón</span>
                        </div>
                        <input type="number" step="any" min="0" id="cant16" name="16" class="form-control" aria-label="fuenteAlimento" aria-describedby="basic-addon1">
                        <div class="input-group-prepend">
                          <span class="input-group-text bg-dark text-light labelUnidMed" id="basic-addon1">g</span>
                        </div>
                      </div>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text bg-dark text-light labelMacroMicroNut" id="basic-addon1">Lactosa</span>
                        </div>
                        <input type="number" step="any" min="0" id="cant17" name="17" class="form-control" aria-label="fuenteAlimento" aria-describedby="basic-addon1">
                        <div class="input-group-prepend">
                          <span class="input-group-text bg-dark text-light labelUnidMed" id="basic-addon1">g</span>
                        </div>
                      </div>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text bg-dark text-light labelMacroMicroNut" id="basic-addon1">Alcohol</span>
                        </div>
                        <input type="number" step="any" min="0" id="cant18" name="18" class="form-control" aria-label="fuenteAlimento" aria-describedby="basic-addon1">
                        <div class="input-group-prepend">
                          <span class="input-group-text bg-dark text-light labelUnidMed" id="basic-addon1">g</span>
                        </div>
                      </div>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text bg-dark text-light labelMacroMicroNut" id="basic-addon1">Cafeína</span>
                        </div>
                        <input type="number" step="any" min="0" id="cant19" name="19" class="form-control" aria-label="fuenteAlimento" aria-describedby="basic-addon1">
                        <div class="input-group-prepend">
                          <span class="input-group-text bg-dark text-light labelUnidMed" id="basic-addon1">mg</span>
                        </div>
                      </div>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text bg-dark text-light labelMacroMicroNut" id="basic-addon1">Azúcares</span>
                        </div>
                        <input type="number" step="any" min="0" id="cant20" name="20" class="form-control" aria-label="fuenteAlimento" aria-describedby="basic-addon1">
                        <div class="input-group-prepend">
                          <span class="input-group-text bg-dark text-light labelUnidMed" id="basic-addon1">g</span>
                        </div>
                      </div>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text bg-dark text-light labelMacroMicroNut" id="basic-addon1">Calcio</span>
                        </div>
                        <input type="number" step="any" min="0" id="cant21" name="21" class="form-control" aria-label="fuenteAlimento" aria-describedby="basic-addon1">
                        <div class="input-group-prepend">
                          <span class="input-group-text bg-dark text-light labelUnidMed" id="basic-addon1">mg</span>
                        </div>
                      </div>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text bg-dark text-light labelMacroMicroNut" id="basic-addon1">Hierro</span>
                        </div>
                        <input type="number" step="any" min="0" id="cant22" name="22" class="form-control" aria-label="fuenteAlimento" aria-describedby="basic-addon1">
                        <div class="input-group-prepend">
                          <span class="input-group-text bg-dark text-light labelUnidMed" id="basic-addon1">mg</span>
                        </div>
                      </div>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text bg-dark text-light labelMacroMicroNut" id="basic-addon1">Grasas
                            trans</span>
                        </div>
                        <input type="number" step="any" min="0" id="cant36" name="36" class="form-control" aria-label="fuenteAlimento" aria-describedby="basic-addon1">
                        <div class="input-group-prepend">
                          <span class="input-group-text bg-dark text-light labelUnidMed" id="basic-addon1">g</span>
                        </div>
                      </div>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text bg-dark text-light labelMacroMicroNut" id="basic-addon1" title="Grasas monoinsaturadas">Grasas
                            mono.</span>
                        </div>
                        <input type="number" step="any" min="0" id="cant37" name="37" class="form-control" aria-label="fuenteAlimento" aria-describedby="basic-addon1">
                        <div class="input-group-prepend">
                          <span class="input-group-text bg-dark text-light labelUnidMed" id="basic-addon1">g</span>
                        </div>
                      </div>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text bg-dark text-light labelMacroMicroNut" id="basic-addon1" title="Grasas poliinsaturadas">Grasas
                            poli.</span>
                        </div>
                        <input type="number" step="any" min="0" id="cant38" name="38" class="form-control" aria-label="fuenteAlimento" aria-describedby="basic-addon1">
                        <div class="input-group-prepend">
                          <span class="input-group-text bg-dark text-light labelUnidMed" id="basic-addon1">g</span>
                        </div>
                      </div>
                    </div> <!-- Fin Columna 2 micronutrientes -->
                    <!-- Columna 3 micronutrientes -->
                    <div class="col-lg-4 col-md-6 col-sm-12">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text bg-dark text-light labelMacroMicroNut" id="basic-addon1">Magnesio</span>
                        </div>
                        <input type="number" step="any" min="0" id="cant23" name="23" class="form-control" aria-label="fuenteAlimento" aria-describedby="basic-addon1">
                        <div class="input-group-prepend">
                          <span class="input-group-text bg-dark text-light labelUnidMed" id="basic-addon1">mg</span>
                        </div>
                      </div>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text bg-dark text-light labelMacroMicroNut" id="basic-addon1">Fósforo</span>
                        </div>
                        <input type="number" step="any" min="0" id="cant24" name="24" class="form-control" aria-label="fuenteAlimento" aria-describedby="basic-addon1">
                        <div class="input-group-prepend">
                          <span class="input-group-text bg-dark text-light labelUnidMed" id="basic-addon1">mg</span>
                        </div>
                      </div>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text bg-dark text-light labelMacroMicroNut" id="basic-addon1">Cinc</span>
                        </div>
                        <input type="number" step="any" min="0" id="cant25" name="25" class="form-control" aria-label="fuenteAlimento" aria-describedby="basic-addon1">
                        <div class="input-group-prepend">
                          <span class="input-group-text bg-dark text-light labelUnidMed" id="basic-addon1">mg</span>
                        </div>
                      </div>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text bg-dark text-light labelMacroMicroNut" id="basic-addon1">Cobre</span>
                        </div>
                        <input type="number" step="any" min="0" id="cant26" name="26" class="form-control" aria-label="fuenteAlimento" aria-describedby="basic-addon1">
                        <div class="input-group-prepend">
                          <span class="input-group-text bg-dark text-light labelUnidMed" id="basic-addon1">mg</span>
                        </div>
                      </div>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text bg-dark text-light labelMacroMicroNut" id="basic-addon1">Fluor</span>
                        </div>
                        <input type="number" step="any" min="0" id="cant27" name="27" class="form-control" aria-label="fuenteAlimento" aria-describedby="basic-addon1">
                        <div class="input-group-prepend">
                          <span class="input-group-text bg-dark text-light labelUnidMed" id="basic-addon1">µg</span>
                        </div>
                      </div>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text bg-dark text-light labelMacroMicroNut" id="basic-addon1">Manganeso</span>
                        </div>
                        <input type="number" step="any" min="0" id="cant28" name="28" class="form-control" aria-label="fuenteAlimento" aria-describedby="basic-addon1">
                        <div class="input-group-prepend">
                          <span class="input-group-text bg-dark text-light labelUnidMed" id="basic-addon1">mg</span>
                        </div>
                      </div>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text bg-dark text-light labelMacroMicroNut" id="basic-addon1">Selenio</span>
                        </div>
                        <input type="number" step="any" min="0" id="cant29" name="29" class="form-control" aria-label="fuenteAlimento" aria-describedby="basic-addon1">
                        <div class="input-group-prepend">
                          <span class="input-group-text bg-dark text-light labelUnidMed" id="basic-addon1">µg</span>
                        </div>
                      </div>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text bg-dark text-light labelMacroMicroNut" id="basic-addon1">Tiamina</span>
                        </div>
                        <input type="number" step="any" min="0" id="cant30" name="30" class="form-control" aria-label="fuenteAlimento" aria-describedby="basic-addon1">
                        <div class="input-group-prepend">
                          <span class="input-group-text bg-dark text-light labelUnidMed" id="basic-addon1">mg</span>
                        </div>
                      </div>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text bg-dark text-light labelMacroMicroNut" id="basic-addon1">Riboflavina</span>
                        </div>
                        <input type="number" step="any" min="0" id="cant32" name="32" class="form-control" aria-label="fuenteAlimento" aria-describedby="basic-addon1">
                        <div class="input-group-prepend">
                          <span class="input-group-text bg-dark text-light labelUnidMed" id="basic-addon1">mg</span>
                        </div>
                      </div>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text bg-dark text-light labelMacroMicroNut" id="basic-addon1">Niacina</span>
                        </div>
                        <input type="number" step="any" min="0" id="cant33" name="33" class="form-control" aria-label="fuenteAlimento" aria-describedby="basic-addon1">
                        <div class="input-group-prepend">
                          <span class="input-group-text bg-dark text-light labelUnidMed" id="basic-addon1">mg</span>
                        </div>
                      </div>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text bg-dark text-light labelMacroMicroNut" id="basic-addon1" title="Ácido pantetónico">Ácido pant.</span>
                        </div>
                        <input type="number" step="any" min="0" id="cant31" name="31" class="form-control" aria-label="fuenteAlimento" aria-describedby="basic-addon1">
                        <div class="input-group-prepend">
                          <span class="input-group-text bg-dark text-light labelUnidMed" id="basic-addon1">mg</span>
                        </div>
                      </div>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text bg-dark text-light labelMacroMicroNut" id="basic-addon1" title="">Carotenos</span>
                        </div>
                        <input type="number" step="any" min="0" id="cant40" name="40" class="form-control" aria-label="fuenteAlimento" aria-describedby="basic-addon1">
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
                        <a class="btn btn-outline-danger m-2" href="#" data-toggle="modal" data-target="#cancelarAlimentoModal" role="button">Cancelar</a>
                        <a id="guardarAlimento" class="btn btn-success m-2" data-toggle="modal" data-target="#guardarAlimentoModal" role="button">Guardar alimento</a>
                      </div>
                    </div>
                  </div> <!-- Fin Botonera -->
                </div>
              </div> <!-- Fin Tabla Alimentos -->
              <!-- Guardar alimento Modal-->
              <div class="modal fade" id="guardarAlimentoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                      <a class="btn btn-secondary" data-dismiss="modal">Cancelar</a>
                      <button class="btn btn-success">Guardar</button>
                    </div>
                  </div>
                </div>
              </div>
            </form>
            <!-- Cancelar Guardar alimento Modal-->
            <div class="modal fade" id="cancelarAlimentoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Se perderán los datos del alimento</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <div class="modal-body">Estás seguro? Se perderán los datos no guardados.</div>
                  <div class="modal-footer">
                    <button class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <a href="gestionAlimentos.php" class="btn btn-danger" role="button">Si, estoy seguro</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
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
  <script src="../../../js/helper.js"></script>

</body>

</html>