<?php
 
/** Error reporting */
error_reporting(E_ALL);
 
date_default_timezone_set('Europe/London');
 
/** Include PHPExcel */
require_once './Classes/PHPExcel.php';

// Create new PHPExcel object
$objPHPExcel = new PHPExcel();
 
// Create the worksheet
$objPHPExcel->setActiveSheetIndex(0);

// mulai judul kolom dengan row 12
$objPHPExcel->getActiveSheet()->setCellValue('A12', "No")
							  ->setCellValue('B12', "Tanggal")
							  ->setCellValue('C12', "Jam")
							  ->setCellValue('D12', "Pelimpas")
							  ->setCellValue('D13', "Kiri")
							  ->setCellValue('E13', "Kanan")
							  ->setCellValue('F12', "Jumlah")
							  ->setCellValue('G12', "Keterangan");
							  

$objPHPExcel->getActiveSheet()->mergeCells('D12:E12');
$objPHPExcel->getActiveSheet()->mergeCells('A12:A13');
$objPHPExcel->getActiveSheet()->mergeCells('B12:B13');
$objPHPExcel->getActiveSheet()->mergeCells('C12:C13');						  
$objPHPExcel->getActiveSheet()->mergeCells('F12:F13');
$objPHPExcel->getActiveSheet()->mergeCells('G12:G13');						  

// koneksi database
include ("koneksi.php"); 

// query database
$SQL = mysql_query("select * from dab_cikeas order by tanggal_input");

// jumlah data
//$jumlah = mysql_num_rows($SQL);
  
$dataArray= array();
$no=0;

// menampilkan data, susunan field sesuai dengan urutan judul kolom 
while($row = mysql_fetch_array($SQL, MYSQL_ASSOC)){
	$no++;
	$row_array['id'] = $no;
	$row_array['tanggal_input'] = $row['tanggal_input'];
	$row_array['jam'] = $row['jam'];
	$row_array['pelimpas_kiri'] = $row['pelimpas_kiri'];
	$row_array['pelimpas_kanan'] = $row['pelimpas_kanan'];
	$row_array['jumlah'] = $row['jumlah'];
	$row_array['keterangan'] = $row['keterangan'];
	
	array_push($dataArray,$row_array);
}

// Mulai record dengan row 8
$nox=$no+13;
$objPHPExcel->getActiveSheet()->fromArray($dataArray, NULL, 'A14'); 

// Set page orientation and size
$objPHPExcel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
$objPHPExcel->getActiveSheet()->getPageSetup()->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_LEGAL);
$objPHPExcel->getActiveSheet()->getPageMargins()->setTop(0.75);
$objPHPExcel->getActiveSheet()->getPageMargins()->setRight(0.75);
$objPHPExcel->getActiveSheet()->getPageMargins()->setLeft(0.75);
$objPHPExcel->getActiveSheet()->getPageMargins()->setBottom(0.75);
$objPHPExcel->getActiveSheet()->getHeaderFooter()->setOddFooter('&L&B' . $objPHPExcel->getProperties()->getTitle() . '&RPage &P of &N');
 
// Set title row bold;
$objPHPExcel->getActiveSheet()->getStyle('A12:G12')->getFont()->setBold(true);
// Set fills
$objPHPExcel->getActiveSheet()->getStyle('A12:G12')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
$objPHPExcel->getActiveSheet()->getStyle('A12:G12')->getFill()->getStartColor()->setARGB('FF808080');

//untuk auto size colomn 
$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(3);
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
 
// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);
 
$sharedStyle1 = new PHPExcel_Style();
$sharedStyle2 = new PHPExcel_Style();
 
$sharedStyle1->applyFromArray(
 array('borders' => array(
 'bottom' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
 'top' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
 'right' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
 'left' => array('style' => PHPExcel_Style_Border::BORDER_THIN)
 ),
 ));
 
$objPHPExcel->getActiveSheet()->setSharedStyle($sharedStyle1, "A12:G$nox");
 
// Set style for header row using alternative method
$objPHPExcel->getActiveSheet()->getStyle('A12:G12')->applyFromArray(
 array(
 'font' => array(
 'bold' => true
 ),
 'alignment' => array(
 'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
 ),
 'borders' => array(
 'top' => array(
 'style' => PHPExcel_Style_Border::BORDER_THIN
 )
 ),
 'fill' => array(
 'type' => PHPExcel_Style_Fill::FILL_GRADIENT_LINEAR,
 'rotation' => 90,
 'startcolor' => array(
 'argb' => 'FFA0A0A0'
 ),
 'endcolor' => array(
 'argb' => 'FFFFFFFF'
 )
 )
 )
);

$objPHPExcel->getActiveSheet()->getStyle('A13:G13')->applyFromArray(
 array(
 'font' => array(
 'bold' => true
 ),
 'alignment' => array(
 'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
 ),
 'borders' => array(
 'top' => array(
 'style' => PHPExcel_Style_Border::BORDER_THIN
 )
 ),
 'fill' => array(
 'type' => PHPExcel_Style_Fill::FILL_GRADIENT_LINEAR,
 'rotation' => 90,
 'startcolor' => array(
 'argb' => 'FFA0A0A0'
 ),
 'endcolor' => array(
 'argb' => 'FFFFFFFF'
 )
 )
 )
);

 
// Add a drawing to the worksheet
$objDrawing = new PHPExcel_Worksheet_Drawing();
$objDrawing->setName('Logo');
$objDrawing->setDescription('Logo');
$objDrawing->setPath('./images/logo.png');
$objDrawing->setCoordinates('B2');
$objDrawing->setHeight(75);
$objDrawing->setWidth(75);
$objDrawing->setWorksheet($objPHPExcel->getActiveSheet());
 
//untuk font dan size data
$objPHPExcel->getActiveSheet()->getStyle('A12:I1000')->getFont()->setName('Arial');
$objPHPExcel->getActiveSheet()->getStyle('A12:I1000')->getFont()->setSize(9);
 
// Mulai Merge cells Judul
$objPHPExcel->getActiveSheet()->mergeCells('B2:G2');
$objPHPExcel->getActiveSheet()->setCellValue('B2', "REKAPITULASI");

$objPHPExcel->getActiveSheet()->mergeCells('B3:G3');
$objPHPExcel->getActiveSheet()->setCellValue('B3', "DEBIT RATA-RATA SUMBER SETEMPAT / SUNGAI");

$objPHPExcel->getActiveSheet()->mergeCells('B4:G4');
$objPHPExcel->getActiveSheet()->setCellValue('B4', "BENDUNG CIKEAS");

$objPHPExcel->getActiveSheet()->mergeCells('B5:G5');
$objPHPExcel->getActiveSheet()->setCellValue('B5', "Tanggal : ....... s/d .........");
//$objPHPExcel->getActiveSheet()->setCellValue('D5', "Tanggal : $tanggal_input");

$objPHPExcel->getActiveSheet()->getStyle('B2:I5')->getFont()->setName('Arial');
$objPHPExcel->getActiveSheet()->getStyle('B2:I5')->getFont()->setSize(11);
$objPHPExcel->getActiveSheet()->getStyle('B2:I5')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('B3:I5')->getFont()->setSize(11);

// untuk sub judul
//$objPHPExcel->getActiveSheet()->setCellValue('I7', "Jumlah Data : $jumlah");

$objPHPExcel->getActiveSheet()->setCellValue('A8', "Perum Jasa Tirta II");
$objPHPExcel->getActiveSheet()->setCellValue('A9', "Seksi : Cipamingkis");

$objPHPExcel->getActiveSheet()->setCellValue('F8', "Lampiran");
$objPHPExcel->getActiveSheet()->setCellValue('F9', "Formulir No.");

$objPHPExcel->getActiveSheet()->setCellValue('G8', " : 2");
$objPHPExcel->getActiveSheet()->setCellValue('G9', " : F-Pros.13-02");

$objPHPExcel->getActiveSheet()->getStyle('A7:I9')->getFont()->setName('Arial');
$objPHPExcel->getActiveSheet()->getStyle('A7:I9')->getFont()->setSize(9);
$objPHPExcel->getActiveSheet()->getStyle('A9')->getFont()->setBold(true);


// Judul Center
$objPHPExcel->getActiveSheet()->getStyle('A2:I6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
 

// Redirect output to a client’s web browser (Excel2007)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="DAB_Cikeas"'.date("d-F-Y").'".xlsx"');
header('Cache-Control: max-age=0');
 
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
exit;
 
// Save Excel 2007 file
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save(str_replace('.php', '.xlsx', __FILE__));