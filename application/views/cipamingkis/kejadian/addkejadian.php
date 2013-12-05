
<!--#content -->
<title>
    <?php echo $title; ?>
</title>
	<div id="content">
          <div class="box">
     
    <h2>Tambah Laporan Kejadian</h2>
    <p>&nbsp;</p>
    <?php echo form_open('cipamingkis/simpankejadian'); ?>
    <table id="tbl" border="0" class="display">
        <tr>
          <td>Tanggal</td>
          <td>&nbsp;</td>
          <td><input name="tanggal_input" type="text" size="30"/><font color="red">(Format : yyyy-mm-dd)</font></td>
        </tr>
        <tr>
          <td>Jam</td>
          <td>&nbsp;</td>
          <td><input name="jam" type="text" size="30"/></td>
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
          <td>Bendung</td>
          <td>&nbsp;</td>
          <td><select name="id_bendung">
            <?php
                    $bendung = $this->mbendung->getbendung();
                    foreach ($bendung->result() as $bag):
                        ?>
            <option value="<?php echo $bag->id; ?>"><?php echo $bag->bendung ?></option>
            <?php endforeach; ?>
          </select></td>
        </tr>
        <tr>
          <td>Regu</td>
          <td>&nbsp;</td>
          <td><input name="regu" type="text" size="30"/></td>
        </tr>
        <tr>
          <td>Nama Operator</td>
          <td>&nbsp;</td>
          <td><input name="nama_operator" type="text" size="30"/></td>
        </tr>
        <tr>
          <td>Laporan Kejadian</td>
          <td>&nbsp;</td>
          <td><textarea name="kejadian" cols="30" rows="10"></textarea></td>
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