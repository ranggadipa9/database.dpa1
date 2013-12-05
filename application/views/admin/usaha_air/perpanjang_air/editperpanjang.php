
<!--#content -->
<title>
    <?php echo $title; ?>
</title>
<?php
foreach ($perpanjang->result() as $mts) {
    $id = $mts->id;
    //$no_sipls = $mts->no_sipls;
    $sipls = $mts->sipls;
    $tgl_perpanjang = $mts->tgl_perpanjang;
    }
?>

<div id="content">
    <h2 align="center">Ubah Perpanjangan</h2>
    <p>&nbsp;</p>
    <?php echo form_open('admin/simpanubahperpanjang'); ?>
    <table id="tbl" border="0" class="display">
        <tr>
            <td>No SIPPLS</td>
            <td>&nbsp;</td>
            <td><select name="no_sipls">
              <?php
                    $pengguna_lahan = $this->mpengguna_lahan->getpengguna_lahan();
                    foreach ($pengguna_lahan->result() as $bag):
                        if ($id_pengguna_lahan== $bag->id) {
                            $select = "selected='selected'";
                        } else {
                            $select = "";
                        }
                        ?>
              <option value="<?php echo $bag->id; ?>"<?php echo $select; ?>> <?php echo $bag->no_sipls ?></option>
              <?php endforeach; ?>
            </select></td>
        </tr>
        <tr>
            <td>SIPPLS</td>
            <td>&nbsp;</td>
            <td><select name="sipls">
              <option value="Baru" selected="selected">Baru</option>
              <option value="Perpanjangan" >Perpanjangan</option>
            </select></td>
        </tr>
        <tr>
            <td>Tgl.  Perpanjang</td>
            <td>&nbsp;</td>
            <td><input name="tgl_perpanjang" type="text" size="30" value='<?php echo $tgl_perpanjang; ?>'/>
            <font color="red">(Format : yyyy-mm-dd)</font></td>
        </tr>  
        <tr>
            <td>&nbsp;</td>
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
