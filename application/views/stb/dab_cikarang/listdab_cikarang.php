
<!--#content -->
<title>
    <?php echo $title; ?>
</title>
<div id="content">
          <div class="box">
            <h2>Data Debet Air Bendung Cikarang</h2>
            <p>&nbsp;</p>
            <?php $i = 1; ?>
            <table id="tbl_sipeg" border="0" cellspacing="1" cellpadding="2" class="display">
                <tr>
                    <th>No</th>
                    <th>Tanggal Input</th>
                    <th>Jam</th>
                    <th>Limpasan</th>
                    <th>Bocoran</th>
                    <th>Pintu Penguras</th>
                    <th>Suplesi dari BTb 34b</th>
                    <th>Dimanfaatkan ke Barat Bekasi</th>
                    <th>Dimanfaatkan ke Sukatani</th>
                    <th>Sumber Setempat</th>
                    <th>Q1 Dimanfaatkan</th>
                    <th>Q2</th>
                    <th>Keterangan</th>
                    <th>Proses</th>
                </tr>
                <?php foreach ($dab_cikarang->result() as $peng): ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $peng->tanggal_input; ?></td>
                        <td><?php echo $peng->jam; ?></td>
                        <td><?php echo $peng->limpasan; ?></td>
                        <td><?php echo $peng->bocoran; ?></td>
                        <td><?php echo $peng->pintu_penguras; ?></td>
                        <td><?php echo $peng->suplesi_dari_btb34b; ?></td>
                        <td><?php echo $peng->dimanfaatkan_ke_bekasibarat; ?></td>
                        <td><?php echo $peng->dimanfaatkan_ke_sukatani; ?></td>
                        <td><?php echo $peng->sumber_setempat; ?></td>
                        <td><?php echo $peng->q1_dimanfaatkan; ?></td>
                        <td><?php echo $peng->q2; ?></td>
                        <td><?php echo $peng->keterangan; ?></td>
                        <td><?php
                            echo anchor('stb/ubahdab_cikarang/' . $peng->id, 'Ubah') . " | " .
                            anchor('stb/hapusdab_cikarang/' . $peng->id, 'Hapus', array('onClick' => "return confirm('Anda yakin TMA .$peng->q2. akan dihapus? ')"));
                            ?>
                        </td>
                    </tr>
                    <?php $i++;
                endforeach;
                ?>
            </table>
            <!--/div-->
            <br><br>
            <a href="<?php echo base_url() ?>stb/tambahdab_cikarang/" id="submit" class="tambah">Tambah</a>

<!-- end #content -->
</div>
        </div>
        
		<div class="clear"></div>
    </div>
</div>