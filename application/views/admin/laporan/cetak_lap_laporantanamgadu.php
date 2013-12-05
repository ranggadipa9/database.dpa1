<?php
$sql = "SELECT
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
			WHERE (tanggal_input BETWEEN '$tgl1' AND '$tgl2') ";

$sql_bag = "SELECT * FROM saluran_tanam ";
$sql_bag1 = "SELECT * FROM seksi ";

if ($saluran_tanam != 'Semua') {
    $sql .= "AND tanam_gadu.id_saluran_tanam = '$saluran_tanam' ";
    $sql_bag .= "WHERE id = '$saluran_tanam' ";
}
if ($seksi != 'Semua') {
	$tmp = " WHERE ";
	if (strpos($sql,'WHERE') > 0) {
        $tmp = " AND ";
    }
    $sql .= $tmp . " tanam_gadu.id_seksi = '$seksi'";
    $sql_bag1 .= "WHERE id = '$seksi' ";
}
$sql .= " ORDER BY seksi.seksi ";
$q = $this->db->query($sql);
$q = $q->result_array();
?>
<h2 align="center">Laporan Data Tanam Gadu</h2>
<p align="left">Tampilkan dalam File :  <a href="javascript:;" ><img src="../../../../../spon/images/excel-icon.jpeg" alt="" width="25" height="25" onclick="window.open('../../../../../excel/export_excel_tanamgadu_edit.php','scrollwindow','top=200,left=300,width=800,height=500');" border="0" /></a></p>

<h3 align="center"><?php
    $q_bag = $this->db->query($sql_bag);
    foreach ($q_bag->result() as $r_bag) {
        $bag = $r_bag->saluran_tanam;
        $id = $r_bag->id;
    }
    if ($saluran_tanam != 'Semua') {
        echo 'Saluran Tanam : ' . $bag;
    } else {
        echo 'Saluran Tanam : ' . $saluran_tanam;
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
      <td width="20" rowspan="2" class="tutupkiri"><div align="center">No</div></td>
      <td width="50" rowspan="2" class="tutupkiri"><div align="center">Tanggal</div></td>
      <td width="180" rowspan="2" class="tutupkiri"><div align="center">Daerah Irigasi</div></td>
      <td width="150" rowspan="2" class="tutupkiri"><div align="center">Seksi</div></td>
      <td width="150" rowspan="2" class="tutupkiri"><div align="center">Saluran Tanam</div></td>
      <td width="50" rowspan="2" class="tutupkiri"><div align="center">Kabupaten</div></td>
      <td width="50" rowspan="2" class="tutupkiri"><div align="center">Kecamatan</div></td>
      <td width="50" rowspan="2" class="tutupkiri"><div align="center"></div>        <div align="center">Nama Areal</div></td>
      <td colspan="2" class="tutupkiri"><div align="center">Target</div></td>
      <td colspan="9" class="tutupkiri"><div align="center">Realisasi dari Target  43.844 ha</div></td>
      <td colspan="6" class="closeall"><div align="center">Realisasi di Luar Target </div></td>
      <td width="90" rowspan="2" class="closeall"><div align="center">Keterangan</div></td>
    </tr>
    <tr>
        <td class="tutupkiri" width="80"><div align="center">Golongan Tanam</div></td>
        <td class="tutupkiri" width="200"><div align="center">Luas</div></td>
        <td class="tutupkiri" width="80"><div align="center">Bibit</div></td>
        <td class="tutupkiri" width="80"><div align="center">Garap</div></td>
        <td class="closeall" width="90"><div align="center">Tanam</div></td>
        <td class="closeall" width="90"><div align="center">Panen</div></td>
        <td class="closeall" width="90"><div align="center">Jumlah</div></td>
        <td class="closeall" width="90"><div align="center">%</div></td>
        <td class="closeall" width="90"><div align="center">Palawija</div></td>
        <td class="closeall" width="90"><div align="center">Bera</div></td>
        <td class="closeall" width="90"><div align="center">Puso</div></td>
        <td class="closeall" width="90"><div align="center">Bibit</div></td>
        <td class="closeall" width="90"><div align="center">Garap</div></td>
        <td class="closeall" width="90"><div align="center">Tanam</div></td>
        <td class="closeall" width="90"><div align="center">Panen</div></td>
        <td class="closeall" width="90"><div align="center">Jumlah</div></td>
        <td class="closeall" width="90"><div align="center">Palawija</div></td>
    </tr>

    <?php $i = 1;
    foreach ($q as $rs) {
        ?>
        <tr>
            <td class="tutupkiri" align="center"><?php echo $i; ?></td>
            <td class="tutupkiri" align="center"><?php echo $rs['tanggal_input']; ?></td>
            <td class="tutupkiri"><?php echo $rs['daerah_irigasi']; ?></td>
            <td class="tutupkiri"><?php echo $rs['seksi']; ?></td>
            <td class="tutupkiri" align="center"><?php echo $rs['saluran_tanam']; ?></td>
            <td class="tutupkiri" align="center"><?php echo $rs['kabupaten']; ?></td>
            <td class="tutupkiri" align="center"><?php echo $rs['kecamatan']; ?></td>
            <td class="tutupkiri" align="center"><?php echo $rs['nama_areal']; ?></td>
            <td class="tutupkiri" align="center"><?php echo $rs['golongan_tanam']; ?></td>
            <td class="tutupkiri" align="center"><?php echo $rs['target_luas']; ?></td>
            <td class="tutupkiri" align="center"><div align="center"><?php echo $rs['target_bibit']; ?></div></td>
            <td class="tutupkiri" align="center"><div align="center"><?php echo $rs['target_garap']; ?></div></td>
            <td class="closeall" align="center"><div align="center"><?php echo $rs['target_tanam']; ?></div></td>
            <td class="closeall" align="center"><div align="center"><?php echo $rs['target_panen']; ?></div></td>
            <td class="closeall" align="center"><div align="center"><?php echo $rs['target_jumlah']; ?></div></td>
            <td class="closeall" align="center"><div align="center"><?php echo $rs['target_persen']; ?></div></td>
            <td class="closeall" align="center"><div align="center"><?php echo $rs['target_palawija']; ?></div></td>
            <td class="closeall" align="center"><div align="center"><?php echo $rs['target_bera']; ?></div></td>
            <td class="closeall" align="center"><div align="center"><?php echo $rs['target_puso']; ?></div></td>
            <td class="closeall" align="center"><div align="center"><?php echo $rs['luar_target_bibit']; ?></div></td>
            <td class="closeall" align="center"><div align="center"><?php echo $rs['luar_target_garap']; ?></div></td>
            <td class="closeall" align="center"><div align="center"><?php echo $rs['luar_target_tanam']; ?></div></td>
            <td class="closeall" align="center"><div align="center"><?php echo $rs['luar_target_panen']; ?></div></td>
            <td class="closeall" align="center"><div align="center"><?php echo $rs['luar_target_jumlah']; ?></div></td>
            <td class="closeall" align="center"><div align="center"><?php echo $rs['luar_target_palawija']; ?></div></td>
            <td class="closeall" align="center"><?php echo $rs['keterangan']; ?></td>
        </tr>
        <?php $i++;
    }
    ?>

</table>