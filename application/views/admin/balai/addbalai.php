
<!--#content -->
<title>
    <?php echo $title; ?>
</title>
	<div id="content">
          <div class="box">
         <h2>Tambah Balai</h2>
    <p>&nbsp;</p>
    <?php echo form_open('admin/simpanbalai'); ?>
    <table id="tbl" border="0" class="display">
        <tr>
            <td>Balai</td>
            <td>&nbsp;</td>
            <td><input name="balai" type="text" size="30"/></td>
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
</div>
        </div>
        
		<div class="clear"></div>
    </div>
</div>