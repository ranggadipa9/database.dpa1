
<!--#content -->
<title>
    <?php echo $title; ?>
</title>
<div id="rihgt">
    <h2>Tambah Pengamat</h2>
    <p>&nbsp;</p>
    <?php echo form_open('admin/simpanpengamat'); ?>
    <table id="tbl" border="0" class="display">
        <tr>
            <td>Pengamat</td>
            <td>&nbsp;</td>
            <td><input name="pengamat" type="text" size="30"/></td>
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
