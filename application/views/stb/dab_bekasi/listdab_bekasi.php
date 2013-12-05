
<!--#content -->
<title>
    <?php echo $title; ?>
</title>
<div id="content">
          <div class="box">
            <h2>Data Debet Air Bendung Bekasi</h2>
            <p>&nbsp;</p>
            <?php $i = 1; ?>
            <table id="tbl_sipeg" border="0" cellspacing="1" cellpadding="2" class="display">
                <tr>
                    <th>No</th>
                    <th>Tanggal Input</th>
                    <th>Jam</th>
                    <th>Limpasan</th>
                    <th>Suplesi dari BTb 45b</th>
                    <th>Sumber Setempat/ Kali Bekasi</th>
                    <th>Dimanfaatkan ke DKI Jakarta</th>
                    <th>Dimanfaatkan ke Bekasi Utara</th>
                    <th>Q1 (Dimanfaatkan)</th>
                    <th>Q2</th>
                    <th>Keterangan</th>
                    <th>Proses</th>
                </tr>
                <?php foreach ($dab_bekasi->result() as $peng): ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $peng->tanggal_input; ?></td>
                        <td><?php echo $peng->jam; ?></td>
                        <td><?php echo $peng->limpasan; ?></td>
                        <td><?php echo $peng->suplesi_dari_btb45b; ?></td>
                        <td><?php echo $peng->sumber_setempat; ?></td>
                        <td><?php echo $peng->dimanfaatkan_ke_dki; ?></td>
                        <td><?php echo $peng->dimanfaatkan_ke_bekasiutara; ?></td>
                        <td><?php echo $peng->q1_dimanfaatkan; ?></td>
                        <td><?php echo $peng->q2; ?></td>
                        <td><?php echo $peng->keterangan; ?></td>
                        <td><?php
                            echo anchor('stb/ubahdab_bekasi/' . $peng->id, 'Ubah') . " | " .
                            anchor('stb/hapusdab_bekasi/' . $peng->id, 'Hapus', array('onClick' => "return confirm('Anda yakin TMA .$peng->tanggal_input. akan dihapus? ')"));
                            ?>
                        </td>
                    </tr>
                    <?php $i++;
                endforeach;
                ?>
  </table>
            <!--/div-->
            <br><br>
            <a href="<?php echo base_url() ?>stb/tambahdab_bekasi/" id="submit" class="tambah">Tambah</a>

<!-- end #content -->
</div>
        </div>
        
		<div class="clear"></div>
    </div>
</div>