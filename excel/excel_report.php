<?php 
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=example.xls");
header('Cache-Control: max-age=0');

require_once 'excel/PHPExcel_1.7.8/Classes/PHPExcel.php';
require_once 'excel/PHPExcel_1.7.8/Classes/PHPExcel/IOFactory.php';

$objPHPExcel = new PHPExcel();

$objPHPExcel->setActiveSheetIndex(0);
$objPHPExcel->getActiveSheet()->setTitle('Example');
$objPHPExcel->getActiveSheet()->setCellValue('A1','Hello World');

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');
exit;