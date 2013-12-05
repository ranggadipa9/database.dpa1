<?php
$sql = "SELECT
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
			WHERE (tanggal BETWEEN '$tgl1' AND '$tgl2') ";

$sql_bag = "SELECT * FROM saluran_sekunder ";
$sql_bag1 = "SELECT * FROM seksi ";

if ($saluran_sekunder != 'Semua') {
    $sql .= "AND invent_area.id_saluran_sekunder = '$saluran_sekunder' ";
    $sql_bag .= "WHERE id = '$saluran_sekunder' ";
}
if ($seksi != 'Semua') {
	$tmp = " WHERE ";
	if (strpos($sql,'WHERE') > 0) {
        $tmp = " AND ";
    }
    $sql .= $tmp . " invent_area.id_seksi = '$seksi'";
    $sql_bag1 .= "WHERE id = '$seksi' ";
}
$sql .= " ORDER BY seksi.seksi ";
$q = $this->db->query($sql);
$q = $q->result_array();
?>
<h2 align="center">Laporan Data Inventarisasi Areal Tanam</h2>

<p align="left">Tampilkan dalam File :  <a href="javascript:;" ><img src="../../../../../spon/images/excel-icon.jpeg" alt="" width="25" height="25" onclick="window.open('../../../../../excel/export_excel_inventarea_edit.php','scrollwindow','top=200,left=300,width=800,height=500');" border="0" /></a></p>

<h3 align="center"><?php
    $q_bag = $this->db->query($sql_bag);
    foreach ($q_bag->result() as $r_bag) {
        $bag = $r_bag->saluran_sekunder;
        $id = $r_bag->id;
    }
    if ($saluran_sekunder != 'Semua') {
        echo 'Saluran Sekunder : ' . $bag;
    } else {
        echo 'Saluran Sekunder : ' . $saluran_sekunder;
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
        <td class="tutupkiri" width="50"><div align="center">Tanggal</div></td>
        <td class="tutupkiri" width="180"><div align="center">Daerah Irigasi</div></td>
        <td class="tutupkiri" width="150"><div align="center">Saluran Sekunder</div></td>
        <td class="tutupkiri" width="150"><div align="center">Blok</div></td>
        <td class="tutupkiri" width="50"><div align="center">Luas Tahun Lalu</div></td>
        <td class="tutupkiri" width="50"><div align="center">Luas Tahun Ini</div></td>
        <td class="tutupkiri" width="50"><div align="center">Selisih</div></td>
        <td class="tutupkiri" width="80"><div align="center">Pengamat</div></td>
        <td class="tutupkiri" width="200"><div align="center">Seksi</div></td>
        <td class="tutupkiri" width="80"><div align="center">Kecamatan</div></td>
        <td class="tutupkiri" width="80"><div align="center">Kabupaten</div></td>
        <td class="closeall" width="90"><div align="center">Keterangan</div></td>
    </tr>

    <?php $i = 1;
    foreach ($q as $rs) {
        ?>
        <tr>
            <td class="tutupkiri" align="center"><?php echo $i; ?></td>
            <td class="tutupkiri" align="center"><?php echo $rs['tanggal']; ?></td>
            <td class="tutupkiri"><?php echo $rs['daerah_irigasi']; ?></td>
            <td class="tutupkiri"><?php echo $rs['saluran_sekunder']; ?></td>
            <td class="tutupkiri" align="center"><?php echo $rs['blok']; ?></td>
            <td class="tutupkiri" align="center"><?php echo $rs['tahun_lalu']; ?></td>
            <td class="tutupkiri" align="center"><?php echo $rs['tahun_ini']; ?></td>
            <td class="tutupkiri" align="center"><?php echo $rs['selisih']; ?></td>
            <td class="tutupkiri" align="center"><?php echo $rs['pengamat']; ?></td>
            <td class="tutupkiri" align="center"><?php echo $rs['seksi']; ?></td>
            <td class="tutupkiri" align="center"><?php echo $rs['kecamatan']; ?></td>
            <td class="tutupkiri" align="center"><?php echo $rs['kabupaten']; ?></td>
            <td class="closeall" align="center"><?php echo $rs['keterangan']; ?></td>
        </tr>
        <?php $i++;
    }
    ?>

</table>