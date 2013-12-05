<!--#content -->
<title>
    <?php echo $title; ?>
</title>
<?php
foreach ($dab_cikarang->result() as $peng) {
	//$id_seksi = $peng->id_seksi;
    $tanggal_input = $peng->tanggal_input;
    $jam = $peng->jam;
    $limpasan = $peng->limpasan;
    $bocoran = $peng->bocoran;
    $pintu_penguras = $peng->pintu_penguras;
    $suplesi_dari_btb34b = $peng->suplesi_dari_btb34b;
    $sumber_setempat = $peng ->sumber_setempat;
    $dimanfaatkan_ke_bekasibarat = $peng -> dimanfaatkan_ke_bekasibarat;
    $dimanfaatkan_ke_sukatani = $peng -> dimanfaatkan_ke_sukatani;
    $q1_dimanfaatkan = $peng -> q1_dimanfaatkan;
	$q2= $peng -> q2;
    $keterangan = $peng -> keterangan;
    $id = $peng->id;
}
?>
	<div id="content">
          <div class="box">
     
    <h2>Ubah Data Debet Air Bendung Cikarang</h2>
    <p>&nbsp;</p>
    <?php echo form_open('admin/simpanubahdab_cikarang'); ?>
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
          <td>Limpasan dari BTb 34b</td>
          <td>&nbsp;</td>
          <td><input name="suplesi_dari_btb34b" value='<?php echo $suplesi_dari_btb34b; ?>' type="text" size="30"/></td>
        </tr>

        <tr>
          <td>Dimanfaatkan ke Barat Bekasi</td>
          <td>&nbsp;</td>
          <td><input name="dimanfaatkan_ke_bekasibarat" value='<?php echo $dimanfaatkan_ke_bekasibarat; ?>' type="text" size="30"/></td>
        </tr>
        <tr>
          <td>Dimanfaatkan ke Sukatani</td>
          <td>&nbsp;</td>
          <td><input name="dimanfaatkan_ke_sukatani" value='<?php echo $dimanfaatkan_ke_sukatani; ?>' type="text" size="30"/></td>
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