<!--#content -->
<title>
    <?php echo $title; ?>
</title>
<?php
foreach ($dab_cibeet->result() as $peng) {
	//$id_seksi = $peng -> id_seksi;
    $tanggal_input = $peng -> tanggal_input;
    $jam = $peng -> jam;
	$limpasan = $peng -> limpasan;
    $bocoran = $peng -> bocoran;
    $q1_suplesi_ketarumbarat = $peng -> q1_suplesi_ketarumbarat;
	$q2_kalicibeet = $peng -> q2_kalicibeet;
	$keterangan = $peng -> keterangan;
    $id = $peng->id;
}
?>
	<div id="content">
          <div class="box">
     
    <h2>Ubah Data Debet Air Bendung Cibeet</h2>
    <p>&nbsp;</p>
    <?php echo form_open('admin/simpanubahdab_cibeet'); ?>
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
          <td>Bocoran</td>
          <td>&nbsp;</td>
          <td><input name="bocoran" value='<?php echo $bocoran; ?>' type="text" size="30"/></td>
        </tr>
        <tr>
          <td>Q1 Suplesi Ketarum Barat</td>
          <td>&nbsp;</td>
          <td><input name="q1_suplesi_ketarumbarat" value='<?php echo $q1_suplesi_ketarumbarat; ?>' type="text" size="30"/></td>
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