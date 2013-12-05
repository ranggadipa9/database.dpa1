<!--#content -->
<title>
    <?php echo $title; ?>
</title>
<?php
foreach ($dab_cikeas->result() as $peng) {
	//$id_seksi = $peng -> id_seksi;
    $tanggal_input = $peng -> tanggal_input;
    $jam = $peng -> jam;
    $pelimpas_kiri = $peng -> pelimpas_kiri;
    $pelimpas_kanan = $peng -> pelimpas_kanan;
    $jumlah = $peng -> jumlah;
    $keterangan = $peng -> keterangan;
    $id = $peng->id;
}
?>

	<div id="content">
          <div class="box">
    <h2>Ubah Data Debet Air Bendung Cikeas</h2>
    <p>&nbsp;</p>
    <?php echo form_open('cipamingkis/simpanubahdab_cikeas'); ?>
    <table id="tbl" border="0" class="display">
        <tr>
            <td>Tanggal Input</td>
            <td>&nbsp;</td>
            <td><input name="tanggal_input" value='<?php echo $tanggal_input; ?>' type="text" size="30"/><font color="red">(Format : yyyy-mm-dd)</font></td>
        </tr>
        <tr>
            <td>Jam</td>
            <td>&nbsp;</td>
            <td><input name="jam" value='<?php echo $jam; ?>' type="text" size="30"/></td>
        </tr>
        <tr>
            <td>Pelimpas Kiri</td>
            <td>&nbsp;</td>
            <td><input name="pelimpas_kiri" value='<?php echo $pelimpas_kiri; ?>' type="text" size="30"/></td>
        </tr>
        <tr>
            <td>Pelimpas Kanan</td>
            <td>&nbsp;</td>
            <td><input name="pelimpas_kanan" value='<?php echo $pelimpas_kanan; ?>' type="text" size="30"/></td>
        </tr>
        <tr>
            <td>Keterangan</td>
            <td>&nbsp;</td>
            <td><input name="keterangan" value='<?php echo $keterangan; ?>' type="text" size="30"/></td>
        </tr>
        <tr>
          <td></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
            <?php echo form_hidden('id', $id); ?>

            <td></td>
            <td>&nbsp;</td>
            <td><input type="submit" value="Simpan"></td>
        </tr>
    </table>
    <?php echo form_close(); ?>

<!-- end #content -->
</div>
        </div>
        
		<div class="clear"></div>
    </div>
</div>