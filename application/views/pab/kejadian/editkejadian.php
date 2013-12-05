<!--#content -->
<title>
    <?php echo $title; ?>
</title>
<?php
foreach ($kejadian->result() as $peng) {
    $tanggal_input = $peng->tanggal_input;
    $jam = $peng->jam;
    $id_seksi = $peng -> id_seksi;
	
    $id_bendung= $peng -> id_bendung;
    $regu = $peng -> regu;
	$nama_operator = $peng -> nama_operator;
    $kejadian = $peng -> kejadian;
    $id = $peng->id;
}
?>
	<div id="content">
          <div class="box">
     
    <h2>Ubah Laporan Kejadian</h2>
    <p>&nbsp;</p>
    <?php echo form_open('pab/simpanubahkejadian'); ?>
    <table id="tbl" border="0" class="display">
        <tr>
          <td>Tanggal</td>
          <td>&nbsp;</td>
          <td><input name="tanggal_input" value='<?php echo $tanggal_input; ?>' type="text" size="30"/><font color="red">(Format : yyyy-mm-dd)</font></td>
        </tr>
        <tr>
            <td>Jam</td>
            <td>&nbsp;</td>
            <td><input name="jam" value='<?php echo $jam; ?>' type="text" size="30"/></td>
        </tr>
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
          <td>Bendung</td>
          <td>&nbsp;</td>
          <td><select name="id_bendung">
            <?php
                    $bendung = $this->mbendung->getbendung();
                    foreach ($bendung->result() as $bag):
                        if ($id_bendung == $bag->id) {
                            $select = "selected='selected'";
                        } else {
                            $select = "";
                        }
                        ?>
            <option value="<?php echo $bag->id; ?>"<?php echo $select; ?>> <?php echo $bag->bendung ?></option>
            <?php endforeach; ?>
          </select></td>
        </tr>
        <tr>
          <td>Regu</td>
          <td>&nbsp;</td>
          <td><input name="regu" value='<?php echo $regu; ?>' type="text" size="30"/></td>
        </tr>
        <tr>
          <td>Nama Operator</td>
          <td>&nbsp;</td>
          <td><input name="nama_operator" value='<?php echo $nama_operator; ?>' type="text" size="30"/></td>
        </tr>
        <tr>
            <td>Laporan Kejadian</td>
            <td>&nbsp;</td>
            <td><textarea name="kejadian" cols="30" rows="10"></textarea></td>
        </tr>
        <tr>
          <td></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
            <?php echo form_hidden('id', $id); ?>

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