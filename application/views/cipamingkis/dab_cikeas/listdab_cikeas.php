
<!--#content -->
<title>
    <?php echo $title; ?>
</title>

	<div id="content">
          <div class="box">
            <h2>Data Debet Air Bendung Cikeas</h2>
            <p>&nbsp;</p>
            <?php $i = 1; ?>
            <table id="tbl_sipeg" border="0" cellspacing="1" cellpadding="2" class="display">
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Jam</th>
                    <th>Pelimpas Kiri</th>
                    <th>Pelimpas Kanan<strong></strong></th>
                    <th>Jumlah<strong></strong></th>
                    <th>Keterangan</th>
                    <th>Proses</th>
                </tr>
                <?php foreach ($dab_cikeas->result() as $peng): ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $peng->tanggal_input; ?></td>
                        <td><?php echo $peng->jam; ?></td>
                        <td><?php echo $peng->pelimpas_kiri; ?></td>
                        <td><?php echo $peng->pelimpas_kanan; ?></td>
                        <td><?php echo $peng->jumlah; ?></td>
                        <td><?php echo $peng->keterangan; ?></td>
                        <td><?php
                            echo anchor('cipamingkis/ubahdab_cikeas/' . $peng->id, 'Ubah') . " | " .
                            anchor('cipamingkis/hapusdab_cikeas/' . $peng->id, 'Hapus', array('onClick' => "return confirm('Anda yakin Debet .$peng->jumlah. akan dihapus? ')"));
                            ?>
                        </td>
                    </tr>
                    <?php $i++;
                endforeach;
                ?>
  </table>
            <!--/div-->
            <br><br>
            <a href="<?php echo base_url() ?>cipamingkis/tambahdab_cikeas/" id="submit" class="tambah">Tambah</a>

<!-- end #content -->
</div>
        </div>
        
		<div class="clear"></div>
    </div>
</div>