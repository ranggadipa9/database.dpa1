
<!--#content -->
<title>
    <?php echo $title; ?>
</title>
<div id="content">
          <div class="box"><h2>Tambah Data Tanam Gadu</h2>
    <p>&nbsp;</p>
    <?php echo form_open('pab/simpantanam_gadu'); ?>
    <table id="tbl" border="0" class="display">
        <tr>
          <td>Tanggal</td>
          <td>&nbsp;</td>
          <td><input name="tanggal_input" type="text" size="30"/><font color="red">(Format : yyyy-mm-dd)</font></td>
        </tr>
        <tr>
            <td>Daerah Irigasi</td>
            <td>&nbsp;</td>
            <td><select name="daerah_irigasi">
                    <option value="DI. Jatiluhur" selected="selected">DI. Jatiluhur</option>
                    <option value="DI. Selatan Jatiluhur" >DI. Selatan Jatiluhur</option>
                </select></td>
        </tr>
        <tr>
            <td>Seksi</td>
            <td>&nbsp;</td>
            <td><select name="id_seksi" id="id_seksi">
              <?php if ($this->session->userdata('jenis')!='pab') {?>
              <option value="Semua">SEMUA</option>
              <?php } ?>
              <?php
    $seksi = $this->mseksi->pabgetseksi();
    foreach ($seksi->result() as $bag):
        ?>
              <option value="<?php echo $bag->id; ?>"><?php echo $bag->seksi ?></option>
              <?php endforeach; ?>
            </select></td>
        </tr>
        <tr>
          <td>Saluran Tanam</td>
          <td>&nbsp;</td>
          <td><select name="id_saluran_tanam">
            <?php
                    $saluran_tanam= $this->msaluran_tanam->getsaluran_tanam();
                    foreach ($saluran_tanam->result() as $saluran_tanam):
                        ?>
            <option value="<?php echo $saluran_tanam->id; ?>"><?php echo $saluran_tanam->saluran_tanam?></option>
            <?php endforeach; ?>
          </select></td>
        </tr>
        <tr>
            <td>Kabupaten</td>
            <td>&nbsp;</td>
            <td><input name="kabupaten" type="text" size="30"/></td>
        </tr>
        <tr>
            <td>Kecamatan</td>
            <td>&nbsp;</td>
            <td><input name="kecamatan" type="text" size="30"/></td>
        </tr>
        <tr>
          <td>Nama Areal</td>
          <td>&nbsp;</td>
          <td><input name="nama_areal" type="text" size="30"/></td>
        </tr>
        <tr>
          <td>Golongan Tanam</td>
          <td>&nbsp;</td>
          <td><select name="id_golongan_tanam">
            <?php
                    $golongan_tanam = $this->mgolongan_tanam->getgolongan_tanam();
                    foreach ($golongan_tanam->result() as $golongan_tanam):
                        ?>
            <option value="<?php echo $golongan_tanam->id; ?>"><?php echo $golongan_tanam->golongan_tanam ?></option>
            <?php endforeach; ?>
          </select></td>
        </tr>
        <tr>
          <td>Target Luas</td>
          <td>&nbsp;</td>
          <td><input name="target_luas" type="text" size="30"/></td>
        </tr>
        <tr>
          <td>Target Bibit</td>
          <td>&nbsp;</td>
          <td><input name="target_bibit" type="text" size="30"/></td>
        </tr>
        <tr>
          <td>Target Garap</td>
          <td>&nbsp;</td>
          <td><input name="target_garap" type="text" size="30"/></td>
        </tr>
        <tr>
          <td>Target Tanam</td>
          <td>&nbsp;</td>
          <td><input name="target_tanam" type="text" size="30"/></td>
        </tr>
        <tr>
          <td>Target Panen</td>
          <td>&nbsp;</td>
          <td><input name="target_panen" type="text" size="30"/></td>
        </tr>
        <tr>
          <td>Target Palawija</td>
          <td>&nbsp;</td>
          <td><input name="target_palawija" type="text" size="30"/></td>
        </tr>
        <tr>
          <td>Target Bera</td>
          <td>&nbsp;</td>
          <td><input name="target_bera" type="text" size="30"/></td>
        </tr>
        <tr>
          <td>Target Puso</td>
          <td>&nbsp;</td>
          <td><input name="target_puso" type="text" size="30"/></td>
        </tr>
        <tr>
          <td>Luar Target Bibit</td>
          <td>&nbsp;</td>
          <td><input name="luar_target_bibit" type="text" size="30"/></td>
        </tr>
        <tr>
          <td>Luar Target Garap</td>
          <td>&nbsp;</td>
          <td><input name="luar_target_garap" type="text" size="30"/></td>
        </tr>
        <tr>
          <td>Luar Target Tanam</td>
          <td>&nbsp;</td>
          <td><input name="luar_target_tanam" type="text" size="30"/></td>
        </tr>
        <tr>
          <td>Luar Target Panen</td>
          <td>&nbsp;</td>
          <td><input name="luar_target_panen" type="text" size="30"/></td>
        </tr>
        <tr>
          <td>Luar Target Palawija</td>
          <td>&nbsp;</td>
          <td><input name="luar_target_palawija" type="text" size="30"/></td>
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