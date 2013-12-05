
<!--#content -->
<title>
    <?php echo $title; ?>
</title>

	<div id="content">
          <div class="box">
              <h2>Tambah Data Pemberian Air</h2>
    <p>&nbsp;</p>
    <?php echo form_open('cipamingkis/simpanpemberian_air'); ?>
    <table id="tbl" border="0" class="display">
        <tr>
          <td>Tanggal</td>
          <td>&nbsp;</td>
          <td><input name="tanggal_input" type="text" size="30"/><font color="red">(Format : yyyy-mm-dd)</font></td>
        </tr>
        <tr>
            <td>Seksi</td>
            <td>&nbsp;</td>
            <td><select name="id_seksi" id="id_seksi">
              <?php if ($this->session->userdata('jenis')!='cipamingkis') {?>
              <option value="Semua">SEMUA</option>
              <?php } ?>
              <?php
    $seksi = $this->mseksi->cipamingkisgetseksi();
    foreach ($seksi->result() as $bag):
        ?>
              <option value="<?php echo $bag->id; ?>"><?php echo $bag->seksi ?></option>
              <?php endforeach; ?>
            </select></td>
        </tr>
        <tr>
            <td>Nama Saluran</td>
            <td>&nbsp;</td>
            <td><input name="nama_saluran" type="text" size="30"/></td>
        </tr>
        <tr>
          <td>Saluran Sekunder</td>
          <td>&nbsp;</td>
          <td><select name="id_saluran_sekunder">
            <?php
                    $saluran_sekunder = $this->msaluran_sekunder->getsaluran_sekunder();
                    foreach ($saluran_sekunder->result() as $saluran_sekunder):
                        ?>
            <option value="<?php echo $saluran_sekunder->id; ?>"><?php echo $saluran_sekunder->saluran_sekunder ?></option>
            <?php endforeach; ?>
          </select></td>
        </tr>
        <tr>
            <td>Nama Bangunan Btb</td>
            <td>&nbsp;</td>
            <td><input name="nama_bangunan_btb" type="text" size="30"/></td>
        </tr>
        <tr>
            <td>Target Areal Tanam</td>
            <td>&nbsp;</td>
            <td><input name="target_areal_tanam" type="text" size="30"/></td>
        </tr>
        <tr>
          <td>Golongan Tanam</td>
          <td>&nbsp;</td>
          <td><input name="golongan_tanam" type="text" size="30"/></td>
        </tr>
        <tr>
          <td>Rencana Pemberian Air</td>
          <td>&nbsp;</td>
          <td><input name="rencana_pemberian_air" type="text" size="30"/></td>
        </tr>
        <tr>
          <td>Pemberian Air</td>
          <td>&nbsp;</td>
          <td><input name="pemberian_air" type="text" size="30"/></td>
        </tr>
        <tr>
          <td>Keterangan</td>
          <td>&nbsp;</td>
          <td><input name="keterangan" type="text" size="30"/></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
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