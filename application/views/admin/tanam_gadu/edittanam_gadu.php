<!--#content -->
<title>
    <?php echo $title; ?>
</title>
<?php
foreach ($tanam_gadu->result() as $peng) {
    
$tanggal_input= $peng->tanggal_input;
$daerah_irigasi= $peng->daerah_irigasi;
$id_seksi= $peng->id_seksi;
$id_saluran_tanam = $peng->id_saluran_tanam;
$kabupaten = $peng->kabupaten;
$kecamatan= $peng->kecamatan;
$nama_areal= $peng->nama_areal;
$id_golongan_tanam= $peng->id_golongan_tanam;
$target_luas = $peng->target_luas;
$target_bibit = $peng->target_bibit;
$target_garap = $peng->target_garap;
$target_tanam = $peng->target_tanam;
$target_panen = $peng->target_panen;
//$target_jumlah = $peng->target_jumlah;
//$target_persen = $peng->target_persen;
$target_palawija = $peng->target_palawija;
$target_bera= $peng->target_bera;
$target_puso= $peng->target_puso;
$luar_target_bibit= $peng->luar_target_bibit;
$luar_target_garap= $peng->luar_target_garap;
$luar_target_tanam= $peng->luar_target_tanam;
$luar_target_panen= $peng->luar_target_panen;
//$luar_target_jumlah= $peng->luar_target_jumlah;
$luar_target_palawija= $peng->luar_target_palawija;
$keterangan = $peng->keterangan;

$id = $peng->id;
}
?>
	<div id="content">
          <div class="box">
     
    <h2>Ubah Data Tanam Gadu</h2>
    <p>&nbsp;</p>
    <?php echo form_open('admin/simpanubahtanam_gadu'); ?>
    <table id="tbl" border="0" class="display">
        <tr>
          <td>Tanggal</td>
          <td>&nbsp;</td>
          <td><input name="tanggal_input" value='<?php echo $tanggal_input; ?>' type="text" size="30"/><font color="red">(Format : yyyy-mm-dd)</font></td>
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
          <td>Saluran Tanam</td>
          <td>&nbsp;</td>
          <td><select name="id_saluran_tanam">
            <?php
                    $saluran_tanam= $this->msaluran_tanam->getsaluran_tanam();
                    foreach ($saluran_tanam->result() as $bag):
                        if ($id_saluran_tanam== $bag->id) {
                            $select = "selected='selected'";
                        } else {
                            $select = "";
                        }
                        ?>
            <option value="<?php echo $bag->id; ?>"<?php echo $select; ?>> <?php echo $bag->saluran_tanam?></option>
            <?php endforeach; ?>
          </select></td>
        </tr>
        <tr>
          <td>Kabupaten</td>
          <td>&nbsp;</td>
          <td><input name="kabupaten" value='<?php echo $kabupaten; ?>' type="text" size="30"/></td>
        </tr>
        <tr>
          <td>Kecamatan</td>
          <td>&nbsp;</td>
          <td><input name="kecamatan" value='<?php echo $kecamatan; ?>' type="text" size="30"/></td>
        </tr>

        <tr>
          <td>Nama Areal</td>
          <td>&nbsp;</td>
          <td><input name="nama_areal" value='<?php echo $nama_areal; ?>' type="text" size="30"/></td>
        </tr>
        <tr>
          <td>Golongan Tanam</td>
          <td>&nbsp;</td>
          <td><select name="id_golongan_tanam">
            <?php
                    $golongan_tanam= $this->mgolongan_tanam->getgolongan_tanam();
                    foreach ($golongan_tanam->result() as $bag):
                        if ($id_golongan_tanam== $bag->id) {
                            $select = "selected='selected'";
                        } else {
                            $select = "";
                        }
                        ?>
            <option value="<?php echo $bag->id; ?>"<?php echo $select; ?>> <?php echo $bag->golongan_tanam ?></option>
            <?php endforeach; ?>
          </select></td>
        </tr>
        <tr>
            <td>Target Luas</td>
            <td>&nbsp;</td>
            <td><input name="target_luas" value='<?php echo $target_luas; ?>' type="text" size="30"/></td>
        </tr>
        <tr>
            <td>Target Bibit</td>
            <td>&nbsp;</td>
            <td><input name="target_bibit" value='<?php echo $target_bibit; ?>' type="text" size="30"/></td>
        </tr>
        <tr>
          <td>Target Garap</td>
          <td>&nbsp;</td>
          <td><input name="target_garap" value='<?php echo $target_garap; ?>' type="text" size="30"/></td>
        </tr>
        <tr>
          <td>Target Tanam</td>
          <td>&nbsp;</td>
          <td><input name="target_tanam" value='<?php echo $target_tanam; ?>' type="text" size="30"/></td>
        </tr>
        <tr>
          <td>Target Panen</td>
          <td>&nbsp;</td>
          <td><input name="target_panen" value='<?php echo $target_panen; ?>' type="text" size="30"/></td>
        </tr>
        <tr>
          <td>Target Palawija</td>
          <td>&nbsp;</td>
          <td><input name="target_palawija" value='<?php echo $target_palawija; ?>' type="text" size="30"/></td>
        </tr>
        <tr>
          <td>Target Bera</td>
          <td>&nbsp;</td>
          <td><input name="target_bera" value='<?php echo $target_bera; ?>' type="text" size="30"/></td>
        </tr>
        <tr>
          <td>Target Puso</td>
          <td>&nbsp;</td>
          <td><input name="target_puso" value='<?php echo $target_puso; ?>' type="text" size="30"/></td>
        </tr>
        <tr>
          <td>Luar Target Bibit</td>
          <td>&nbsp;</td>
          <td><input name="luar_target_bibit" value='<?php echo $luar_target_bibit; ?>' type="text" size="30"/></td>
        </tr>
        <tr>
          <td>Luar Target Garap</td>
          <td>&nbsp;</td>
          <td><input name="luar_target_garap" value='<?php echo $luar_target_garap; ?>' type="text" size="30"/></td>
        </tr>
        <tr>
          <td>Luar Target Tanam</td>
          <td>&nbsp;</td>
          <td><input name="luar_target_tanam" value='<?php echo $luar_target_tanam; ?>' type="text" size="30"/></td>
        </tr>
        <tr>
          <td>Luar Target Panen</td>
          <td>&nbsp;</td>
          <td><input name="luar_target_panen" value='<?php echo $luar_target_panen; ?>' type="text" size="30"/></td>
        </tr>
        <tr>
          <td>Luar Target Palawija</td>
          <td>&nbsp;</td>
          <td><input name="luar_target_palawija" value='<?php echo $luar_target_palawija; ?>' type="text" size="30"/></td>
        </tr>
        <tr>
            <td>Keterangan</td>
            <td>&nbsp;</td>
            <td><input name="keterangan" value='<?php echo $keterangan; ?>' type="text" size="30"/></td>
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