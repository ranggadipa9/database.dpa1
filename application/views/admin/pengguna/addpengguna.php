
<!--#content -->
<title>
    <?php echo $title; ?>
</title>
	<div id="content">
          <div class="box">
     
    <h2>Tambah Pengguna</h2>
  <p>&nbsp;</p>
    <?php echo form_open('admin/simpanpengguna'); ?>
    <table id="tbl" border="0" class="display">
        <tr>
            <td>Pengguna</td>
            <td>&nbsp;</td>
            <td><input name="pengguna" type="text" size="30"/></td>
        </tr>
        <tr>
            <td>Kata Kunci</td>
            <td>&nbsp;</td>
            <td><input name="katakunci" type="password" size="30"/></td>
        </tr>
        <tr>
            <td>Jenis</td>
            <td>&nbsp;</td>
            <td><select name="jenis">
                    <?php
                    $hak = $this->mhakakses->gethakakses();
                    foreach ($hak->result() as $hakakses):
                        ?>
                        <option value="<?php echo $hakakses->id; ?>"><?php echo $hakakses->jenis ?></option>
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
                        ?>
                        <option value="<?php echo $bag->id; ?>"><?php echo $bag->seksi ?></option>
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
                        ?>
                        <option value="<?php echo $peg->id; ?>"><?php echo $peg->nama ?></option>
                    <?php endforeach; ?>
                </select></td>
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