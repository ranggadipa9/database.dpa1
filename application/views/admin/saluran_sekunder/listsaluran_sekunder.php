
<!--#content -->
<title>
    <?php echo $title; ?>
</title>
	<div id="content">
          <div class="box">
     
            <h2>Data Saluran Sekunder</h2>
            <p>&nbsp;</p>
            <?php $i = 1; ?>
            <table id="tbl_sipeg" border="0" cellspacing="1" cellpadding="2" class="display">
                <tr>
                    <th>No</th>
                    <th>Saluran Sekunder</th>
                    <th>Proses</th>
                </tr>
                <?php foreach ($saluran_sekunder->result() as $gol): ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $gol->saluran_sekunder; ?></td>
                        <td><?php
                            echo anchor('admin/ubahsaluran_sekunder/' . $gol->id, 'Ubah') . "  " .
                            anchor('admin/hapussaluran_sekunder/' . $gol->id, 'Hapus', array('onClick' => "return confirm('Anda yakin saluran_sekunder $gol->saluran_sekunder akan dihapus? ')"));
                            ?>
                        </td>
                    </tr>
                    <?php $i++;
                endforeach;
                ?>
  </table>
            <br><br>
            <a href="<?php echo base_url() ?>admin/tambahsaluran_sekunder/" id="submit" class="tambah">Tambah</a>


<!-- end #content -->
</div>
        </div>
        
		<div class="clear"></div>
    </div>
</div>
    