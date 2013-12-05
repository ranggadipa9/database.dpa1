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
							  ->setCellValue('C12', "Balai")
							  ->setCellValue('D12', "Seksi")
							  ->setCellValue('E12', "Pelanggan")
							  ->setCellValue('F12', "Lokasi Pengambilan")
							  ->setCellValue('G12', "No SPPA")
							  ->setCellValue('H12', "Realisasi (M3/Bulan)")
							  ->setCellValue('H13', "Debit Maks")
							  ->setCellValue('I13', "Debit Min")
							  ->setCellValue('J13', "Realisasi ")
							  ->setCellValue('K12', "Keterangan");
							  

$objPHPExcel->getActiveSheet()->mergeCells('H12:J12');
$objPHPExcel->getActiveSheet()->mergeCells('A12:A13');
$objPHPExcel->getActiveSheet()->mergeCells('B12:B13');
$objPHPExcel->getActiveSheet()->mergeCells('C12:C13');
$objPHPExcel->getActiveSheet()->mergeCells('D12:D13');
$objPHPExcel->getActiveSheet()->mergeCells('E12:E13');							  
$objPHPExcel->getActiveSheet()->mergeCells('F12:F13');
$objPHPExcel->getActiveSheet()->mergeCells('G12:G13');
$objPHPExcel->getActiveSheet()->mergeCells('K12:K13');							  

// koneksi database
include ("koneksi.php"); 

// query database
$SQL = mysql_query("SELECT
    pemakaian_air.*
    , balai.balai
    , seksi.seksi
    , pelanggan.pelanggan
FROM
    dpa1.pemakaian_air
    LEFT JOIN dpa1.seksi 
        ON (pemakaian_air.id_seksi = seksi.id)
    LEFT JOIN dpa1.balai 
        ON (pemakaian_air.id_balai = balai.id)
    LEFT JOIN dpa1.pelanggan 
        ON (pemakaian_air.id_pelanggan = pelanggan.id)
		order by tanggal_input");

// jumlah data
//$jumlah = mysql_num_rows($SQL);
  
$dataArray= array();
$no=0;

// menampilkan data, susunan field sesuai dengan urutan judul kolom 
while($row = mysql_fetch_array($SQL, MYSQL_ASSOC)){
	$no++;
	$row_array['id'] = $no;
	$row_array['tanggal_input'] = $row['tanggal_input'];
	$row_array['balai'] = $row['balai'];
	$row_array['seksi'] = $row['seksi'];
	$row_array['pelanggan'] = $row['pelanggan'];
	$row_array['lokasi_pengambilan'] = $row['lokasi_pengambilan'];
	$row_array['no_sppa'] = $row['no_sppa'];
	$row_array['debet_maks'] = $row['debet_maks'];
	$row_array['debet_min'] = $row['debet_min'];
	$row_array['realisasi'] = $row['realisasi'];
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
$objPHPExcel->getActiveSheet()->getStyle('A12:I12')->getFont()->setBold(true);
// Set fills
$objPHPExcel->getActiveSheet()->getStyle('A12:I12')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
$objPHPExcel->getActiveSheet()->getStyle('A12:I12')->getFill()->getStartColor()->setARGB('FF808080');

//untuk auto size colomn 
$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(3);
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(10);
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(30);
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(30);
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(25);
$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(18);
$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(10);
$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(10);
$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(10);
$objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(18);
 
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
 
$objPHPExcel->getActiveSheet()->setSharedStyle($sharedStyle1, "A12:K$nox");
 
// Set style for header row using alternative method
$objPHPExcel->getActiveSheet()->getStyle('A12:K12')->applyFromArray(
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

$objPHPExcel->getActiveSheet()->getStyle('A13:K13')->applyFromArray(
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
$objDrawing->setCoordinates('D2');
$objDrawing->setHeight(75);
$objDrawing->setWidth(75);
$objDrawing->setWorksheet($objPHPExcel->getActiveSheet());
 
//untuk font dan size data
$objPHPExcel->getActiveSheet()->getStyle('A12:I1000')->getFont()->setName('Arial');
$objPHPExcel->getActiveSheet()->getStyle('A12:I1000')->getFont()->setSize(9);
 
// Mulai Merge cells Judul
$objPHPExcel->getActiveSheet()->mergeCells('D2:I2');
$objPHPExcel->getActiveSheet()->setCellValue('D2', "REKAPITULASI PEMAKAIAN AIR PERUSAHAAN");

$objPHPExcel->getActiveSheet()->mergeCells('D3:I3');
$objPHPExcel->getActiveSheet()->setCellValue('D3', "SEKSI  ..........................  ");

$objPHPExcel->getActiveSheet()->mergeCells('D4:I4');
$objPHPExcel->getActiveSheet()->setCellValue('D4', "PERIODE BULAN .............");

//$objPHPExcel->getActiveSheet()->setCellValue('D5', "Tanggal : $tanggal_input");

$objPHPExcel->getActiveSheet()->getStyle('D2:I5')->getFont()->setName('Arial');
$objPHPExcel->getActiveSheet()->getStyle('D2:I5')->getFont()->setSize(11);
$objPHPExcel->getActiveSheet()->getStyle('D2:I5')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('D3:I5')->getFont()->setSize(11);

// untuk sub judul
//$objPHPExcel->getActiveSheet()->setCellValue('I7', "Jumlah Data : $jumlah");

$objPHPExcel->getActiveSheet()->setCellValue('A8', "Perum Jasa Tirta II");
$objPHPExcel->getActiveSheet()->setCellValue('A9', "Divisi Pengelolaan Air II");

$objPHPExcel->getActiveSheet()->setCellValue('I8', "Lampiran");
$objPHPExcel->getActiveSheet()->setCellValue('I9', "Formulir No.");

$objPHPExcel->getActiveSheet()->setCellValue('J8', " : 7");
$objPHPExcel->getActiveSheet()->setCellValue('J9', " : F-Pros.13-07");

$objPHPExcel->getActiveSheet()->getStyle('A7:I9')->getFont()->setName('Arial');
$objPHPExcel->getActiveSheet()->getStyle('A7:I9')->getFont()->setSize(9);
$objPHPExcel->getActiveSheet()->getStyle('A9')->getFont()->setBold(true);


// Judul Center
$objPHPExcel->getActiveSheet()->getStyle('A2:I6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
 

// Redirect output to a client’s web browser (Excel2007)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Pemakaian_Air"'.date("d-F-Y").'".xlsx"');
header('Cache-Control: max-age=0');
 
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
exit;
 
// Save Excel 2007 file
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save(str_replace('.php', '.xlsx', __FILE__));