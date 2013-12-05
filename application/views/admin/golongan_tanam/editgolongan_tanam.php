<!--#content -->
<title>
    <?php echo $title; ?>
</title>
<?php
foreach ($golongan_tanam->result() as $gol) {
    $golongan_tanam = $gol->golongan_tanam;
    $id = $gol->id;
}
?>
	<div id="content">
          <div class="box">
     
    <h2>Ubah Golongan Tanam</h2>
  <p>&nbsp;</p>
    <?php echo form_open('admin/simpanubahgolongan_tanam'); ?>
    <table id="tbl" border="0" class="display">
        <tr>
            <td>Golongan Tanam</td>
            <td>&nbsp;</td>
            <td><input name="golongan_tanam" type="text" size="30" value='<?php echo $golongan_tanam; ?>'/></td>
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