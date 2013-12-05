<?php
$sql = "SELECT
    curah_hujan.*
    , seksi.seksi
FROM
    dpa1.curah_hujan
    LEFT JOIN dpa1.seksi 
        ON (curah_hujan.id_seksi = seksi.id) 
		WHERE (tanggal_input BETWEEN '$tgl1' AND '$tgl2') ";

$sql_bag = "SELECT * FROM seksi ";

if ($seksi != 'Semua') {
    $sql .= " AND curah_hujan.id_seksi = '$seksi' ";
    $sql_bag .= "WHERE id = '$seksi' ";
}
$sql .= "ORDER BY seksi.seksi ";
$q = $this->db->query($sql);
$q = $q->result_array();
?>
<h3 align="center">REKAPITULASI DATA CURAH HUJAN</h3>
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
      <td width="20" rowspan="2" class="tutupkiri"><div align="center">No</div></td>
      <td colspan="3" class="tutupkiri"><div align="center">Stasiun Hujan</div></td>
      <td colspan="15" class="tutupkiri"><div align="center">Tanggal </div></td>
      <td width="50" rowspan="2" class="tutupkiri"><div align="center">Jumlah (mm)</div></td>
      <td width="50" rowspan="2" class="tutupkiri"><div align="center">Maks. (mm)</div></td>
      <td width="50" rowspan="2" class="tutupkiri"><div align="center">Jumlah Hari Hujan</div></td>
      <td width="75" rowspan="2" class="closeall"><div align="center">Ket.</div></td>
    </tr>
    <tr>
        <td class="tutupkiri" width="100"><div align="center">Nomor</div></td>
        <td class="tutupkiri" width="100"><div align="center">Nama Stasiun</div></td>
        <td class="tutupkiri" width="100"><div align="center">Nama Stasiun</div></td>
        
        <td class="tutupkiri" width="15"><div align="center">1</div></td>
        <td class="tutupkiri" width="15"><div align="center">2</div></td>
        <td class="tutupkiri" width="15"><div align="center">3</div></td>
        <td class="tutupkiri" width="15"><div align="center">4</div></td>
        <td class="tutupkiri" width="15"><div align="center">5</div></td>
        <td class="tutupkiri" width="15"><div align="center">6</div></td>
        <td class="tutupkiri" width="15"><div align="center">7</div></td>
        <td class="tutupkiri" width="15"><div align="center">8</div></td>
        <td class="tutupkiri" width="15"><div align="center">9</div></td>
        <td class="tutupkiri" width="15"><div align="center">10</div></td>
        <td class="tutupkiri" width="15"><div align="center">11</div></td>
        <td class="tutupkiri" width="15"><div align="center">12</div></td>
        <td class="tutupkiri" width="15"><div align="center">13</div></td>
        <td class="tutupkiri" width="15"><div align="center">14</div></td>
        <td class="tutupkiri" width="15"><div align="center">15</div></td>
    </tr>

    <?php $i = 1;
    foreach ($q as $rs) {
        ?>
        <tr >
            <td class="tutupkiri"><div align="center"><?php echo $i; ?></td>
            <td width="80" class="tutupkiri"><div align="center"><?php echo $rs['nomor']; ?></td>
            <td width="80" class="tutupkiri"><?php echo $rs['nama_stasiun']; ?></td>
            <td width="150" class="tutupkiri"><?php echo $rs['seksi']; ?></td>
            <td width="15" class="tutupkiri"><div align="center"></div></td>
            <td width="15" class="tutupkiri"><div align="center"></div></td>
            <td width="15" class="tutupkiri"><div align="center"></div></td>
            <td width="15" class="tutupkiri"><div align="center"></div></td>
            <td width="15" class="tutupkiri"><div align="center"></div></td>
            <td width="15" class="tutupkiri"><div align="center"></div></td>
            <td width="15" class="tutupkiri"><div align="center"></div></td>
            <td width="15" class="tutupkiri"><div align="center"></div></td>
            <td width="15" class="tutupkiri"><div align="center"></div></td>
            <td width="15" class="tutupkiri"><div align="center"></div></td>
            <td width="15" class="tutupkiri"><div align="center"></div></td>
            <td width="15" class="tutupkiri"><div align="center"></div></td>
            <td width="15" class="tutupkiri"><div align="center"></div></td>
       	  	<td width="15" class="tutupkiri"><div align="center"></div></td>
            <td width="15" class="tutupkiri"><div align="center"></div></td>
            
            <td width="50" class="tutupkiri"><div align="center"></div></td>
            <td width="50" class="tutupkiri"><div align="center"></div></td>
            <td width="50" class="tutupkiri"><div align="center"></div></td>
          <td width="75" class="closeall"><div align="center"></div></td>
        </tr>
        <?php $i++;
    }
    ?>

</table>