<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Bekasi extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model(array('','','','mtanam_rendeng','mtanam_gadu',
                                'msaluran_tanam', 'mbendung','mseksi', 'mbalai', 'msaluran_sekunder', 'mprogres_pekerjaan', 'mcurah_hujan', 
                                '', 'minvent_area', 'mpemakaian_air','mpemberian_air', '','',
                                'mdab_cbl','mdab_cikeas','mdab_cipamingkis','mdab_jembatan_bojong','mdab_lemahabang',
                                 'mdab_bekasi','mdab_cibeet','mdab_cikarang','mkejadian'));
        if (!$this->session->userdata('logged_in') && !$this->session->userdata('pengguna'))
            redirect(base_url(), 'refresh');
    }
    
    function index() {
       $data['title'] = 'Bekasi:: Aplikasi Database DPA I PJTII';
        $data['header'] = 'bekasi/header';
        $data['slider'] = 'bekasi/slider';
        $data['page'] = 'bekasi/page/home';
        $data['footer'] = 'bekasi/footer';
        $this->load->view('bekasi/template', $data);
    }
            
    function logout() {
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('pengguna');
        $this->session->unset_userdata('jenis');
        $this->session->unset_userdata('bagian');
        $this->session->unset_userdata('logged_in');
        redirect(site_url());
    }
    
    /* INVENTARIS AREA LAHAN */

    function invent_area() {
        $data['title'] = 'Bekasi:: Data Inventaris Area Lahan Tanam';
        $data['header'] = 'bekasi/header';
        $data['page'] = 'bekasi/invent_area/listinvent_area';
        $data['footer'] = 'bekasi/footer';
        $data['invent_area'] = $this->minvent_area->getinvent_area();
        $this->load->view('bekasi/template', $data);
    }

    function tambahinvent_area() {
        $this->load->model(array('minvent_area', 'mseksi','mpengamat','msaluran_sekunder'));
        $data['title'] = 'Bekasi:: Tambah Data Inventaris Area Lahan Tanam';
        $data['header'] = 'bekasi/header';
        $data['page'] = 'bekasi/invent_area/addinvent_area';
        $data['footer'] = 'bekasi/footer';
        $this->load->view('bekasi/template', $data);
    }

    function simpaninvent_area() {
        $this->load->model(array('minvent_area', 'mseksi','mpengamat','msaluran_sekunder'));
        $tanggal= $this->input->post('tanggal', TRUE);
	$daerah_irigasi= $this->input->post('daerah_irigasi', TRUE);
        $id_saluran_sekunder= $this->input->post('id_saluran_sekunder', TRUE);
        $blok = $this->input->post('blok', TRUE);
        $tahun_lalu = $this->input->post('tahun_lalu', TRUE);
        $tahun_ini = $this->input->post('tahun_ini', TRUE);
        $selisih= $tahun_lalu - $tahun_ini;
        $id_pengamat = $this->input->post('id_pengamat', TRUE);
        $id_seksi = $this->input->post('id_seksi', TRUE);
        $kecamatan = $this->input->post('kecamatan', TRUE);
        $kabupaten= $this->input->post('kabupaten', TRUE);
        $keterangan = $this->input->post('keterangan', TRUE);
        $this->minvent_area->addinvent_area($tanggal, $daerah_irigasi, $id_saluran_sekunder, $blok, $tahun_lalu, $tahun_ini, $selisih, $id_pengamat, $id_seksi, $kecamatan, $kabupaten, $keterangan);
        redirect('bekasi/invent_area');
    }

    function ubahinvent_area() {
        $id = $this->uri->segment(3);
        $this->load->model(array('minvent_area', 'mseksi','mpengamat','msaluran_sekunder'));
        $data['title'] = $this->uri->segment(4) . 'Bekasi:: Ubah Data Inventaris Area Lahan Tanam';
        $data['header'] = 'bekasi/header';
        $data['invent_area'] = $this->minvent_area->getinvent_areaid($id);
        $data['page'] = 'bekasi/invent_area/editinvent_area';
        $data['footer'] = 'bekasi/footer';
        $this->load->view('bekasi/template', $data);
    }

    function simpanubahinvent_area() {
        $this->load->model(array('minvent_area', 'mseksi','mpengamat','msaluran_sekunder'));
        $id = $this->input->post('id', TRUE);
        $tanggal= $this->input->post('tanggal', TRUE);
	$daerah_irigasi= $this->input->post('daerah_irigasi', TRUE);
        $id_saluran_sekunder= $this->input->post('id_saluran_sekunder', TRUE);
        $blok = $this->input->post('blok', TRUE);
        $tahun_lalu = $this->input->post('tahun_lalu', TRUE);
        $tahun_ini = $this->input->post('tahun_ini', TRUE);
        $selisih= $tahun_lalu - $tahun_ini;
        $id_pengamat = $this->input->post('id_pengamat', TRUE);
        $id_seksi = $this->input->post('id_seksi', TRUE);
        $kecamatan = $this->input->post('kecamatan', TRUE);
        $kabupaten= $this->input->post('kabupaten', TRUE);
        $keterangan = $this->input->post('keterangan', TRUE);
        $this->minvent_area->updateinvent_area($id, $tanggal, $daerah_irigasi, $id_saluran_sekunder, $blok, $tahun_lalu, $tahun_ini, $selisih, $id_pengamat, $id_seksi, $kecamatan, $kabupaten, $keterangan);
        redirect('bekasi/invent_area');
    }

    function hapusinvent_area() {
        $id = $this->uri->segment(3);
        $this->load->model(array('minvent_area'));
        $this->minvent_area->delinvent_area($id);
        redirect('bekasi/invent_area');
        echo $id;
    }
    


/* PEMAKAIAN AIR */

    function pemakaian_air() {
        $data['title'] = 'Bekasi:: Data Pemakaian Air Kepada Pelanggan';
        $data['header'] = 'bekasi/header';
        $data['page'] = 'bekasi/pemakaian_air/listpemakaian_air';
        $data['footer'] = 'bekasi/footer';
        $data['pemakaian_air'] = $this->mpemakaian_air->getpemakaian_air();
        $this->load->view('bekasi/template', $data);
    }

    function tambahpemakaian_air() {
        $this->load->model(array('mpemakaian_air', 'mseksi','mpelanggan','mbalai'));
        $data['title'] = 'Bekasi:: Tambah Data Pemakaian Air Oleh Perusahaan';
        $data['header'] = 'bekasi/header';
        $data['page'] = 'bekasi/pemakaian_air/addpemakaian_air';
        $data['footer'] = 'bekasi/footer';
        $this->load->view('bekasi/template', $data);
    }

    function simpanpemakaian_air() {
        $this->load->model(array('mpemakaian_air', 'mseksi','mpelanggan','mbalai'));
        $tanggal_input= $this->input->post('tanggal_input', TRUE);
	$id_balai= $this->input->post('id_balai', TRUE);
        $id_seksi= $this->input->post('id_seksi', TRUE);
        $id_pelanggan = $this->input->post('id_pelanggan', TRUE);
        $lokasi_pengambilan = $this->input->post('lokasi_pengambilan', TRUE);
        $no_sppa= $this->input->post('no_sppa', TRUE);
        $debet_maks= $this->input->post('debet_maks', TRUE);
        $debet_min = $this->input->post('debet_min', TRUE);
        $realisasi = $this->input->post('realisasi', TRUE);
        $keterangan = $this->input->post('keterangan', TRUE);
        $this->mpemakaian_air->addpemakaian_air($tanggal_input, $id_balai, $id_seksi, $id_pelanggan, $lokasi_pengambilan, $no_sppa, $debet_maks, $debet_min, $realisasi, $keterangan);
        redirect('bekasi/pemakaian_air');
    }

    function ubahpemakaian_air() {
        $id = $this->uri->segment(3);
        $this->load->model(array('mpemakaian_air', 'mseksi','mpelanggan','mbalai'));
        $data['title'] = $this->uri->segment(4) . 'Bekasi:: Ubah Data Pemakaian Air Oleh Pelanggan';
        $data['header'] = 'bekasi/header';
        $data['pemakaian_air'] = $this->mpemakaian_air->getpemakaian_airid($id);
        $data['page'] = 'bekasi/pemakaian_air/editpemakaian_air';
        $data['footer'] = 'bekasi/footer';
        $this->load->view('bekasi/template', $data);
    }

    function simpanubahpemakaian_air() {
        $this->load->model(array('mpemakaian_air', 'mseksi','mpelanggan','mbalai'));
        $id = $this->input->post('id', TRUE);
        $tanggal_input= $this->input->post('tanggal_input', TRUE);
	$id_balai= $this->input->post('id_balai', TRUE);
        $id_seksi= $this->input->post('id_seksi', TRUE);
        $id_pelanggan = $this->input->post('id_pelanggan', TRUE);
        $lokasi_pengambilan = $this->input->post('lokasi_pengambilan', TRUE);
        $no_sppa= $this->input->post('no_sppa', TRUE);
        $debet_maks= $this->input->post('debet_maks', TRUE);
        $debet_min = $this->input->post('debet_min', TRUE);
        $realisasi = $this->input->post('realisasi', TRUE);
        $keterangan = $this->input->post('keterangan', TRUE);
        $this->mpemakaian_air->updatepemakaian_air($id, $tanggal_input, $id_balai, $id_seksi, $id_pelanggan, $lokasi_pengambilan, $no_sppa, $debet_maks, $debet_min, $realisasi, $keterangan);
        redirect('bekasi/pemakaian_air');
    }

    function hapuspemakaian_air() {
        $id = $this->uri->segment(3);
        $this->load->model(array('mpemakaian_air'));
        $this->mpemakaian_air->delpemakaian_air($id);
        redirect('bekasi/pemakaian_air');
        echo $id;
    }
    

/* PEMBERIAN AIR */

    function pemberian_air() {
        $data['title'] = 'Bekasi:: Data Pemberian Air';
        $data['header'] = 'bekasi/header';
        $data['page'] = 'bekasi/pemberian_air/listpemberian_air';
        $data['footer'] = 'bekasi/footer';
        $data['pemberian_air'] = $this->mpemberian_air->getpemberian_air();
        $this->load->view('bekasi/template', $data);
    }

    function tambahpemberian_air() {
        $this->load->model(array('mpemberian_air','mseksi','msaluran_sekunder',''));
        $data['title'] = 'Bekasi:: Tambah Data Pemberian Air';
        $data['header'] = 'bekasi/header';
        $data['page'] = 'bekasi/pemberian_air/addpemberian_air';
        $data['footer'] = 'bekasi/footer';
        $this->load->view('bekasi/template', $data);
    }

    function simpanpemberian_air() {
        $this->load->model(array('mpemberian_air', 'mseksi','msaluran_sekunder',''));
        $tanggal_input= $this->input->post('tanggal_input', TRUE);
	$id_seksi= $this->input->post('id_seksi', TRUE);
        $nama_saluran= $this->input->post('nama_saluran', TRUE);
        $id_saluran_sekunder = $this->input->post('id_saluran_sekunder', TRUE);
        $nama_bangunan_btb = $this->input->post('nama_bangunan_btb', TRUE);
        $target_areal_tanam= $this->input->post('target_areal_tanam', TRUE);
        $golongan_tanam= $this->input->post('golongan_tanam', TRUE);
        $rencana_pemberian_air = $this->input->post('rencana_pemberian_air', TRUE);
        $pemberian_air = $this->input->post('pemberian_air', TRUE);
        $keterangan = $this->input->post('keterangan', TRUE);
        $this->mpemberian_air->addpemberian_air($tanggal_input, $id_seksi, $nama_saluran, $id_saluran_sekunder, $nama_bangunan_btb, 
                               $target_areal_tanam, $golongan_tanam, $rencana_pemberian_air, $pemberian_air, $keterangan);
        redirect('bekasi/pemberian_air');
    }

    function ubahpemberian_air() {
        $id = $this->uri->segment(3);
        $this->load->model(array('mpemberian_air', 'mseksi','msaluran_sekunder',''));
        $data['title'] = $this->uri->segment(4) . 'Bekasi:: Ubah Data Pemberian Air';
        $data['header'] = 'bekasi/header';
        $data['pemberian_air'] = $this->mpemberian_air->getpemberian_airid($id);
        $data['page'] = 'bekasi/pemberian_air/editpemberian_air';
        $data['footer'] = 'bekasi/footer';
        $this->load->view('bekasi/template', $data);
    }

    function simpanubahpemberian_air() {
        $this->load->model(array('mpemberian_air', 'mseksi','msaluran_sekunder',''));
        $id = $this->input->post('id', TRUE);
        $tanggal_input= $this->input->post('tanggal_input', TRUE);
	$id_seksi= $this->input->post('id_seksi', TRUE);
        $nama_saluran= $this->input->post('nama_saluran', TRUE);
        $id_saluran_sekunder = $this->input->post('id_saluran_sekunder', TRUE);
        $nama_bangunan_btb = $this->input->post('nama_bangunan_btb', TRUE);
        $target_areal_tanam= $this->input->post('target_areal_tanam', TRUE);
        $golongan_tanam= $this->input->post('golongan_tanam', TRUE);
        $rencana_pemberian_air = $this->input->post('rencana_pemberian_air', TRUE);
        $pemberian_air = $this->input->post('pemberian_air', TRUE);
        $keterangan = $this->input->post('keterangan', TRUE);
        $this->mpemberian_air->updatepemberian_air($id, $tanggal_input, $id_seksi, $nama_saluran, $id_saluran_sekunder, $nama_bangunan_btb, 
                               $target_areal_tanam, $golongan_tanam, $rencana_pemberian_air, $pemberian_air, $keterangan);
        redirect('bekasi/pemberian_air');
    }

    function hapuspemberian_air() {
        $id = $this->uri->segment(3);
        $this->load->model(array('mpemberian_air'));
        $this->mpemberian_air->delpemberian_air($id);
        redirect('bekasi/pemberian_air');
        echo $id;
    }

        
/* CURAH HUJAN  */

    function curah_hujan() {
        $data['title'] = 'Bekasi:: Data Curah Hujan';
        $data['header'] = 'bekasi/header';
        $data['page'] = 'bekasi/curah_hujan/listcurah_hujan';
        $data['footer'] = 'bekasi/footer';
        $data['curah_hujan'] = $this->mcurah_hujan->getcurah_hujan();
        $this->load->view('bekasi/template', $data);
    }

    function tambahcurah_hujan() {
        $this->load->model(array('mcurah_hujan', 'mseksi','',''));
        $data['title'] = 'Bekasi:: Tambah Data Curah Hujan';
        $data['header'] = 'bekasi/header';
        $data['page'] = 'bekasi/curah_hujan/addcurah_hujan';
        $data['footer'] = 'bekasi/footer';
        $this->load->view('bekasi/template', $data);
    }

    
    function simpancurah_hujan() {
        $this->load->model(array('mcurah_hujan', 'mseksi','',''));
        $tanggal_input= $this->input->post('tanggal_input', TRUE);
	$nomor= $this->input->post('nomor', TRUE);
        $id_seksi= $this->input->post('id_seksi', TRUE);
        $nama_stasiun = $this->input->post('nama_stasiun', TRUE);
        $curah_hujan = $this->input->post('curah_hujan', TRUE);
        $keterangan = $this->input->post('keterangan', TRUE);
        $this->mcurah_hujan->addcurah_hujan($tanggal_input, $nomor, $id_seksi, $nama_stasiun,$curah_hujan, $keterangan);
        redirect('bekasi/curah_hujan');
    }

    function ubahcurah_hujan() {
        $id = $this->uri->segment(3);
        $this->load->model(array('mcurah_hujan', 'mseksi','',''));
        $data['title'] = $this->uri->segment(4) . 'Admin:: Ubah Data Curah Hujan';
        $data['header'] = 'bekasi/header';
        $data['curah_hujan'] = $this->mcurah_hujan->getcurah_hujanid($id);
        $data['page'] = 'bekasi/curah_hujan/editcurah_hujan';
        $data['footer'] = 'bekasi/footer';
        $this->load->view('bekasi/template', $data);
    }

    function simpanubahcurah_hujan() {
        $this->load->model(array('mcurah_hujan', 'mseksi','',''));
        $id = $this->input->post('id', TRUE);
        $tanggal_input= $this->input->post('tanggal_input', TRUE);
	$nomor= $this->input->post('nomor', TRUE);
        $id_seksi= $this->input->post('id_seksi', TRUE);
        $nama_stasiun = $this->input->post('nama_stasiun', TRUE);
        $curah_hujan = $this->input->post('curah_hujan', TRUE);
        $keterangan = $this->input->post('keterangan', TRUE);
        $this->mcurah_hujan->updatecurah_hujan($id, $tanggal_input, $nomor, $id_seksi, $nama_stasiun,$curah_hujan, $keterangan);
        redirect('bekasi/curah_hujan');
    }

    function hapuscurah_hujan() {
        $id = $this->uri->segment(3);
        $this->load->model(array('mcurah_hujan'));
        $this->mcurah_hujan->delcurah_hujan($id);
        redirect('bekasi/curah_hujan');
        echo $id;
    }
    

    /* KEJADIAN  */

    function kejadian() {
        $data['title'] = 'Admin:: Data Curah Hujan';
        $data['header'] = 'bekasi/header';
        $data['page'] = 'bekasi/kejadian/listkejadian';
        $data['footer'] = 'bekasi/footer';
        $data['kejadian'] = $this->mkejadian->getkejadian();
        $this->load->view('bekasi/template', $data);
    }

    function tambahkejadian() {
        $this->load->model(array('mkejadian', 'mseksi','mbendung',''));
        $data['title'] = 'Admin:: Tambah Data Curah Hujan';
        $data['header'] = 'bekasi/header';
        $data['page'] = 'bekasi/kejadian/addkejadian';
        $data['footer'] = 'bekasi/footer';
        $this->load->view('bekasi/template', $data);
    }

    function simpankejadian() {
        $this->load->model(array('mkejadian', 'mseksi','mbendung',''));
        $tanggal_input= $this->input->post('tanggal_input', TRUE);
	$jam = $this->input->post('jam', TRUE);
        $id_seksi = $this->input->post('id_seksi', TRUE);
        $id_bendung = $this->input->post('id_bendung', TRUE);
        $regu = $this->input->post('regu', TRUE);
        $nama_operator = $this->input->post('nama_operator', TRUE);
        $kejadian = $this->input->post('kejadian', TRUE);
        $this->mkejadian->addkejadian($tanggal_input, $jam, $id_seksi, $id_bendung, $regu, $nama_operator, $kejadian);
        redirect('bekasi/kejadian');
    }

    function ubahkejadian() {
        $id = $this->uri->segment(3);
        $this->load->model(array('mkejadian', 'mseksi','mbendung',''));
        $data['title'] = $this->uri->segment(4) . 'Admin:: Ubah Data Curah Hujan';
        $data['header'] = 'bekasi/header';
        $data['kejadian'] = $this->mkejadian->getkejadianid($id);
        $data['page'] = 'bekasi/kejadian/editkejadian';
        $data['footer'] = 'bekasi/footer';
        $this->load->view('bekasi/template', $data);
    }

    function simpanubahkejadian() {
        $this->load->model(array('mkejadian', 'mseksi','mbendung',''));
        $id = $this->input->post('id', TRUE);
        $tanggal_input= $this->input->post('tanggal_input', TRUE);
	$jam = $this->input->post('jam', TRUE);
        $id_seksi = $this->input->post('id_seksi', TRUE);
        $id_bendung = $this->input->post('id_bendung', TRUE);
        $regu = $this->input->post('regu', TRUE);
        $nama_operator = $this->input->post('nama_operator', TRUE);
        $kejadian = $this->input->post('kejadian', TRUE);
        $this->mkejadian->updatekejadian($id, $tanggal_input, $jam, $id_seksi, $id_bendung, $regu, $nama_operator, $kejadian);
        redirect('bekasi/kejadian');
    }

    function hapuskejadian() {
        $id = $this->uri->segment(3);
        $this->load->model(array('mkejadian'));
        $this->mkejadian->delkejadian($id);
        redirect('bekasi/kejadian');
        echo $id;
    }    

    
    
/* TANAM RENDENG  */

    function tanam_rendeng() {
        $data['title'] = 'Bekasi:: Data Tanam Rendeng ';
        $data['header'] = 'bekasi/header';
        $data['page'] = 'bekasi/tanam_rendeng/listtanam_rendeng';
        $data['footer'] = 'bekasi/footer';
        $data['tanam_rendeng'] = $this->mtanam_rendeng->gettanam_rendeng();
        $this->load->view('bekasi/template', $data);
    }

    function tambahtanam_rendeng() {
        $this->load->model(array('mtanam_rendeng', 'mseksi','msaluran_tanam','mgolongan_tanam'));
        $data['title'] = 'Bekasi:: Tambah Data Tanam Rendeng';
        $data['header'] = 'bekasi/header';
        $data['page'] = 'bekasi/tanam_rendeng/addtanam_rendeng';
        $data['footer'] = 'bekasi/footer';
        $this->load->view('bekasi/template', $data);
    }

    function simpantanam_rendeng() {
        $this->load->model(array('mtanam_rendeng', 'mseksi','msaluran_tanam','mgolongan_tanam'));
        $tanggal_input= $this->input->post('tanggal_input', TRUE);
	$daerah_irigasi= $this->input->post('daerah_irigasi', TRUE);
        $id_seksi= $this->input->post('id_seksi', TRUE);
        $id_saluran_tanam = $this->input->post('id_saluran_tanam', TRUE);
        $kabupaten = $this->input->post('kabupaten', TRUE);
        $kecamatan= $this->input->post('kecamatan', TRUE);
	$nama_areal= $this->input->post('nama_areal', TRUE);
        $id_golongan_tanam= $this->input->post('id_golongan_tanam', TRUE);
        $target_luas = $this->input->post('target_luas', TRUE);
        $target_bibit = $this->input->post('target_bibit', TRUE);
        $target_garap = $this->input->post('target_garap', TRUE);
        $target_tanam = $this->input->post('target_tanam', TRUE);
        $target_panen = $this->input->post('target_panen', TRUE);
  //      $target_jumlah = $this->input->post('target_jumlah', TRUE);
  //      $target_persen = $this->input->post('target_persen', TRUE);
        
        $target_jumlah = $target_bibit + $target_garap + $target_tanam + $target_panen;
        $target_persen = $target_jumlah / $target_luas * 100 ;
                
        $target_palawija = $this->input->post('target_palawija', TRUE);
        $target_bera= $this->input->post('target_bera', TRUE);
        $target_puso= $this->input->post('target_puso', TRUE);
        $luar_target_bibit= $this->input->post('luar_target_bibit', TRUE);
        $luar_target_garap= $this->input->post('luar_target_garap', TRUE);
        $luar_target_tanam= $this->input->post('luar_target_tanam', TRUE);
        $luar_target_panen= $this->input->post('luar_target_panen', TRUE);
  //      $luar_target_jumlah= $this->input->post('luar_target_jumlah', TRUE);
        
        $luar_target_jumlah= $luar_target_bibit + $luar_target_garap + $luar_target_tanam + $luar_target_panen ;
        
        $luar_target_palawija= $this->input->post('luar_target_palawija', TRUE);
        $keterangan = $this->input->post('keterangan', TRUE);
        $this->mtanam_rendeng->addtanam_rendeng($tanggal_input, $daerah_irigasi, $id_seksi, $id_saluran_tanam, $kabupaten, $kecamatan, $nama_areal, 
                              $id_golongan_tanam, $target_luas, $target_bibit, $target_garap, $target_tanam,
                              $target_panen, $target_jumlah, $target_persen, $target_palawija, $target_bera,
                              $target_puso, $luar_target_bibit, $luar_target_garap, $luar_target_tanam, $luar_target_panen,
                              $luar_target_jumlah, $luar_target_palawija, $keterangan);
        redirect('bekasi/tanam_rendeng');
    }

    function ubahtanam_rendeng() {
        $id = $this->uri->segment(3);
        $this->load->model(array('mtanam_rendeng', 'mseksi','msaluran_tanam','mgolongan_tanam'));
        $data['title'] = $this->uri->segment(4) . 'Bekasi:: Ubah Data Tanam Rendeng';
        $data['header'] = 'bekasi/header';
        $data['tanam_rendeng'] = $this->mtanam_rendeng->gettanam_rendengid($id);
        $data['page'] = 'bekasi/tanam_rendeng/edittanam_rendeng';
        $data['footer'] = 'bekasi/footer';
        $this->load->view('bekasi/template', $data);
    }

    function simpanubahtanam_rendeng() {
        $this->load->model(array('mtanam_rendeng', 'mseksi','msaluran_tanam','mgolongan_tanam'));
        $id = $this->input->post('id', TRUE);
        $tanggal_input= $this->input->post('tanggal_input', TRUE);
	$daerah_irigasi= $this->input->post('daerah_irigasi', TRUE);
        $id_seksi= $this->input->post('id_seksi', TRUE);
        $id_saluran_tanam = $this->input->post('id_saluran_tanam', TRUE);
        $kabupaten = $this->input->post('kabupaten', TRUE);
        $kecamatan= $this->input->post('kecamatan', TRUE);
	$nama_areal= $this->input->post('nama_areal', TRUE);
        $id_golongan_tanam= $this->input->post('id_golongan_tanam', TRUE);
        $target_luas = $this->input->post('target_luas', TRUE);
        $target_bibit = $this->input->post('target_bibit', TRUE);
        $target_garap = $this->input->post('target_garap', TRUE);
        $target_tanam = $this->input->post('target_tanam', TRUE);
        $target_panen = $this->input->post('target_panen', TRUE);
 //       $target_jumlah = $this->input->post('target_jumlah', TRUE);
 //       $target_persen = $this->input->post('target_persen', TRUE);
        
        $target_jumlah = $target_bibit + $target_garap + $target_tanam + $target_panen;
        $target_persen = $target_jumlah / $target_luas * 100;
        
        
        $target_palawija = $this->input->post('target_palawija', TRUE);
        $target_bera= $this->input->post('target_bera', TRUE);
        $target_puso= $this->input->post('target_puso', TRUE);
        $luar_target_bibit= $this->input->post('luar_target_bibit', TRUE);
        $luar_target_garap= $this->input->post('luar_target_garap', TRUE);
        $luar_target_tanam= $this->input->post('luar_target_tanam', TRUE);
        $luar_target_panen= $this->input->post('luar_target_panen', TRUE);
//        $luar_target_jumlah= $this->input->post('luar_target_jumlah', TRUE);
        
        $luar_target_jumlah= $luar_target_bibit + $luar_target_garap + $luar_target_tanam + $luar_target_panen ;
        
        $luar_target_palawija= $this->input->post('luar_target_palawija', TRUE);
        $keterangan = $this->input->post('keterangan', TRUE);
        $this->mtanam_rendeng->updatetanam_rendeng($id, $tanggal_input, $daerah_irigasi, $id_seksi, $id_saluran_tanam, $kabupaten, $kecamatan, $nama_areal, 
                              $id_golongan_tanam, $target_luas, $target_bibit, $target_garap, $target_tanam,
                              $target_panen, $target_jumlah, $target_persen, $target_palawija, $target_bera,
                              $target_puso, $luar_target_bibit, $luar_target_garap, $luar_target_tanam, $luar_target_panen,
                              $luar_target_jumlah, $luar_target_palawija, $keterangan);
        redirect('bekasi/tanam_rendeng');
    }

    function hapustanam_rendeng() {
        $id = $this->uri->segment(3);
        $this->load->model(array('mtanam_rendeng'));
        $this->mtanam_rendeng->deltanam_rendeng($id);
        redirect('bekasi/tanam_rendeng');
        echo $id;
    }    


/* TANAM GADU  */

    function tanam_gadu() {
        $data['title'] = 'Bekasi:: Data Tanam Gadu ';
        $data['header'] = 'bekasi/header';
        $data['page'] = 'bekasi/tanam_gadu/listtanam_gadu';
        $data['footer'] = 'bekasi/footer';
        $data['tanam_gadu'] = $this->mtanam_gadu->gettanam_gadu();
        $this->load->view('bekasi/template', $data);
    }

    function tambahtanam_gadu() {
        $this->load->model(array('mtanam_gadu', 'mseksi','msaluran_tanam','mgolongan_tanam'));
        $data['title'] = 'Bekasi:: Tambah Data Tanam Gadu';
        $data['header'] = 'bekasi/header';
        $data['page'] = 'bekasi/tanam_gadu/addtanam_gadu';
        $data['footer'] = 'bekasi/footer';
        $this->load->view('bekasi/template', $data);
    }

    function simpantanam_gadu() {
        $this->load->model(array('mtanam_gadu', 'mseksi','msaluran_tanam','mgolongan_tanam'));
        $tanggal_input= $this->input->post('tanggal_input', TRUE);
	$daerah_irigasi= $this->input->post('daerah_irigasi', TRUE);
        $id_seksi= $this->input->post('id_seksi', TRUE);
        $id_saluran_tanam = $this->input->post('id_saluran_tanam', TRUE);
        $kabupaten = $this->input->post('kabupaten', TRUE);
        $kecamatan= $this->input->post('kecamatan', TRUE);
	$nama_areal= $this->input->post('nama_areal', TRUE);
        $id_golongan_tanam= $this->input->post('id_golongan_tanam', TRUE);
        $target_luas = $this->input->post('target_luas', TRUE);
        $target_bibit = $this->input->post('target_bibit', TRUE);
        $target_garap = $this->input->post('target_garap', TRUE);
        $target_tanam = $this->input->post('target_tanam', TRUE);
        $target_panen = $this->input->post('target_panen', TRUE);
  //      $target_jumlah = $this->input->post('target_jumlah', TRUE);
  //      $target_persen = $this->input->post('target_persen', TRUE);
        
        $target_jumlah = $target_bibit + $target_garap + $target_tanam + $target_panen;
        $target_persen = $target_jumlah / $target_luas * 100 ;
                
        $target_palawija = $this->input->post('target_palawija', TRUE);
        $target_bera= $this->input->post('target_bera', TRUE);
        $target_puso= $this->input->post('target_puso', TRUE);
        $luar_target_bibit= $this->input->post('luar_target_bibit', TRUE);
        $luar_target_garap= $this->input->post('luar_target_garap', TRUE);
        $luar_target_tanam= $this->input->post('luar_target_tanam', TRUE);
        $luar_target_panen= $this->input->post('luar_target_panen', TRUE);
  //      $luar_target_jumlah= $this->input->post('luar_target_jumlah', TRUE);
        
        $luar_target_jumlah= $luar_target_bibit + $luar_target_garap + $luar_target_tanam + $luar_target_panen ;
        
        $luar_target_palawija= $this->input->post('luar_target_palawija', TRUE);
        $keterangan = $this->input->post('keterangan', TRUE);
        $this->mtanam_gadu->addtanam_gadu($tanggal_input, $daerah_irigasi, $id_seksi, $id_saluran_tanam, $kabupaten, $kecamatan, $nama_areal, 
                              $id_golongan_tanam, $target_luas, $target_bibit, $target_garap, $target_tanam,
                              $target_panen, $target_jumlah, $target_persen, $target_palawija, $target_bera,
                              $target_puso, $luar_target_bibit, $luar_target_garap, $luar_target_tanam, $luar_target_panen,
                              $luar_target_jumlah, $luar_target_palawija, $keterangan);
        redirect('bekasi/tanam_gadu');
    }

    function ubahtanam_gadu() {
        $id = $this->uri->segment(3);
        $this->load->model(array('mtanam_gadu', 'mseksi','msaluran_tanam','mgolongan_tanam'));
        $data['title'] = $this->uri->segment(4) . 'Bekasi:: Ubah Data Tanam Gadu';
        $data['header'] = 'bekasi/header';
        $data['tanam_gadu'] = $this->mtanam_gadu->gettanam_gaduid($id);
        $data['page'] = 'bekasi/tanam_gadu/edittanam_gadu';
        $data['footer'] = 'bekasi/footer';
        $this->load->view('bekasi/template', $data);
    }

    function simpanubahtanam_gadu() {
        $this->load->model(array('mtanam_gadu', 'mseksi','msaluran_tanam','mgolongan_tanam'));
        $id = $this->input->post('id', TRUE);
        $tanggal_input= $this->input->post('tanggal_input', TRUE);
	$daerah_irigasi= $this->input->post('daerah_irigasi', TRUE);
        $id_seksi= $this->input->post('id_seksi', TRUE);
        $id_saluran_tanam = $this->input->post('id_saluran_tanam', TRUE);
        $kabupaten = $this->input->post('kabupaten', TRUE);
        $kecamatan= $this->input->post('kecamatan', TRUE);
	$nama_areal= $this->input->post('nama_areal', TRUE);
        $id_golongan_tanam= $this->input->post('id_golongan_tanam', TRUE);
        $target_luas = $this->input->post('target_luas', TRUE);
        $target_bibit = $this->input->post('target_bibit', TRUE);
        $target_garap = $this->input->post('target_garap', TRUE);
        $target_tanam = $this->input->post('target_tanam', TRUE);
        $target_panen = $this->input->post('target_panen', TRUE);
 //       $target_jumlah = $this->input->post('target_jumlah', TRUE);
 //       $target_persen = $this->input->post('target_persen', TRUE);
        
        $target_jumlah = $target_bibit + $target_garap + $target_tanam + $target_panen;
        $target_persen = $target_jumlah / $target_luas * 100;
        
        
        $target_palawija = $this->input->post('target_palawija', TRUE);
        $target_bera= $this->input->post('target_bera', TRUE);
        $target_puso= $this->input->post('target_puso', TRUE);
        $luar_target_bibit= $this->input->post('luar_target_bibit', TRUE);
        $luar_target_garap= $this->input->post('luar_target_garap', TRUE);
        $luar_target_tanam= $this->input->post('luar_target_tanam', TRUE);
        $luar_target_panen= $this->input->post('luar_target_panen', TRUE);
//        $luar_target_jumlah= $this->input->post('luar_target_jumlah', TRUE);
        
        $luar_target_jumlah= $luar_target_bibit + $luar_target_garap + $luar_target_tanam + $luar_target_panen ;
        
        $luar_target_palawija= $this->input->post('luar_target_palawija', TRUE);
        $keterangan = $this->input->post('keterangan', TRUE);
        $this->mtanam_gadu->updatetanam_gadu($id, $tanggal_input, $daerah_irigasi, $id_seksi, $id_saluran_tanam, $kabupaten, $kecamatan, $nama_areal, 
                              $id_golongan_tanam, $target_luas, $target_bibit, $target_garap, $target_tanam,
                              $target_panen, $target_jumlah, $target_persen, $target_palawija, $target_bera,
                              $target_puso, $luar_target_bibit, $luar_target_garap, $luar_target_tanam, $luar_target_panen,
                              $luar_target_jumlah, $luar_target_palawija, $keterangan);
        redirect('bekasi/tanam_gadu');
    }

    function hapustanam_gadu() {
        $id = $this->uri->segment(3);
        $this->load->model(array('mtanam_gadu'));
        $this->mtanam_gadu->deltanam_gadu($id);
        redirect('bekasi/tanam_gadu');
        echo $id;
    }    

/* DAB CBL */

    function dab_cbl() {
        $data['title'] = 'Bekasi:: Debet Air Bendung CBL';
        $data['header'] = 'bekasi/header';
        $data['page'] = 'bekasi/dab_cbl/listdab_cbl';
        $data['footer'] = 'bekasi/footer';
        $data['dab_cbl'] = $this->mdab_cbl->getdab_cbl();
        $this->load->view('bekasi/template', $data);
    }

    function tambahdab_cbl() {
        $this->load->model(array('mdab_cbl', 'mseksi','',''));
        $data['title'] = 'Bekasi:: Tambah Data Debet Air Bendung CBL';
        $data['header'] = 'bekasi/header';
        $data['page'] = 'bekasi/dab_cbl/adddab_cbl';
        $data['footer'] = 'bekasi/footer';
        $this->load->view('bekasi/template', $data);
    }

    function simpandab_cbl() {
        $this->load->model(array('mdab_cbl', 'mseksi','',''));
        $id_seksi = $this->input->post('id_seksi', TRUE);
        $tanggal_input= $this->input->post('tanggal_input', TRUE);
        $jam = $this->input->post('jam', TRUE);
        $limpasan= $this->input->post('limpasan', TRUE);
        $debet_air = $this->input->post('debet_air', TRUE);
        $disukatani_bsh1 = $this->input->post('disukatani_bsh1', TRUE);
        //  $jumlah = $this->input->post('jumlah', TRUE);
        
        $jumlah = $debet_air + $disukatani_bsh1;
        
      
        $keterangan = $this->input->post('keterangan', TRUE);
        $this->mdab_cbl->adddab_cbl($id_seksi, $tanggal_input, $jam, $limpasan, $debet_air, $disukatani_bsh1, $jumlah, 
                                    $keterangan);
        redirect('bekasi/dab_cbl');
    }

    function ubahdab_cbl() {
        $id = $this->uri->segment(3);
        $this->load->model(array('mdab_cbl', 'mseksi','',''));
        $data['title'] = $this->uri->segment(4) . 'Bekasi:: Ubah Data Debet Air Bendung CBL';
        $data['header'] = 'bekasi/header';
        $data['dab_cbl'] = $this->mdab_cbl->getdab_cblid($id);
        $data['page'] = 'bekasi/dab_cbl/editdab_cbl';
        $data['footer'] = 'bekasi/footer';
        $this->load->view('bekasi/template', $data);
    }

    function simpanubahdab_cbl() {
        $this->load->model(array('mdab_cbl', 'mseksi','',''));
        $id = $this->input->post('id', TRUE);
        $id_seksi = $this->input->post('id_seksi', TRUE);
        $tanggal_input= $this->input->post('tanggal_input', TRUE);
        $jam = $this->input->post('jam', TRUE);
        $limpasan= $this->input->post('limpasan', TRUE);
        $debet_air = $this->input->post('debet_air', TRUE);
        $disukatani_bsh1 = $this->input->post('disukatani_bsh1', TRUE);
      //  $jumlah = $this->input->post('jumlah', TRUE);
        
        $jumlah = $debet_air + $disukatani_bsh1;
        
        $keterangan = $this->input->post('keterangan', TRUE);
        $this->mdab_cbl->updatedab_cbl($id, $id_seksi, $tanggal_input, $jam, $limpasan, $debet_air, $disukatani_bsh1, $jumlah, 
                                    $keterangan);
        redirect('bekasi/dab_cbl');
    }

    function hapusdab_cbl() {
        $id = $this->uri->segment(3);
        $this->load->model(array('mdab_cbl'));
        $this->mdab_cbl->deldab_cbl($id);
        redirect('bekasi/dab_cbl');
        echo $id;
    }
        
/* DAB CIKEAS */

    function dab_cikeas() {
        $data['title'] = 'Bekasi:: Debet Air Bendung Cikeas';
        $data['header'] = 'bekasi/header';
        $data['page'] = 'bekasi/dab_cikeas/listdab_cikeas';
        $data['footer'] = 'bekasi/footer';
        $data['dab_cikeas'] = $this->mdab_cikeas->getdab_cikeas();
        $this->load->view('bekasi/template', $data);
    }

    function tambahdab_cikeas() {
        $this->load->model(array('mdab_cikeas', 'mseksi','',''));
        $data['title'] = 'Bekasi:: Tambah Data Debet Air Bendung Cikeas';
        $data['header'] = 'bekasi/header';
        $data['page'] = 'bekasi/dab_cikeas/adddab_cikeas';
        $data['footer'] = 'bekasi/footer';
        $this->load->view('bekasi/template', $data);
    }

    function simpandab_cikeas() {
        $this->load->model(array('mdab_cikeas', 'mseksi','',''));
        $id_seksi = $this->input->post('id_seksi', TRUE);
        $tanggal_input= $this->input->post('tanggal_input', TRUE);
        $jam = $this->input->post('jam', TRUE);
        $pelimpas_kiri= $this->input->post('pelimpas_kiri', TRUE);
        $pelimpas_kanan = $this->input->post('pelimpas_kanan', TRUE);
      //  $jumlah = $this->input->post('jumlah', TRUE);
        
        $jumlah = $pelimpas_kiri + $pelimpas_kanan ;
        
        $keterangan = $this->input->post('keterangan', TRUE);
        $this->mdab_cikeas->adddab_cikeas($id_seksi, $tanggal_input, $jam, $pelimpas_kiri, $pelimpas_kanan, $jumlah, $keterangan);
        redirect('bekasi/dab_cikeas');
    }

    function ubahdab_cikeas() {
        $id = $this->uri->segment(3);
        $this->load->model(array('mdab_cikeas', 'mseksi','',''));
        $data['title'] = $this->uri->segment(4) . 'Bekasi:: Ubah Data Debet Air Bendung Cikeas';
        $data['header'] = 'bekasi/header';
        $data['dab_cikeas'] = $this->mdab_cikeas->getdab_cikeasid($id);
        $data['page'] = 'bekasi/dab_cikeas/editdab_cikeas';
        $data['footer'] = 'bekasi/footer';
        $this->load->view('bekasi/template', $data);
    }

    function simpanubahdab_cikeas() {
        $this->load->model(array('mdab_cikeas', 'mseksi','',''));
        $id = $this->input->post('id', TRUE);
        $id_seksi = $this->input->post('id_seksi', TRUE);
        $tanggal_input= $this->input->post('tanggal_input', TRUE);
        $jam = $this->input->post('jam', TRUE);
        $pelimpas_kiri= $this->input->post('pelimpas_kiri', TRUE);
        $pelimpas_kanan = $this->input->post('pelimpas_kanan', TRUE);
      //  $jumlah = $this->input->post('jumlah', TRUE);
        
        $jumlah = $pelimpas_kiri + $pelimpas_kanan ;
        
        $keterangan = $this->input->post('keterangan', TRUE);
        $this->mdab_cikeas->updatedab_cikeas($id, $id_seksi, $tanggal_input, $jam, $pelimpas_kiri, $pelimpas_kanan, $jumlah, $keterangan);
        redirect('bekasi/dab_cikeas');
    }

    function hapusdab_cikeas() {
        $id = $this->uri->segment(3);
        $this->load->model(array('mdab_cikeas'));
        $this->mdab_cikeas->deldab_cikeas($id);
        redirect('bekasi/dab_cikeas');
        echo $id;
    }

    /* DAB CIPAMINGKIS */

    function dab_cipamingkis() {
        $data['title'] = 'Bekasi:: Debet Air Bendung Cipamingkis';
        $data['header'] = 'bekasi/header';
        $data['page'] = 'bekasi/dab_cipamingkis/listdab_cipamingkis';
        $data['footer'] = 'bekasi/footer';
        $data['dab_cipamingkis'] = $this->mdab_cipamingkis->getdab_cipamingkis();
        $this->load->view('bekasi/template', $data);
    }

    function tambahdab_cipamingkis() {
        $this->load->model(array('mdab_cipamingkis', 'mseksi','',''));
        $data['title'] = 'Bekasi:: Tambah Data Debet Air Bendung Cipamingkis';
        $data['header'] = 'bekasi/header';
        $data['page'] = 'bekasi/dab_cipamingkis/adddab_cipamingkis';
        $data['footer'] = 'bekasi/footer';
        $this->load->view('bekasi/template', $data);
    }

    function simpandab_cipamingkis() {
        $this->load->model(array('mdab_cipamingkis', 'mseksi','',''));
        $id_seksi = $this->input->post('id_seksi', TRUE);
        $tanggal_input= $this->input->post('tanggal_input', TRUE);
        $jam = $this->input->post('jam', TRUE);
        $limpasan= $this->input->post('limpasan', TRUE);
        $saluran_induk_kiri = $this->input->post('saluran_induk_kiri', TRUE);
        $saluran_induk_kanan = $this->input->post('saluran_induk_kanan', TRUE);
        
        $q1 = $saluran_induk_kiri + $saluran_induk_kanan ;
        $q2 = $limpasan + $q1 ;
        
        $keterangan = $this->input->post('keterangan', TRUE);
        $this->mdab_cipamingkis->adddab_cipamingkis($id_seksi, $tanggal_input, $jam, $limpasan, $saluran_induk_kiri, $saluran_induk_kanan, 
            $q1, $q2, $keterangan);
        redirect('bekasi/dab_cipamingkis');
    }

    function ubahdab_cipamingkis() {
        $id = $this->uri->segment(3);
        $this->load->model(array('mdab_cipamingkis', 'mseksi','',''));
        $data['title'] = $this->uri->segment(4) . 'Bekasi:: Ubah Data Debet Air Bendung Cipamingkis';
        $data['header'] = 'bekasi/header';
        $data['dab_cipamingkis'] = $this->mdab_cipamingkis->getdab_cipamingkisid($id);
        $data['page'] = 'bekasi/dab_cipamingkis/editdab_cipamingkis';
        $data['footer'] = 'bekasi/footer';
        $this->load->view('bekasi/template', $data);
    }

    function simpanubahdab_cipamingkis() {
        $this->load->model(array('mdab_cipamingkis', 'mseksi','',''));
        $id = $this->input->post('id', TRUE);
        $id_seksi = $this->input->post('id_seksi', TRUE);
        $tanggal_input= $this->input->post('tanggal_input', TRUE);
        $jam = $this->input->post('jam', TRUE);
        $limpasan= $this->input->post('limpasan', TRUE);
        $saluran_induk_kiri = $this->input->post('saluran_induk_kiri', TRUE);
        $saluran_induk_kanan = $this->input->post('saluran_induk_kanan', TRUE);
        
        $q1 = $saluran_induk_kiri + $saluran_induk_kanan ;
        $q2 = $limpasan + $q1 ;
        
        $keterangan = $this->input->post('keterangan', TRUE);
        $this->mdab_cipamingkis->updatedab_cipamingkis($id, $id_seksi, $tanggal_input, $jam, $limpasan, $saluran_induk_kiri, $saluran_induk_kanan, 
            $q1, $q2, $keterangan);
        redirect('bekasi/dab_cipamingkis');
    }

    function hapusdab_cipamingkis() {
        $id = $this->uri->segment(3);
        $this->load->model(array('mdab_cipamingkis'));
        $this->mdab_cipamingkis->deldab_cipamingkis($id);
        redirect('bekasi/dab_cipamingkis');
        echo $id;
    }
    
    
/* DAB JEMBATAN BOJONG */

    function dab_jembatan_bojong() {
        $data['title'] = 'Bekasi:: Debet Air Jembatan Bojong';
        $data['header'] = 'bekasi/header';
        $data['page'] = 'bekasi/dab_jembatan_bojong/listdab_jembatan_bojong';
        $data['footer'] = 'bekasi/footer';
        $data['dab_jembatan_bojong'] = $this->mdab_jembatan_bojong->getdab_jembatan_bojong();
        $this->load->view('bekasi/template', $data);
    }

    function tambahdab_jembatan_bojong() {
        $this->load->model(array('mdab_jembatan_bojong', 'mseksi','',''));
        $data['title'] = 'Bekasi:: Tambah Data Debet Air Jembatan Bojong';
        $data['header'] = 'bekasi/header';
        $data['page'] = 'bekasi/dab_jembatan_bojong/adddab_jembatan_bojong';
        $data['footer'] = 'bekasi/footer';
        $this->load->view('bekasi/template', $data);
    }

    function simpandab_jembatan_bojong() {
        $this->load->model(array('mdab_jembatan_bojong', 'mseksi','',''));
        $id_seksi = $this->input->post('id_seksi', TRUE);
        $tanggal_input= $this->input->post('tanggal_input', TRUE);
        $jam = $this->input->post('jam', TRUE);
        $tma= $this->input->post('tma', TRUE);
        $debet = $this->input->post('debet', TRUE);
        $keterangan = $this->input->post('keterangan', TRUE);
        $this->mdab_jembatan_bojong->adddab_jembatan_bojong($id_seksi, $tanggal_input, $jam, $tma, $debet, $keterangan);
        redirect('bekasi/dab_jembatan_bojong');
    }

    function ubahdab_jembatan_bojong() {
        $id = $this->uri->segment(3);
        $this->load->model(array('mdab_jembatan_bojong', 'mseksi','',''));
        $data['title'] = $this->uri->segment(4) . 'Bekasi:: Ubah Data Debet Air Jembatan Bojong';
        $data['header'] = 'bekasi/header';
        $data['dab_jembatan_bojong'] = $this->mdab_jembatan_bojong->getdab_jembatan_bojongid($id);
        $data['page'] = 'bekasi/dab_jembatan_bojong/editdab_jembatan_bojong';
        $data['footer'] = 'bekasi/footer';
        $this->load->view('bekasi/template', $data);
    }

    function simpanubahdab_jembatan_bojong() {
        $this->load->model(array('mdab_jembatan_bojong', 'mseksi','',''));
        $id = $this->input->post('id', TRUE);
        $id_seksi = $this->input->post('id_seksi', TRUE);
        $tanggal_input= $this->input->post('tanggal_input', TRUE);
        $jam = $this->input->post('jam', TRUE);
        $tma= $this->input->post('tma', TRUE);
        $debet = $this->input->post('debet', TRUE);
        $keterangan = $this->input->post('keterangan', TRUE);
        $this->mdab_jembatan_bojong->updatedab_jembatan_bojong($id, $id_seksi, $tanggal_input, $jam, $tma, $debet, $keterangan);
        redirect('bekasi/dab_jembatan_bojong');
    }

    function hapusdab_jembatan_bojong() {
        $id = $this->uri->segment(3);
        $this->load->model(array('mdab_jembatan_bojong'));
        $this->mdab_jembatan_bojong->deldab_jembatan_bojong($id);
        redirect('bekasi/dab_jembatan_bojong');
        echo $id;
    }

/* PROGRES PEKERJAAN */

    function progres_pekerjaan() {
        $data['title'] = 'Bekasi:: Data Progres Pekerjaan';
        $data['header'] = 'bekasi/header';
        $data['page'] = 'bekasi/progres_pekerjaan/listprogres_pekerjaan';
        $data['footer'] = 'bekasi/footer';
        $data['progres_pekerjaan'] = $this->mprogres_pekerjaan->getprogres_pekerjaan();
        $this->load->view('bekasi/template', $data);
    }

    function tambahprogres_pekerjaan() {
        $this->load->model(array('mprogres_pekerjaan', '','',''));
        $data['title'] = 'Bekasi:: Tambah Data Progres Pekerjaan';
        $data['header'] = 'bekasi/header';
        $data['page'] = 'bekasi/progres_pekerjaan/addprogres_pekerjaan';
        $data['footer'] = 'bekasi/footer';
        $this->load->view('bekasi/template', $data);
    }

    function simpanprogres_pekerjaan() {
        $this->load->model(array('mprogres_pekerjaan', 'mseksi','mpelanggan','mbalai'));
        $sub_ma= $this->input->post('sub_ma', TRUE);
	$uraian_pekerjaan= $this->input->post('uraian_pekerjaan', TRUE);
        $biaya_program= $this->input->post('biaya_program', TRUE);
        $biaya_realisasi = $this->input->post('biaya_realisasi', TRUE);
        $biaya_sisa = $biaya_program - $biaya_realisasi; 
        $nomor_kontrak= $this->input->post('nomor_kontrak', TRUE);
        $tanggal_kontrak= $this->input->post('tanggal_kontrak', TRUE);
        $rekanan = $this->input->post('rekanan', TRUE);
        $waktu = $this->input->post('waktu', TRUE);
	$progres = $this->input->post('progres', TRUE);
        $keterangan = $this->input->post('keterangan', TRUE);
        $this->mprogres_pekerjaan->addprogres_pekerjaan($sub_ma, $uraian_pekerjaan, $biaya_program, $biaya_realisasi, $biaya_sisa, $nomor_kontrak, $tanggal_kontrak, $rekanan, $waktu, $progres, $keterangan);
        redirect('bekasi/progres_pekerjaan');
    }

    function ubahprogres_pekerjaan() {
        $id = $this->uri->segment(3);
        $this->load->model(array('mprogres_pekerjaan', '','',''));
        $data['title'] = $this->uri->segment(4) . 'Bekasi:: Ubah Data Progres Pekerjaan';
        $data['header'] = 'bekasi/header';
        $data['progres_pekerjaan'] = $this->mprogres_pekerjaan->getprogres_pekerjaanid($id);
        $data['page'] = 'bekasi/progres_pekerjaan/editprogres_pekerjaan';
        $data['footer'] = 'bekasi/footer';
        $this->load->view('bekasi/template', $data);
    }

    function simpanubahprogres_pekerjaan() {
        $this->load->model(array('mprogres_pekerjaan', 'mseksi','mpelanggan','mbalai'));
        $id = $this->input->post('id', TRUE);
        $sub_ma= $this->input->post('sub_ma', TRUE);
	$uraian_pekerjaan= $this->input->post('uraian_pekerjaan', TRUE);
        $biaya_program= $this->input->post('biaya_program', TRUE);
        $biaya_realisasi = $this->input->post('biaya_realisasi', TRUE);
        $biaya_sisa = $biaya_program - $biaya_realisasi; 
        $nomor_kontrak= $this->input->post('nomor_kontrak', TRUE);
        $tanggal_kontrak= $this->input->post('tanggal_kontrak', TRUE);
        $rekanan = $this->input->post('rekanan', TRUE);
        $waktu = $this->input->post('waktu', TRUE);
	$progres = $this->input->post('progres', TRUE);
        $keterangan = $this->input->post('keterangan', TRUE);
        $this->mprogres_pekerjaan->updateprogres_pekerjaan($id, $sub_ma, $uraian_pekerjaan, $biaya_program, $biaya_realisasi, $biaya_sisa, $nomor_kontrak, $tanggal_kontrak, $rekanan, $waktu, $progres, $keterangan);
        redirect('bekasi/progres_pekerjaan');
    }

    function hapusprogres_pekerjaan() {
        $id = $this->uri->segment(3);
        $this->load->model(array('mprogres_pekerjaan'));
        $this->mprogres_pekerjaan->delprogres_pekerjaan($id);
        redirect('bekasi/progres_pekerjaan');
        echo $id;
    }    
    
    
    
/* DAB LEMAHABANG*/

    function dab_lemahabang() {
        $data['title'] = 'Bekasi:: Debet Air Bendung Lemahabang';
        $data['header'] = 'bekasi/header';
        $data['page'] = 'bekasi/dab_lemahabang/listdab_lemahabang';
        $data['footer'] = 'bekasi/footer';
        $data['dab_lemahabang'] = $this->mdab_lemahabang->getdab_lemahabang();
        $this->load->view('bekasi/template', $data);
    }

    function tambahdab_lemahabang() {
        $this->load->model(array('mdab_lemahabang', 'mseksi','',''));
        $data['title'] = 'Bekasi:: Tambah Data Debet Air Bendung Lemahabang';
        $data['header'] = 'bekasi/header';
        $data['page'] = 'bekasi/dab_lemahabang/adddab_lemahabang';
        $data['footer'] = 'bekasi/footer';
        $this->load->view('bekasi/template', $data);
    }

    function simpandab_lemahabang() {
        $this->load->model(array('mdab_lemahabang', 'mseksi','',''));
        $id_seksi = $this->input->post('id_seksi', TRUE);
        $tanggal_input= $this->input->post('tanggal_input', TRUE);
        $jam = $this->input->post('jam', TRUE);
        $tma= $this->input->post('tma', TRUE);
        $debet = $this->input->post('debet', TRUE);
        $keterangan = $this->input->post('keterangan', TRUE);
        $this->mdab_lemahabang->adddab_lemahabang($id_seksi, $tanggal_input, $jam, $tma, $debet, $keterangan);
        redirect('bekasi/dab_lemahabang');
    }

    function ubahdab_lemahabang() {
        $id = $this->uri->segment(3);
        $this->load->model(array('mdab_lemahabang', 'mseksi','',''));
        $data['title'] = $this->uri->segment(4) . 'Bekasi:: Ubah Data Debet Air Bendung Lemahabang';
        $data['header'] = 'bekasi/header';
        $data['dab_lemahabang'] = $this->mdab_lemahabang->getdab_lemahabangid($id);
        $data['page'] = 'bekasi/dab_lemahabang/editdab_lemahabang';
        $data['footer'] = 'bekasi/footer';
        $this->load->view('bekasi/template', $data);
    }

    function simpanubahdab_lemahabang() {
        $this->load->model(array('mdab_lemahabang', 'mseksi','',''));
        $id = $this->input->post('id', TRUE);
        $id_seksi = $this->input->post('id_seksi', TRUE);
        $tanggal_input= $this->input->post('tanggal_input', TRUE);
        $jam = $this->input->post('jam', TRUE);
        $tma= $this->input->post('tma', TRUE);
        $debet = $this->input->post('debet', TRUE);
        $keterangan = $this->input->post('keterangan', TRUE);
        $this->mdab_lemahabang->updatedab_lemahabang($id, $id_seksi, $tanggal_input, $jam, $tma, $debet, $keterangan);
        redirect('bekasi/dab_lemahabang');
    }

    function hapusdab_lemahabang() {
        $id = $this->uri->segment(3);
        $this->load->model(array('mdab_lemahabang'));
        $this->mdab_lemahabang->deldab_lemahabang($id);
        redirect('bekasi/dab_lemahabang');
        echo $id;
    }   
    
/* DAB BENDUNG BEKASI */

    function dab_bekasi() {
        $data['title'] = 'Bekasi:: Debet Air Bendung Bekasi';
        $data['header'] = 'bekasi/header';
        $data['page'] = 'bekasi/dab_bekasi/listdab_bekasi';
        $data['footer'] = 'bekasi/footer';
        $data['dab_bekasi'] = $this->mdab_bekasi->getdab_bekasi();
        $this->load->view('bekasi/template', $data);
    }

    function tambahdab_bekasi() {
        $this->load->model(array('mdab_bekasi', 'mseksi','',''));
        $data['title'] = 'Bekasi:: Tambah Data Debet Air Bendung Bekasi';
        $data['header'] = 'bekasi/header';
        $data['page'] = 'bekasi/dab_bekasi/adddab_bekasi';
        $data['footer'] = 'bekasi/footer';
        $this->load->view('bekasi/template', $data);
    }

    function simpandab_bekasi() {
        $this->load->model(array('mdab_bekasi', 'mseksi','',''));
        $id_seksi = $this->input->post('id_seksi', TRUE);
        $tanggal_input= $this->input->post('tanggal_input', TRUE);
        $jam = $this->input->post('jam', TRUE);
        $limpasan = $this->input->post('limpasan', TRUE);
        $suplesi_dari_btb45b= $this->input->post('suplesi_dari_btb45b', TRUE);
        $dimanfaatkan_ke_dki = $this->input->post('dimanfaatkan_ke_dki', TRUE);
        $dimanfaatkan_ke_bekasiutara = $this->input->post('dimanfaatkan_ke_bekasiutara', TRUE);
        $q1_dimanfaatkan = $dimanfaatkan_ke_dki + $dimanfaatkan_ke_bekasiutara ;
        $q2 = $limpasan + $q1_dimanfaatkan;
        $sumber_setempat = $q2 - $suplesi_dari_btb45b ;
        $keterangan = $this->input->post('keterangan', TRUE);
        $this->mdab_bekasi->adddab_bekasi($id_seksi, $tanggal_input, $jam, $limpasan ,$suplesi_dari_btb45b, $sumber_setempat, $dimanfaatkan_ke_dki, 
            $dimanfaatkan_ke_bekasiutara, $q1_dimanfaatkan, $q2, $keterangan);
        redirect('bekasi/dab_bekasi');
    }

    function ubahdab_bekasi() {
        $id = $this->uri->segment(3);
        $this->load->model(array('mdab_bekasi', 'mseksi','',''));
        $data['title'] = $this->uri->segment(4) . 'Bekasi:: Ubah Data Debet Air Bendung Bekasi';
        $data['header'] = 'bekasi/header';
        $data['dab_bekasi'] = $this->mdab_bekasi->getdab_bekasiid($id);
        $data['page'] = 'bekasi/dab_bekasi/editdab_bekasi';
        $data['footer'] = 'bekasi/footer';
        $this->load->view('bekasi/template', $data);
    }

    function simpanubahdab_bekasi() {
        $this->load->model(array('mdab_bekasi', 'mseksi','',''));
        $id = $this->input->post('id', TRUE);
        $id_seksi = $this->input->post('id_seksi', TRUE);
        $tanggal_input= $this->input->post('tanggal_input', TRUE);
        $jam = $this->input->post('jam', TRUE);
        $limpasan = $this->input->post('limpasan', TRUE);
        $suplesi_dari_btb45b= $this->input->post('suplesi_dari_btb45b', TRUE);
        $dimanfaatkan_ke_dki = $this->input->post('dimanfaatkan_ke_dki', TRUE);
        $dimanfaatkan_ke_bekasiutara = $this->input->post('dimanfaatkan_ke_bekasiutara', TRUE);
        $q1_dimanfaatkan = $dimanfaatkan_ke_dki + $dimanfaatkan_ke_bekasiutara ;
        $q2 = $limpasan + $q1_dimanfaatkan;
        $sumber_setempat = $q2 - $suplesi_dari_btb45b ;
        $keterangan = $this->input->post('keterangan', TRUE);
        $this->mdab_bekasi->updatedab_bekasi($id, $id_seksi, $tanggal_input, $jam, $limpasan ,$suplesi_dari_btb45b, $sumber_setempat, $dimanfaatkan_ke_dki, 
            $dimanfaatkan_ke_bekasiutara, $q1_dimanfaatkan, $q2, $keterangan);
        redirect('bekasi/dab_bekasi');
    }

    function hapusdab_bekasi() {
        $id = $this->uri->segment(3);
        $this->load->model(array('mdab_bekasi'));
        $this->mdab_bekasi->deldab_bekasi($id);
        redirect('bekasi/dab_bekasi');
        echo $id;
    } 
    

/* DAB BENDUNG CIBEET */

    function dab_cibeet() {
        $data['title'] = 'Bekasi:: Debet Air Bendung Cibeet';
        $data['header'] = 'bekasi/header';
        $data['page'] = 'bekasi/dab_cibeet/listdab_cibeet';
        $data['footer'] = 'bekasi/footer';
        $data['dab_cibeet'] = $this->mdab_cibeet->getdab_cibeet();
        $this->load->view('bekasi/template', $data);
    }

    function tambahdab_cibeet() {
        $this->load->model(array('mdab_cibeet', 'mseksi','',''));
        $data['title'] = 'bBkasi:: Tambah Data Debet Air Bendung Cibeet';
        $data['header'] = 'bekasi/header';
        $data['page'] = 'bekasi/dab_cibeet/adddab_cibeet';
        $data['footer'] = 'bekasi/footer';
        $this->load->view('bekasi/template', $data);
    }

    function simpandab_cibeet() {
        $this->load->model(array('mdab_cibeet', 'mseksi','',''));
        $id_seksi = $this->input->post('id_seksi', TRUE);
        $tanggal_input= $this->input->post('tanggal_input', TRUE);
        $jam = $this->input->post('jam', TRUE);
        $limpasan = $this->input->post('limpasan', TRUE);
        $bocoran= $this->input->post('bocoran', TRUE);
        $q1_suplesi_ketarumbarat = $this->input->post('q1_suplesi_ketarumbarat', TRUE);
        $q2_kalicibeet = $limpasan + $bocoran + $q1_suplesi_ketarumbarat;
        $keterangan = $this->input->post('keterangan', TRUE);
        $this->mdab_cibeet->adddab_cibeet($id_seksi, $tanggal_input, $jam, $limpasan, $bocoran, $q1_suplesi_ketarumbarat, 
            $q2_kalicibeet, $keterangan);
        redirect('bekasi/dab_cibeet');
    }

    function ubahdab_cibeet() {
        $id = $this->uri->segment(3);
        $this->load->model(array('mdab_cibeet', 'mseksi','',''));
        $data['title'] = $this->uri->segment(4) . 'Bekasi:: Ubah Data Debet Air Bendung Cibeet';
        $data['header'] = 'bekasi/header';
        $data['dab_cibeet'] = $this->mdab_cibeet->getdab_cibeetid($id);
        $data['page'] = 'bekasi/dab_cibeet/editdab_cibeet';
        $data['footer'] = 'bekasi/footer';
        $this->load->view('bekasi/template', $data);
    }

    function simpanubahdab_cibeet() {
        $this->load->model(array('mdab_bekasi', 'mseksi','',''));
        $id = $this->input->post('id', TRUE);
        $id_seksi = $this->input->post('id_seksi', TRUE);
        $tanggal_input= $this->input->post('tanggal_input', TRUE);
        $jam = $this->input->post('jam', TRUE);
        $limpasan = $this->input->post('limpasan', TRUE);
        $bocoran= $this->input->post('bocoran', TRUE);
        $q1_suplesi_ketarumbarat = $this->input->post('q1_suplesi_ketarumbarat', TRUE);
        $q2_kalicibeet = $limpasan + $bocoran + $q1_suplesi_ketarumbarat;
        $keterangan = $this->input->post('keterangan', TRUE);
        $this->mdab_cibeet->updatedab_cibeet($id, $id_seksi, $tanggal_input, $jam, $limpasan, $bocoran, $q1_suplesi_ketarumbarat, 
            $q2_kalicibeet, $keterangan);
        redirect('bekasi/dab_cibeet');
    }

    function hapusdab_cibeet() {
        $id = $this->uri->segment(3);
        $this->load->model(array('mdab_cibeet'));
        $this->mdab_cibeet->deldab_cibeet($id);
        redirect('bekasi/dab_cibeet');
        echo $id;
    }   

    
/* DAB BENDUNG CIKARANG */

    function dab_cikarang() {
        $data['title'] = 'Bekasi:: Debet Air Bendung Cikarang';
        $data['header'] = 'bekasi/header';
        $data['page'] = 'bekasi/dab_cikarang/listdab_cikarang';
        $data['footer'] = 'bekasi/footer';
        $data['dab_cikarang'] = $this->mdab_cikarang->getdab_cikarang();
        $this->load->view('bekasi/template', $data);
    }

    function tambahdab_cikarang() {
        $this->load->model(array('mdab_cikarang', 'mseksi','',''));
        $data['title'] = 'Bekasi:: Tambah Data Debet Air Bendung Cikarang';
        $data['header'] = 'bekasi/header';
        $data['page'] = 'bekasi/dab_cikarang/adddab_cikarang';
        $data['footer'] = 'bekasi/footer';
        $this->load->view('bekasi/template', $data);
    }

    function simpandab_cikarang() {
        $this->load->model(array('mdab_cikarang', 'mseksi','',''));
        $id_seksi = $this->input->post('id_seksi', TRUE);
        $tanggal_input= $this->input->post('tanggal_input', TRUE);
        $jam = $this->input->post('jam', TRUE);
        $limpasan = $this->input->post('limpasan', TRUE);
        $bocoran= $this->input->post('bocoran', TRUE);
    //    $pintu_penguras = $this->input->post('pintu_penguras', TRUE);
        $suplesi_dari_btb34b = $this->input->post('suplesi_dari_btb34b', TRUE);
        $dimanfaatkan_ke_bekasibarat = $this->input->post('dimanfaatkan_ke_bekasibarat', TRUE);
        $dimanfaatkan_ke_sukatani = $this->input->post('dimanfaatkan_ke_sukatani', TRUE);
        $pintu_penguras = $dimanfaatkan_ke_sukatani - $limpasan;
        $sumber_setempat = $dimanfaatkan_ke_bekasibarat + $dimanfaatkan_ke_sukatani - $suplesi_dari_btb34b ;
        $q1_dimanfaatkan = $dimanfaatkan_ke_bekasibarat + $dimanfaatkan_ke_sukatani ;
        $q2 = $q1_dimanfaatkan;
        $keterangan = $this->input->post('keterangan', TRUE);
        $this->mdab_cikarang->adddab_cikarang($id_seksi, $tanggal_input, $jam, $limpasan, $bocoran, $pintu_penguras, $suplesi_dari_btb34b, 
        $sumber_setempat, $dimanfaatkan_ke_bekasibarat, $dimanfaatkan_ke_sukatani, $q1_dimanfaatkan, $q2 ,$keterangan);
        redirect('bekasi/dab_cikarang');
    }

    function ubahdab_cikarang() {
        $id = $this->uri->segment(3);
        $this->load->model(array('mdab_cikarang', 'mseksi','',''));
        $data['title'] = $this->uri->segment(4) . 'Bekasi:: Ubah Data Debet Air Bendung Cikarang';
        $data['header'] = 'bekasi/header';
        $data['dab_cikarang'] = $this->mdab_cikarang->getdab_cikarangid($id);
        $data['page'] = 'bekasi/dab_cikarang/editdab_cikarang';
        $data['footer'] = 'bekasi/footer';
        $this->load->view('bekasi/template', $data);
    }

    function simpanubahdab_cikarang() {
        $this->load->model(array('mdab_cikarang', 'mseksi','',''));
        $id = $this->input->post('id', TRUE);
        $id_seksi = $this->input->post('id_seksi', TRUE);
        $tanggal_input= $this->input->post('tanggal_input', TRUE);
        $jam = $this->input->post('jam', TRUE);
        $limpasan = $this->input->post('limpasan', TRUE);
        $bocoran= $this->input->post('bocoran', TRUE);
    //    $pintu_penguras = $this->input->post('pintu_penguras', TRUE);
        $suplesi_dari_btb34b = $this->input->post('suplesi_dari_btb34b', TRUE);
        $dimanfaatkan_ke_bekasibarat = $this->input->post('dimanfaatkan_ke_bekasibarat', TRUE);
        $dimanfaatkan_ke_sukatani = $this->input->post('dimanfaatkan_ke_sukatani', TRUE);
        $pintu_penguras = $dimanfaatkan_ke_sukatani - $limpasan;
        $sumber_setempat = $dimanfaatkan_ke_bekasibarat + $dimanfaatkan_ke_sukatani - $suplesi_dari_btb34b ;
        $q1_dimanfaatkan = $dimanfaatkan_ke_bekasibarat + $dimanfaatkan_ke_sukatani ;
        $q2 = $q1_dimanfaatkan;
        $keterangan = $this->input->post('keterangan', TRUE);
        $this->mdab_cikarang->updatedab_cikarang($id, $id_seksi, $tanggal_input, $jam, $limpasan, $bocoran, $pintu_penguras, $suplesi_dari_btb34b, 
        $sumber_setempat, $dimanfaatkan_ke_bekasibarat, $dimanfaatkan_ke_sukatani, $q1_dimanfaatkan, $q2 ,$keterangan);
        redirect('bekasi/dab_cikarang');
    }

    function hapusdab_cikarang() {
        $id = $this->uri->segment(3);
        $this->load->model(array('mdab_cikarang'));
        $this->mdab_cikarang->deldab_cikarang($id);
        redirect('bekasi/dab_cikarang');
        echo $id;
    }       

    
    
    
/* LAPORAN */
    
    function laporancurahhujan() {
        $data['title'] = 'Laporan Curah Hujan';
        $data['header'] = 'bekasi/header';
        $data['footer'] = 'bekasi/footer';
        $data['page'] = 'bekasi/laporan/lap_curahhujan';
        $this->load->view('bekasi/template', $data);
    }

    function cetaklaporancurahhujan($seksi = '', $tgl1 = '', $tgl2 = '') {
        $data['title'] = 'Cetak Laporan Curah Hujan';
        $data['seksi'] = $seksi;
        $data['tgl1'] = date('Y-m-d', strtotime($tgl1));
        $data['tgl2'] = date('Y-m-d', strtotime($tgl2));
        $data['page'] = $this->load->view('bekasi/laporan/cetak_lap_curahhujan', $data);
        $this->load->view('bekasi/laporan/template', $data);
    }

    function laporankejadian() {
        $data['title'] = 'Laporan Curah Hujan';
        $data['header'] = 'bekasi/header';
        $data['footer'] = 'bekasi/footer';
        $data['page'] = 'bekasi/laporan/lap_kejadian';
        $this->load->view('bekasi/template', $data);
    }

    function cetaklaporankejadian($seksi = '', $tgl1 = '', $tgl2 = '') {
        $data['title'] = 'Cetak Laporan Curah Hujan';
        $data['seksi'] = $seksi;
        $data['tgl1'] = date('Y-m-d', strtotime($tgl1));
        $data['tgl2'] = date('Y-m-d', strtotime($tgl2));
        $data['page'] = $this->load->view('bekasi/laporan/cetak_lap_kejadian', $data);
        $this->load->view('bekasi/laporan/template', $data);
    }
   
    
    function laporanprogrespekerjaan() {
        $data['title'] = 'Laporan Progres Pekerjaan';
        $data['header'] = 'bekasi/header';
        $data['footer'] = 'bekasi/footer';
        $data['page'] = 'bekasi/laporan/lap_laporanprogrespekerjaan';
        $this->load->view('bekasi/template', $data);
    }

    function cetaklaporanprogrespekerjaan( $tgl1 = '', $tgl2 = '') {
        $data['title'] = 'Cetak Laporan Progres Pekerjaan';
      //  $data['seksi'] = $seksi;
        $data['tgl1'] = date('Y-m-d', strtotime($tgl1));
        $data['tgl2'] = date('Y-m-d', strtotime($tgl2));
        $data['page'] = $this->load->view('bekasi/laporan/cetak_lap_laporanprogrespekerjaan', $data);
        $this->load->view('bekasi/laporan/template', $data);
    }   
    
    function laporanpemakaianair() {
        $data['title'] = 'Laporan Pemakaian Air';
        $data['header'] = 'bekasi/header';
        $data['footer'] = 'bekasi/footer';
        $data['page'] = 'bekasi/laporan/lap_laporanpemakaianair';
        $this->load->view('bekasi/template', $data);
    }
    function cetaklaporanpemakaianair($balai = '', $seksi='',$tgl1 = '', $tgl2 = '') {
        $data['title'] = 'Cetak Laporan Laporan Pemakaian Air';
        $data['balai'] = $balai;
        $data['seksi'] = $seksi;
        $data['tgl1'] = date('Y-m-d', strtotime($tgl1));
        $data['tgl2'] = date('Y-m-d', strtotime($tgl2));
        $data['page'] = $this->load->view('bekasi/laporan/cetak_lap_laporanpemakaianair', $data);
        $this->load->view('bekasi/laporan/template', $data);
    }
    

    function laporanpemberianair() {
        $data['title'] = 'Laporan Pemberian Air';
        $data['header'] = 'bekasi/header';
        $data['footer'] = 'bekasi/footer';
        $data['page'] = 'bekasi/laporan/lap_laporanpemberianair';
        $this->load->view('bekasi/template', $data);
    }
    function cetaklaporanpemberianair($saluran_sekunder = '', $seksi='',$tgl1 = '', $tgl2 = '') {
        $data['title'] = 'Cetak Laporan Laporan Pemberian Air';
        $data['saluran_sekunder'] = $saluran_sekunder;
        $data['seksi'] = $seksi;
        $data['tgl1'] = date('Y-m-d', strtotime($tgl1));
        $data['tgl2'] = date('Y-m-d', strtotime($tgl2));
        $data['page'] = $this->load->view('bekasi/laporan/cetak_lap_laporanpemberianair', $data);
        $this->load->view('bekasi/laporan/template', $data);
    }

    
    function laporaninventarea() {
        $data['title'] = 'Laporan Pemberian Air';
        $data['header'] = 'bekasi/header';
        $data['footer'] = 'bekasi/footer';
        $data['page'] = 'bekasi/laporan/lap_laporaninventarea';
        $this->load->view('bekasi/template', $data);
    }
    function cetaklaporaninventarea($saluran_sekunder = '', $seksi='',$tgl1 = '', $tgl2 = '') {
        $data['title'] = 'Cetak Laporan Pemberian Air';
        $data['saluran_sekunder'] = $saluran_sekunder;
        $data['seksi'] = $seksi;
        $data['tgl1'] = date('Y-m-d', strtotime($tgl1));
        $data['tgl2'] = date('Y-m-d', strtotime($tgl2));
        $data['page'] = $this->load->view('bekasi/laporan/cetak_lap_laporaninventarea', $data);
        $this->load->view('bekasi/laporan/template', $data);
    }    
    
    function laporantanamrendeng() {
        $data['title'] = 'Laporan Tanam Rendeng';
        $data['header'] = 'bekasi/header';
        $data['footer'] = 'bekasi/footer';
        $data['page'] = 'bekasi/laporan/lap_laporantanamrendeng';
        $this->load->view('bekasi/template', $data);
    }
    
	function cetaklaporantanamrendeng($saluran_tanam = '', $seksi='',$tgl1 = '', $tgl2 = '') {
        $data['title'] = 'Cetak Laporan Tanam Rendeng';
        $data['saluran_tanam'] = $saluran_tanam;
        $data['seksi'] = $seksi;
        $data['tgl1'] = date('Y-m-d', strtotime($tgl1));
        $data['tgl2'] = date('Y-m-d', strtotime($tgl2));
        $data['page'] = $this->load->view('bekasi/laporan/cetak_lap_laporantanamrendeng', $data);
        $this->load->view('bekasi/laporan/template', $data);
    }    

    
    function laporantanamgadu() {
        $data['title'] = 'Laporan Tanam Gadu';
        $data['header'] = 'bekasi/header';
        $data['footer'] = 'bekasi/footer';
        $data['page'] = 'bekasi/laporan/lap_laporantanamgadu';
        $this->load->view('bekasi/template', $data);
    }
    
	function cetaklaporantanamgadu($saluran_tanam = '', $seksi='',$tgl1 = '', $tgl2 = '') {
        $data['title'] = 'Cetak Laporan Tanam Gadu';
        $data['saluran_tanam'] = $saluran_tanam;
        $data['seksi'] = $seksi;
        $data['tgl1'] = date('Y-m-d', strtotime($tgl1));
        $data['tgl2'] = date('Y-m-d', strtotime($tgl2));
        $data['page'] = $this->load->view('bekasi/laporan/cetak_lap_laporantanamgadu', $data);
        $this->load->view('bekasi/laporan/template', $data);
    }    
    
        
    /* LAPORAN DEBET AIR*/   
    
    
function laporan_dab_cbl() {
        $data['title'] = 'Laporan Debet Air Bendung CBL';
        $data['header'] = 'bekasi/header';
        $data['footer'] = 'bekasi/footer';
        $data['page'] = 'bekasi/laporan/lap_dab_cbl';
        $this->load->view('bekasi/template', $data);
    }

    function cetaklaporan_dab_cbl( $tgl1 = '', $tgl2 = '') {
        $data['title'] = 'Cetak Laporan Debet Air Bendung CBL';
      //  $data['seksi'] = $seksi;
        $data['tgl1'] = date('Y-m-d', strtotime($tgl1));
        $data['tgl2'] = date('Y-m-d', strtotime($tgl2));
        $data['page'] = $this->load->view('bekasi/laporan/cetak_lap_dab_cbl', $data);
        $this->load->view('bekasi/laporan/template', $data);
    }   

}
