
<!--#content -->
<title>
    <?php echo $title; ?>
</title>
<div id="content">
          <div class="box">
                <h2>DataDebet Ait Bendungan CBL</h2>
            <p>&nbsp;</p>
            <?php $i = 1; ?>
            <table id="tbl_sipeg" border="0" cellspacing="1" cellpadding="2" class="display">
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Jam</th>
                    <th>Limpasan</th>
                    <th>Debet Air</th>
                    <th>Jumlah</th>
                    <th>Di Sukatani (BSh. 1)</th>
                    <th>Keterangan</th>
                    <th>Proses</th>
                </tr>
                <?php foreach ($dab_cbl->result() as $peng): ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $peng->tanggal_input; ?></td>
                        <td><?php echo $peng->jam; ?></td>
                        <td><?php echo $peng->limpasan; ?></td>
                        <td><?php echo $peng->debet_air; ?></td>
                        <td><?php echo $peng->disukatani_bsh1; ?></td>
                        <td><?php echo $peng->jumlah; ?></td>
                        <td><?php echo $peng->keterangan; ?></td>
                        <td><?php
                            echo anchor('bekasi/ubahdab_cbl/' . $peng->id, 'Ubah') . " | " .
                            anchor('bekasi/hapusdab_cbl/' . $peng->id, 'Hapus', array('onClick' => "return confirm('Anda yakin TMA .$peng->jumlah. akan dihapus? ')"));
                            ?>
                        </td>
                    </tr>
                    <?php $i++;
                endforeach;
                ?>
  </table>
            <!--/div-->
            <br><br>
            <a href="<?php echo base_url() ?>bekasi/tambahdab_cbl/" id="submit" class="tambah">Tambah</a>

<!-- end #content -->
</div>
        </div>
        
		<div class="clear"></div>
    </div>
</div>    