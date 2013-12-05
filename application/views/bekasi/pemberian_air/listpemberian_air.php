
<!--#content -->
<title>
    <?php echo $title; ?>
</title>

<div id="content">
          <div class="box">
                      <h2>Data Pemberian Air</h2>
            <p>&nbsp;</p>
            <?php $i = 1; ?>
            <table id="tbl_sipeg" border="0" cellspacing="1" cellpadding="2" class="display">
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Seksi</th>
                    <th>Nama Saluran</th>
                    <th>Saluran Sekunder</th>
                    <th>Nama Bangunan Btb</th>
                    <th>Target Areal Tanam</th>
                    <th>Golongan Tanam</th>
                    <th>Rencana Pemberian Air</th>
                    <th>Pemberian Air</th>
                    <th>Keterangan</th>
                    <th>Proses</th>
                </tr>
                <?php foreach ($pemberian_air->result() as $peng): ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $peng->tanggal_input; ?></td>
                        <td><?php echo $peng->seksi; ?></td>
                        <td><?php echo $peng->nama_saluran; ?></td>
                        <td><?php echo $peng->saluran_sekunder; ?></td>
                        <td><?php echo $peng->nama_bangunan_btb; ?></td>
                        <td><?php echo $peng->target_areal_tanam; ?></td>
                        <td><?php echo $peng->golongan_tanam; ?></td>
                        <td><?php echo $peng->rencana_pemberian_air; ?></td>
                        <td><?php echo $peng->pemberian_air; ?></td>
                        <td><?php echo $peng->keterangan; ?></td>
                        <td><?php
                            echo anchor('bekasi/ubahpemberian_air/' . $peng->id, 'Ubah') . " | " .
                            anchor('bekasi/hapuspemberian_air/' . $peng->id, 'Hapus', array('onClick' => "return confirm('Anda yakin pemberian_air .$peng->pemberian_air. akan dihapus? ')"));
                            ?>
                        </td>
                    </tr>
                    <?php $i++;
                endforeach;
                ?>
            </table>
            <!--/div-->
            <br><br>
            <a href="<?php echo base_url() ?>bekasi/tambahpemberian_air/" id="submit" class="tambah">Tambah</a>

<!-- end #content -->
</div>
        </div>
        
		<div class="clear"></div>
    </div>
</div>