<!--#content -->
<title>
    <?php echo $title; ?>
</title>
<?php
foreach ($seksi->result() as $jab) {
    $seksi = $jab->seksi;
    $id = $jab->id;
}
?>
<div id="riht">
    <h2>Ubah Seksi</h2>
    <p>&nbsp;</p>
    <?php echo form_open('admin/simpanubahseksi'); ?>
    <table id="tbl" border="0" class="display">
        <tr>
            <td>Seksi</td>
            <td>&nbsp;</td>
            <td><input name="seksi" type="text" size="30" value='<?php echo $seksi; ?>'/></td>
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
	
<!-- end #content -->
</div>
        </div>
        
		<div class="clear"></div>
    </div>
</div>