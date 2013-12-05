
<!--#content -->
<title>
    <?php echo $title; ?>
</title>
	<div id="content">
          <div class="box">
     
            <h2>Data Pengamat</h2>
            <p>&nbsp;</p>
            <?php $i = 1; ?>
            <table id="tbl_sipeg" border="0" cellspacing="1" cellpadding="2" class="display">
                <tr>
                    <th>No</th>
                    <th>Pengamat</th>
                    <th>Proses</th>
                </tr>
                <?php foreach ($pengamat->result() as $gol): ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $gol->pengamat; ?></td>
                        <td><?php
                            echo anchor('admin/ubahpengamat/' . $gol->id, 'Ubah') . "  " .
                            anchor('admin/hapuspengamat/' . $gol->id, 'Hapus', array('onClick' => "return confirm('Anda yakin pengamat $gol->pengamat akan dihapus? ')"));
                            ?>
                        </td>
                    </tr>
                    <?php $i++;
                endforeach;
                ?>
            </table>
            <br><br>
            <a href="<?php echo base_url() ?>admin/tambahpengamat/" id="submit" class="tambah">Tambah</a>
        

<!-- end #content -->
</div>
        </div>
        
		<div class="clear"></div>
    </div>
</div>
