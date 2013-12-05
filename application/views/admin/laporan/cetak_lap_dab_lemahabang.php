<?php
$sql = "SELECT
    *
FROM
    dpa1.dab_lemahabang
	WHERE (tanggal_input BETWEEN '$tgl1' AND '$tgl2')";

//$sql_bag = "SELECT * FROM seksi ";

//if ($seksi != 'Semua') {
//    $sql .= " AND curah_hujan.id_seksi = '$seksi' ";
//    $sql_bag .= "WHERE id = '$seksi' ";
//}
$sql .= "ORDER BY dab_lemahabang.tanggal_input ";
$q = $this->db->query($sql);
$q = $q->result_array();
?>
<h3 align="center">REKAPITULASI DATA DEBET AIR BENDUNG LEMAHABANG</h3>
<h3 align="center">
</h2>
<p align="left">Tampilkan dalam File :  <a href="javascript:;" ><img src="../../../../spon/images/excel-icon.jpeg" alt="" width="25" height="25" onclick="window.open('../../../../excel/export_excel_dab_lemahabang.php','scrollwindow','top=200,left=300,width=800,height=500');" border="0" /></a></p>

<h3 align="center"><?php echo 'Periode : ' . tgl_indo($tgl1) . ' s/d ' . tgl_indo($tgl2); ?></h3>

<table width="100%" cellpadding="0" cellspacing="0" border="0">
    <tr>
      <td width="20" class="tutupkiri"><div align="center">No</div></td>
      <td width="100" class="tutupkiri"><div align="center">Tanggal Input</div></td>
      <td width="450" class="tutupkiri"><div align="center">Jam</div></td>
      <td width="450" class="tutupkiri"><div align="center">TMA</div></td>
      <td width="450" class="tutupkiri"><div align="center">Debet</div></td>
      <td width="75" class="closeall"><div align="center">Keterangan</div></td>
    </tr>

    <?php $i = 1;
    foreach ($q as $rs) {
        ?>
        <tr >
            <td width="20" class="tutupkiri"><div align="center"><?php echo $i; ?></td>
            <td width="100" class="tutupkiri"><div align="center"><?php echo $rs['tanggal_input']; ?></div></td>
            <td width="450" class="tutupkiri"><?php echo $rs['jam']; ?></td>
            <td width="450" class="tutupkiri"><?php echo $rs['tma']; ?></td>
            <td width="450" class="tutupkiri"><?php echo $rs['debet']; ?></td>
            <td width="75" class="closeall"><div align="center"><?php echo $rs['keterangan']; ?></div></td>
        </tr>
        <?php $i++;
    }
    ?>

</table>