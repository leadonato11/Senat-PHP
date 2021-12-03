<?php 
include("../../../includes/conectar.php");
session_start();
if(!isset($_SESSION['user'])){
    header("Location:../../../index.php");
}

$fechaActual=Date("Y-m-d H:i:s");


require_once "../../../vendor/autoload.php";

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

# Obtener base de datos
/* $con = ConexionBD(); */
if (isset($_REQUEST['imprimirReporte']) && !empty($_REQUEST['imprimirReporte'])) {
  $_SESSION['imprimirReporte']=$_REQUEST['imprimirReporte'];
}else{
  header("gestionReportes.php");
}
$idEncuesta=$_SESSION['imprimirReporte'];

$documento = new Spreadsheet();
$documento
->getProperties()
->setCreator('SenatCreator')
->setLastModifiedBy('SenatModified')
->setTitle('Archivo generado automaticamente')
->setDescription('Tabla de ingesta de alimentos');

$hojaDeReporte = $documento->getActiveSheet();
$hojaDeReporte->setTitle("Reporte");

# Encabezado de los productos
$encabezado = ["Nombre y Apellido Encuestador", "Identificación del Encuestado", "Edad Encuestado", "Sexo Encuestado", "Alimento", "NroPorcion", "Frecuencia", "Peso Asociado", "Unidad de medida", "Energía", "Grasas", "Hidratos de carbono", "Proteínas", "Colesterol", "Fibra Alimentaria", "Sodio", "Agua", "Vitamina A", "Vitamina B6", "Vitamina B12", "Vitamina C", "Vitamina D", "Vitamina E", "Vitamina K", "Almidón", "Lactosa", "Alcohol", "Cafeína", "Azúcares", "Calcio", "Hierro", "Magnesio", "Fósforo", "Cinc", "Cobre", "Flúor", "Manganeso", "Selenio", "Tiamina", "Ácido Pantetónico", "Riboflavina", "Niacina", "Folato", "Ácido Fólico", "Gasas Trans", "Grasas Monoinsaturadas", "Grasas Poliinsaturadas", "Cloruro", "Caroteno"];
# El último argumento es por defecto A1
$hojaDeReporte->fromArray($encabezado, null, 'A1');
/* 
$consulta = "select * from tbl_productos";
$sentencia = $con->prepare($consulta, [
PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL,
]);
$sentencia->execute(); */
# Comenzamos en la fila 2
$numeroDeFila = 2;
$queryEncuesta=mysqli_query($conect, "SELECT * FROM encuesta WHERE idencuesta='$idEncuesta'");
$dbEnc=mysqli_fetch_assoc($queryEncuesta);
$queryEncuestado=mysqli_query($conect, "SELECT * FROM encuestado WHERE idencuesta='$idEncuesta'");
if(mysqli_num_rows($queryEncuestado)!=0){
  while($dbEncuestado=$queryEncuestado->fetch_assoc()){
    $dbEncuestadoS[]=$dbEncuestado;
  }
  foreach($dbEncuestadoS as $dbEncuestado){
    $idEncuestado=$dbEncuestado['idencuestado'];
    $idUsuario=$dbEncuestado['idusuario'];
    $queryReportes=mysqli_query($conect, "SELECT * FROM respuestas WHERE idencuesta='$idEncuestado'");
    if(mysqli_num_rows($queryReportes)!=0){
    while($dbReportes=$queryReportes->fetch_assoc()){
      $dbReportesS[]=$dbReportes;
    }
    foreach($dbReportesS as $dbReportes){
    //datosAlimentos
    $idAlimReport=$dbReportes['idalimento'];
    $queryAlimReport=mysqli_query($conect, "SELECT * FROM alimentos WHERE idalimentos='$idAlimReport'");
    $dbAlimReport=mysqli_fetch_assoc($queryAlimReport);
    //frecuencia
    $idFrecReport=$dbReportes['idfrecuencia'];
    $queryFrecReport=mysqli_query($conect, "SELECT * FROM frecuencias WHERE idfrecuencia='$idFrecReport'");
    $dbFrecReport=mysqli_fetch_assoc($queryFrecReport);
    //Encuestador
    $idUserReport=$dbEncuestado['idusuario'];
    $queryUserReport=mysqli_query($conect, "SELECT * FROM usuario WHERE idusuario='$idUserReport'");
    $dbUserReport=mysqli_fetch_assoc($queryUserReport);
    $usuarioReport=$dbUserReport['nombre']. ' ' . $dbUserReport['apellido'];
    $hojaDeReporte->setCellValueByColumnAndRow(1, $numeroDeFila, $usuarioReport);//encuestador
    $hojaDeReporte->setCellValueByColumnAndRow(2, $numeroDeFila, $idEncuestado);//idEncuestado
    $hojaDeReporte->setCellValueByColumnAndRow(3, $numeroDeFila, $dbEncuestado['edad']);//edad
    $hojaDeReporte->setCellValueByColumnAndRow(4, $numeroDeFila, $dbEncuestado['sexo']);//sexo
    $hojaDeReporte->setCellValueByColumnAndRow(5, $numeroDeFila, $dbAlimReport['nombre']);//Alimento
    $porcionReport=$dbReportes['idporcion'];
    if($porcionReport!=0){
    $porcion='porcion'.$porcionReport;
    $pesoPorcionReport=$dbAlimReport[$porcion];
    }else{
      $pesoPorcionReport=0;
    }
    $hojaDeReporte->setCellValueByColumnAndRow(6, $numeroDeFila, $dbReportes['idporcion']);//numero de Porcion
    $hojaDeReporte->setCellValueByColumnAndRow(7, $numeroDeFila, $dbFrecReport['nombrefrec']);//Frecuencia
    $hojaDeReporte->setCellValueByColumnAndRow(8, $numeroDeFila, $pesoPorcionReport);//Peso Asociado
    $hojaDeReporte->setCellValueByColumnAndRow(9, $numeroDeFila, $dbAlimReport['umedida']);//unidad de medida
    $queryAlimReport2=mysqli_query($conect, "SELECT * FROM alimentos WHERE idalimentos='$idAlimReport'");
    $nutrientesReport=mysqli_fetch_array($queryAlimReport2);
    for($k=9; $k<=48; $k++){
      $j=$k+1;
      $nutrientesCantidad=(($pesoPorcionReport/$dbAlimReport['cant'])*$nutrientesReport[$k])*$dbFrecReport['valorfrec'];
      $hojaDeReporte->setCellValueByColumnAndRow($j, $numeroDeFila, $nutrientesCantidad);//Nutriente $k-ésimo(de 9 a 48)
    }


    $numeroDeFila = $numeroDeFila + 1;
    }unset($dbReportesS);
    }
  }unset($dbEncuestadoS);
}

# Crear un "escritor"
$writer = new Xlsx($documento);
# Le pasamos la ruta de guardado
$writer->save('Reporte-'.$dbEnc['nombre'].'.xlsx'); 
/* $writer->save('php://output'); */
header("Location:Reporte-".$dbEnc['nombre'].".xlsx");
