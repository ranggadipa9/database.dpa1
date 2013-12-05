
<!--#content -->
<title>
    <?php echo $title; ?>
</title>
	<div id="content">
          <div class="box">
         <h2>Daftar Mata Anggaran</h2>
    <p>
            <?php $i = 1; ?>
     </p>
            <table id="tbl_sipeg" border="0" cellspacing="1" cellpadding="2" class="display">
                <tr>
                    <th>No</th>
                    <th>Mata Anggaran</th>
                    <th>Proses</th>
                </tr>
                <?php foreach ($mata_anggaran->result() as $gol): ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $gol->mata_anggaran; ?></td>
                        <td><?php
                            echo anchor('admin/ubahmata_anggaran/' . $gol->id, 'Ubah') . "  " .
                            anchor('admin/hapusmata_anggaran/' . $gol->id, 'Hapus', array('onClick' => "return confirm('Anda yakin mata anggaran $gol->mata_anggaran akan dihapus? ')"));
                            ?>
                        </td>
                    </tr>
                    <?php $i++;
                endforeach;
                ?>
            </table>
            <br><br>
            <a href="<?php echo base_url() ?>admin/tambahmata_anggaran/" id="submit" class="tambah">Tambah</a>

<!-- end #content -->
</div>
        </div>
        
		<div class="clear"></div>
    </div>
</div>