
<!--#content -->
<title>
    <?php echo $title; ?>
</title>
	<div id="content">
          <div class="box">
     
            <h2>Data Progres Pekerjaan</h2>
            <p>&nbsp;</p>
            <?php $i = 1; ?>
            <table id="tbl_sipeg" border="0" cellspacing="1" cellpadding="2" class="display">
                <tr>
                    <th>No</th>
                    <th>Sub MA</th>
                    <th>Uraian Pekerjaan</th>
                    <th>Biaya Program</th>
                    <th>Biaya Realisasi</th>
                    <th>Biaya Sisa</th>
                    <th>Nomor Kontrak</th>
                    <th>Tanggal Kontrak</th>
                    <th>Rekanan</th>
                    <th>Waktu</th>
                    <th>Progres</th>
                    <th>Keterangan</th>
                    <th>Proses</th>
                </tr>
                <?php foreach ($progres_pekerjaan->result() as $gol): ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $gol->mata_anggaran; ?></td>
                        <td><?php echo $gol->uraian_pekerjaan; ?></td>
                        <td><div align="right"><?php echo $gol->biaya_program; ?></div></td>
                        <td><div align="right"><?php echo $gol->biaya_realisasi; ?></div></td>
                        <td><div align="right"><?php echo $gol->biaya_sisa; ?></div></td>
                        <td><?php echo $gol->nomor_kontrak; ?></td>
                        <td><?php echo $gol->tanggal_kontrak; ?></td>
                        <td><?php echo $gol->rekanan; ?></td>
                        <td><?php echo $gol->waktu; ?></td>
                        <td><?php echo $gol->progres; ?></td>
                        <td><?php echo $gol->keterangan; ?></td>
                        <td><?php
                            echo anchor('admin/ubahprogres_pekerjaan/' . $gol->id, 'Ubah') . "  " .
                            anchor('admin/hapusprogres_pekerjaan/' . $gol->id, 'Hapus', array('onClick' => "return confirm('Anda yakin Sub MA $gol->mata_anggaran akan dihapus? ')"));
                            ?>
                        </td>
                    </tr>
                    <?php $i++;
                endforeach;
                ?>
            </table>
            <br><br>
            <a href="<?php echo base_url() ?>admin/tambahprogres_pekerjaan/" id="submit" class="tambah">Tambah</a>
        
<!-- end #content -->
</div>
        </div>
        
		<div class="clear"></div>
    </div>
</div>