<!--#content -->
<title>
    <?php echo $title; ?>
</title>
<?php
foreach ($pelanggan->result() as $gol) {
    $pelanggan= $gol->pelanggan;
    $id = $gol->id;
}
?>
		<div id="content">
          <div class="box">
              <h2>Ubah Pelanggan</h2>
    <?php echo form_open('admin/simpanubahpelanggan'); ?>
    <table id="tbl" border="0" class="display">
        <tr>
            <td>pelanggan</td>
            <td>&nbsp;</td>
            <td><input name="pelanggan" type="text" size="30" value='<?php echo $pelanggan; ?>'/></td>
        </tr>
        <?php echo form_hidden('id', $id); ?>

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