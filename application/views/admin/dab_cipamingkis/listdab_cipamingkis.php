
<!--#content -->
<title>
    <?php echo $title; ?>
</title>
	<div id="content">
          <div class="box">
     
            <h2>Data Debet Air Bendung Cipamingkis</h2>
            <p>&nbsp;</p>
            <?php $i = 1; ?>
            <table id="tbl_sipeg" border="0" cellspacing="1" cellpadding="2" class="display">
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Jam</th>
                    <th>Limpasan</th>
                    <th>Saluran Induk Kiri</th>
                    <th>Saluran Induk Kanan</th>
                    <th>Q1</th>
                    <th>Q2</th>
                    <th>Keterangan</th>
                    <th>Proses</th>
                </tr>
                <?php foreach ($dab_cipamingkis->result() as $peng): ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $peng->tanggal_input; ?></td>
                        <td><?php echo $peng->jam; ?></td>
                        <td><?php echo $peng->limpasan; ?></td>
                        <td><?php echo $peng->saluran_induk_kiri; ?></td>
                        <td><?php echo $peng->saluran_induk_kanan; ?></td>
                        <td><?php echo $peng->q1; ?></td>
                        <td><?php echo $peng->q2; ?></td>
                        <td><?php echo $peng->keterangan; ?></td>
                        <td><?php
                            echo anchor('admin/ubahdab_cipamingkis/' . $peng->id, 'Ubah') . "  " .
                            anchor('admin/hapusdab_cipamingkis/' . $peng->id, 'Hapus', array('onClick' => "return confirm('Anda yakin Debet Air .$peng->q2. akan dihapus? ')"));
                            ?>
                        </td>
                    </tr>
                    <?php $i++;
                endforeach;
                ?>
  </table>
            <!--/div-->
            <br><br>
            <a href="<?php echo base_url() ?>admin/tambahdab_cipamingkis/" id="submit" class="tambah">Tambah</a>

<!-- end #content -->
</div>
        </div>
        
		<div class="clear"></div>
    </div>
</div>