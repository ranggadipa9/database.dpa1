<!--#content -->
<title>
    <?php echo $title; ?>
</title>
<?php
foreach ($pengguna_lahan->result() as $peng) {
    $nama = $peng->nama;
  //  $alamat = $peng->alamat;
    $berlaku_mulai = $peng -> berlaku_mulai;
    $berlaku_akhir= $peng -> berlaku_akhir;
    $id_seksi = $peng -> id_seksi;
    $lokasi = $peng -> lokasi;
    $no_sipls = $peng -> no_sipls;
	
	$penggunaan_1 = $peng -> penggunaan_1;
	$luas_1 = $peng -> luas_1;
	$tarif_1 = $peng -> tarif_1;
	$penggunaan_2 = $peng -> penggunaan_2;
	$luas_2 = $peng -> luas_2;
	$tarif_2 = $peng -> tarif_2;
	$penggunaan_3 = $peng -> penggunaan_3;
	$luas_3 = $peng -> luas_3;
	$tarif_3 = $peng -> tarif_3;
	$penggunaan_4 = $peng -> penggunaan_4;
	$luas_4 = $peng -> luas_4;
	$tarif_4 = $peng -> tarif_4;
	$penggunaan_5 = $peng -> penggunaan_5;
	$luas_5 = $peng -> luas_5;
	$tarif_5 = $peng -> tarif_5;
	$administrasi = $peng -> administrasi;
	
    $id = $peng->id;
}
?>
	<div id="content">
          <div class="box">
     
    <h2 align="center">Ubah Daftar Pemegang Sewa Lahan</h2>
    <p>&nbsp;</p>
    <?php echo form_open('admin/simpanubahpengguna_lahan'); ?>
    <table id="tbl" border="0" class="display">
        <tr>
          <td>No. Sippls</td>
          <td>&nbsp;</td>
          <td><input name="no_sipls" value='<?php echo $no_sipls; ?>' type="text" size="30"/></td>
        </tr>
        <tr>
          <td>Nama</td>
          <td>&nbsp;</td>
          <td><input name="nama" value='<?php echo $nama; ?>' type="text" size="30"/></td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>&nbsp;</td>
            <td><textarea name="alamat" cols="27" rows="7"></textarea></td>
        </tr>
        <tr>
            <td>Berlaku Mulai</td>
            <td>&nbsp;</td>
            <td><input name="berlaku_mulai" value='<?php echo $berlaku_mulai; ?>' type="text" size="30"/>
            <font color="red">(Format : yyyy-mm-dd)</font></td>
        </tr>
        <tr>
          <td>Berlaku Akhir</td>
          <td>&nbsp;</td>
          <td><input name="berlaku_akhir" value='<?php echo $berlaku_akhir; ?>' type="text" size="30"/>
          <font color="red">(Format : yyyy-mm-dd)</font></td>
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
          <td>Lokasi</td>
          <td>&nbsp;</td>
          <td><input name="lokasi" value='<?php echo $lokasi; ?>' type="text" size="30"/></td>
        </tr>
        <tr>
          <td>Penggunaan 1</td>
          <td>&nbsp;</td>
          <td><input name="penggunaan_1" value='<?php echo $penggunaan_1; ?>' type="text" size="30"/></td>
        </tr>
        <tr>
          <td>Luas 1</td>
          <td>&nbsp;</td>
          <td><input name="luas_1" value='<?php echo $luas_1; ?>' type="text" size="30"/></td>
        </tr>
        <tr>
          <td>Tarif 1</td>
          <td>&nbsp;</td>
          <td><input name="tarif_1" value='<?php echo $tarif_1; ?>' type="text" size="30"/></td>
        </tr>
        <tr>
          <td>Penggunaan 2</td>
          <td>&nbsp;</td>
          <td><input name="penggunaan_2" value='<?php echo $penggunaan_2; ?>' type="text" size="30"/></td>
        </tr>
        <tr>
          <td>Luas 2</td>
          <td>&nbsp;</td>
          <td><input name="luas_2" value='<?php echo $luas_2; ?>' type="text" size="30"/></td>
        </tr>
        <tr>
          <td>Tarif 2</td>
          <td>&nbsp;</td>
          <td><input name="tarif_2" value='<?php echo $tarif_2; ?>' type="text" size="30"/></td>
        </tr>
        <tr>
          <td>Penggunaan 3</td>
          <td>&nbsp;</td>
          <td><input name="penggunaan_3" value='<?php echo $penggunaan_3; ?>' type="text" size="30"/></td>
        </tr>
        <tr>
          <td>Luas 3</td>
          <td>&nbsp;</td>
          <td><input name="luas_3" value='<?php echo $luas_3; ?>' type="text" size="30"/></td>
        </tr>
        <tr>
          <td>Tarif 3</td>
          <td>&nbsp;</td>
          <td><input name="tarif_3" value='<?php echo $tarif_3; ?>' type="text" size="30"/></td>
        </tr>
        <tr>
          <td>Penggunaan 4</td>
          <td>&nbsp;</td>
          <td><input name="penggunaan_4" value='<?php echo $penggunaan_4; ?>' type="text" size="30"/></td>
        </tr>
        <tr>
          <td>Luas 4</td>
          <td>&nbsp;</td>
          <td><input name="luas_4" value='<?php echo $luas_4; ?>' type="text" size="30"/></td>
        </tr>
        <tr>
          <td>Tarif 4</td>
          <td>&nbsp;</td>
          <td><input name="tarif_4" value='<?php echo $tarif_4; ?>' type="text" size="30"/></td>
        </tr>
        <tr>
          <td>Penggunaan 5</td>
          <td>&nbsp;</td>
          <td><input name="penggunaan_5" value='<?php echo $penggunaan_5; ?>' type="text" size="30"/></td>
        </tr>
        <tr>
          <td>Luas 5</td>
          <td>&nbsp;</td>
          <td><input name="luas_5" value='<?php echo $luas_5; ?>' type="text" size="30"/></td>
        </tr>
        <tr>
          <td>Tarif 5</td>
          <td>&nbsp;</td>
          <td><input name="tarif_5" value='<?php echo $tarif_5; ?>' type="text" size="30"/></td>
        </tr>
        <tr>
          <td>Administrasi</td>
          <td>&nbsp;</td>
          <td><input name="administrasi" value='<?php echo $administrasi; ?>' type="text" size="30"/></td>
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