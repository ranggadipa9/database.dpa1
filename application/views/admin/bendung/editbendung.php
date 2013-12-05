<!--#content -->
<title>
    <?php echo $title; ?>
</title>
<?php
foreach ($bendung->result() as $gol) {
    $bendung= $gol->bendung;
    $id_seksi= $gol->id_seksi;
    $id = $gol->id;
}
?>
	<div id="content">
          <div class="box">
     
    <h2>Ubah Bendung</h2>
    <p>&nbsp;</p>
    <?php echo form_open('admin/simpanubahbendung'); ?>
    <table id="tbl" border="0" class="display">
        <tr>
          <td>Bendung</td>
          <td>&nbsp;</td>
          <td><input name="bendung" type="text" size="30" value='<?php echo $bendung; ?>'/></td>
        </tr>
        <?php echo form_hidden('id', $id); ?>
        <tr>
          <td>Seksi</td>
          <td>&nbsp;</td>
          <td><select name="id_seksi">
            <?php
                    $seksi = $this->mseksi->getseksi();
                    foreach ($seksi->result() as $bag):
                        if ($id_seksi == $bag->id) {
                            $select = "selected='selected'";
                        } else {
                            $select = "";
                        }
                        ?>
            <option value="<?php echo $bag->id; ?>"<?php echo $select; ?>> <?php echo $bag->seksi ?></option>
            <?php endforeach; ?>
          </select></td>
        </tr>
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