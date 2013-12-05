
<!--#content -->
<title>
    <?php echo $title; ?>
</title>

		<div id="content">
          <div class="box">
  <h2>Data Pegawai</h2>
  <p>
    <?php $i = 1; ?>
  </p>
  <table id="tbl_sipeg" border="0" cellspacing="1" cellpadding="2" class="display">
                <tr>
                    <th><div align="center">No</div></th>
                    <th><div align="center">Nip</div></th>
                    <th><div align="center">Nama</div></th>
                    <th><div align="center">Temp. Lahir</div></th>
                    <th><div align="center">Tgl. Lahir</div></th>
                    <th><div align="center">Alamat</div></th>
                    <th><div align="center">Seksi</div></th>
                    <th><div align="center">Proses</div></th>
    </tr>
                <?php foreach ($pegawai->result() as $peg): ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $peg->nip; ?></td>
                        <td><?php echo $peg->nama; ?></td>
                        <td><?php echo $peg->tempat_lahir; ?></td>
                        <td><?php echo $peg->tanggal_lahir; ?></td>
                        <td><?php echo $peg->alamat; ?></td>
                        <td><?php echo $peg->seksi; ?></td>
                        <td><?php
                            echo anchor('admin/ubahpegawai/' . $peg->id, 'Ubah') . "  " .
                            anchor('admin/hapuspegawai/' . $peg->id, 'Hapus', array('onClick' => "return confirm('Anda yakin nip .$peg->nip. akan dihapus? ')"));
                            ?>
                        </td>
                        
                    </tr>
                    <?php
                    $i++;
                endforeach;
                ?>
  </table>
            <br><br>
<a href="<?php echo base_url() ?>admin/tambahpegawai/" id="submit" class="tambah">Tambah</a>
</div>
</div>
        
		<div class="clear"></div>
    </div>
</div>