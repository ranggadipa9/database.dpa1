<!--#content -->
<title>
    <?php echo $title; ?>
</title>
<?php
foreach ($progres_pekerjaan_investasi->result() as $gol) {
    $id_mata_anggaran= $gol->id_mata_anggaran;
	$uraian_pekerjaan= $gol->uraian_pekerjaan;
	$biaya_program= $gol->biaya_program;
	$biaya_realisasi= $gol->biaya_realisasi;
	$biaya_sisa= $gol->biaya_sisa;
	$nomor_kontrak= $gol->nomor_kontrak;
	$tanggal_kontrak= $gol->tanggal_kontrak;
	$rekanan= $gol->rekanan;
	$waktu= $gol->waktu;
	$progres= $gol->progres;
	$keterangan= $gol->keterangan;
	
    $id = $gol->id;
}
?>
	<div id="content">
          <div class="box">
     
    <h2>Ubah Data Progres Pekerjaan</h2>
    <p>&nbsp;</p>
    <?php echo form_open('admin/simpanubahprogres_pekerjaan_investasi'); ?>
    <table id="tbl" border="0" class="display">
        <tr>
          <td>Sub - MA</td>
          <td>&nbsp;</td>
          <td><select name="id_mata_anggaran">
            <?php
                    $mata_anggaran = $this->mmata_anggaran->getmata_anggaran();
                    foreach ($mata_anggaran->result() as $bag):
                        if ($id_mata_anggaran == $bag->id) {
                            $select = "selected='selected'";
                        } else {
                            $select = "";
                        }
                        ?>
            <option value="<?php echo $bag->id; ?>"<?php echo $select; ?>> <?php echo $bag->mata_anggaran ?></option>
            <?php endforeach; ?>
          </select></td>
        </tr>
        <tr>
          <td>Uraian Pekerjaan</td>
          <td>&nbsp;</td>
          <td><input name="uraian_pekerjaan" type="text" size="30" value='<?php echo $uraian_pekerjaan; ?>'/></td>
        </tr>
        <tr>
          <td>Biaya Program</td>
          <td>&nbsp;</td>
          <td><input name="biaya_program" type="text" size="30" value='<?php echo $biaya_program; ?>'/></td>
        </tr>
        <tr>
          <td>Biaya Realisasi</td>
          <td>&nbsp;</td>
          <td><input name="biaya_realisasi" type="text" size="30" value='<?php echo $biaya_realisasi; ?>'/></td>
        </tr>
        <tr>
          <td>Nomor Kontrak</td>
          <td>&nbsp;</td>
          <td><input name="nomor_kontrak" type="text" size="30" value='<?php echo $nomor_kontrak; ?>'/></td>
        </tr>
        <tr>
          <td>Tanggal Kontrak</td>
          <td>&nbsp;</td>
          <td><input name="tanggal_kontrak" type="text" size="30" value='<?php echo $tanggal_kontrak; ?>'/></td>
        </tr>
        <tr>
          <td>Rekanan</td>
          <td>&nbsp;</td>
          <td><input name="rekanan" type="text" size="30" value='<?php echo $rekanan; ?>'/></td>
        </tr>
        <tr>
          <td>Waktu</td>
          <td>&nbsp;</td>
          <td><input name="waktu" type="text" size="30" value='<?php echo $waktu; ?>'/></td>
        </tr>
        <tr>
          <td>Progres</td>
          <td>&nbsp;</td>
          <td><input name="progres" type="text" size="30" value='<?php echo $progres; ?>'/></td>
        </tr>
        <tr>
          <td>Keterangan</td>
          <td>&nbsp;</td>
          <td><input name="keterangan" type="text" size="30" value='<?php echo $keterangan; ?>'/></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
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