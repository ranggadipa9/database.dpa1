
<!--#content -->
<title>
    <?php echo $title; ?>
</title>


	<div id="content">
          <div class="box">
          
           <h2>Data Tanam Rendeng</h2>
            <p>&nbsp;</p>
            <?php $i = 1; ?>
            <table id="tbl_sipeg" border="0" cellspacing="1" cellpadding="2" class="display">
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Daerah Irigasi</th>
                    <th>Seksi</th>
                    <th>Saluran</th>
                    <th>Kabupaten</th>
                    <th>Kecamatan</th>
                    <th>Nama Areal</th>
                    <th>Gol</th>
                    <th>Target Luas</th>
                    <th>Target Bibit</th>
                    <th>Target Garap</th>
                    <th>Target Tanam</th>
                    <th>Target Panen</th>
                    <th>Target Jumlah</th>
                    <th>Target Persen</th>
                    <th>Target Palawija</th>
                    <th>Target Bera</th>
                    <th>Target Puso</th>
                    <th>Luar Target Bibit</th>
                    <th>Luar Target Garap</th>
                    <th>Luar Target Tanam</th>
                    <th>Luar Target Panen</th>
                    <th>Luar Target Jumlah</th>
                    <th>Luar Target Palawija</th>
                    <th>Keterangan</th>
                    <th>Proses</th>
                </tr>
                <?php foreach ($tanam_rendeng->result() as $peng): ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $peng->tanggal_input; ?></td>
                        <td><?php echo $peng->daerah_irigasi; ?></td>
                        <td><?php echo $peng->seksi; ?></td>
                        <td><?php echo $peng->saluran_tanam; ?></td>
                        <td><?php echo $peng->kabupaten; ?></td>
                        <td><?php echo $peng->kecamatan; ?></td>
                        <td><?php echo $peng->nama_areal; ?></td>
                        <td><?php echo $peng->golongan_tanam; ?></td>
                        <td><?php echo $peng->target_luas; ?></td>
                        <td><?php echo $peng->target_bibit; ?></td>
                        <td><?php echo $peng->target_garap; ?></td>
                        <td><?php echo $peng->target_tanam; ?></td>
                        <td><?php echo $peng->target_panen; ?></td>
                        <td><?php echo $peng->target_jumlah; ?></td>
                        <td><?php echo $peng->target_persen; ?></td>
                        <td><?php echo $peng->target_palawija; ?></td>
                        <td><?php echo $peng->target_bera; ?></td>
                        <td><?php echo $peng->target_puso; ?></td>
                        <td><?php echo $peng->luar_target_bibit; ?></td>
                        <td><?php echo $peng->luar_target_garap; ?></td>
                        <td><?php echo $peng->luar_target_tanam; ?></td>
                        <td><?php echo $peng->luar_target_panen; ?></td>
                        <td><?php echo $peng->luar_target_jumlah; ?></td>
                        <td><?php echo $peng->luar_target_palawija; ?></td>
                        <td><?php echo $peng->keterangan; ?></td>

                      <td><?php
                            echo anchor('cipamingkis/ubahtanam_rendeng/' . $peng->id, 'Ubah') . " | " .
                            anchor('cipamingkis/hapustanam_rendeng/' . $peng->id, 'Hapus', array('onClick' => "return confirm('Anda yakin Data .$peng->nama_areal. akan dihapus? ')"));
                            ?>
                      </td>
                    </tr>
                    <?php $i++;
                endforeach;
                ?>
  </table>
            <!--/div-->
            <br><br>
            <a href="<?php echo base_url() ?>cipamingkis/tambahtanam_rendeng/" id="submit" class="tambah">Tambah</a>

<!-- end #content -->
</div>
        </div>
        
		<div class="clear"></div>
    </div>
</div>