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
							  ->setCellValue('D12', "Seksi")
							  ->setCellValue('E12', "Saluran Tanam")
							  ->setCellValue('F12', "Kabupaten")
							  ->setCellValue('G12', "Kecamatan")
							  ->setCellValue('H12', "Nama Areal")
        
							  ->setCellValue('I12', "Target")
							  ->setCellValue('I13', "Gol")
							  ->setCellValue('J13', "Luas")
        
							  ->setCellValue('K12', "Realisasi Target")
        						  ->setCellValue('K13', "Bibit")
							  ->setCellValue('L13', "Garap")
							  ->setCellValue('M13', "Tanam")
							  ->setCellValue('N13', "Panen")
							  ->setCellValue('O13', "Jumlah")
							  ->setCellValue('P13', "%")
        						  ->setCellValue('Q13', "PL")
							  ->setCellValue('R13', "Bera")
							  ->setCellValue('S13', "Puso")
							  
                                                          ->setCellValue('T12', "Realisasi di Luar Taeget")
        						  ->setCellValue('T13', "Bibit")
							  ->setCellValue('U13', "Garap")
							  ->setCellValue('V13', "Tanam")
							  ->setCellValue('W13', "Panen")
        						  ->setCellValue('X13', "Jumlah")
							  ->setCellValue('Y13', "PL")
							 
                                                          ->setCellValue('Z12', "Keterangan");
							  

$objPHPExcel->getActiveSheet()->mergeCells('I12:J12');
$objPHPExcel->getActiveSheet()->mergeCells('K12:S12');
$objPHPExcel->getActiveSheet()->mergeCells('T12:Y12');
$objPHPExcel->getActiveSheet()->mergeCells('A12:A13');
$objPHPExcel->getActiveSheet()->mergeCells('B12:B13');
$objPHPExcel->getActiveSheet()->mergeCells('C12:C13');							  
$objPHPExcel->getActiveSheet()->mergeCells('D12:D13');
$objPHPExcel->getActiveSheet()->mergeCells('E12:E13');
$objPHPExcel->getActiveSheet()->mergeCells('F12:F13');							  
$objPHPExcel->getActiveSheet()->mergeCells('G12:G13');	
$objPHPExcel->getActiveSheet()->mergeCells('H12:H13');							  
$objPHPExcel->getActiveSheet()->mergeCells('Z12:Z13');	

// koneksi database
include ("koneksi.php"); 

// query database
$SQL = mysql_query("SELECT
    tanam_gadu.*
    , seksi.seksi
    , saluran_tanam.saluran_tanam
    , golongan_tanam.golongan_tanam
FROM
    dpa1.tanam_gadu
    LEFT JOIN dpa1.seksi 
        ON (tanam_gadu.id_seksi = seksi.id)
    LEFT JOIN dpa1.saluran_tanam 
        ON (tanam_gadu.id_saluran_tanam = saluran_tanam.id)
    LEFT JOIN dpa1.golongan_tanam 
        ON (tanam_gadu.id_golongan_tanam = golongan_tanam.id)
	order by seksi");

// jumlah data
//$jumlah = mysql_num_rows($SQL);
  
$dataArray= array();
$no=0;

// menampilkan data, susunan field sesuai dengan urutan judul kolom 
while($row = mysql_fetch_array($SQL, MYSQL_ASSOC)){
	$no++;
	$row_array['id'] = $no;
	$row_array['tanggal_input'] = $row['tanggal_input'];
	$row_array['daerah_irigasi'] = $row['daerah_irigasi'];
	$row_array['seksi'] = $row['seksi'];
	$row_array['saluran_tanam'] = $row['saluran_tanam'];
	$row_array['kabupaten'] = $row['kabupaten'];
	$row_array['kecamatan'] = $row['kecamatan'];
	$row_array['nama_areal'] = $row['nama_areal'];
	
        $row_array['golongan_tanam'] = $row['golongan_tanam'];
	$row_array['target_luas'] = $row['target_luas'];
	
        $row_array['target_bibit'] = $row['target_bibit'];
	$row_array['target_garap'] = $row['target_garap'];
	$row_array['target_tanam'] = $row['target_tanam'];
	$row_array['target_panen'] = $row['target_panen'];
	$row_array['target_jumlah'] = $row['target_jumlah'];
	$row_array['target_persen'] = $row['target_persen'];
	$row_array['target_palawija'] = $row['target_palawija'];
	$row_array['target_bera'] = $row['target_bera'];
	$row_array['target_puso'] = $row['target_puso'];
	
        $row_array['luar_target_bibit'] = $row['luar_target_bibit'];
	$row_array['luar_target_garap'] = $row['luar_target_garap'];
	$row_array['luar_target_tanam'] = $row['luar_target_tanam'];
	$row_array['luar_target_panen'] = $row['luar_target_panen'];
	$row_array['luar_target_jumlah'] = $row['luar_target_jumlah'];
	$row_array['luar_target_palawija'] = $row['luar_target_palawija'];
	
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
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(12);
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(29);
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(18);
$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(12);
$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(12);
$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(12);
$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(8);
$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(8);
$objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(8);

$objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(8);
$objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(8);
$objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(8);
$objPHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth(8);
$objPHPExcel->getActiveSheet()->getColumnDimension('P')->setWidth(8);
$objPHPExcel->getActiveSheet()->getColumnDimension('Q')->setWidth(8);
$objPHPExcel->getActiveSheet()->getColumnDimension('R')->setWidth(8);
$objPHPExcel->getActiveSheet()->getColumnDimension('S')->setWidth(8);

$objPHPExcel->getActiveSheet()->getColumnDimension('T')->setWidth(8);
$objPHPExcel->getActiveSheet()->getColumnDimension('U')->setWidth(8);
$objPHPExcel->getActiveSheet()->getColumnDimension('V')->setWidth(8);
$objPHPExcel->getActiveSheet()->getColumnDimension('W')->setWidth(8);
$objPHPExcel->getActiveSheet()->getColumnDimension('X')->setWidth(8);
$objPHPExcel->getActiveSheet()->getColumnDimension('Y')->setWidth(8);
$objPHPExcel->getActiveSheet()->getColumnDimension('Z')->setWidth(12);
 
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
 
$objPHPExcel->getActiveSheet()->setSharedStyle($sharedStyle1, "A12:Z$nox");
 
// Set style for header row using alternative method
$objPHPExcel->getActiveSheet()->getStyle('A12:Z12')->applyFromArray(
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

$objPHPExcel->getActiveSheet()->getStyle('A13:Z13')->applyFromArray(
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
$objPHPExcel->getActiveSheet()->getStyle('A12:Z1000')->getFont()->setName('Arial');
$objPHPExcel->getActiveSheet()->getStyle('A12:Z1000')->getFont()->setSize(9);
 
// Mulai Merge cells Judul
$objPHPExcel->getActiveSheet()->mergeCells('D2:W2');
$objPHPExcel->getActiveSheet()->setCellValue('D2', "REKAPITULASI");

$objPHPExcel->getActiveSheet()->mergeCells('D3:W3');
$objPHPExcel->getActiveSheet()->setCellValue('D3', "AKTIVITAS TANAM PADI MT GADU TAHUN ..... ");

$objPHPExcel->getActiveSheet()->mergeCells('D4:W4');
$objPHPExcel->getActiveSheet()->setCellValue('D4', "DAERAH IRIGASI JATILUHUR");

$objPHPExcel->getActiveSheet()->mergeCells('D5:W5');
$objPHPExcel->getActiveSheet()->setCellValue('D5', "Tanggal : ....... s/d .........");
//$objPHPExcel->getActiveSheet()->setCellValue('D5', "Tanggal : $tanggal_input");

$objPHPExcel->getActiveSheet()->getStyle('D2:W5')->getFont()->setName('Arial');
$objPHPExcel->getActiveSheet()->getStyle('D2:W5')->getFont()->setSize(11);
$objPHPExcel->getActiveSheet()->getStyle('D2:W5')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('D3:W5')->getFont()->setSize(11);

// untuk sub judul
//$objPHPExcel->getActiveSheet()->setCellValue('I7', "Jumlah Data : $jumlah");

$objPHPExcel->getActiveSheet()->setCellValue('A8', "Perum Jasa Tirta II");
$objPHPExcel->getActiveSheet()->setCellValue('A9', "Divisi Pengelolaan Air I");

$objPHPExcel->getActiveSheet()->setCellValue('W8', "Lampiran");
$objPHPExcel->getActiveSheet()->setCellValue('W9', "Formulir No.");

$objPHPExcel->getActiveSheet()->setCellValue('Y8', " : 6");
$objPHPExcel->getActiveSheet()->setCellValue('Y9', " : F-Pros.13-06");

$objPHPExcel->getActiveSheet()->getStyle('A7:W9')->getFont()->setName('Arial');
$objPHPExcel->getActiveSheet()->getStyle('A7:W9')->getFont()->setSize(9);
$objPHPExcel->getActiveSheet()->getStyle('A9')->getFont()->setBold(true);


// Judul Center
$objPHPExcel->getActiveSheet()->getStyle('A2:Z6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
 

// Redirect output to a client’s web browser (Excel2007)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Tanam_Gadu"'.date("d-F-Y").'".xlsx"');
header('Cache-Control: max-age=0');
 
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
exit;
 
// Save Excel 2007 file
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save(str_replace('.php', '.xlsx', __FILE__));