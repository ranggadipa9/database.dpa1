<!--#content -->
<title>
    <?php echo $title; ?>
</title>
<?php
foreach ($pengguna->result() as $peng) {
    $nama = $peng->pengguna;
    $katakunci = $peng->kata_kunci;
    $hak_akses_id = $peng->id_hak_akses;
    $id_seksi = $peng->id_seksi;
    $id_pegawai = $peng->id_pegawai;
    $id = $peng->id;
}
?>
	<div id="content">
          <div class="box">
     
    <h2>Ubah Pengguna</h2>
    <p>&nbsp;</p>
    <?php echo form_open('admin/simpanubahpengguna'); ?>
    <table id="tbl" border="0" class="display">
        <tr>
            <td>Pengguna</td>
            <td>&nbsp;</td>
            <td><input name="pengguna" type="text" size="30" value='<?php echo $nama; ?>'/></td>
        </tr>
        <tr>
            <td>Kata Kunci</td>
            <td>&nbsp;</td>
            <td><input name="katakunci" type="text" size="30" value='<?php echo $katakunci; ?>'/></td>
        </tr>
        <tr>
            <td>Jenis</td>
            <td>&nbsp;</td>
            <td><select name="jenis">
                    <?php
                    $hak = $this->mhakakses->gethakakses();
                    foreach ($hak->result() as $hakakses):
                        if ($hak_akses_id == $hakakses->id) {
                            $select = "selected='selected'";
                        } else {
                            $select = "";
                        }
                        ?>
                        <option value="<?php echo $hakakses->id; ?>"<?php echo $select; ?>>
                            <?php echo $hakakses->jenis ?></option>
                    <?php endforeach; ?>
                </select></td>
        </tr>
        <tr>
            <td>Seksi</td>
            <td>&nbsp;</td>
            <td><select name="seksi">
                    <?php
                    $seksi = $this->mseksi->getseksi();
                    foreach ($seksi->result() as $bag):
                        if ($id_seksi == $bag->id) {
                            $select = "selected='selected'";
                        } else {
                            $select = "";
                        }
                        ?>
                        <option value="<?php echo $bag->id; ?>"<?php echo $select; ?>>
                            <?php echo $bag->seksi ?></option>
                    <?php endforeach; ?>
                </select></td>
        </tr>
        <tr>
            <td>Pegawai</td>
            <td>&nbsp;</td>
            <td><select name="pegawai">
                    <?php
                    $pegawai = $this->mpegawai->lookuppegawai();
                    foreach ($pegawai->result() as $peg):
                        if ($id_pegawai == $peg->id) {
                            $select = "selected='selected'";
                        } else {
                            $select = "";
                        }
                        ?>
                        <option value="<?php echo $peg->id; ?>"<?php echo $select; ?>>
                            <?php echo $peg->nama ?></option>
                    <?php endforeach; ?>
                </select></td>
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