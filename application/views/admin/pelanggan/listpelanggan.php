
<!--#content -->
<title>
    <?php echo $title; ?>
</title>
		<div id="content">
          <div class="box">
          
                      <h2>Data Pelanggan</h2>
            <?php $i = 1; ?>
            <table id="tbl_sipeg" border="0" cellspacing="1" cellpadding="2" class="display">
                <tr>
                    <th>No</th>
                    <th>Pelanggan</th>
                    <th>Proses</th>
                </tr>
                <?php foreach ($pelanggan->result() as $gol): ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $gol->pelanggan; ?></td>
                        <td><?php
                            echo anchor('admin/ubahpelanggan/' . $gol->id, 'Ubah') . "  " .
                            anchor('admin/hapuspelanggan/' . $gol->id, 'Hapus', array('onClick' => "return confirm('Anda yakin pelanggan $gol->pelanggan akan dihapus? ')"));
                            ?>
                        </td>
                    </tr>
                    <?php $i++;
                endforeach;
                ?>
            </table>
            <br><br>
            <a href="<?php echo base_url() ?>admin/tambahpelanggan/" id="submit" class="tambah">Tambah</a>
        </div>
        </div>
        
		<div class="clear"></div>
    </div>
</div>