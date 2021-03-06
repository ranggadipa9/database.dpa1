<script type="text/javascript">

    $(document).ready(function() {
        base_url = "<?php base_url() ?>";
        $('#btn-cetak').click(function() {
            seksi = $('#cmbseksi').val();
            tgl1 = $('#tgl_awal').val();
            tgl2 = $('#tgl_akhir').val();

            if ($.trim(tgl1) == "") {
                alert('Tanggal awal tidak boleh kosong.');
                $('#tgl_awal').focus();
                return;
            }
            if ($.trim(tgl2) == "") {
                alert('Tanggal akhir tidak boleh kosong.');
                $('#tgl_akhir').focus();
                return;
            }

            w = window.open(base_url + 'cetaklaporancurahhujan/' + seksi + '/' + tgl1 + '/' + tgl2);
        });
    });
</script>
<title>
    <?php echo $title; ?>
</title>

		<div id="content">
          <div class="box">
<h2>Laporan Curah Hujan</h2>
<p><br/>
  
  Seksi :
  <br/>
  <select id="cmbseksi">
    <?php if ($this->session->userdata('jenis')=='admin') {?>
    <option value="Semua">SEMUA</option>
    <?php } ?>
    <?php
    $seksi= $this->mseksi->getseksi();
    foreach ($seksi->result() as $bag):
        ?>
    <option value="<?php echo $bag->id; ?>"><?php echo $bag->seksi ?></option>
    <?php endforeach; ?>
  </select>
  
  <br/>
  <br/>
  
  Periode Curah Hujan :
  <br/>
  <input type="text" id="tgl_awal" maxlength="10" size="10"> s/d
  <input type="text" id="tgl_akhir" maxlength="10" size="10">
  <font color="red">(Format : dd-mm-yyyy)</font>
  
  <br/>
  <br/>
  <input type="button" value="Cetak" id="btn-cetak"/>
</p>
<p>&nbsp;</p>
          </div>
        </div>
        
		<div class="clear"></div>
    </div>
</div>