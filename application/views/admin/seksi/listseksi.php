
<!--#content -->
<title>
    <?php echo $title; ?>
</title>
	<div id="content">
          <div class="box">
     
<h2>Daftar Seksi Daerah Pengelolaan Air I</h2>
<p>&nbsp;</p>
            <?php $i = 1; ?>
            <table id="tbl_sipeg" border="0" cellspacing="1" cellpadding="2" class="display">
                <tr>
                    <th>No</th>
                    <th>Seksi</th>
                    <th>Proses</th>
                </tr>
                <?php foreach ($seksi->result() as $jab): ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $jab->seksi; ?></td>
                        <td><?php
                            echo anchor('admin/ubahseksi/' . $jab->id, 'Ubah') . "  " .
                            anchor('admin/hapusseksi/' . $jab->id, 'Hapus', array('onClick' => "return confirm('Anda yakin Seksi $jab->seksi akan dihapus? ')"));
                            ?>
                        </td>
                    </tr>
                    <?php $i++;
                endforeach;
                ?>
            </table>
            <br><br>
            <a href="<?php echo base_url() ?>admin/tambahseksi/" id="submit" class="tambah">Tambah</a>


<!-- end #content -->
</div>
        </div>
        
		<div class="clear"></div>
    </div>
</div>
