
<!--#content -->
<title>
    <?php echo $title; ?>
</title>
<div id="rihgt">
            <h2>Data Golongan Tanam</h2>
            <p>&nbsp;</p>
            <?php $i = 1; ?>
            <table id="tbl_sipeg" border="0" cellspacing="1" cellpadding="2" class="display">
                <tr>
                    <th>No</th>
                    <th>Golongan Tanam</th>
                    <th>Proses</th>
                </tr>
                <?php foreach ($golongan_tanam->result() as $gol): ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $gol->golongan_tanam; ?></td>
                        <td><?php
                            echo anchor('admin/ubahgolongan_tanam/' . $gol->id, 'Ubah') . "  " .
                            anchor('admin/hapusgolongan_tanam/' . $gol->id, 'Hapus', array('onClick' => "return confirm('Anda yakin golongan_tanam $gol->golongan_tanam akan dihapus? ')"));
                            ?>
                        </td>
                    </tr>
                    <?php $i++;
                endforeach;
                ?>
  </table>
            <br><br>
            <a href="<?php echo base_url() ?>admin/tambahgolongan_tanam/" id="submit" class="tambah">Tambah</a>

<!-- end #content -->
</div>
        </div>
        
		<div class="clear"></div>
    </div>
</div>
