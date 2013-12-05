<!--#content -->
<title>
    <?php echo $title; ?>
</title>
<?php
foreach ($invent_area->result() as $peng) {
	$tanggal = $peng->tanggal;
    $daerah_irigasi = $peng->daerah_irigasi;
    $id_saluran_sekunder = $peng->id_saluran_sekunder;
    $blok = $peng->blok;
    $tahun_lalu = $peng->tahun_lalu;
    $tahun_ini = $peng->tahun_ini;
    $selisih = $peng->selisih;
    $id_pengamat = $peng ->id_pengamat;
    $id_seksi = $peng -> id_seksi;
    $kecamatan = $peng -> kecamatan;
    $kabupaten = $peng -> kabupaten;
    $keterangan = $peng -> keterangan;
    $id = $peng->id;
}
?>
<div id="content">
          <div class="box">
    <h2>Ubah Data Inventaris Area Lahan</h2>
    <p>&nbsp;</p>
    <?php echo form_open('stb/simpanubahinvent_area'); ?>
    <table id="tbl" border="0" class="display">
        <tr>
          <td>Tanggal</td>
          <td>&nbsp;</td>
          <td><input name="tanggal" value='<?php echo $tanggal; ?>' type="text" size="30"/><font color="red">(Format : yyyy-mm-dd)</font></td>
        </tr>
        <tr>
            <td>Daerah Irigasi</td>
            <td>&nbsp;</td>
            <td><select name="daerah_irigasi">
                    <?php if ($daerah_irigasi == "DI. Jatiluhur") { ?>
                        <option value="DI. Jatiluhur" selected="selected">DI. Jatiluhur</option>
                        <option value="DI. Selatan Jatiluhur" >DI. Selatan Jatiluhur</option>
                    <?php } else { ?>
                        <option value="DI. Jatiluhur" >DI. Jatiluhur</option>
                        <option value="DI. Selatan Jatiluhur" selected="selected">DI. Selatan Jatiluhur</option>
                    <?php } ?>
                </select>
            
          </td>
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
          <td>Blok</td>
          <td>&nbsp;</td>
          <td><input name="blok" value='<?php echo $blok; ?>' type="text" size="30"/></td>
        </tr>
        <tr>
          <td>Tahun Lalu</td>
          <td>&nbsp;</td>
          <td><input name="tahun_lalu" value='<?php echo $tahun_lalu; ?>' type="text" size="30"/></td>
        </tr>
        <tr>
          <td>Tahun Ini</td>
          <td>&nbsp;</td>
          <td><input name="tahun_ini" value='<?php echo $tahun_ini; ?>' type="text" size="30"/></td>
        </tr>

        <tr>
          <td>Pengamat</td>
          <td>&nbsp;</td>
          <td><select name="id_pengamat">
            <?php
                    $pengamat = $this->mpengamat->getpengamat();
                    foreach ($pengamat->result() as $bag):
                        if ($id_pengamat== $bag->id) {
                            $select = "selected='selected'";
                        } else {
                            $select = "";
                        }
                        ?>
            <option value="<?php echo $bag->id; ?>"<?php echo $select; ?>> <?php echo $bag->pengamat ?></option>
            <?php endforeach; ?>
          </select></td>
        </tr>
        <tr>
          <td>Seksi</td>
          <td>&nbsp;</td>
          <td><select name="id_seksi" id="id_seksi">
            <?php if ($this->session->userdata('jenis')!='stb') {?>
            <option value="Semua">SEMUA</option>
            <?php } ?>
            <?php
    $seksi = $this->mseksi->stbgetseksi();
    foreach ($seksi->result() as $bag):
        ?>
            <option value="<?php echo $bag->id; ?>"><?php echo $bag->seksi ?></option>
            <?php endforeach; ?>
          </select></td>
        </tr>
        <tr>
            <td>Kecamatan</td>
            <td>&nbsp;</td>
            <td><input name="kecamatan" value='<?php echo $kecamatan; ?>' type="text" size="30"/></td>
        </tr>
        <tr>
            <td>Kabupaten</td>
            <td>&nbsp;</td>
            <td><input name="kabupaten" value='<?php echo $kabupaten; ?>' type="text" size="30"/></td>
        </tr>
        <tr>
            <td>Keterangan</td>
            <td>&nbsp;</td>
            <td><input name="keterangan" value='<?php echo $keterangan; ?>' type="text" size="30"/></td>
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