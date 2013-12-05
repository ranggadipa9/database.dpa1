
<!--#content -->
<title>
    <?php echo $title; ?>
</title>
	<div id="content">
          <div class="box">
     
    <h2 align="center">TAMBAH DATA PELANGGAN AIR</h2>
    <p>&nbsp;</p>
    <?php echo form_open('admin/simpanpemakaian_air'); ?>
    <table id="tbl" border="0" class="display">
        <tr>
          <td>Tanggal Input</td>
          <td>&nbsp;</td>
          <td><input name="tanggal_input" type="text" size="30"/><font color="red">(Format : yyyy-mm-dd)</font></td>
        </tr>
        <tr>
            <td>Pelanggan</td>
            <td>&nbsp;</td>
            <td><input name="pelanggan" type="text" size="30"/></td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>&nbsp;</td>
            <td><textarea name="alamat" cols="28" rows="7"></textarea></td>
        </tr>
        <tr>
            <td>Lokasi Pengambilan</td>
            <td>&nbsp;</td>
            <td><input name="lokasi_pengambilan" type="text" size="30"/></td>
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
          <td><select name="id_seksi">
            <?php
                    $seksi = $this->mseksi->getseksi();
                    foreach ($seksi->result() as $bag):
                        ?>
            <option value="<?php echo $bag->id; ?>"><?php echo $bag->seksi ?></option>
            <?php endforeach; ?>
          </select></td>
        </tr>
        <tr>
            <td>Berlaku Mulai</td>
            <td>&nbsp;</td>
            <td><input name="berlaku_mulai" type="text" size="30"/></td>
        </tr>
        <tr>
          <td>SPPA Mulai</td>
          <td>&nbsp;</td>
          <td><input name="sppa_mulai" type="text" size="30"/></td>
        </tr>
        <tr>
          <td>Berlaku Akhir</td>
          <td>&nbsp;</td>
          <td><input name="berlaku_akhir" type="text" size="30"/></td>
        </tr>
        <tr>
          <td>SPPA Akhir</td>
          <td>&nbsp;</td>
          <td><input name="sppa_akhir" type="text" size="30"/></td>
        </tr>
        <tr>
          <td>Debit Maxs</td>
          <td>&nbsp;</td>
          <td><input name="debet_maks" type="text" size="30"/></td>
        </tr>
        <tr>
          <td>Debit Min</td>
          <td>&nbsp;</td>
          <td><input name="debet_min" type="text" size="30"/></td>
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
