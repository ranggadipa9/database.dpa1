<?php
$sql = "SELECT
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
			WHERE (tanggal_input BETWEEN '$tgl1' AND '$tgl2') ";

$sql_bag = "SELECT * FROM balai ";
$sql_bag1 = "SELECT * FROM seksi ";

if ($balai != 'Semua') {
    $sql .= "AND pemakaian_air.id_balai = '$balai' ";
    $sql_bag .= "WHERE id = '$balai' ";
}
if ($seksi != 'Semua') {
	$tmp = " WHERE ";
	if (strpos($sql,'WHERE') > 0) {
        $tmp = " AND ";
    }
    $sql .= $tmp . " pemakaian_air.id_seksi = '$seksi'";
    $sql_bag1 .= "WHERE id = '$seksi' ";
}
$sql .= " ORDER BY seksi.seksi ";
$q = $this->db->query($sql);
$q = $q->result_array();
?>
<h2 align="center">Laporan Data Pemakaian Air Perusahaan</h2>
<h3 align="center"><?php
    $q_bag = $this->db->query($sql_bag);
    foreach ($q_bag->result() as $r_bag) {
        $bag = $r_bag->balai;
        $id = $r_bag->id;
    }
    if ($balai != 'Semua') {
        echo 'Balai : ' . $bag;
    } else {
        echo 'Balai : ' . $balai;
    }
    ?>
</h3>
<h3 align="center"><?php
    $q_bag1 = $this->db->query($sql_bag1);
    foreach ($q_bag1->result() as $r_bag1) {
        $bag = $r_bag1->seksi;
        $id = $r_bag1->id;
    }
    if ($seksi != 'Semua') {
        echo 'Seksi : ' . $bag;
    } else {
        echo 'Seksi : ' . $seksi;
    }
    ?>
</h3><h3 align="center"><?php echo 'Tanggal : ' . tgl_indo($tgl1) . ' s/d ' . tgl_indo($tgl2); ?></h3>

<table cellpadding="0" cellspacing="0" border="0">
    <tr>
        <td class="tutupkiri" width="20"><div align="center">No</div></td>
        <td class="tutupkiri" width="250"><div align="center">Balai</div></td>
        <td class="tutupkiri" width="180"><div align="center">Seksi</div></td>
        <td class="tutupkiri" width="150"><div align="center">Nama Pelanggan</div></td>
        <td class="tutupkiri" width="150"><div align="center">Lokasi Pengambilan</div></td>
        <td class="tutupkiri" width="120"><div align="center">N0 SPPA</div></td>
        <td class="tutupkiri" width="80"><div align="center">Kontrak Maksimum</div></td>
        <td class="tutupkiri" width="80"><div align="center">Kontrak Minimum</div></td>
        <td class="tutupkiri" width="80"><div align="center">Realisasi</div></td>
        <td class="closeall" width="90"><div align="center">Keterangan</div></td>
    </tr>

    <?php $i = 1;
    foreach ($q as $rs) {
        ?>
        <tr>
            <td class="tutupkiri" align="center"><?php echo $i; ?></td>
            <td class="tutupkiri"><?php echo $rs['balai']; ?></td>
            <td class="tutupkiri"><?php echo $rs['seksi']; ?></td>
            <td class="tutupkiri"><?php echo $rs['pelanggan']; ?></td>
            <td class="tutupkiri"><?php echo $rs['lokasi_pengambilan']; ?></td>
            <td class="tutupkiri"><?php echo $rs['no_sppa']; ?></td>
            <td class="tutupkiri" align="right"><?php echo $rs['debet_maks']; ?></td>
            <td class="tutupkiri" align="right"><?php echo $rs['debet_min']; ?></td>
            <td class="tutupkiri" align="right"><?php echo $rs['realisasi']; ?></td>
            <td class="closeall" align="center"><?php echo $rs['keterangan']; ?></td>
        </tr>
        <?php $i++;
    }
    ?>

</table>