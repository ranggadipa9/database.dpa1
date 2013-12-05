<!--#content -->
<title>
    <?php echo $title; ?>
</title>
<?php
foreach ($balai->result() as $gol) {
    $balai= $gol->balai;
    $id = $gol->id;
}
?>
	<div id="content">
          <div class="box">
         <h2>Ubah Balai</h2>
    <p>&nbsp;</p>
    <?php echo form_open('admin/simpanubahbalai'); ?>
    <table id="tbl" border="0" class="display">
        <tr>
            <td width="44">Balai</td>
            <td width="10">&nbsp;</td>
            <td width="195"><input name="balai" type="text" size="30" value='<?php echo $balai; ?>'/></td>
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