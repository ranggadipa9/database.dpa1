
<!--#content -->
<title>
    <?php echo $title; ?>
</title>


<div id="content">
          <div class="box">
                      <h2>Data Pemakaian Air Oleh Perusahan</h2>
            <p>&nbsp;</p>
            <?php $i = 1; ?>
            <table id="tbl_sipeg" border="0" cellspacing="1" cellpadding="2" class="display">
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Balai</th>
                    <th>Seksi</th>
                    <th>Pelanggan</th>
                    <th>Lokasi Pengambilan</th>
                    <th>No SPPA</th>
                    <th>Kontrak Maks</th>
                    <th>Kontrak Min</th>
                    <th>Realisasi</th>
                    <th>Keterangan</th>
                    <th>Proses</th>
                </tr>
                <?php foreach ($pemakaian_air->result() as $peng): ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $peng->tanggal_input; ?></td>
                        <td><?php echo $peng->balai; ?></td>
                        <td><?php echo $peng->seksi; ?></td>
                        <td><?php echo $peng->pelanggan; ?></td>
                        <td><?php echo $peng->lokasi_pengambilan; ?></td>
                        <td><?php echo $peng->no_sppa; ?></td>
                        <td><?php echo $peng->debet_maks; ?></td>
                        <td><?php echo $peng->debet_min; ?></td>
                        <td><?php echo $peng->realisasi; ?></td>
                        <td><?php echo $peng->keterangan; ?></td>
                        <td><?php
                            echo anchor('lemahabang/ubahpemakaian_air/' . $peng->id, 'Ubah') . " | " .
                            anchor('lemahabang/hapuspemakaian_air/' . $peng->id, 'Hapus', array('onClick' => "return confirm('Anda yakin blok .$peng->no_sppa. akan dihapus? ')"));
                            ?>
                        </td>
                    </tr>
                    <?php $i++;
                endforeach;
                ?>
            </table>
            <!--/div-->
            <br><br>
            <a href="<?php echo base_url() ?>lemahabang/tambahpemakaian_air/" id="submit" class="tambah">Tambah</a>
<!-- end #content -->
</div>
        </div>
        
		<div class="clear"></div>
    </div>
</div>