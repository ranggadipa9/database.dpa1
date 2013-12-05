<!--#content -->
<title>
    <?php echo $title; ?>
</title>
<?php
foreach ($dab_bekasi->result() as $peng) {
//	$id_seksi = $peng->id_seksi;
    $tanggal_input = $peng->tanggal_input;
    $jam = $peng->jam;
    $limpasan = $peng->limpasan;
    $suplesi_dari_btb45b = $peng->suplesi_dari_btb45b;
    $sumber_setempat = $peng->sumber_setempat;
    $dimanfaatkan_ke_dki = $peng->dimanfaatkan_ke_dki;
    $dimanfaatkan_ke_bekasiutara = $peng ->dimanfaatkan_ke_bekasiutara;
    $q1_dimanfaatkan = $peng -> q1_dimanfaatkan;
    $q2 = $peng -> q2;
    $keterangan = $peng -> keterangan;
    $id = $peng->id;
}
?>
	<div id="content">
          <div class="box">
     
    <h2>Ubah Data Debet Air Bendung Bekasi</h2>
    <p>&nbsp;</p>
    <?php echo form_open('admin/simpanubahdab_bekasi'); ?>
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
          <td>Suplesi dari BTb 45b</td>
          <td>&nbsp;</td>
          <td><input name="suplesi_dari_btb45b" value='<?php echo $suplesi_dari_btb45b; ?>' type="text" size="30"/></td>
        </tr>
        <tr>
          <td>Dimanfaatkan (Ke DKI Jakarta)</td>
          <td>&nbsp;</td>
          <td><input name="dimanfaatkan_ke_dki" value='<?php echo $dimanfaatkan_ke_dki; ?>' type="text" size="30"/></td>
        </tr>

        <tr>
          <td>Dimanfaatkan (Ke Bekasi Utara)</td>
          <td>&nbsp;</td>
          <td><input name="dimanfaatkan_ke_bekasiutara" value='<?php echo $dimanfaatkan_ke_bekasiutara; ?>' type="text" size="30"/></td>
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