<?php
$sql = "SELECT
    *
FROM
    dpa1.dab_bekasi 
	WHERE (tanggal_input BETWEEN '$tgl1' AND '$tgl2')";

//$sql_bag = "SELECT * FROM seksi ";

//if ($seksi != 'Semua') {
//    $sql .= " AND curah_hujan.id_seksi = '$seksi' ";
//    $sql_bag .= "WHERE id = '$seksi' ";
//}
$sql .= "ORDER BY dab_bekasi.tanggal_input ";
$q = $this->db->query($sql);
$q = $q->result_array();
?>
<h3 align="center">REKAPITULASI DATA DEBET AIR BENDUNG BEKASI</h3>
<h3 align="center">
</h2>
<p align="left">Tampilkan dalam File :  <a href="javascript:;" ><img src="../../../../spon/images/excel-icon.jpeg" alt="" width="25" height="25" onclick="window.open('../../../../excel/export_excel_dab_bekasi.php','scrollwindow','top=200,left=300,width=800,height=500');" border="0" /></a></p>

<h3 align="center"><?php echo 'Periode : ' . tgl_indo($tgl1) . ' s/d ' . tgl_indo($tgl2); ?></h3>

<table width="100%" cellpadding="0" cellspacing="0" border="0">
    <tr>
      <td width="20" class="tutupkiri"><div align="center">No</div></td>
      <td width="100" class="tutupkiri"><div align="center">Tanggal Input</div></td>
      <td width="450" class="tutupkiri"><div align="center">Jam</div></td>
      <td width="450" class="tutupkiri"><div align="center">Limpasan</div></td>
      <td width="450" class="tutupkiri"><div align="center">Suplesi dari Btb 45b</div></td>
      <td width="450" class="tutupkiri"><div align="center">Ke DKI Jakarta</div></td>
      <td class="tutupkiri"><div align="center">Ke Bekasi Utara</div></td>
      <td width="75" class="closeall"><div align="center">Sumber Setempat</div></td>
      <td width="75" class="closeall"><div align="center">Q1</div></td>
      <td width="75" class="closeall"><div align="center">Q2</div></td>
      <td width="75" class="closeall"><div align="center">Keterangan</div></td>
    </tr>

    <?php $i = 1;
    foreach ($q as $rs) {
        ?>
        <tr >
            <td width="20" class="tutupkiri"><div align="center"><?php echo $i; ?></td>
            <td width="100" class="tutupkiri"><div align="center"><?php echo $rs['tanggal_input']; ?></div></td>
            <td width="450" class="tutupkiri"><?php echo $rs['jam']; ?></td>
            <td width="450" class="tutupkiri"><?php echo $rs['limpasan']; ?></td>
            <td width="450" class="tutupkiri"><?php echo $rs['suplesi_dari_btb45b']; ?></td>
            <td width="450" class="tutupkiri"><?php echo $rs['dimanfaatkan_ke_dki']; ?></td>
            <td width="450" class="tutupkiri"><?php echo $rs['dimanfaatkan_ke_bekasiutara']; ?></td>
          <td width="75" class="closeall"><?php echo $rs['sumber_setempat']; ?></td>
            <td width="75" class="closeall"><?php echo $rs['q1_dimanfaatkan']; ?></td>
            <td width="75" class="closeall"><?php echo $rs['q2']; ?></td>
            <td width="75" class="closeall"><div align="center"><?php echo $rs['keterangan']; ?></div></td>
        </tr>
        <?php $i++;
    }
    ?>

</table>