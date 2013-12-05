<title>
    <?php echo $title; ?>
</title>
<?php
foreach ($pegawai->result() as $peg) {
    $id = $peg->id;
    $nip = $peg->nip;
    $nama = $peg->nama;
    $tempat_lahir = $peg->tempat_lahir;
    $tanggal_lahir = $peg->tanggal_lahir;
    $alamat = $peg->alamat;
 //   $jenis_kelamin = $peg->jenis_kelamin;
//	$agama = $peg->agama;
 //   $tanggal_kerja = $peg->tanggal_kerja;
    $id_seksi = $peg->id_seksi;
 //   $id_jabatan = $peg->id_jabatan;
 //   $id_golongan = $peg->id_golongan;
}
?>

<d		<div id="content">
  <div class="box">
    <h2>Ubah Pegawai</h2>
    <?php echo form_open('admin/simpanubahpegawai'); ?>
    <table id="tbl" border="0" class="display">
        <tr>
            <td>Nip</td>
            <td>&nbsp;</td>
            <td><input name="nip" type="text" size="30" value='<?php echo $nip; ?>'/></td>
        </tr>
        <tr>
            <td>Nama</td>
            <td>&nbsp;</td>
            <td><input name="nama" type="text" size="30" value='<?php echo $nama; ?>'/></td>
        </tr>
        <tr>
            <td>Tempat Lahir</td>
            <td>&nbsp;</td>
            <td><input name="tempat_lahir" type="text" size="30" value='<?php echo $tempat_lahir; ?>'></td>
        </tr>
        <tr>
            <td>Tgl. Lahir</td>
            <td>&nbsp;</td>
            <td align="left"><input type="text" id="tanggal_lahir"name="tanggal_lahir" size="30" value='<?php echo $tanggal_lahir; ?>'/> <font color="red">(Format : yyyy-mm-dd)</font></td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>&nbsp;</td>
            <td><textarea name="alamat" cols="27" rows="5"><?php echo $alamat; ?></textarea></td>
        </tr>
        <tr>
            <td>Bagian</td>
            <td>&nbsp;</td>
            <td><select name="seksi">
                    <?php
                    $seksi = $this->mseksi->getseksi();
                    foreach ($seksi->result() as $bag):
                        if ($id_seksi == $bag->id) {
                            $select = "selected='selected'";
                        } else {
                            $select = "";
                        }
                        ?>
                        <option value="<?php echo $bag->id; ?>"<?php echo $select; ?>>
                            <?php echo $bag->seksi ?></option>
                    <?php endforeach; ?>
                </select></td>
        </tr> 
        <?php echo form_hidden('id', $id); ?> 
        <tr>
          <td></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
            <td colspan="3"><input type="submit" value="Simpan"></td>
        </tr>
    </table>
    <?php echo form_close(); ?>
</div>
</div>
        
		<div class="clear"></div>
    </div>
</div>