
<!--#content -->
<title>
    <?php echo $title; ?>
</title>

<div id="content">
          <div class="box">
          
          <h2 align="center">Perpanjang Sewa Lahan</h2>
          <p>&nbsp;</p>
    <?php echo form_open('admin/simpanperpanjang_lahan'); ?>
    <table id="tbl" border="0" class="display">
        <!--tr>
            <td>Tanggal Evaluasi</td>
            <td>&nbsp;</td>
            <td><input name="tanggal_evaluasi" type="text" size="30"/></td>
        </tr-->
        <tr>
          <td>Pelanggan Air</td>
          <td>&nbsp;</td>
          <td><select name="no_sipls">
            <?php
                    $pengguna_lahan = $this->mpengguna_lahan->getpengguna_lahan();
                    foreach ($pengguna_lahan->result() as $peg):
                        if ($id_pengguna_lahan == $peg->id) {
                            $select = "selected='selected'";
                        } else {
                            $select = "";
                        }
                        ?>
            <option value="<?php echo $peg->id; ?>"<?php echo $select; ?>> <?php echo $peg->no_sipls ?></option>
            <?php endforeach; ?>
          </select></td>
        </tr>
        <tr>
            <td>Sippls</td>
            <td>&nbsp;</td>
            <td><select name="sipls">
                    <option value="Baru" selected="selected">Baru</option>
                    <option value="Perpanjangan" >Perpanjangan</option>
                </select>
            </td>
        </tr>
        <tr>
          <td>Tanggal Perpanjang</td>
          <td>&nbsp;</td>
          <td><input name="tgl_perpanjangan" type="text" size="30"/><font color="red">(Format : yyyy-mm-dd)</font></td>
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