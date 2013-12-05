
<!--#content -->
<title>
    <?php echo $title; ?>
</title>
	<div id="content">
          <div class="box">
     
            <h2 align="center">DATA PELANGGAN AIR </h2>
            <p><br>
              <br>
              <a href="<?php echo base_url() ?>admin/tambahpemakaian_air/" id="submit" class="tambah">Tambah</a>
              <?php $i = 1; ?>
            </p>
            <table id="tbl_sipeg" border="0" cellspacing="1" cellpadding="2" class="display">
                <tr>
                    <th><div align="center">No</div></th>
                    <th><div align="center">Pelanggan</div></th>
                    <th><div align="center">Alamat</div></th>
                    <th><div align="center">Lokasi Pengambilan</div></th>
                    <th><div align="center">Seksi</div></th>
                    <th><div align="center">Balai</div></th>
                    <th><div align="center">Berlaku Mulai</div></th>
                    <th><div align="center">SPPA Mulai</div></th>
                    <th><div align="center">Berlaku Akhir</div></th>
                    <th><div align="center">SPPA Akhir</div></th>
                    <th><div align="center">Debit Maks</div></th>
                    <th><div align="center">Debit Min</div></th>
                    <th><div align="center">Proses</div></th>
                </tr>
                <?php foreach ($pemakaian_air->result() as $peng): ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $peng->pelanggan; ?></td>
                        <td><?php echo $peng->alamat; ?></td>
                        <td><?php echo $peng->lokasi_pengambilan; ?></td>
                        <td><?php echo $peng->seksi; ?></td>
                        <td><?php echo $peng->balai; ?></td>
                        <td><?php echo $peng->berlaku_mulai; ?></td>
                        <td><?php echo $peng->sppa_mulai; ?></td>
                        <td><?php echo $peng->berlaku_akhir; ?></td>
                        <td><?php echo $peng->sppa_akhir; ?></td>
                        <td><?php echo $peng->debet_maks; ?></td>
                        <td><?php echo $peng->debet_min; ?></td>
                        <td><?php
                            echo anchor('admin/ubahpemakaian_air/' . $peng->id, 'Ubah') . "  " .
                            anchor('admin/hapuspemakaian_air/' . $peng->id, 'Hapus', array('onClick' => "return confirm('Anda yakin Pelanggan .$peng->pelanggan. akan dihapus? ')"));
                            ?>
                        </td>
                    </tr>
                    <?php $i++;
                endforeach;
                ?>
            </table>
            <!--/div-->
                    
<!-- end #content -->
</div>
        </div>
        
		<div class="clear"></div>
    </div>
</div>