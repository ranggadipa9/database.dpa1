
<!--#content -->
<title>
    <?php echo $title; ?>
</title>
	<div id="content">
          <div class="box">
     
            <h2>Data Curah Hujan</h2>
            <p>&nbsp;</p>
            <?php $i = 1; ?>
            <table id="tbl_sipeg" border="0" cellspacing="1" cellpadding="2" class="display">
                <tr>
                    <th><div align="center">No</div></th>
                    <th><div align="center">Tanggal</div></th>
                    <th><div align="center">Nomor</div></th>
                    <th><div align="center">Seksi</div></th>
                    <th><div align="center">Nama Stasiun</div></th>
                    <th><div align="center">Curah Hujan</div></th>
                    <th><div align="center">Keterangan</div></th>
                    <th><div align="center">Proses</div></th>
                </tr>
                <?php foreach ($curah_hujan->result() as $peng): ?>
                    <tr>
                        <td width="2%"><?php echo $i; ?></td>
                        <td width="5%"><?php echo $peng->tanggal_input; ?></td>
                        <td width="5%"><?php echo $peng->nomor; ?></td>
                        <td width="15%"><?php echo $peng->seksi; ?></td>
                        <td width="15%"><?php echo $peng->nama_stasiun; ?></td>
                        <td width="5%"><?php echo $peng->curah_hujan; ?></td>
                        <td width="2%"><?php echo $peng->keterangan; ?></td>
                        <td width="10%"><?php
                            echo anchor('stb/ubahcurah_hujan/' . $peng->id, 'Ubah') . "  " .
                            anchor('stb/hapuscurah_hujan/' . $peng->id, 'Hapus', array('onClick' => "return confirm('Anda yakin nomor .$peng->nomor. akan dihapus? ')"));
                            ?>
                        </td>
                    </tr>
                    <?php $i++;
                endforeach;
                ?>
  </table>
            <!--/div-->
            <br><br>
            <a href="<?php echo base_url() ?>stb/tambahcurah_hujan/" id="submit" class="tambah">Tambah</a>

<!-- end #content -->
</div>
        </div>
        
		<div class="clear"></div>
    </div>
</div>