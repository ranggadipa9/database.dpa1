
<!--#content -->
<title>
    <?php echo $title; ?>
</title>


	<div id="content">
          <div class="box">
          
          
          <h2>Tambah Data Pemakaian Air Oleh Perusahan</h2>
    <p>&nbsp;</p>
    <?php echo form_open('cipamingkis/simpanpemakaian_air'); ?>
    <table id="tbl" border="0" class="display">
        <tr>
          <td>Tanggal</td>
          <td>&nbsp;</td>
          <td><input name="tanggal_input" type="text" size="30"/><font color="red">(Format : yyyy-mm-dd)</font></td>
        </tr>
        <tr>
            <td>Balai</td>
            <td>&nbsp;</td>
            <td><select name="id_balai">
              <?php
                    $balai = $this->mbalai->getbalai();
                    foreach ($balai->result() as $bag):
                        ?>
              <option value="<?php echo $bag->id; ?>"><?php echo $bag->balai ?></option>
              <?php endforeach; ?>
            </select></td>
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
          <td>Pelanggan</td>
          <td>&nbsp;</td>
          <td><select name="id_pelanggan">
            <?php
                    $pelanggan = $this->mpelanggan->getpelanggan();
                    foreach ($pelanggan->result() as $pelanggan):
                        ?>
            <option value="<?php echo $pelanggan->id; ?>"><?php echo $pelanggan->pelanggan ?></option>
            <?php endforeach; ?>
          </select></td>
        </tr>
        <tr>
            <td>Lokasi Pengambilan</td>
            <td>&nbsp;</td>
            <td><input name="lokasi_pengambilan" type="text" size="30"/></td>
        </tr>
        <tr>
            <td>No. SPPA</td>
            <td>&nbsp;</td>
            <td><input name="no_sppa" type="text" size="30"/></td>
        </tr>
        <tr>
          <td>Kontrak Masksimum</td>
          <td>&nbsp;</td>
          <td><input name="debet_maks" type="text" size="30"/></td>
        </tr>
        <tr>
          <td>Kontrak Minimum</td>
          <td>&nbsp;</td>
          <td><input name="debet_min" type="text" size="30"/></td>
        </tr>
        <tr>
          <td>Realisasi</td>
          <td>&nbsp;</td>
          <td><input name="realisasi" type="text" size="30"/></td>
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