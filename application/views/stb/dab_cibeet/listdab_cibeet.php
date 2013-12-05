
<!--#content -->
<title>
    <?php echo $title; ?>
</title>
<div id="content">
          <div class="box">
            <h2>Data Debet Air Bendung Cibeet</h2>
            <p>&nbsp;</p>
            <?php $i = 1; ?>
            <table id="tbl_sipeg" border="0" cellspacing="1" cellpadding="2" class="display">
                <tr>
                    <th>No</th>
                    <th>Tanggal Input</th>
                    <th>Jam</th>
                    <th>Limpasan</th>
                    <th>Bocoran</th>
                    <th>Q1 (Suplesi Ke Tarum Barat)</th>
                    <th>Q2 (Kali Cibeet)</th>
                    <th>Keterangan</th>
                    <th>Proses</th>
                </tr>
                <?php foreach ($dab_cibeet->result() as $peng): ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $peng->tanggal_input; ?></td>
                        <td><?php echo $peng->jam; ?></td>
                        <td><?php echo $peng->limpasan; ?></td>
                        <td><?php echo $peng->bocoran; ?></td>
                        <td><?php echo $peng->q1_suplesi_ketarumbarat; ?></td>
                        <td><?php echo $peng->q2_kalicibeet; ?></td>
                        <td><?php echo $peng->keterangan; ?></td>
                        <td><?php
                            echo anchor('stb/ubahdab_cibeet/' . $peng->id, 'Ubah') . " | " .
                            anchor('stb/hapusdab_cibeet/' . $peng->id, 'Hapus', array('onClick' => "return confirm('Anda yakin TMA .$peng->q2_kalicibeet. akan dihapus? ')"));
                            ?>
                        </td>
                    </tr>
                    <?php $i++;
                endforeach;
                ?>
  </table>
            <!--/div-->
            <br><br>
            <a href="<?php echo base_url() ?>stb/tambahdab_cibeet/" id="submit" class="tambah">Tambah</a>

<!-- end #content -->
</div>
        </div>
        
		<div class="clear"></div>
    </div>
</div>