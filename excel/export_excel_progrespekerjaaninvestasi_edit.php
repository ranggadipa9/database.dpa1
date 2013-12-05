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
				 ->setCellValue('B12', "SUB MA")
				 ->setCellValue('C12', "Uraian Pekerjaan")
				 ->setCellValue('D12', "Biaya")
                                 ->setCellValue('D13', "Biaya Program")
				 ->setCellValue('E13', "Biaya Realisasi")
				 ->setCellValue('F13', "Biaya Sisa")
                                 ->setCellValue('G12', "Pelaksanaan")
				 ->setCellValue('G13', "Nomor Kontrak")
				 ->setCellValue('H13', "Tgl. Kontrak")
				 ->setCellValue('I13', "Rekanan")
				 ->setCellValue('J13', "Waktu")
				 ->setCellValue('K13', "Progres")
				 ->setCellValue('L12', "Keterangan");
							  

$objPHPExcel->getActiveSheet()->mergeCells('D12:F12');
$objPHPExcel->getActiveSheet()->mergeCells('G12:K12');
$objPHPExcel->getActiveSheet()->mergeCells('A12:A13');
$objPHPExcel->getActiveSheet()->mergeCells('B12:B13');
$objPHPExcel->getActiveSheet()->mergeCells('C12:C13');							  
$objPHPExcel->getActiveSheet()->mergeCells('L12:L13');							  

// koneksi database
include ("koneksi.php"); 

// query database
$SQL = mysql_query("SELECT
    mata_anggaran.mata_anggaran
    , progres_pekerjaan_investasi.*
FROM
    dpa1.progres_pekerjaan_investasi
    LEFT JOIN dpa1.mata_anggaran 
        ON (progres_pekerjaan_investasi.id_mata_anggaran = mata_anggaran.id)
		order by mata_anggaran");

// jumlah data
//$jumlah = mysql_num_rows($SQL);
  
$dataArray= array();
$no=0;

// menampilkan data, susunan field sesuai dengan urutan judul kolom 
while($row = mysql_fetch_array($SQL, MYSQL_ASSOC)){
	$no++;
	$row_array['id'] = $no;
	$row_array['mata_anggaran'] = $row['mata_anggaran'];
	$row_array['uraian_pekerjaan'] = $row['uraian_pekerjaan'];
	$row_array['biaya_program'] = $row['biaya_program'];
	$row_array['biaya_realisasi'] = $row['biaya_realisasi'];
	$row_array['biaya_sisa'] = $row['biaya_sisa'];
	$row_array['nomor_kontrak'] = $row['nomor_kontrak'];
	$row_array['tanggal_kontrak'] = $row['tanggal_kontrak'];
	$row_array['rekanan'] = $row['rekanan'];
	$row_array['waktu'] = $row['waktu'];
	$row_array['progres'] = $row['progres'];
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
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(8);
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(50);
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(12);
$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(25);
$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(8);
$objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(8);
$objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(12);
 
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
 
$objPHPExcel->getActiveSheet()->setSharedStyle($sharedStyle1, "A12:L$nox");
 
// Set style for header row using alternative method
$objPHPExcel->getActiveSheet()->getStyle('A12:L12')->applyFromArray(
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

$objPHPExcel->getActiveSheet()->getStyle('A13:L13')->applyFromArray(
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
$objPHPExcel->getActiveSheet()->setCellValue('D2', "LAPORAN PROGRES PELAKSANAAN PEKERJAAN RKAP PJT II");

$objPHPExcel->getActiveSheet()->mergeCells('D3:I3');
$objPHPExcel->getActiveSheet()->setCellValue('D3', "KELOMPOK BEBAN INVESTASI SUMBER DAN PRASARANA SDA");

$objPHPExcel->getActiveSheet()->mergeCells('D4:I4');
$objPHPExcel->getActiveSheet()->setCellValue('D4', "Periode Bulan ..............");

//$objPHPExcel->getActiveSheet()->mergeCells('D5:I5');
//$objPHPExcel->getActiveSheet()->setCellValue('D5', "Periode : ....... s/d .........");
//$objPHPExcel->getActiveSheet()->setCellValue('D5', "Tanggal : $tanggal_input");

$objPHPExcel->getActiveSheet()->getStyle('D2:I5')->getFont()->setName('Arial');
$objPHPExcel->getActiveSheet()->getStyle('D2:I5')->getFont()->setSize(11);
$objPHPExcel->getActiveSheet()->getStyle('D2:I5')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('D3:I5')->getFont()->setSize(11);

// untuk sub judul
//$objPHPExcel->getActiveSheet()->setCellValue('I7', "Jumlah Data : $jumlah");

$objPHPExcel->getActiveSheet()->setCellValue('A8', "Perum Jasa Tirta II");
$objPHPExcel->getActiveSheet()->setCellValue('A9', "Divisi Pengelolaan Air I");

$objPHPExcel->getActiveSheet()->setCellValue('I8', "Lampiran");
$objPHPExcel->getActiveSheet()->setCellValue('I9', "Formulir No.");

$objPHPExcel->getActiveSheet()->setCellValue('J8', " : 3");
$objPHPExcel->getActiveSheet()->setCellValue('J9', " : F-Pros.13-03");

$objPHPExcel->getActiveSheet()->getStyle('A7:I9')->getFont()->setName('Arial');
$objPHPExcel->getActiveSheet()->getStyle('A7:I9')->getFont()->setSize(9);
$objPHPExcel->getActiveSheet()->getStyle('A9')->getFont()->setBold(true);


// Judul Center
$objPHPExcel->getActiveSheet()->getStyle('A2:I6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
 

// Redirect output to a client’s web browser (Excel2007)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Progres_Pekerjaan_Investasi"'.date("d-F-Y").'".xlsx"');
header('Cache-Control: max-age=0');
 
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
exit;
 
// Save Excel 2007 file
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save(str_replace('.php', '.xlsx', __FILE__));