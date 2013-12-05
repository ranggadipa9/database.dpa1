
<!--#content -->
<title>
    <?php echo $title; ?>
</title>
	<div id="content">
      <div class="box">
      
    <h2 align="center">Tambah Setoran</h2>
    <p align="center">&nbsp;</p>
    <?php echo form_open('admin/simpantransaksi_air'); ?>
    <table id="tbl" border="0" class="display">
        <tr>
            <td>Nama Pelanggan</td>
            <td>&nbsp;</td>
            <td><select name="pelanggan">
                    <?php
                    $pemakaian_air = $this->mpemakaian_air->getpemakaian_air();
                    foreach ($pemakaian_air->result() as $peg):
                        ?>
                        <option value="<?php echo $peg->id; ?>"><?php echo $peg->pelanggan ?></option>
                        <label <?php $peg->pelanggan; ?>/>
<?php endforeach; ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Tanggal Setor</td>
            <td>&nbsp;</td>
            <td><input name="tgl_faktur" type="text" size="30"/></td>
        </tr>
        <tr>
            <td>Uraian</td>
            <td>&nbsp;</td>
            <td><input name="nomor_faktur" type="text" size="30"/></td>
        </tr> 
        <tr>
          <td>Kas / Bank</td>
          <td>&nbsp;</td>
          <td><input name="tarif" type="text" size="30"/></td>
        </tr>
        <tr>
          <td>Jumlah Setoran</td>
          <td>&nbsp;</td>
          <td><input name="titipan" type="text" size="30"/></td>
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
          <!--/div-->
                    
<!-- end #content -->
</div>
        </div>
        
		<div class="clear"></div>
    </div>
</div>
