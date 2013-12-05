
<!--#content -->
<title>
    <?php echo $title; ?>
</title>
		<div id="content">
          <div class="box">
              <h2>Tambah Pelanggan</h2>
    <?php echo form_open('admin/simpanpelanggan'); ?>
    <table id="tbl" border="0" class="display">
        <tr>
            <td>Pelanggan</td>
            <td>&nbsp;</td>
            <td><input name="pelanggan" type="text" size="30"/></td>
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