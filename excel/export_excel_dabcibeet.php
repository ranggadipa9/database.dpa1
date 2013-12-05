<?php 
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
function xlsBOF() {
echo pack("ssssss", 0x809, 0x8, 0x0, 0x10, 0x0, 0x0);
return;
}

function xlsEOF() {
echo pack("ss", 0x0A, 0x00);
return;
}

function xlsWriteNumber($Row, $Col, $Value) {
echo pack("sssss", 0x203, 14, $Row, $Col, 0x0);
echo pack("d", $Value);
return;
}

function xlsWriteLabel($Row, $Col, $Value ) {
$L = strlen($Value);
echo pack("ssssss", 0x204, 8 + $L, $Row, $Col, 0x0, $L);
echo $Value;
return;
}
include "Workbook.php";
include "koneksi.php";
include "Worksheet.php";

$queabsdetail = "SELECT
    *
FROM
    dpa1.dab_cibeet order by tanggal_input asc";
$exequeabsdetail = mysql_query($queabsdetail);
while($res = mysql_fetch_array($exequeabsdetail)){

	$data['id'][] = $res['id'];
	$data['tanggal_input'][] = $res['tanggal_input'];
	$data['jam'][] = $res['jam'];
	$data['limpasan'][] = $res['limpasan'];
	$data['bocoran'][] = $res['bocoran'];
	$data['q1_suplesi_ketarumbarat'][] = $res['q1_suplesi_ketarumbarat'];
	$data['q2_kalicibeet'][] = $res['q2_kalicibeet'];
	$data['keterangan'][] = $res['keterangan'];
	
} 

$jm = sizeof($data['id']);
header("Pragma: public" );
header("Expires: 0" );
header("Cache-Control: must-revalidate, post-check=0, pre-check=0" );
header("Content-Type: application/force-download" );
header("Content-Type: application/octet-stream" );
header("Content-Type: application/download" );
header("Content-Disposition: attachment;filename=dab_cibeet.xls " );
header("Content-Transfer-Encoding: binary " );
xlsBOF();
xlsWriteLabel(0,3,"Data Debit Air Bendung Cibeet" );
xlsWriteLabel(2,0,"No" );
xlsWriteLabel(2,1,"Tanggal" );
xlsWriteLabel(2,2,"Jam" );
xlsWriteLabel(2,3,"Limpasan" );
xlsWriteLabel(2,4,"Bocoran" );
xlsWriteLabel(2,5,"Q1 Suplesi ke Tarum Barat (BSh1)" );
xlsWriteLabel(2,6,"Q2 Kali Cibeet" );
xlsWriteLabel(2,7,"Keterangan" );
$xlsRow = 3;

for ($y=0; $y<$jm; $y++) {
	++$i;
	xlsWriteNumber($xlsRow,0,"$i" );
	xlsWriteLabel($xlsRow,1,$data['tanggal_input'][$y]);
	xlsWriteLabel($xlsRow,2,$data['jam'][$y]);
	xlsWriteLabel($xlsRow,3,$data['limpasan'][$y]);
	xlsWriteLabel($xlsRow,4,$data['bocoran'][$y]);
	xlsWriteLabel($xlsRow,5,$data['q1_suplesi_ketarumbarat'][$y]);
	xlsWriteLabel($xlsRow,6,$data['q2_kalicibeet'][$y]);
	xlsWriteLabel($xlsRow,7,$data['keterangan'][$y]);
	$xlsRow++;
}
xlsEOF();
exit();