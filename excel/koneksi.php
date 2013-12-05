<?php
$server = "localhost";
$user = "root";
$password = "";
$database = "dpa1";

ini_set('display_errors',TRUE);

$tanggal=date("d/m/Y");
	
$koneksi = mysql_connect($server,$user,$password) or die("Koneksi gagal");

mysql_select_db($database, $koneksi) or die("Database tidak bisa dibuka");
?>
