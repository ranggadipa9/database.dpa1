
<!--#content -->
<title>
    <?php echo $title; ?>
</title>
	<div id="content">
          <div class="box">
     
    <h2>Tambah Data Debet Air Bendung Cikarang</h2>
    <p>&nbsp;</p>
    <?php echo form_open('admin/simpandab_cikarang'); ?>
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
          <td>Limpasan</td>
          <td>&nbsp;</td>
          <td><input name="limpasan" type="text" size="30"/></td>
        </tr>
        <tr>
            <td>Bocoran</td>
            <td>&nbsp;</td>
            <td><input name="bocoran" type="text" size="30"/></td>
        </tr>
        <tr>
            <td>Limpasan dari BTb 34b</td>
            <td>&nbsp;</td>
            <td><input name="suplesi_dari_btb34b" type="text" size="30"/></td>
        </tr>
        <tr>
          <td>Dimanfaatkan ke Barat Bekasi</td>
          <td>&nbsp;</td>
          <td><input name="dimanfaatkan_ke_bekasibarat" type="text" size="30"/></td>
        </tr>
        <tr>
          <td>Dimanfaatkan ke Sukatani</td>
          <td>&nbsp;</td>
          <td><input name="dimanfaatkan_ke_sukatani" type="text" size="30"/></td>
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