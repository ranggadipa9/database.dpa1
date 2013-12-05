<div id="footer">
  <div class="footer-content">
    <div class="footer-box">
      <h4>Tentang Aplikasi</h4>
      <p> Sistem Informasi ini berisi tentang pengelolaan database yang ada di lingkungan Divisi Pengelolaan Air I yang terdiri dari 5 seksi diantaranya Seksi Tarum Barat, Seksi Lemahabang, Seksi Cipamingkis, Seksi Penyedia Air Baku dan Seksi Bekasi. </p>
    </div>
    <?php $akses = $this->session->userdata('jenis'); ?>
    <div class="footer-box">
      <h4>Operasi</h4>
      <ul>
        <li><a href="<?php echo base_url() . $akses; ?>/curah_hujan">Curah Hujan</a></li>
        <li><a href="<?php echo base_url() . $akses; ?>/tanam_rendeng">Tanam Rendeng</a></li>
        <li><a href="<?php echo base_url() . $akses; ?>/tanam_gadu">Tanam Gadu</a></li>
        <li><a href="<?php echo base_url() . $akses; ?>/invent_area">Inventaris Areal Tanam</a></li>
        <li><a href="<?php echo base_url() . $akses; ?>/pemberian_air">Pemberian Air</a></li></ul>
    </div>
    <div class="footer-box">
      <h4>Pemeliharaan</h4>
      <ul>
			<?php if ($akses == 'admin') { ?>
        <li><a href="<?php echo base_url() . $akses; ?>/progres_pekerjaan">Progres Pekerjaan P &amp; P</a> </li>
        <li><a href="<?php echo base_url() . $akses; ?>/progres_pekerjaan_investasi">Progres Pekerjaan Investasi</a></li>

        <li><a href="#">Kondisi Sarana &amp; Prasarana  SDA</a></li>
        <li><a href="#">Mechanical &amp; Elektrikal</a></li>
            <?php } ?>
        <li><a href="<?php echo base_url() . $akses; ?>/kejadian">Laporan Kejadian</a></li>
      
      </ul>
    </div>
    <div class="footer-box end-footer-box">
      <h4>Pengusahaan</h4>
      <ul>
        <li><a href="<?php echo base_url() . $akses; ?>/pemakaian_air">Pemakaian Air</a></li>
        <li><a href="<?php echo base_url() . $akses; ?>/laporan_setoran_sipls">Inventarisasi Lahan</a></li>
      </ul>
    </div>
    <div class="clear"></div>
  </div>
  <div id="footer-links">
    <p>Copyright &copy; Divisi Pengelolaan Air I - Perum Jasa Tirta II 2013. reserve all right</p>
  </div>
</div>
