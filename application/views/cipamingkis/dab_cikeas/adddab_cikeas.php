
<!--#content -->
<title>
    <?php echo $title; ?>
</title>

	<div id="content">
          <div class="box">
<h2>Tambah Data Debet Air Bendung Cikeas</h2>
<p>&nbsp;</p>
    <?php echo form_open('cipamingkis/simpandab_cikeas'); ?>
    <table id="tbl" border="0" class="display">
        <tr>
            <td>Tanggal Input</td>
            <td>&nbsp;</td>
            <td><input name="tanggal_input" type="text" size="30"/><font color="red">(Format : yyyy-mm-dd)</font></td>
        </tr>
        <tr>
            <td>Jam</td>
            <td>&nbsp;</td>
            <td><input name="jam" type="text" size="30"/></td>
        </tr>
        <tr>
          <td>Pelipmas Kiri</td>
          <td>&nbsp;</td>
          <td><input name="pelimpas_kiri" type="text" size="30"/></td>
        </tr>
        <tr>
            <td>Pelimpas Kanan</td>
            <td>&nbsp;</td>
            <td><input name="pelimpas_kanan" type="text" size="30"/></td>
        </tr>
        <tr>
          <td>Keterangan</td>
          <td>&nbsp;</td>
          <td><input name="keterangan" type="text" size="30"/></td>
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