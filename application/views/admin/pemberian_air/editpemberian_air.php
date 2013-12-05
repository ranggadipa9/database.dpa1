<!--#content -->
<title>
    <?php echo $title; ?>
</title>
<?php
foreach ($pemberian_air->result() as $peng) {
    $tanggal_input = $peng->tanggal_input;
    $id_seksi = $peng->id_seksi;
    $nama_saluran = $peng->nama_saluran;
    $id_saluran_sekunder = $peng->id_saluran_sekunder;
    $nama_bangunan_btb = $peng->nama_bangunan_btb;
    $target_areal_tanam = $peng->target_areal_tanam;
    $golongan_tanam = $peng->golongan_tanam;
    $rencana_pemberian_air = $peng ->rencana_pemberian_air;
    $pemberian_air = $peng -> pemberian_air;
    $keterangan = $peng -> keterangan;
    $id = $peng->id;
}
?>
	<div id="content">
          <div class="box">
     
    <h2>Ubah Data Pemberian Air </h2>
    <p>&nbsp;</p>
    <?php echo form_open('admin/simpanubahpemberian_air'); ?>
    <table id="tbl" border="0" class="display">
        <tr>
          <td>Tanggal</td>
          <td>&nbsp;</td>
          <td><input name="tanggal_input" value='<?php echo $tanggal_input; ?>' type="text" size="30"/><font color="red">(Format : yyyy-mm-dd)</font></td>
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
            <td>Nama Saluran</td>
            <td>&nbsp;</td>
            <td><input name="nama_saluran" value='<?php echo $nama_saluran; ?>' type="text" size="30"/></td>
        </tr>
        <tr>
          <td>Saluran Sekunder</td>
          <td>&nbsp;</td>
          <td><select name="id_saluran_sekunder">
            <?php
                    $saluran_sekunder = $this->msaluran_sekunder->getsaluran_sekunder();
                    foreach ($saluran_sekunder->result() as $bag):
                        if ($id_saluran_sekunder== $bag->id) {
                            $select = "selected='selected'";
                        } else {
                            $select = "";
                        }
                        ?>
            <option value="<?php echo $bag->id; ?>"<?php echo $select; ?>> <?php echo $bag->saluran_sekunder ?></option>
            <?php endforeach; ?>
          </select></td>
        </tr>
        <tr>
          <td>Nama Bangunan Btb</td>
          <td>&nbsp;</td>
          <td><input name="nama_bangunan_btb" value='<?php echo $nama_bangunan_btb; ?>' type="text" size="30"/></td>
        </tr>
        <tr>
          <td>Target Areal Tanam</td>
          <td>&nbsp;</td>
          <td><input name="target_areal_tanam" value='<?php echo $target_areal_tanam; ?>' type="text" size="30"/></td>
        </tr>

        <tr>
          <td>Golongan Tanam</td>
          <td>&nbsp;</td>
          <td><input name="golongan_tanam" value='<?php echo $golongan_tanam; ?>' type="text" size="30"/></td>
        </tr>
        <tr>
          <td>Rencana Pemberian Air</td>
          <td>&nbsp;</td>
          <td><input name="rencana_pemberian_air" value='<?php echo $rencana_pemberian_air; ?>' type="text" size="30"/></td>
        </tr>
        <tr>
            <td>Pemberian Air</td>
            <td>&nbsp;</td>
            <td><input name="pemberian_air" value='<?php echo $pemberian_air; ?>' type="text" size="30"/></td>
        </tr>
        <tr>
            <td>Ketarangan</td>
            <td>&nbsp;</td>
            <td><input name="keterangan" value='<?php echo $keterangan; ?>' type="text" size="30"/></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
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