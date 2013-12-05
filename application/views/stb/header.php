    <div id="nav">
       <?php $akses = $this->session->userdata('jenis'); ?>
    	<ul class="sf-menu dropdown">
        	<li class="selected"><a href="<?php echo base_url() . $akses; ?>">Home</a></li>
            <li><a class="has_submenu" href="#">Operasi</a>
                <ul>
                	<li><a href="<?php echo base_url() . $akses; ?>/tanam_rendeng">Tanam Rendeng</a></li>
                	<li><a href="<?php echo base_url() . $akses; ?>/tanam_gadu">Tanam Gadu</a></li>
                	<li><a href="<?php echo base_url() . $akses; ?>/curah_hujan">Curah Hujan</a></li>
                	<li><a href="<?php echo base_url() . $akses; ?>/pemberian_air">Pemberian Air</a></li>
                    <li><a href="<?php echo base_url() . $akses; ?>/invent_area">Inventaris Areal Tanam</a></li>
                     <li><a href="#">Debet Air</a>
                    	<ul>
                        	<li><a href="<?php echo base_url() . $akses; ?>/dab_cikarang">Bendung Cikarang</a>
                            <li><a href="<?php echo base_url() . $akses; ?>/dab_bekasi">Bendung Bekasi</a>
                            <li><a href="<?php echo base_url() . $akses; ?>/dab_cibeet">Bendung Cibeet</a>
                        </ul>
                    </li>
            	</ul>
            </li>
            <?php if ($akses == 'admin') { ?>
            <li><a class="has_submenu" href="#">Pemeliharaan</a>
            	<ul>
                	<li><a href="<?php echo base_url() . $akses; ?>/progres_pekerjaan">Progres Pekerjaan P & P</a></li>
                    <li><a href="<?php echo base_url() . $akses; ?>/progres_pekerjaan_investasi">Progres Pekerjaan Investasi</a></li>

                    <li><a href="#">Kondisi Sarana & Prasarana SDA</a></li>
                    <li><a href="#">Mechanical dan Elektrikal</a></li>
                </ul>
            </li>
            <?php } ?>
            <li><a class="has_submenu" href="#">Pengusahaan</a>
            	<ul>
                	<li><a href="<?php echo base_url() . $akses; ?>/pemakaian_air">Pemakaian Air</a></li>
					<li><a href="#">Inventarisasi Lahan</a>
                    	<ul>
                        	<li><a href="<?php echo base_url() . $akses; ?>/populasi_sipls">Populasi SIPLS</a></li>
                    		<li><a href="<?php echo base_url() . $akses; ?>/setoran_sipls">Setoran SIPLS</a></li>
                        </ul>
                    </li>
                                    </ul>
            </li>
            <li><a href="<?php echo base_url() . $akses; ?>/kejadian">Laporan Kejadian</a></li>
            <li><a class="has_submenu" href="#">Rekapitulasi</a>
            <ul>
                	<li><a href="<?php echo base_url() . $akses; ?>/laporantanamrendeng">Tanam Rendeng</a></li>
                	<li><a href="<?php echo base_url() . $akses; ?>/laporantanamgadu">Tanam Gadu</a></li>
                	<li><a href="<?php echo base_url() . $akses; ?>/laporancurahhujan">Curah Hujan</a></li>
                	<li><a href="<?php echo base_url() . $akses; ?>/laporanpemberianair">Pemberian Air</a></li>
                    <li><a href="<?php echo base_url() . $akses; ?>/laporaninventarea">Inventaris Areal Tanam</a></li>
                    <?php if ($akses == 'admin') { ?>
                    <li><a href="<?php echo base_url() . $akses; ?>/laporanprogrespekerjaan">Progres Pekerjaan P & P</a></li>
                    <li><a href="<?php echo base_url() . $akses; ?>/laporanprogrespekerjaaninvestasi">Progres Pekerjaan Investasi</a></li>

                    <li><a href="#">Kondisi Sarana & Prasarana SDA</a></li>
                    <li><a href="#">Mechanical & Elektrkal</a></li>
            		<?php } ?>
                    <li><a href="<?php echo base_url() . $akses; ?>/laporanpemakaianair">Pemakaian Air</a></li>
                    <li><a href="<?php echo base_url() . $akses; ?>/laporan_setoran_sipls">Inventarisasi Lahan</a></li>
                    <li><a href="<?php echo base_url() . $akses; ?>/laporankejadian">Laporan Kejadian</a></li>
                    <li><a href="#">Debet Air</a>
                    	<ul>
                        	<li><a href="<?php echo base_url() . $akses; ?>/laporan_dab_cikarang">Bendung Cikarang</a>
                            <li><a href="<?php echo base_url() . $akses; ?>/laporan_dab_bekasi">Bendung Bekasi</a>
                            <li><a href="<?php echo base_url() . $akses; ?>/laporan_dab_cibeet">Bendung Cibeet</a></a>
                        </ul>
                    </li>
           	  </ul>
            </li>
			<?php if ($akses == 'admin') { ?>
            <li><a href="#" class="has_submenu">Master Data</a>
					<ul>
						<li><a href = "<?php echo base_url() . $akses; ?>/datapegawai" >Daftar Oparator</a></li>
                        <li><a href = "<?php echo base_url() . $akses; ?>/seksi" >Daftar Seksi</a></li>
                        <li><a href = "<?php echo base_url() . $akses; ?>/pengamat" >Daftar Pengamat</a></li>
                        <li><a href = "<?php echo base_url() . $akses; ?>/pelanggan" >Daftar Pelanggan</a></li>
                        <li><a href = "<?php echo base_url() . $akses; ?>/balai" >Daftar Balai</a></li>
                        <li><a href = "<?php echo base_url() . $akses; ?>/mata_anggaran" >Mata Anggaran</a></li>
                        <li><a href = "<?php echo base_url() . $akses; ?>/golongan_tanam" >Golongan Tanam</a></li>
                        <li><a href = "<?php echo base_url() . $akses; ?>/saluran_sekunder" >Daftar Saluran Sekunder</a></li>
                        <li><a href = "<?php echo base_url() . $akses; ?>/saluran_tanam" >Daftar Saluran Tanam</a></li>
                        <li><a href = "<?php echo base_url() . $akses; ?>/bendung" >Daftar Bendung</a></li>
                        <li><a href = "<?php echo base_url() . $akses; ?>/pengguna">Daftar Pengguna</a></li>
					</ul>
				</li>
                <?php } ?>
            <li><a href="<?php echo base_url() . $akses; ?>/logout">Logout</a></li>
        </ul>
    </div>