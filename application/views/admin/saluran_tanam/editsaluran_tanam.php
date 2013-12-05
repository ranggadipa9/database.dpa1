<!--#content -->
<title>
    <?php echo $title; ?>
</title>
<?php
foreach ($saluran_tanam->result() as $gol) {
    $saluran_tanam = $gol->saluran_tanam;
    $id = $gol->id;
}
?>
	<div id="content">
          <div class="box">
     
    <h2>Ubah Saluran Tanam</h2>
  <p>&nbsp;</p>
    <?php echo form_open('admin/simpanubahsaluran_tanam'); ?>
    <table id="tbl" border="0" class="display">
        <tr>
            <td>Saluran Tanam</td>
            <td>&nbsp;</td>
            <td><input name="saluran_tanam" type="text" size="30" value='<?php echo $saluran_tanam; ?>'/></td>
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