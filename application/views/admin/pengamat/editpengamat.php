<!--#content -->
<title>
    <?php echo $title; ?>
</title>
<?php
foreach ($pengamat->result() as $gol) {
    $pengamat= $gol->pengamat;
    $id = $gol->id;
}
?>
	<div id="content">
          <div class="box">
     
    <h2>Ubah Pengamat</h2>
<p>&nbsp;</p>
    <?php echo form_open('admin/simpanubahpengamat'); ?>
    <table id="tbl" border="0" class="display">
        <tr>
            <td>pengamat</td>
            <td>&nbsp;</td>
            <td><input name="pengamat" type="text" size="30" value='<?php echo $pengamat; ?>'/></td>
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