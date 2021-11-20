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
->setCreator("Nestor Tapia")
->setLastModifiedBy('BaulPHP')
->setTitle('Archivo generado desde MySQL')
->setDescription('Productos y proveedores exportados desde MySQL');

$hojaDeReporte = $documento->getActiveSheet();
$hojaDeReporte->setTitle("Productos");

# Encabezado de los productos
$encabezado = ["Identificación del Encuestado", "Nombre y Apellido Encuestador", "Sexo Encuestado", "Edad Encuestado"];
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
    $hojaDeReporte->setCellValueByColumnAndRow(1, $numeroDeFila, $idEncuestado);
    $hojaDeReporte->setCellValueByColumnAndRow(2, $numeroDeFila, $idUsuario);
    $hojaDeReporte->setCellValueByColumnAndRow(3, $numeroDeFila, $dbReportes['idalimento']);
    $hojaDeReporte->setCellValueByColumnAndRow(4, $numeroDeFila, $dbReportes['idfrecuencia']);
    $hojaDeReporte->setCellValueByColumnAndRow(5, $numeroDeFila, $dbReportes['idporcion']);
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







?>