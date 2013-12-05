<?php
mysql_connect ("localhost","root","");
mysql_select_db ("lat_agus1");
include "./source/fungsi/fungsi_indotgl.php";

$tanggal1 = $_POST['tanggal1'];
$tanggal2 = $_POST['tanggal2'];
$periode1 = tgl_indo($tanggal1);
$periode2 = tgl_indo($tanggal2);
$agus = mysql_query ("select * from buku where tgl_terbit BETWEEN '$tanggal1' and '$tanggal2'");
$hitung = mysql_num_rows ($agus);

if ($hitung == 0) {
	echo "Ga ada data";
}
else {
?>
	<h4> Periode Tanggal : <?php echo "$periode1"; ?> s/d <?php echo "$periode2"; ?>
	<table border=1>
		<tr>
			<th> No </th>
			<th> Judul </th>
			<th> Penulis </th>
			<th> Jml Hal </th>
			<th> Penerbit </th>
			<th> Tgl Terbit </th>
			<th width=45%> Sinopsis </th>
		</tr>	
		<?php
		$i = 1;
		while ($data = mysql_fetch_array($agus)) {
		$tgl = tgl_indo($data['tgl_terbit']);
		$sinopsis = $data['sinopsis'];
		$sinopsis = substr($sinopsis, 0, 400);
		echo "
		<tr valign=top>
			<td> $i </td>
			<td> $data[judul] </td>
			<td> $data[penulis] </td>
			<td> $data[jml_hal] </td>
			<td> $data[penerbit] </td>
			<td> $tgl </td>
			<td> $sinopsis ...</td>
		</tr>";
		$i++;
	}
}
?>