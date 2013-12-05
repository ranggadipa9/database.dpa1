
<!--#content -->
<title>
    <?php echo $title; ?>
</title>
	<div id="content">
          <div class="box">
         <h2>Tambah Mata Anggaran</h2>
    <p>&nbsp;</p>
    <?php echo form_open('admin/simpanmata_anggaran'); ?>
    <table id="tbl" border="0" class="display">
        <tr>
            <td>Mata Aanggaran</td>
            <td>&nbsp;</td>
            <td><input name="mata_anggaran" type="text" size="30"/></td>
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