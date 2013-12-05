<?php
$sql = "SELECT
    kejadian.*
    , bendung.bendung
    , seksi.seksi
FROM
    dpa1.kejadian
    LEFT JOIN dpa1.seksi 
        ON (kejadian.id_seksi = seksi.id)
    LEFT JOIN dpa1.bendung 
        ON (kejadian.id_bendung = bendung.id) 
		WHERE (tanggal_input BETWEEN '$tgl1' AND '$tgl2') ";

$sql_bag = "SELECT * FROM seksi ";

if ($seksi != 'Semua') {
    $sql .= " AND kejadian.id_seksi = '$seksi' ";
    $sql_bag .= "WHERE id = '$seksi' ";
}
$sql .= "ORDER BY seksi.seksi ";
$q = $this->db->query($sql);
$q = $q->result_array();
?>
<h3 align="center">LAPORAN KEJADIAN</h3>
<p align="left">Tampilkan dalam File :  <a href="javascript:;" ><img src="../../../../spon/images/excel-icon.jpeg" alt="" width="25" height="25" onclick="window.open('../../../../excel/export_excel_curahhujan.php','scrollwindow','top=200,left=300,width=800,height=500');" border="0" /></a></p>
<h3 align="center"><?php
    $q_bag = $this->db->query($sql_bag);
    foreach ($q_bag->result() as $r_bag) {
        $bag = $r_bag->seksi;
        $id = $r_bag->id;
    }
    if ($seksi != 'Semua') {
        echo 'Seksi : ' . $bag;
    } else {
        echo 'Seksi: ' . $seksi;
    }
    ?>
</h2>
<h3 align="center"><?php echo 'Periode : ' . tgl_indo($tgl1) . ' s/d ' . tgl_indo($tgl2); ?></h3>

<table width="100%" cellpadding="0" cellspacing="0" border="0">
    <tr>
      <td width="20" class="tutupkiri"><div align="center">No</div></td>
      <td width="100" class="tutupkiri"><div align="center">Tanggal</div></td>
      <td width="100" class="tutupkiri"><div align="center">Jam</div></td>
      <td width="150" class="tutupkiri"><div align="center">Seksi</div></td>
      <td width="50" class="tutupkiri"><div align="center">Bendung</div></td>
      <td width="50" class="tutupkiri"><div align="center">Regu</div></td>
      <td width="50" class="tutupkiri"><div align="center">Nama Operator</div></td>
      <td width="75" class="closeall"><div align="center">Kejadian</div></td>
    </tr>
    <?php $i = 1;
    foreach ($q as $rs) {
        ?>
        <tr >
            <td class="tutupkiri"><div align="center"><?php echo $i; ?></td>
            <td width="100" class="tutupkiri"><div align="center"><?php echo $rs['tanggal_input']; ?></td>
            <td width="100" class="tutupkiri"><?php echo $rs['jam']; ?></td>
            <td width="150" class="tutupkiri"><?php echo $rs['seksi']; ?></td>
            <td width="50" class="tutupkiri"><div align="center"><?php echo $rs['bendung']; ?></div></td>
            <td width="50" class="tutupkiri"><div align="center"><?php echo $rs['regu']; ?></div></td>
            <td width="50" class="tutupkiri"><div align="center"><?php echo $rs['nama_operator']; ?></div></td>
          <td width="75" class="closeall"><div align="center"><span class="tutupkiri"><?php echo $rs['kejadian']; ?></span></div></td>
        </tr>
        <?php $i++;
    }
    ?>

</table>