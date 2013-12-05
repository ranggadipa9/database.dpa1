<!--#content -->
<title>
    <?php echo $title; ?>
</title>
<?php
foreach ($saluran_sekunder->result() as $gol) {
    $saluran_sekunder = $gol->saluran_sekunder;
    $id = $gol->id;
}
?>
	<div id="content">
          <div class="box">
     
    <h2>Ubah Saluran Sekunder</h2>
    <p>&nbsp;</p>
    <?php echo form_open('admin/simpanubahsaluran_sekunder'); ?>
    <table id="tbl" border="0" class="display">
        <tr>
            <td>Saluran Sekunder</td>
            <td>&nbsp;</td>
            <td><input name="saluran_sekunder" type="text" size="30" value='<?php echo $saluran_sekunder; ?>'/></td>
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
    <p><?php echo form_close(); ?></p>
 
<!-- end #content -->
</div>
        </div>
        
		<div class="clear"></div>
    </div>
</div>
