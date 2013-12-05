<!--#content -->
<title>
    <?php echo $title; ?>
</title>
<?php
foreach ($mata_anggaran->result() as $gol) {
    $mata_anggaran= $gol->mata_anggaran;
    $id = $gol->id;
}
?>
	<div id="content">
          <div class="box">
         <h2>Ubah Mata Anggaran</h2>
    <p>&nbsp;</p>
    <?php echo form_open('admin/simpanubahmata_anggaran'); ?>
    <table id="tbl" border="0" class="display">
        <tr>
            <td width="44">Mata Anggaran</td>
            <td width="10">&nbsp;</td>
            <td width="195"><input name="mata_anggaran" type="text" size="30" value='<?php echo $mata_anggaran; ?>'/></td>
        </tr>
        <?php echo form_hidden('id', $id); ?>

        <tr>
          <td></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <td></td>
        <td>&nbsp;</td>
        <td><input type="submit" value="Simpan"></td>
        </tr>
    </table>
    <?php echo form_close(); ?>
	
</div>
        </div>
        
		<div class="clear"></div>
    </div>
</div>