
<!--#content -->
<title>
    <?php echo $title; ?>
</title>
<?php
foreach ($transaksi_air->result() as $peng) {
    $id_pemakaian_air = $peng->id_pemakaian_air;
	
	$nomor_faktur = $peng->nomor_faktur;
    $tgl_faktur = $peng->tgl_faktur;
    $tarif = $peng->tarif;
	$titipan = $peng->titipan;
    $fee = $peng->fee;
    $materai = $peng->materai;
    
	$id = $peng->id;
}
?>


<!--#content -->
<title>
    <?php echo $title; ?>
</title>
	<div id="content">
      <div class="box">
      
    <h2 align="center">Ubah Transaksi</h2>
    <?php echo form_open('admin/simpanubahtransaksi_air'); ?>
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
            <td>Tanggal Faktur</td>
            <td>&nbsp;</td>
            <td><input name="tgl_faktur" type="text" size="30" value='<?php echo $tgl_faktur ?>'/></td>
        </tr>
        <tr>
            <td>Nomor Faktur</td>
            <td>&nbsp;</td>
            <td><input name="nomor_faktur" type="text" size="30" value='<?php echo $nomor_faktur ?>'/></td>
        </tr>

        <tr>
          <td>Tarif</td>
          <td>&nbsp;</td>
          <td><input name="tarif" type="text" size="30" value='<?php echo $tarif ?>'/></td>
        </tr>
        <tr>
          <td>Titipan</td>
          <td>&nbsp;</td>
          <td><input name="titipan" type="text" size="30" value='<?php echo $titipan ?>'/></td>
        </tr>
        <tr>
          <td>Fee</td>
          <td>&nbsp;</td>
          <td><input name="fee" type="text" size="30" value='<?php echo $fee ?>'/></td>
        </tr>
        <tr>
          <td>Materai</td>
          <td>&nbsp;</td>
          <td><input name="materai" type="text" size="30" value='<?php echo $materai ?>'/></td>
        </tr>
        <tr>
          <td></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <?php echo form_hidden('id', $id); ?>
        <tr>
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