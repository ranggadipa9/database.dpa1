
<!--#content -->
<title>
    <?php echo $title; ?>
</title>
	<div id="content">
          <div class="box">
     
            <h2 align="center">Daftar Populasi Penggunaan Lahan Yang Harus Diperpanjang</h2>
            <p>&nbsp;</p>
                       
              <?php $i = 1; ?>
            </p>
            <table id="tbl_sipeg" border="0" cellspacing="1" cellpadding="2" class="display">
                <tr>
                    <th><div align="center">No</div></th>
                    <th><div align="center">No. Sippls</div></th>
                    <th><div align="center"> Pemegang SIPLS</div></th>
                    <th><div align="center">Berlaku Mulai</div></th>
                    <th><div align="center">Berlaku Akhir</div></th>
                    <th><div align="center">Seksi</div></th>
                    <th><div align="center">Lokasi</div></th>
                    <th colspan="2"><div align="center">Penggunaan</div></th>
                    <th><div align="center">Tgl. Perpanjang</div></th>
                    <th><div align="center">SIPPLS</div></th>
                    <th><div align="center">Proses</div></th>
                </tr>
                <?php foreach ($perpanjang_lahan->result() as $peng): ?>
                    <tr>
                      <td width="3%" rowspan="19"><?php echo $i; ?></td>
                      <td align="center" width="6%" rowspan="19"><?php echo $peng->no_sipls; ?></td>
                      <td width="8%" rowspan="19"><?php echo $peng->nama; ?></td>
                      <td width="9%" rowspan="19" align="center"><?php echo $peng->berlaku_mulai; ?></td>
                      <td width="9%" rowspan="19" align="center"><?php echo $peng->berlaku_akhir; ?></td>
                      <td width="9%" rowspan="19"><?php echo $peng->seksi; ?></td>
                      <td width="8%" rowspan="19"><?php echo $peng->lokasi; ?></td>
                      <td width="20%">Penggunaan 1</td>
                      <td width="17%"><?php echo $peng->penggunaan_1; ?></td>
                      <td align="center" width="5%" rowspan="19">&nbsp;</td>
                      <td align="center" width="5%" rowspan="19">&nbsp;</td>
                      <td align="center" width="5%" rowspan="19"><?php
                            echo anchor('admin/ubahperpanjang_lahan/' . $peng->id, 'Ubah') . "  " .
							anchor('admin/tambahperpanjang_lahan/' . $peng->id, 'Perpanjang');
                            //anchor ('admin/hapusperpanjang/' . $peng->id, 'Hapus', array('onClick' => "return confirm('Anda yakin Nama Pemegang SIPLS .$peng->no_sipls. akan dihapus? ')"));
                            ?>                      </td>
                    </tr>
                    <tr>
                      <td>Luas 1</td>
                      <td align="right"><?php echo $peng->luas_1; ?></td>
                    </tr>
                    <tr>
                      <td>Tarif 1</td>
                      <td align="right"><?php echo $peng->tarif_1; ?></td>
                    </tr>
                    <tr>
                      <td>Penggunaan 2</td>
                      <td><?php echo $peng->penggunaan_2; ?></td>
                    </tr>
                    <tr>
                      <td>Luas 2</td>
                      <td align="right"><?php echo $peng->luas_2; ?></td>
                    </tr>
                    <tr>
                      <td>Tarif 2</td>
                      <td align="right"><?php echo $peng->tarif_2; ?></td>
                    </tr>
                    <tr>
                      <td>Penggunaan 3</td>
                      <td><?php echo $peng->penggunaan_3; ?></td>
                    </tr>
                    <tr>
                      <td>Luas 3</td>
                      <td align="right"><?php echo $peng->luas_3; ?></td>
                    </tr>
                    <tr>
                      <td>Tarif 3</td>
                      <td align="right"><?php echo $peng->tarif_3; ?></td>
                    </tr>
                    <tr>
                      <td>Penggunaan 4</td>
                      <td><?php echo $peng->penggunaan_4; ?></td>
                    </tr>
                    <tr>
                      <td>Luas 4</td>
                      <td align="right"><?php echo $peng->luas_4; ?></td>
                    </tr>
                    <tr>
                      <td>Tarif 4</td>
                      <td align="right"><?php echo $peng->tarif_4; ?></td>
                    </tr>
                    <tr>
                      <td>Penggunaan 5</td>
                      <td><?php echo $peng->penggunaan_5; ?></td>
                    </tr>
                    <tr>
                      <td>Luas 5</td>
                      <td align="right"><?php echo $peng->luas_5; ?></td>
                    </tr>
                    <tr>
                      <td>Tarif 5</td>
                      <td align="right"><?php echo $peng->tarif_5; ?></td>
                    </tr>
                    <tr>
                      <td><strong>Jumlah</strong></td>
                      <td align="right"><?php echo $peng->jumlah; ?></td>
                    </tr>
                    <tr>
                      <td>PPn (10%)</td>
                      <td align="right"><?php echo $peng->ppn; ?></td>
                    </tr>
                    <tr>
                      <td>Administrasi</td>
                      <td align="right"><?php echo $peng->administrasi; ?></td>
                    </tr>
                    <tr>
                        <td><strong>Jumlah Sewa</strong></td>
                        <td align="right"><?php echo $peng->jumlah_sewa; ?></td>
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