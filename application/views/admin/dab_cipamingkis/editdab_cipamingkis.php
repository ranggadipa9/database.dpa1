<!--#content -->
<title>
    <?php echo $title; ?>
</title>
<?php
foreach ($dab_cipamingkis->result() as $peng) {
	//$id_seksi = $peng -> id_seksi;
    $tanggal_input= $peng -> tanggal_input;
    $jam = $peng -> jam;
    $limpasan = $peng -> limpasan;
    $saluran_induk_kiri= $peng -> saluran_induk_kiri;
    $saluran_induk_kanan = $peng -> saluran_induk_kanan;
    $q1 = $peng -> q1;
    $q2= $peng -> q2;
    $keterangan = $peng -> keterangan;
    $id = $peng->id;
}
?>
	<div id="content">
          <div class="box">
     
    <h2>Ubah Data Debet Air Bendung Cipamingkis</h2>
    <p>&nbsp;</p>
    <?php echo form_open('admin/simpanubahdab_cipamingkis'); ?>
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
          <td>Limpasan</td>
          <td>&nbsp;</td>
          <td><input name="limpasan" value='<?php echo $limpasan; ?>' type="text" size="30"/></td>
        </tr>
        <tr>
          <td>Saluran Induk Kiri</td>
          <td>&nbsp;</td>
          <td><input name="saluran_induk_kiri" value='<?php echo $saluran_induk_kiri; ?>' type="text" size="30"/></td>
        </tr>
        <tr>
          <td>Saluran Induk Kanan</td>
          <td>&nbsp;</td>
          <td><input name="saluran_induk_kanan" value='<?php echo $saluran_induk_kanan; ?>' type="text" size="30"/></td>
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