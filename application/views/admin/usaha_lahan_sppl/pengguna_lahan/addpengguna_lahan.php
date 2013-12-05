
<!--#content -->
<title>
    <?php echo $title; ?>
</title>
	<div id="content">
          <div class="box">
     
    <h2 align="center">Tambah Daftar Pemegana Sewa Lahan</h2>
    <p align="center">&nbsp;</p>
    <?php echo form_open('admin/simpanpengguna_lahan'); ?>
    <table id="tbl" border="0" class="display">
        <tr>
          <td>No Sippls</td>
          <td>&nbsp;</td>
          <td><input name="no_sipls" type="text" size="30"/></td>
        </tr>
        <tr>
          <td>Nama</td>
          <td>&nbsp;</td>
          <td><input name="nama" type="text" size="30"/></td>
        </tr>
        <tr>
          <td>Alamat</td>
          <td>&nbsp;</td>
          <td><textarea name="alamat" cols="28" rows="7"></textarea></td>
        </tr>
        <tr>
            <td>Berlaku Mulai</td>
            <td>&nbsp;</td>
            <td><input name="berlaku_mulai" type="text" size="30"/>
            <font color="red">(Format : yyyy-mm-dd)</font></td>
        </tr>
        <tr>
          <td>Berlaku Akhir</td>
          <td>&nbsp;</td>
          <td><input name="berlaku_akhir" type="text" size="30"/>
          <font color="red">(Format : yyyy-mm-dd)</font></td>
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
          <td>Lokasi</td>
          <td>&nbsp;</td>
          <td><input name="lokasi" type="text" size="30"/></td>
        </tr>
        <tr>
          <td>Penggunaan 1</td>
          <td>&nbsp;</td>
          <td><input name="penggunaan_1" type="text" size="30"/></td>
        </tr>
        <tr>
          <td>Luas 1</td>
          <td>&nbsp;</td>
          <td><input name="luas_1" type="text" size="30"/></td>
        </tr>
        <tr>
          <td>Tarif 1</td>
          <td>&nbsp;</td>
          <td><input name="tarif_1" type="text" size="30"/></td>
        </tr>
        <tr>
          <td>Penggunaan 2</td>
          <td>&nbsp;</td>
          <td><input name="penggunaan_2" type="text" size="30"/></td>
        </tr>
        <tr>
          <td>Luas 2</td>
          <td>&nbsp;</td>
          <td><input name="luas_2" type="text" size="30"/></td>
        </tr>
        <tr>
          <td>Tarif 2</td>
          <td>&nbsp;</td>
          <td><input name="tarif_2" type="text" size="30"/></td>
        </tr>
        <tr>
          <td>Penggunaan 3</td>
          <td>&nbsp;</td>
          <td><input name="penggunaan_3" type="text" size="30"/></td>
        </tr>
        <tr>
          <td>Luas 3</td>
          <td>&nbsp;</td>
          <td><input name="luas_3" type="text" size="30"/></td>
        </tr>
        <tr>
          <td>Tarif 3</td>
          <td>&nbsp;</td>
          <td><input name="tarif_3" type="text" size="30"/></td>
        </tr>
        <tr>
          <td>Penggunaan 4</td>
          <td>&nbsp;</td>
          <td><input name="penggunaan_4" type="text" size="30"/></td>
        </tr>
        <tr>
          <td>Luas 4</td>
          <td>&nbsp;</td>
          <td><input name="luas_4" type="text" size="30"/></td>
        </tr>
        <tr>
          <td>Tarif 4</td>
          <td>&nbsp;</td>
          <td><input name="tarif_4" type="text" size="30"/></td>
        </tr>
        <tr>
          <td>Penggunaan 5</td>
          <td>&nbsp;</td>
          <td><input name="penggunaan_5" type="text" size="30"/></td>
        </tr>
        <tr>
          <td>Luas 5</td>
          <td>&nbsp;</td>
          <td><input name="luas_5" type="text" size="30"/></td>
        </tr>
        <tr>
          <td>Tarif 5</td>
          <td>&nbsp;</td>
          <td><input name="tarif_5" type="text" size="30"/></td>
        </tr>
        <tr>
          <td>Administrasi</td>
          <td>&nbsp;</td>
          <td><input name="administrasi" type="text" size="30"/></td>
        </tr>
        <tr>
          <td></td>
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