<!--#content -->
<title>
    <?php echo $title; ?>
</title>
<?php
foreach ($dab_cbl->result() as $peng) {
	$tanggal_input = $peng->tanggal_input;
    $id_seksi = $peng -> id_seksi;
    $jam= $peng -> jam;
    $limpasan = $peng -> limpasan;
    $debet_air = $peng -> debet_air;
    $disukatani_bsh1 = $peng -> disukatani_bsh1;
    $jumlah = $peng -> jumlah;
    $keterangan = $peng -> keterangan;
    
	$id = $peng->id;
}
?>
<div id="content">
          <div class="box">
        <h2>Ubah Data Inventaris Area Lahan</h2>
    <p>&nbsp;</p>
    <?php echo form_open('bekasi/simpanubahdab_cbl'); ?>
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
          <td>Limpsan</td>
          <td>&nbsp;</td>
          <td><input name="limpasan" value='<?php echo $limpasan; ?>' type="text" size="30"/></td>
        </tr>
        <tr>
          <td>Debet Air</td>
          <td>&nbsp;</td>
          <td><input name="debet_air" value='<?php echo $debet_air; ?>' type="text" size="30"/></td>
        </tr>
        <tr>
          <td>Disukatani (BSh. 1)</td>
          <td>&nbsp;</td>
          <td><input name="disukatani_bsh1" value='<?php echo $disukatani_bsh1; ?>' type="text" size="30"/></td>
        </tr>

        <tr>
          <td>Keterangan</td>
          <td>&nbsp;</td>
          <td><input name="keterangan" value='<?php echo $keterangan; ?>' type="text" size="30"/></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
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