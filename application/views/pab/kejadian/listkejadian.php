
<!--#content -->
<title>
    <?php echo $title; ?>
</title>
	<div id="content">
          <div class="box">
     
            <h2>Laporan Kejadian</h2>
            <p>&nbsp;</p>
            <?php $i = 1; ?>
            <table id="tbl_sipeg" border="0" cellspacing="1" cellpadding="2" class="display">
                <tr>
                    <th><div align="center">No</div></th>
                    <th><div align="center">Tanggal</div></th>
                    <th><div align="center">Jam</div></th>
                    <th><div align="center">Seksi</div></th>
                    <th><div align="center">Bendung</div></th>
                    <th><div align="center">Regu</div></th>
                    <th><div align="center">Nama Operator</div></th>
                    <th><div align="center">Kejadian</div></th>
                    <th><div align="center">Proses</div></th>
                </tr>
                <?php foreach ($kejadian->result() as $peng): ?>
                    <tr>
                        <td width="2%"><?php echo $i; ?></td>
                        <td width="5%"><?php echo $peng->tanggal_input; ?></td>
                        <td width="5%"><?php echo $peng->jam; ?></td>
                        <td width="15%"><?php echo $peng->seksi; ?></td>
                        <td width="15%"><?php echo $peng->bendung; ?></td>
                        <td width="15%"><?php echo $peng->regu; ?></td>
                        <td width="15%"><?php echo $peng->nama_operator; ?></td>
                        <td width="5%"><?php echo $peng->kejadian; ?></td>
                        <td width="10%"><?php
                            echo anchor('pab/ubahkejadian/' . $peng->id, 'Ubah') . "  " .
                            anchor('pab/hapuskejadian/' . $peng->id, 'Hapus', array('onClick' => "return confirm('Anda yakin nomor .$peng->kejadian. akan dihapus? ')"));
                            ?>
                        </td>
                    </tr>
                    <?php $i++;
                endforeach;
                ?>
  </table>
            <!--/div-->
            <br><br>
            <a href="<?php echo base_url() ?>pab/tambahkejadian/" id="submit" class="tambah">Tambah</a>

<!-- end #content -->
</div>
        </div>
        
		<div class="clear"></div>
    </div>
</div>