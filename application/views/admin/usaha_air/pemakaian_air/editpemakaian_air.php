<!--#content -->
<title>
    <?php echo $title; ?>
</title>
<?php
foreach ($pemakaian_air->result() as $peng) {
    $tanggal_input = $peng->tanggal_input;
	$pelanggan = $peng->pelanggan;
	$alamat = $peng->alamat;
	$lokasi_pengambilan = $peng->lokasi_pengambilan;
    $id_balai = $peng->id_balai;
    $id_seksi = $peng->id_seksi;
    $berlaku_mulai = $peng->berlaku_mulai;
	$sppa_mulai = $peng -> sppa_mulai;
    $berlaku_akhir = $peng -> berlaku_akhir;
	$sppa_akhir = $peng -> sppa_akhir;
    $debet_maks = $peng->debet_maks;
    $debet_min = $peng ->debet_min;
    $id = $peng->id;
}
?>
	<div id="content">
          <div class="box">
     
    <h2>Ubah Data Pemakaian Air Oleh Perusahan</h2>
    <p>&nbsp;</p>
    <?php echo form_open('admin/simpanubahpemakaian_air'); ?>
    <table id="tbl" border="0" class="display">
        <tr>
          <td>Tanggal</td>
          <td>&nbsp;</td>
          <td><input name="tanggal_input" value='<?php echo $tanggal_input; ?>' type="text" size="30"/><font color="red">(Format : yyyy-mm-dd)</font></td>
        </tr>
        <tr>
            <td>Pelanggan</td>
            <td>&nbsp;</td>
            <td><input name="pelanggan" value='<?php echo $pelanggan; ?>' type="text" size="30"/></td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>&nbsp;</td>
            <td><textarea name="alamat" cols="28" rows="7"></textarea></td>
        </tr>
        <tr>
          <td>Lokasi Pengambilan</td>
          <td>&nbsp;</td>
          <td><input name="lokasi_pengambilan" value='<?php echo $lokasi_pengambilan; ?>' type="text" size="30"/></td>
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
          </select></td>
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
          <td>Berlaku Mulai</td>
          <td>&nbsp;</td>
          <td><input name="berlaku_mulai" value='<?php echo $berlaku_mulai; ?>' type="text" size="30"/></td>
        </tr>

        <tr>
          <td>SPPA Mulai</td>
          <td>&nbsp;</td>
          <td><input name="sppa_mulai" value='<?php echo $sppa_mulai; ?>' type="text" size="30"/></td>
        </tr>
        <tr>
          <td>Berlaku Akhir</td>
          <td>&nbsp;</td>
          <td><input name="berlaku_akhir" value='<?php echo $berlaku_akhir; ?>' type="text" size="30"/></td>
        </tr>
        <tr>
          <td>SPPA Akhir </td>
          <td>&nbsp;</td>
          <td><input name="sppa_akhir" value='<?php echo $sppa_akhir; ?>' type="text" size="30"/></td>
        </tr>
        <tr>
            <td>Debit Maks</td>
            <td>&nbsp;</td>
            <td><input name="debet_maks" value='<?php echo $debet_maks; ?>' type="text" size="30"/></td>
        </tr>
        <tr>
            <td>Debit Min</td>
            <td>&nbsp;</td>
            <td><input name="debet_min" value='<?php echo $debet_min; ?>' type="text" size="30"/></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
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