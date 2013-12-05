
<!--#content -->
<title>
    <?php echo $title; ?>
</title>
	<div id="content">
          <div class="box">
     
            <h2>Data Debet Air Bendung Lemahabang</h2>
            <p>&nbsp;</p>
            <?php $i = 1; ?>
            <table id="tbl_sipeg" border="0" cellspacing="1" cellpadding="2" class="display">
                <tr>
                    <th>No</th>
                    <th>Tanggal Input</th>
                    <th>Jam</th>
                    <th>TMA</th>
                    <th>Debet</th>
                    <th>Keterangan</th>
                    <th>Proses</th>
                </tr>
                <?php foreach ($dab_lemahabang->result() as $peng): ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $peng->tanggal_input; ?></td>
                        <td><?php echo $peng->jam; ?></td>
                        <td><?php echo $peng->tma; ?></td>
                        <td><?php echo $peng->debet; ?></td>
                        <td><?php echo $peng->keterangan; ?></td>
                        <td><?php
                            echo anchor('admin/ubahdab_lemahabang/' . $peng->id, 'Ubah') . "  " .
                            anchor('admin/hapusdab_lemahabang/' . $peng->id, 'Hapus', array('onClick' => "return confirm('Anda yakin TMA .$peng->tma. akan dihapus? ')"));
                            ?>
                        </td>
                    </tr>
                    <?php $i++;
                endforeach;
                ?>
            </table>
            <!--/div-->
            <br><br>
            <a href="<?php echo base_url() ?>admin/tambahdab_lemahabang/" id="submit" class="tambah">Tambah</a>
        
<!-- end #content -->
</div>
        </div>
        
		<div class="clear"></div>
    </div>
</div>