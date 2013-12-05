
<!--#content -->
<title>
    <?php echo $title; ?>
</title>
<div id="content">
          <div class="box"><h2>Data Inventaris Areal Tanam</h2>
            <p>&nbsp;</p>
            <?php $i = 1; ?>
            <table id="tbl_sipeg" border="0" cellspacing="1" cellpadding="2" class="display">
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Daerah Irigasi</th>
                    <th>Saluran Sekunder</th>
                    <th>Blok</th>
                    <th>Luas Th.Ialu (Ha)</th>
                    <th>Luas Th.Ini (Ha)</th>
                    <th>Selisih</th>
                    <th>Pengamat</th>
                    <th>Seksi</th>
                    <th>Kecamatan</th>
                    <th>Kabupaten</th>
                    <th>Keterangan</th>
                    <th>Proses</th>
                </tr>
                <?php foreach ($invent_area->result() as $peng): ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $peng->tanggal; ?></td>
                        <td><?php echo $peng->daerah_irigasi; ?></td>
                        <td><?php echo $peng->saluran_sekunder; ?></td>
                        <td><?php echo $peng->blok; ?></td>
                        <td><?php echo $peng->tahun_lalu; ?></td>
                        <td><?php echo $peng->tahun_ini; ?></td>
                        <td><?php echo $peng->selisih; ?></td>
                        <td><?php echo $peng->pengamat; ?></td>
                        <td><?php echo $peng->seksi; ?></td>
                        <td><?php echo $peng->kecamatan; ?></td>
                        <td><?php echo $peng->kabupaten; ?></td>
                        <td><?php echo $peng->keterangan; ?></td>
                        <td><?php
                            echo anchor('pab/ubahinvent_area/' . $peng->id, 'Ubah') . " | " .
                            anchor('pab/hapusinvent_area/' . $peng->id, 'Hapus', array('onClick' => "return confirm('Anda yakin blok .$peng->blok. akan dihapus? ')"));
                            ?>
                        </td>
                    </tr>
                    <?php $i++;
                endforeach;
                ?>
  </table>
            <!--/div-->
            <br><br>
            <a href="<?php echo base_url() ?>pab/tambahinvent_area/" id="submit" class="tambah">Tambah</a>

<!-- end #content -->
</div>
        </div>
        
		<div class="clear"></div>
    </div>
</div>