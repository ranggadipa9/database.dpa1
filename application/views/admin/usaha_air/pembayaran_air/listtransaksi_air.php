
<!--#content -->
<title>
    <?php echo $title; ?>
</title>
	<div id="content">
      <div class="box">
     
            <h2 align="center">DATA PELANGGAN AIR </h2>
        <p><br>
              <br>
              <a href="<?php echo base_url() ?>admin/tambahtransaksi_air/" id="submit" class="tambah">Tambah</a>
            <?php $i = 1; ?>
            <table id="tbl_sipeg" border="0" cellspacing="1" cellpadding="2" class="display">
                <tr>
                    <th rowspan="2"><div align="center">No</div></th>
                    <th rowspan="2"><div align="center">Pelanggan</div></th>
                  <th rowspan="2"><div align="center">Lokasi </div></th>
                    <th colspan="2"><div align="center"> Mulai</div></th>
                    <th colspan="2"><div align="center">Berakhir</div></th>
                    <th rowspan="2"><div align="center">Debit Maks</div></th>
                    <th rowspan="2"><div align="center">Debit Min</div></th>
                    <th rowspan="2"><div align="center">Realisasi</div></th>
                    <th colspan="2"><div align="center">Faktur</div></th>
                    <th colspan="2" rowspan="2">Jumlah Tagihan</th>
                    <th rowspan="2"><div align="center">Ket.</div></th>
                    <th rowspan="2"><div align="center">Proses</div></th>
                </tr>
                <tr>
                  <th>Tanggal</th>
                  <th>Nomor</th>
                  <th>Tanggal</th>
                  <th>Nomor</th>
                  <th><div align="center">Tanggal</div></th>
                  <th><div align="center">Nomor</div></th>
                </tr>
                <?php foreach ($transaksi_air->result() as $peng): ?>
                    <tr>
                      <td rowspan="5"><?php echo $i; ?></td>
                      <td rowspan="5"><?php echo $peng->pelanggan; ?></td>
                      <td rowspan="5"><?php echo $peng->lokasi_pengambilan; ?></td>
                      <td rowspan="5"><?php echo $peng->berlaku_mulai; ?></td>
                      <td rowspan="5"><?php echo $peng->sppa_mulai; ?></td>
                      <td rowspan="5"><?php echo $peng->berlaku_akhir; ?></td>
                      <td rowspan="5"><?php echo $peng->sppa_akhir; ?></td>
                      <td rowspan="5"><?php echo $peng->debet_maks; ?></td>
                      <td rowspan="5"><?php echo $peng->debet_min; ?></td>
                      <td rowspan="5"><?php echo $peng->realisasi; ?></td>
                      <td rowspan="5"><?php echo $peng->tgl_faktur; ?></td>
                      <td rowspan="5"><?php echo $peng->nomor_faktur; ?></td>
                      <td>Tarif</td>
                      <td><div align="right"><?php echo $peng->tarif; ?></div></td>
                      <td rowspan="5"><?php echo $peng->keterangan; ?></td>
                      <td rowspan="5" align="center"><?php
                            echo anchor('admin/ubahtransaksi_air/' . $peng->id, 'Ubah') . " " .
                            anchor('admin/hapustransaksi_air/' . $peng->id, 'Hapus', array('onClick' => "return confirm('Anda yakin Pelanggan .$peng->pelanggan. akan dihapus? ')"));
                            ?>                      </td>
                    </tr>
                    <tr>
                      <td>Titipan</td>
                      <td><div align="right"><?php echo $peng->titipan; ?></div></td>
                    </tr>
                    <tr>
                      <td>Fee</td>
                      <td><div align="right"><?php echo $peng->fee; ?></div></td>
                    </tr>
                    <tr>
                      <td>Materai</td>
                      <td><div align="right"><?php echo $peng->materai; ?></div></td>
                    </tr>
                    <tr>
                      <td>Jumlah </td>
                        <td><div align="right"><?php echo $peng->jumlah_tagihan; ?></div></td>
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