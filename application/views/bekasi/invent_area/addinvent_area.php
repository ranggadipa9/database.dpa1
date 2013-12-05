
<!--#content -->
<title>
    <?php echo $title; ?>
</title>
<div id="content">
          <div class="box">
        <h2>Tambah Data Inventaris Area Tanam</h2>
    <p>&nbsp;</p>
    <?php echo form_open('bekasi/simpaninvent_area'); ?>
    <table id="tbl" border="0" class="display">
        <tr>
          <td>Tanggal</td>
          <td>&nbsp;</td>
          <td><input name="tanggal" type="text" size="30"/><font color="red">(Format : yyyy-mm-dd)</font></td>
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
          <td>Blok</td>
          <td>&nbsp;</td>
          <td><input name="blok" type="text" size="30"/></td>
        </tr>
        <tr>
            <td>Tahun Lalu</td>
            <td>&nbsp;</td>
            <td><input name="tahun_lalu" type="text" size="30"/></td>
        </tr>
        <tr>
            <td>Tahun Ini</td>
            <td>&nbsp;</td>
            <td><input name="tahun_ini" type="text" size="30"/></td>
        </tr>
        <tr>
          <td>Pengamat</td>
          <td>&nbsp;</td>
          <td><select name="id_pengamat">
            <?php
                    $pengamat = $this->mpengamat->getpengamat();
                    foreach ($pengamat->result() as $pengamat):
                        ?>
            <option value="<?php echo $pengamat->id; ?>"><?php echo $pengamat->pengamat ?></option>
            <?php endforeach; ?>
          </select></td>
        </tr>
        <tr>
          <td>Seksi</td>
          <td>&nbsp;</td>
          <td><select name="id_seksi" id="id_seksi">
            <?php if ($this->session->userdata('jenis')!='bekasi') {?>
            <option value="Semua">SEMUA</option>
            <?php } ?>
            <?php
    $seksi = $this->mseksi->bekasigetseksi();
    foreach ($seksi->result() as $bag):
        ?>
            <option value="<?php echo $bag->id; ?>"><?php echo $bag->seksi ?></option>
            <?php endforeach; ?>
          </select></td>
        </tr>
        <tr>
          <td>Kecamatan</td>
          <td>&nbsp;</td>
          <td><input name="kecamatan" type="text" size="30"/></td>
        </tr>
        <tr>
          <td>Kabupaten</td>
          <td>&nbsp;</td>
          <td><input name="kabupaten" type="text" size="30"/></td>
        </tr>
        <tr>
          <td>Keterangan</td>
          <td>&nbsp;</td>
          <td><input name="keterangan" type="text" size="30"/></td>
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