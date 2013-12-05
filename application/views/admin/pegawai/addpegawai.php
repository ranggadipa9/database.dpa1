
<!--#content -->
<title>
    <?php echo $title; ?>
</title>
		<div id="content">
          <div class="box">
    <h2>Tambah Pegawai</h2>
    <?php echo form_open('admin/simpanpegawai'); ?>
    <table id="tbl" border="0" class="display">
        
        <tr>
            <td>Nip</td>
            <td>&nbsp;</td>
            <td><input name="nip" type="text" size="30"/></td>
        </tr>
        <tr>
            <td>Nama</td>
            <td>&nbsp;</td>
            <td><input name="nama" type="text" size="30"/></td>
        </tr>
        <tr>
            <td>Tempat Lahir</td>
            <td>&nbsp;</td>
            <td><input name="tempat_lahir" type="text" size="30"/></td>
        </tr>
        <tr>
            <td>Tgl. Lahir</td>
            <td>&nbsp;</td>
            <td><input name="tanggal_lahir" type="text" size="30"/><font color="red">(Format : yyyy-mm-dd)</font></td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>&nbsp;</td>
            <td><textarea name="alamat" cols="27" rows="5"></textarea></td>
        </tr>
        <tr>
            <td>Seksi</td>
            <td>&nbsp;</td>
            <td><select name="seksi">
                    <?php
                    $seksi = $this->mseksi->getseksi();
                    foreach ($seksi->result() as $bag):
                        ?>
                        <option value="<?php echo $bag->id; ?>"><?php echo $bag->seksi ?></option>
                    <?php endforeach; ?>
                </select></td>
        </tr>  
        <tr>
            <td></td>
            <td>&nbsp;</td>
            <td><input type="submit" value="Simpan"></td>
        </tr>
    </table>
    <?php echo form_close(); ?>
</div>
</div>
        
		<div class="clear"></div>
    </div>
</div>