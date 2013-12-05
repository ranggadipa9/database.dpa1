<?php
$sql = "SELECT
    *
FROM
    dpa1.dab_cbl 
	WHERE (tanggal_input BETWEEN '$tgl1' AND '$tgl2')";

//$sql_bag = "SELECT * FROM seksi ";

//if ($seksi != 'Semua') {
//    $sql .= " AND curah_hujan.id_seksi = '$seksi' ";
//    $sql_bag .= "WHERE id = '$seksi' ";
//}
$sql .= "ORDER BY dab_cbl.tanggal_input ";
$q = $this->db->query($sql);
$q = $q->result_array();
?>
<h3 align="center">REKAPITULASI DATA DEBET AIR BENDUNG CBL</h3>
<h3 align="center">
</h2>
<h3 align="center"><?php echo 'Periode : ' . tgl_indo($tgl1) . ' s/d ' . tgl_indo($tgl2); ?></h3>

<table width="100%" cellpadding="0" cellspacing="0" border="0">
    <tr>
      <td width="20" class="tutupkiri"><div align="center">No</div></td>
      <td width="100" class="tutupkiri"><div align="center">Tanggal Input</div></td>
      <td width="200" class="tutupkiri"><div align="center">Jam</div></td>
      <td width="200" class="tutupkiri"><div align="center">Limpasan</div></td>
      <td width="200" class="tutupkiri"><div align="center">Debet Air</div></td>
      <td width="200" class="tutupkiri"><div align="center">Disukatani (BSh.1)</div></td>
      <td width="200" class="tutupkiri"><div align="center">Jumlah</div></td>
      <td width="75" class="closeall"><div align="center">Keterangan</div></td>
    </tr>

    <?php $i = 1;
    foreach ($q as $rs) {
        ?>
        <tr >
            <td width="2" class="tutupkiri"><div align="center"><?php echo $i; ?></td>
            <td width="2" class="tutupkiri"><div align="center"><?php echo $rs['tanggal_input']; ?></div></td>
            <td width="450" class="tutupkiri"><?php echo $rs['jam']; ?></td>
            <td width="450" class="tutupkiri"><?php echo $rs['limpasan']; ?></td>
            <td width="450" class="tutupkiri"><?php echo $rs['debet_air']; ?></td>
          <td width="450" class="tutupkiri"><?php echo $rs['disukatani_bsh1']; ?></td>
            <td width="450" class="tutupkiri"><div align="left"><?php echo $rs['jumlah']; ?></div></td>
            <td width="10" class="closeall"><div align="center"><?php echo $rs['keterangan']; ?></div></td>
        </tr>
        <?php $i++;
    }
    ?>

</table>