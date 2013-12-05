<!--#content -->
<title>
    <?php echo $title; ?>

	<div id="content">
          <div class="box">
          <?php
foreach ($pemakaian_air->result() as $peng) {
    $tanggal_input = $peng->tanggal_input;
    $id_balai = $peng->id_balai;
    $id_seksi = $peng->id_seksi;
    $id_pelanggan = $peng->id_pelanggan;
    $lokasi_pengambilan = $peng->lokasi_pengambilan;
    $no_sppa = $peng->no_sppa;
    $debet_maks = $peng->debet_maks;
    $debet_min = $peng ->debet_min;
    $realisasi = $peng -> realisasi;
    $keterangan = $peng -> keterangan;
    $id = $peng->id;
}
?>
<div id="right">
    <h2>Ubah Data Pemakaian Air Oleh Perusahan</h2>
    <p>&nbsp;</p>
    <?php echo form_open('cipamingkis/simpanubahpemakaian_air'); ?>
    <table id="tbl" border="0" class="display">
        <tr>
          <td>Tanggal</td>
          <td>&nbsp;</td>
          <td><input name="tanggal_input" value='<?php echo $tanggal_input; ?>' type="text" size="30"/><font color="red">(Format : yyyy-mm-dd)</font></td>
        </tr>
        <tr>
            <td>Balai</td>
            <td>&nbsp;</td>
            <td><select name="id_balai">
              <?php
                    $balai = $this->mbalai->getbalai();
                    foreach ($balai->result() as $bag):
                        if ($id_balai== $bag->id) {
                            $select = "selected='selected'";
                        } else {
                            $select = "";
                        }
                        ?>
              <option value="<?php echo $bag->id; ?>"<?php echo $select; ?>> <?php echo $bag->balai ?></option>
                  <?php endforeach; ?>
                </select>
                
            </td>
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
                    foreach ($pelanggan->result() as $bag):
                        if ($id_pelanggan == $bag->id) {
                            $select = "selected='selected'";
                        } else {
                            $select = "";
                        }
                        ?>
            <option value="<?php echo $bag->id; ?>"<?php echo $select; ?>> <?php echo $bag->pelanggan ?></option>
            <?php endforeach; ?>
          </select></td>
        </tr>
        <tr>
          <td>Lokasi Pengambilan</td>
          <td>&nbsp;</td>
          <td><input name="lokasi_pengambilan" value='<?php echo $lokasi_pengambilan; ?>' type="text" size="30"/></td>
        </tr>
        <tr>
          <td>No. SPPA</td>
          <td>&nbsp;</td>
          <td><input name="no_sppa" value='<?php echo $no_sppa; ?>' type="text" size="30"/></td>
        </tr>

        <tr>
          <td>Kontrak Maksimum</td>
          <td>&nbsp;</td>
          <td><input name="debet_maks" value='<?php echo $debet_maks; ?>' type="text" size="30"/></td>
        </tr>
        <tr>
          <td>Kontrak Minimum</td>
          <td>&nbsp;</td>
          <td><input name="debet_min" value='<?php echo $debet_min; ?>' type="text" size="30"/></td>
        </tr>
        <tr>
            <td>Realisasi</td>
            <td>&nbsp;</td>
            <td><input name="realisasi" value='<?php echo $realisasi; ?>' type="text" size="30"/></td>
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