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
							  ->setCellValue('C12', "Daerah Irigasi")
							  ->setCellValue('D12', "Saluran Sekunder")
							  ->setCellValue('E12', "Blok")
							  ->setCellValue('F12', "Luas")
							  ->setCellValue('F13', "Tahun Lalu")
							  ->setCellValue('G13', "Tahun Ini")
							  ->setCellValue('H13', "Selisih")
							  ->setCellValue('I12', "Kepengamatan")
							  ->setCellValue('J12', "Seksi")
        						  ->setCellValue('K12', "Kecamatan")
							  ->setCellValue('L12', "Kabupaten")
							  ->setCellValue('M12', "Keterangan");
							  

$objPHPExcel->getActiveSheet()->mergeCells('F12:H12');
$objPHPExcel->getActiveSheet()->mergeCells('A12:A13');
$objPHPExcel->getActiveSheet()->mergeCells('B12:B13');
$objPHPExcel->getActiveSheet()->mergeCells('C12:C13');
$objPHPExcel->getActiveSheet()->mergeCells('D12:D13');
$objPHPExcel->getActiveSheet()->mergeCells('E12:E13');
$objPHPExcel->getActiveSheet()->mergeCells('I12:I13');
$objPHPExcel->getActiveSheet()->mergeCells('J12:J13');							  
$objPHPExcel->getActiveSheet()->mergeCells('K12:K13');	
$objPHPExcel->getActiveSheet()->mergeCells('L12:L13');	
$objPHPExcel->getActiveSheet()->mergeCells('M12:M13');
// koneksi database
include ("koneksi.php"); 

// query database
$SQL = mysql_query("SELECT
    invent_area.*
    , saluran_sekunder.saluran_sekunder
    , pengamat.pengamat
    , seksi.seksi
FROM
    dpa1.invent_area
    LEFT JOIN dpa1.saluran_sekunder 
        ON (invent_area.id_saluran_sekunder = saluran_sekunder.id)
    LEFT JOIN dpa1.pengamat 
        ON (invent_area.id_pengamat = pengamat.id)
    LEFT JOIN dpa1.seksi 
        ON (invent_area.id_seksi = seksi.id) 
	 order by tanggal");

// jumlah data
//$jumlah = mysql_num_rows($SQL);
  
$dataArray= array();
$no=0;

// menampilkan data, susunan field sesuai dengan urutan judul kolom 
while($row = mysql_fetch_array($SQL, MYSQL_ASSOC)){
	$no++;
	$row_array['id'] = $no;
	$row_array['tanggal'] = $row['tanggal'];
	$row_array['daerah_irigasi'] = $row['daerah_irigasi'];
	$row_array['saluran_sekunder'] = $row['saluran_sekunder'];
	$row_array['blok'] = $row['blok'];
	$row_array['tahun_lalu'] = $row['tahun_lalu'];
	$row_array['tahun_ini'] = $row['tahun_ini'];
	$row_array['selisih'] = $row['selisih'];
	$row_array['pengamat'] = $row['pengamat'];
	$row_array['seksi'] = $row['seksi'];
        $row_array['kecamatan'] = $row['kecamatan'];
	$row_array['kabupaten'] = $row['kabupaten'];
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
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(18);
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(17);
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(10);
$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(10);
$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(10);
$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(10);
$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(32);
$objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(14);
$objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(14);
$objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(14);
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
 
$objPHPExcel->getActiveSheet()->setSharedStyle($sharedStyle1, "A12:M$nox");
 
// Set style for header row using alternative method
$objPHPExcel->getActiveSheet()->getStyle('A12:M12')->applyFromArray(
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

$objPHPExcel->getActiveSheet()->getStyle('A13:M13')->applyFromArray(
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
$objPHPExcel->getActiveSheet()->mergeCells('D2:K2');
$objPHPExcel->getActiveSheet()->setCellValue('D2', "REKAPITULASI");

$objPHPExcel->getActiveSheet()->mergeCells('D3:K3');
$objPHPExcel->getActiveSheet()->setCellValue('D3', "INVENTARISASI AREAL TANAM");

$objPHPExcel->getActiveSheet()->mergeCells('D4:K4');
$objPHPExcel->getActiveSheet()->setCellValue('D4', "DAERAH IRIGASI JATILUHUR/SELATAN JATILUHUR");

$objPHPExcel->getActiveSheet()->mergeCells('D5:K5');
$objPHPExcel->getActiveSheet()->setCellValue('D5', "Tanggal : ....... s/d .........");
//$objPHPExcel->getActiveSheet()->setCellValue('D5', "Tanggal : $tanggal_input");

$objPHPExcel->getActiveSheet()->getStyle('D2:K5')->getFont()->setName('Arial');
$objPHPExcel->getActiveSheet()->getStyle('D2:K5')->getFont()->setSize(11);
$objPHPExcel->getActiveSheet()->getStyle('D2:K5')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('D3:K5')->getFont()->setSize(11);

// untuk sub judul
//$objPHPExcel->getActiveSheet()->setCellValue('I7', "Jumlah Data : $jumlah");

$objPHPExcel->getActiveSheet()->setCellValue('A8', "Perum Jasa Tirta II");
$objPHPExcel->getActiveSheet()->setCellValue('A9', "Daerah Pengelolaan Air I");

$objPHPExcel->getActiveSheet()->setCellValue('K8', "Lampiran");
$objPHPExcel->getActiveSheet()->setCellValue('K9', "Formulir No.");

$objPHPExcel->getActiveSheet()->setCellValue('L8', " : 33");
$objPHPExcel->getActiveSheet()->setCellValue('L9', " : F-Pros.13-33");

$objPHPExcel->getActiveSheet()->getStyle('A7:M9')->getFont()->setName('Arial');
$objPHPExcel->getActiveSheet()->getStyle('A7:M9')->getFont()->setSize(9);
$objPHPExcel->getActiveSheet()->getStyle('A9')->getFont()->setBold(true);


// Judul Center
$objPHPExcel->getActiveSheet()->getStyle('A2:M6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
 

// Redirect output to a client’s web browser (Excel2007)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Inventaris_Areal_Tanam"'.date("d-F-Y").'".xlsx"');
header('Cache-Control: max-age=0');
 
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
exit;
 
// Save Excel 2007 file
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save(str_replace('.php', '.xlsx', __FILE__));