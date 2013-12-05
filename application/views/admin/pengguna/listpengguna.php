
<!--#content -->
<title>
    <?php echo $title; ?>
</title>
	<div id="content">
          <div class="box">
     
            <h2>Data Pengguna</h2>
            <p>&nbsp;</p>
            <?php $i = 1; ?>
            <table id="tbl_sipeg" border="0" cellspacing="1" cellpadding="2" class="display">
                <tr>
                    <th>No</th>
                    <th>Pengguna</th>
                    <th>Kata Kunci</th>
                    <th>Hak Akses</th>
                    <th>Seksi</th>
                    <th>Nama</th>
                    <th>Proses</th>
                </tr>
                <?php foreach ($pengguna->result() as $peng): ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $peng->pengguna; ?></td>
                        <td><?php echo $peng->kata_kunci; ?></td>
                        <td><?php echo $peng->jenis; ?></td>
                        <td><?php echo $peng->seksi; ?></td>
                        <td><?php echo $peng->nama; ?></td>
                        <td><?php
                            echo anchor('admin/ubahpengguna/' . $peng->id, 'Ubah') . "  " .
                            anchor('admin/hapuspengguna/' . $peng->id, 'Hapus', array('onClick' => "return confirm('Anda yakin nip .$peng->pengguna. akan dihapus? ')"));
                            ?>
                        </td>
                    </tr>
                    <?php $i++;
                endforeach;
                ?>
            </table>
            <!--/div-->
            <br><br>
            <a href="<?php echo base_url() ?>admin/tambahpengguna/" id="submit" class="tambah">Tambah</a>
        
<!-- end #content -->
</div>
        </div>
        
		<div class="clear"></div>
    </div>
</div>