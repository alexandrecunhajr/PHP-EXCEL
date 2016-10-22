<?php
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

include 'PHPExcel_1.8.0_doc/Classes/PHPExcel.php';
include 'PHPExcel_1.8.0_doc/Classes/PHPExcel/IOFactory.php' ;

/*$objReader = PHPExcel_IOFactory::createReader('Excel2007');
$objReader->setReadDataOnly(true);
$objPHPExcel = $objReader->load("LOJAS.xlsx");*/

$inputFileName='LOJAS1.csv';

$inputFileType = PHPExcel_IOFactory::identify($inputFileName);
$objReader = PHPExcel_IOFactory::createReader($inputFileType);
if($inputFileType=='CSV'){
  $objReader->setDelimiter(';');
}
$objPHPExcel = $objReader->load($inputFileName);
$objWorksheet = $objPHPExcel->getActiveSheet();
$highestRow = $objWorksheet->getHighestRow();
$highestColumn = $objWorksheet->getHighestColumn();
/*$highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);
*/
for ($row =2; $row < $highestRow; $row++) {
 
$loja = $objPHPExcel-> getActiveSheet() -> getCellByColumnAndRow(0, $row) -> getValue();
echo "Loja:".$loja."<br>";

 
}

echo  $highestRow;
?>