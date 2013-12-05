<?php
$sql = "SELECT
    mata_anggaran.mata_anggaran
    , progres_pekerjaan.*
FROM
    dpa1.progres_pekerjaan
    LEFT JOIN dpa1.mata_anggaran 
        ON (progres_pekerjaan.id_mata_anggaran = mata_anggaran.id) 
	WHERE (tanggal_kontrak BETWEEN '$tgl1' AND '$tgl2')";

$sql_bag = "SELECT * FROM mata_anggaran ";

if ($mata_anggaran != 'Semua') {
    $sql .= " AND progres_pekerjaan.id_mata_anggaran = '$mata_anggaran' ";
    $sql_bag .= "WHERE id = '$mata_anggaran' ";
}
$sql .= "ORDER BY mata_anggaran.mata_anggaran ";
$q = $this->db->query($sql);
$q = $q->result_array();
?>
<h3 align="center">REKAPITULASI DATA PROGRES PEKERJAAN</h3>
<p align="left">Tampilkan dalam File :  <a href="javascript:;" ><img src="../../../../spon/images/excel-icon.jpeg" alt="" width="25" height="25" onclick="window.open('../../../../excel/export_excel_progrespekerjaan_edit.php','scrollwindow','top=200,left=300,width=800,height=500');" border="0" /></a></p>
<h3 align="center"><?php
    $q_bag = $this->db->query($sql_bag);
    foreach ($q_bag->result() as $r_bag) {
        $bag = $r_bag->mata_anggaran;
        $id = $r_bag->id;
    }
    if ($mata_anggaran != 'Semua') {
        echo 'Mata Anggaran : ' . $bag;
    } else {
        echo 'Mata Anggaran: ' . $mata_anggaran;
    }
    ?>
</h2>
<h3 align="center"><?php echo 'Periode : ' . tgl_indo($tgl1) . ' s/d ' . tgl_indo($tgl2); ?></h3>

<table width="100%" cellpadding="0" cellspacing="0" border="0">
    <tr>
      <td width="20" rowspan="2" class="tutupkiri"><div align="center">No</div></td>
      <td width="100" rowspan="2" class="tutupkiri"><div align="center">Sub MA</div></td>
      <td width="200" rowspan="2" class="tutupkiri"><div align="center">Uraian</div></td>
      <td colspan="3" class="tutupkiri"><div align="center">Biaya</div></td>
      <td colspan="5" class="tutupkiri"><div align="center">Pelaksanaan</div></td>
      <td width="75" rowspan="2" class="closeall"><div align="center">Ket.</div></td>
    </tr>
    <tr>
      <td class="tutupkiri" width="100"><div align="center">Program (Rp)</div></td>
        <td class="tutupkiri" width="100"><div align="center">Realisasi (Rp)</div></td>
        <td class="tutupkiri" width="150"><div align="center">Sisa (Rp)</div></td>
        <td width="50" class="tutupkiri"><div align="center">Nomor Kontrak</div></td>
        <td width="50" class="tutupkiri"><div align="center">Tanggal Kontrak</div></td>
        <td width="50" class="tutupkiri"><div align="center">Rekanan</div></td>
        <td width="50" class="tutupkiri"><div align="center">Waktu (Hari)</div></td>
        <td width="50" class="tutupkiri"><div align="center">Progres</div></td>
    </tr>

    <?php $i = 1;
    foreach ($q as $rs) {
        ?>
        <tr >
            <td width="2" class="tutupkiri"><div align="center"><?php echo $i; ?></td>
            <td width="2" class="tutupkiri"><div align="center"><?php echo $rs['mata_anggaran']; ?></div></td>
            <td width="450" class="tutupkiri"><div align="left"><?php echo $rs['uraian_pekerjaan']; ?></div></td>
            <td width="2" class="tutupkiri"><div align="right"><?php echo $rs['biaya_program']; ?></div></td>
            <td width="2" class="tutupkiri"><div align="right"><?php echo $rs['biaya_realisasi']; ?></div></td>
            <td width="2" class="tutupkiri"><div align="right"><?php echo $rs['biaya_sisa']; ?></div></td>
            <td width="150" class="tutupkiri"><div align="center"><?php echo $rs['nomor_kontrak']; ?></div></td>
            <td width="100" class="tutupkiri"><div align="center"><?php echo $rs['tanggal_kontrak']; ?></div></td>
            <td width="200" class="tutupkiri"><div align="center"><?php echo $rs['rekanan']; ?></div></td>
            <td width="2" class="tutupkiri"><div align="center"><?php echo $rs['waktu']; ?></div></td>
            <td width="2" class="tutupkiri"><div align="center"><?php echo $rs['progres']; ?></div></td>
          	<td width="10" class="closeall"><div align="center"><?php echo $rs['keterangan']; ?></div></td>
        </tr>
        <?php $i++;
    }
    ?>

</table>