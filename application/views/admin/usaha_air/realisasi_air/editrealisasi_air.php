
<!--#content -->
<title>
    <?php echo $title; ?>
</title>
<?php
foreach ($realisasi_air->result() as $peng) {
    $id_pemakaian_air = $peng->id_pemakaian_air;
	
    $realisasi = $peng->realisasi;
    $keterangan = $peng->keterangan;
    
	$id = $peng->id;
}
?>


<!--#content -->
<title>
    <?php echo $title; ?>
</title>
	<div id="content">
      <div class="box">
      
    <h2 align="center">Ubah Realisasi</h2>
    <?php echo form_open('admin/simpanubahrealisasi_air'); ?>
    <table id="tbl" border="0" class="display">
        <tr>
            <td>Nama Pelanggan</td>
            <td>&nbsp;</td>
            <td><select name="pelanggan">
                    <?php
                    $pemakaian_air = $this->mpemakaian_air->getpemakaian_air();
                    foreach ($pemakaian_air->result() as $peg):
                        if ($id_pemakaian_air == $peg->id) {
                            $select = "selected='selected'";
                        } else {
                            $select = "";
                        }
                        ?>
                        <option value="<?php echo $peg->id; ?>"<?php echo $select; ?>>
                        <?php echo $peg->pelanggan ?></option>
                        <?php endforeach; ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Realisasi</td>
            <td>&nbsp;</td>
            <td><input name="realisasi" type="text" size="30" value='<?php echo $realisasi ?>'/></td>
        </tr>
        <tr>
            <td>Keterangan</td>
            <td>&nbsp;</td>
            <td><input name="keterangan" type="text" size="30" value='<?php echo $keterangan ?>'/></td>
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
      <!--/div-->
                    
<!-- end #content -->
</div>
        </div>
        
		<div class="clear"></div>
    </div>
</div>