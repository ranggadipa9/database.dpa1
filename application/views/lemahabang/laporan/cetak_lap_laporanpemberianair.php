<?php
$sql = "SELECT
    pemberian_air.*
    , seksi.seksi
    , saluran_sekunder.saluran_sekunder
FROM
    dpa1.pemberian_air
    LEFT JOIN dpa1.seksi 
        ON (pemberian_air.id_seksi = seksi.id)
    LEFT JOIN dpa1.saluran_sekunder 
        ON (pemberian_air.id_saluran_sekunder = saluran_sekunder.id) 
			WHERE (tanggal_input BETWEEN '$tgl1' AND '$tgl2') ";

$sql_bag = "SELECT * FROM saluran_sekunder ";
$sql_bag1 = "SELECT * FROM seksi ";

if ($saluran_sekunder != 'Semua') {
    $sql .= "AND pemberian_air.id_saluran_sekunder = '$saluran_sekunder' ";
    $sql_bag .= "WHERE id = '$saluran_sekunder' ";
}
if ($seksi != 'Semua') {
	$tmp = " WHERE ";
	if (strpos($sql,'WHERE') > 0) {
        $tmp = " AND ";
    }
    $sql .= $tmp . " pemberian_air.id_seksi = '$seksi'";
    $sql_bag1 .= "WHERE id = '$seksi' ";
}
$sql .= " ORDER BY seksi.seksi ";
$q = $this->db->query($sql);
$q = $q->result_array();
?>
<h2 align="center">Laporan Data Pemberian Air Perusahaan</h2>
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
        <td class="tutupkiri" width="80"><div align="center">Tanggal</div></td>
        <td class="tutupkiri" width="220"><div align="center">Seksi</div></td>
        <td class="tutupkiri" width="150"><div align="center">Nama Saluran</div></td>
        <td class="tutupkiri" width="200"><div align="center">Saluran Sekunder</div></td>
        <td class="tutupkiri" width="120"><div align="center">Nama Bangunan Btb</div></td>
        <td class="tutupkiri" width="80"><div align="center">Target Area Tanam</div></td>
        <td class="tutupkiri" width="80"><div align="center">Golongan Tanam</div></td>
        <td class="tutupkiri" width="80"><div align="center">Rencana Pemberian Air</div></td>
        <td class="tutupkiri" width="80"><div align="center">Pemberian Air</div></td>
        <td class="closeall" width="100"><div align="center">Keterangan</div></td>
    </tr>

    <?php $i = 1;
    foreach ($q as $rs) {
        ?>
        <tr>
            <td class="tutupkiri" align="center"><?php echo $i; ?></td>
            <td class="tutupkiri" align="center"><?php echo $rs['tanggal_input']; ?></td>
            <td class="tutupkiri"><?php echo $rs['seksi']; ?></td>
            <td class="tutupkiri"><?php echo $rs['nama_saluran']; ?></td>
            <td class="tutupkiri"><?php echo $rs['saluran_sekunder']; ?></td>
            <td class="tutupkiri" align="center"><?php echo $rs['nama_bangunan_btb']; ?></td>
            <td class="tutupkiri" align="center"><?php echo $rs['target_areal_tanam']; ?></td>
            <td class="tutupkiri" align="center"><?php echo $rs['golongan_tanam']; ?></td>
            <td class="tutupkiri" align="center"><?php echo $rs['rencana_pemberian_air']; ?></td>
            <td class="tutupkiri" align="center"><?php echo $rs['pemberian_air']; ?></td>
            <td class="closeall" align="center"><?php echo $rs['keterangan']; ?></td>
        </tr>
        <?php $i++;
    }
    ?>

</table>