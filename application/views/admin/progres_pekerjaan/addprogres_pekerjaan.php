
<!--#content -->
<title>
    <?php echo $title; ?>
</title>
	<div id="content">
          <div class="box">
     
    <h2>Tambah Data Progres Pekerjaan</h2>
    <p>&nbsp;</p>
    <?php echo form_open('admin/simpanprogres_pekerjaan'); ?>
    <table id="tbl" border="0" class="display">
        <tr>
            <td>Sub - MA</td>
            <td>&nbsp;</td>
            <td><select name="id_mata_anggaran">
              <?php
                    $mata_anggaran = $this->mmata_anggaran->getmata_anggaran();
                    foreach ($mata_anggaran->result() as $bag):
                        ?>
              <option value="<?php echo $bag->id; ?>"><?php echo $bag->mata_anggaran ?></option>
              <?php endforeach; ?>
            </select></td>
        </tr>
        <tr>
          <td>Uraian Pekerjaan</td>
          <td>&nbsp;</td>
          <td><input name="uraian_pekerjaan" type="text" size="30"/></td>
        </tr>
        <tr>
          <td>Biaya Program</td>
          <td>&nbsp;</td>
          <td><input name="biaya_program" type="text" size="30"/></td>
        </tr>
        <tr>
          <td>Biaya Realisasi</td>
          <td>&nbsp;</td>
          <td><input name="biaya_realisasi" type="text" size="30"/></td>
        </tr>
        <tr>
          <td>Nomor Kontrak</td>
          <td>&nbsp;</td>
          <td><input name="nomor_kontrak" type="text" size="30"/></td>
        </tr>
        <tr>
          <td>Tanggal Kontrak</td>
          <td>&nbsp;</td>
          <td><input name="tanggal_kontrak" type="text" size="30"/></td>
        </tr>
        <tr>
          <td>Rekanan</td>
          <td>&nbsp;</td>
          <td><input name="rekanan" type="text" size="30"/></td>
        </tr>
        <tr>
          <td>Waktu</td>
          <td>&nbsp;</td>
          <td><input name="waktu" type="text" size="30"/></td>
        </tr>
        <tr>
          <td>Progres</td>
          <td>&nbsp;</td>
          <td><input name="progres" type="text" size="30"/></td>
        </tr>
        <tr>
          <td>Keterangan</td>
          <td>&nbsp;</td>
          <td><input name="keterangan" type="text" size="30"/></td>
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
