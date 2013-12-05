<!--#content -->
<title>
    <?php echo $title; ?>
</title>
<?php
foreach ($curah_hujan->result() as $peng) {
    $tanggal_input = $peng->tanggal_input;
    $nomor = $peng->nomor;
    $id_seksi = $peng -> id_seksi;
    $nama_stasiun = $peng -> nama_stasiun;
	$curah_hujan = $peng -> curah_hujan;
    $keterangan = $peng -> keterangan;
    $id = $peng->id;
}
?>
	<div id="content">
          <div class="box">
     
    <h2>Ubah Data Curah Hujan</h2>
    <p>&nbsp;</p>
    <?php echo form_open('bekasi/simpanubahcurah_hujan'); ?>
    <table id="tbl" border="0" class="display">
        <tr>
          <td>Tanggal</td>
          <td>&nbsp;</td>
          <td><input name="tanggal_input" value='<?php echo $tanggal_input; ?>' type="text" size="30"/><font color="red">(Format : yyyy-mm-dd)</font></td>
        </tr>
        <tr>
            <td>Nomor</td>
            <td>&nbsp;</td>
            <td><input name="nomor" value='<?php echo $nomor; ?>' type="text" size="30"/></td>
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
          <td>Nama Stasiun</td>
          <td>&nbsp;</td>
          <td><input name="nama_stasiun" value='<?php echo $nama_stasiun; ?>' type="text" size="30"/></td>
        </tr>
        <tr>
          <td>Curah Hujan</td>
          <td>&nbsp;</td>
          <td><input name="curah_hujan" value='<?php echo $curah_hujan; ?>' type="text" size="30"/></td>
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