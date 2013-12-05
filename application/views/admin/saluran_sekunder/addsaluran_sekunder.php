
<!--#content -->
<title>
    <?php echo $title; ?>
</title>
	<div id="content">
          <div class="box">
     
    <h2>Tambah Saluran Sekunder</h2>
  <p>&nbsp;</p>
    <?php echo form_open('admin/simpansaluran_sekunder'); ?>
    <table id="tbl" border="0" class="display">
        <tr>
            <td>Saluran Sekunder</td>
            <td>&nbsp;</td>
            <td><input name="saluran_sekunder" type="text" size="30"/></td>
        </tr>
        <tr>
          <td></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
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