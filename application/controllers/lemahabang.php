<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Lemahabang extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model(array('','msaluran_tanam', 'mbendung','mseksi', 'mbalai', 'msaluran_sekunder','','mtanam_rendeng','mtanam_gadu',
                                'mkejadian', '','mcurah_hujan', '', '', '', '', 
                                '', 'minvent_area', 'mpemakaian_air','mpemberian_air', '','',
                                'mdab_cbl','mdab_cikeas','mdab_cipamingkis','mdab_jembatan_bojong','mdab_lemahabang',
                                 'mdab_bekasi','mdab_cibeet','mdab_cikarang'));
        if (!$this->session->userdata('logged_in') && !$this->session->userdata('pengguna'))
            redirect(base_url(), 'refresh');
    }
    
    function index() {
        $data['title'] = 'Lemahabang:: Aplikasi DPA I PJTII';
        $data['header'] = 'lemahabang/header';
        $data['slider'] = 'lemahabang/slider';
	$data['page'] = 'lemahabang/page/home';
	$data['footer'] = 'lemahabang/footer';
        $this->load->view('template', $data);
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
        $data['title'] = 'lemahabang:: Data Inventaris Area Lahan Tanam';
        $data['header'] = 'lemahabang/header';
        $data['footer'] = 'lemahabang/footer';
        $data['page'] = 'lemahabang/invent_area/listinvent_area';
        $data['invent_area'] = $this->minvent_area->getinvent_area();
        $this->load->view('lemahabang/template', $data);
    }

    function tambahinvent_area() {
        $this->load->model(array('minvent_area', 'mseksi','mpengamat','msaluran_sekunder'));
        $data['title'] = 'lemahabang:: Tambah Data Inventaris Area Lahan Tanam';
        $data['header'] = 'lemahabang/header';
        $data['footer'] = 'lemahabang/footer';
        $data['page'] = 'lemahabang/invent_area/addinvent_area';
        $this->load->view('lemahabang/template', $data);
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
        redirect('lemahabang/invent_area');
    }

    function ubahinvent_area() {
        $id = $this->uri->segment(3);
        $this->load->model(array('minvent_area', 'mseksi','mpengamat','msaluran_sekunder'));
        $data['title'] = $this->uri->segment(4) . 'lemahabang:: Ubah Data Inventaris Area Lahan Tanam';
        $data['header'] = 'lemahabang/header';
        $data['footer'] = 'lemahabang/footer';
        $data['invent_area'] = $this->minvent_area->getinvent_areaid($id);
        $data['page'] = 'lemahabang/invent_area/editinvent_area';
        $this->load->view('lemahabang/template', $data);
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
        redirect('lemahabang/invent_area');
    }

    function hapusinvent_area() {
        $id = $this->uri->segment(3);
        $this->load->model(array('minvent_area'));
        $this->minvent_area->delinvent_area($id);
        redirect('lemahabang/invent_area');
        echo $id;
    }
    


/* PEMAKAIAN AIR */

    function pemakaian_air() {
        $data['title'] = 'lemahabang:: Data Pemakaian Air Kepada Pelanggan';
        $data['header'] = 'lemahabang/header';
        $data['footer'] = 'lemahabang/footer';
        $data['page'] = 'lemahabang/pemakaian_air/listpemakaian_air';
        $data['pemakaian_air'] = $this->mpemakaian_air->getpemakaian_air();
        $this->load->view('lemahabang/template', $data);
    }

    function tambahpemakaian_air() {
        $this->load->model(array('mpemakaian_air', 'mseksi','mpelanggan','mbalai'));
        $data['title'] = 'lemahabang:: Tambah Data Pemakaian Air Oleh Perusahaan';
        $data['header'] = 'lemahabang/header';
        $data['footer'] = 'lemahabang/footer';
        $data['page'] = 'lemahabang/pemakaian_air/addpemakaian_air';
        $this->load->view('lemahabang/template', $data);
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
        redirect('lemahabang/pemakaian_air');
    }

    function ubahpemakaian_air() {
        $id = $this->uri->segment(3);
        $this->load->model(array('mpemakaian_air', 'mseksi','mpelanggan','mbalai'));
        $data['title'] = $this->uri->segment(4) . 'lemahabang:: Ubah Data Pemakaian Air Oleh Pelanggan';
        $data['header'] = 'lemahabang/header';
        $data['footer'] = 'lemahabang/footer';
        $data['pemakaian_air'] = $this->mpemakaian_air->getpemakaian_airid($id);
        $data['page'] = 'lemahabang/pemakaian_air/editpemakaian_air';
        $this->load->view('lemahabang/template', $data);
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
        redirect('lemahabang/pemakaian_air');
    }

    function hapuspemakaian_air() {
        $id = $this->uri->segment(3);
        $this->load->model(array('mpemakaian_air'));
        $this->mpemakaian_air->delpemakaian_air($id);
        redirect('lemahabang/pemakaian_air');
        echo $id;
    }
    

/* PEMBERIAN AIR */

    function pemberian_air() {
        $data['title'] = 'lemahabang:: Data Pemberian Air';
        $data['header'] = 'lemahabang/header';
        $data['footer'] = 'lemahabang/footer';
        $data['page'] = 'lemahabang/pemberian_air/listpemberian_air';
        $data['pemberian_air'] = $this->mpemberian_air->getpemberian_air();
        $this->load->view('lemahabang/template', $data);
    }

    function tambahpemberian_air() {
        $this->load->model(array('mpemberian_air','mseksi','msaluran_sekunder',''));
        $data['title'] = 'lemahabang:: Tambah Data Pemberian Air';
        $data['header'] = 'lemahabang/header';
        $data['footer'] = 'lemahabang/footer';
        $data['page'] = 'lemahabang/pemberian_air/addpemberian_air';
        $this->load->view('lemahabang/template', $data);
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
        redirect('lemahabang/pemberian_air');
    }

    function ubahpemberian_air() {
        $id = $this->uri->segment(3);
        $this->load->model(array('mpemberian_air', 'mseksi','msaluran_sekunder',''));
        $data['title'] = $this->uri->segment(4) . 'lemahabang:: Ubah Data Pemberian Air';
        $data['header'] = 'lemahabang/header';
        $data['footer'] = 'lemahabang/footer';
        $data['pemberian_air'] = $this->mpemberian_air->getpemberian_airid($id);
        $data['page'] = 'lemahabang/pemberian_air/editpemberian_air';
        $this->load->view('lemahabang/template', $data);
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
        redirect('lemahabang/pemberian_air');
    }

    function hapuspemberian_air() {
        $id = $this->uri->segment(3);
        $this->load->model(array('mpemberian_air'));
        $this->mpemberian_air->delpemberian_air($id);
        redirect('lemahabang/pemberian_air');
        echo $id;
    }

    /* KEJADIAN  */

    function kejadian() {
        $data['title'] = 'Admin:: Data Curah Hujan';
        $data['header'] = 'lemahabang/header';
        $data['page'] = 'lemahabang/kejadian/listkejadian';
        $data['footer'] = 'lemahabang/footer';
        $data['kejadian'] = $this->mkejadian->getkejadian();
        $this->load->view('lemahabang/template', $data);
    }

    function tambahkejadian() {
        $this->load->model(array('mkejadian', 'mseksi','mbendung',''));
        $data['title'] = 'Admin:: Tambah Data Curah Hujan';
        $data['header'] = 'lemahabang/header';
        $data['page'] = 'lemahabang/kejadian/addkejadian';
        $data['footer'] = 'lemahabang/footer';
        $this->load->view('lemahabang/template', $data);
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
        redirect('lemahabang/kejadian');
    }

    function ubahkejadian() {
        $id = $this->uri->segment(3);
        $this->load->model(array('mkejadian', 'mseksi','mbendung',''));
        $data['title'] = $this->uri->segment(4) . 'Admin:: Ubah Data Curah Hujan';
        $data['header'] = 'lemahabang/header';
        $data['kejadian'] = $this->mkejadian->getkejadianid($id);
        $data['page'] = 'lemahabang/kejadian/editkejadian';
        $data['footer'] = 'lemahabang/footer';
        $this->load->view('lemahabang/template', $data);
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
        redirect('lemahabang/kejadian');
    }

    function hapuskejadian() {
        $id = $this->uri->segment(3);
        $this->load->model(array('mkejadian'));
        $this->mkejadian->delkejadian($id);
        redirect('lemahabang/kejadian');
        echo $id;
    }    

    
        
/* CURAH HUJAN  */

    function curah_hujan() {
        $data['title'] = 'lemahabang:: Data Curah Hujan';
        $data['header'] = 'lemahabang/header';
        $data['footer'] = 'lemahabang/footer';
        $data['page'] = 'lemahabang/curah_hujan/listcurah_hujan';
        $data['curah_hujan'] = $this->mcurah_hujan->getcurah_hujan();
        $this->load->view('lemahabang/template', $data);
    }

    function tambahcurah_hujan() {
        $this->load->model(array('mcurah_hujan', 'mseksi','',''));
        $data['title'] = 'lemahabang:: Tambah Data Curah Hujan';
        $data['header'] = 'lemahabang/header';
        $data['footer'] = 'lemahabang/footer';
        $data['page'] = 'lemahabang/curah_hujan/addcurah_hujan';
        $this->load->view('lemahabang/template', $data);
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
        redirect('lemahabang/curah_hujan');
    }

    function ubahcurah_hujan() {
        $id = $this->uri->segment(3);
        $this->load->model(array('mcurah_hujan', 'mseksi','',''));
        $data['title'] = $this->uri->segment(4) . 'Admin:: Ubah Data Curah Hujan';
        $data['header'] = 'lemahabang/header';
        $data['curah_hujan'] = $this->mcurah_hujan->getcurah_hujanid($id);
        $data['page'] = 'lemahabang/curah_hujan/editcurah_hujan';
        $data['footer'] = 'lemahabang/footer';
        $this->load->view('lemahabang/template', $data);
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
        redirect('lemahabang/curah_hujan');
    }

    function hapuscurah_hujan() {
        $id = $this->uri->segment(3);
        $this->load->model(array('mcurah_hujan'));
        $this->mcurah_hujan->delcurah_hujan($id);
        redirect('lemahabang/curah_hujan');
        echo $id;
    }
    

/* TANAM RENDENG  */

    function tanam_rendeng() {
        $data['title'] = 'lemahabang:: Data Tanam Rendeng ';
        $data['header'] = 'lemahabang/header';
        $data['footer'] = 'lemahabang/footer';
        $data['page'] = 'lemahabang/tanam_rendeng/listtanam_rendeng';
        $data['tanam_rendeng'] = $this->mtanam_rendeng->gettanam_rendeng();
        $this->load->view('lemahabang/template', $data);
    }

    function tambahtanam_rendeng() {
        $this->load->model(array('mtanam_rendeng', 'mseksi','msaluran_tanam','mgolongan_tanam'));
        $data['title'] = 'lemahabang:: Tambah Data Tanam Rendeng';
        $data['header'] = 'lemahabang/header';
        $data['footer'] = 'lemahabang/footer';
        $data['page'] = 'lemahabang/tanam_rendeng/addtanam_rendeng';
        $this->load->view('lemahabang/template', $data);
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
        redirect('lemahabang/tanam_rendeng');
    }

    function ubahtanam_rendeng() {
        $id = $this->uri->segment(3);
        $this->load->model(array('mtanam_rendeng', 'mseksi','msaluran_tanam','mgolongan_tanam'));
        $data['title'] = $this->uri->segment(4) . 'lemahabang:: Ubah Data Tanam Rendeng';
        $data['header'] = 'lemahabang/header';
        $data['footer'] = 'lemahabang/footer';
        $data['tanam_rendeng'] = $this->mtanam_rendeng->gettanam_rendengid($id);
        $data['page'] = 'lemahabang/tanam_rendeng/edittanam_rendeng';
        $this->load->view('lemahabang/template', $data);
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
        redirect('lemahabang/tanam_rendeng');
    }

    function hapustanam_rendeng() {
        $id = $this->uri->segment(3);
        $this->load->model(array('mtanam_rendeng'));
        $this->mtanam_rendeng->deltanam_rendeng($id);
        redirect('lemahabang/tanam_rendeng');
        echo $id;
    }    


/* TANAM GADU  */

    function tanam_gadu() {
        $data['title'] = 'lemahabang:: Data Tanam Gadu ';
        $data['header'] = 'lemahabang/header';
        $data['footer'] = 'lemahabang/footer';
        $data['page'] = 'lemahabang/tanam_gadu/listtanam_gadu';
        $data['tanam_gadu'] = $this->mtanam_gadu->gettanam_gadu();
        $this->load->view('lemahabang/template', $data);
    }

    function tambahtanam_gadu() {
        $this->load->model(array('mtanam_gadu', 'mseksi','msaluran_tanam','mgolongan_tanam'));
        $data['title'] = 'lemahabang:: Tambah Data Tanam Gadu';
        $data['header'] = 'lemahabang/header';
        $data['footer'] = 'lemahabang/footer';
        $data['page'] = 'lemahabang/tanam_gadu/addtanam_gadu';
        $this->load->view('lemahabang/template', $data);
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
        redirect('lemahabang/tanam_gadu');
    }

    function ubahtanam_gadu() {
        $id = $this->uri->segment(3);
        $this->load->model(array('mtanam_gadu', 'mseksi','msaluran_tanam','mgolongan_tanam'));
        $data['title'] = $this->uri->segment(4) . 'lemahabang:: Ubah Data Tanam Gadu';
        $data['header'] = 'lemahabang/header';
        $data['footer'] = 'lemahabang/footer';
        $data['tanam_gadu'] = $this->mtanam_gadu->gettanam_gaduid($id);
        $data['page'] = 'lemahabang/tanam_gadu/edittanam_gadu';
        $this->load->view('lemahabang/template', $data);
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
        redirect('lemahabang/tanam_gadu');
    }

    function hapustanam_gadu() {
        $id = $this->uri->segment(3);
        $this->load->model(array('mtanam_gadu'));
        $this->mtanam_gadu->deltanam_gadu($id);
        redirect('lemahabang/tanam_gadu');
        echo $id;
    }    

/* DAB CBL */

    function dab_cbl() {
        $data['title'] = 'lemahabang:: Debet Air Bendung CBL';
        $data['header'] = 'lemahabang/header';
        $data['footer'] = 'lemahabang/footer';
        $data['page'] = 'lemahabang/dab_cbl/listdab_cbl';
        $data['dab_cbl'] = $this->mdab_cbl->getdab_cbl();
        $this->load->view('lemahabang/template', $data);
    }

    function tambahdab_cbl() {
        $this->load->model(array('mdab_cbl', 'mseksi','',''));
        $data['title'] = 'lemahabang:: Tambah Data Debet Air Bendung CBL';
        $data['header'] = 'lemahabang/header';
        $data['footer'] = 'lemahabang/footer';
        $data['page'] = 'lemahabang/dab_cbl/adddab_cbl';
        $this->load->view('lemahabang/template', $data);
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
        redirect('lemahabang/dab_cbl');
    }

    function ubahdab_cbl() {
        $id = $this->uri->segment(3);
        $this->load->model(array('mdab_cbl', 'mseksi','',''));
        $data['title'] = $this->uri->segment(4) . 'lemahabang:: Ubah Data Debet Air Bendung CBL';
        $data['header'] = 'lemahabang/header';
        $data['footer'] = 'lemahabang/footer';
        $data['dab_cbl'] = $this->mdab_cbl->getdab_cblid($id);
        $data['page'] = 'lemahabang/dab_cbl/editdab_cbl';
        $this->load->view('lemahabang/template', $data);
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
        redirect('lemahabang/dab_cbl');
    }

    function hapusdab_cbl() {
        $id = $this->uri->segment(3);
        $this->load->model(array('mdab_cbl'));
        $this->mdab_cbl->deldab_cbl($id);
        redirect('lemahabang/dab_cbl');
        echo $id;
    }
        
/* DAB CIKEAS */

    function dab_cikeas() {
        $data['title'] = 'lemahabang:: Debet Air Bendung Cikeas';
        $data['header'] = 'lemahabang/header';
        $data['footer'] = 'lemahabang/footer';
        $data['page'] = 'lemahabang/dab_cikeas/listdab_cikeas';
        $data['dab_cikeas'] = $this->mdab_cikeas->getdab_cikeas();
        $this->load->view('lemahabang/template', $data);
    }

    function tambahdab_cikeas() {
        $this->load->model(array('mdab_cikeas', 'mseksi','',''));
        $data['title'] = 'lemahabang:: Tambah Data Debet Air Bendung Cikeas';
        $data['header'] = 'lemahabang/header';
        $data['footer'] = 'lemahabang/footer';
        $data['page'] = 'lemahabang/dab_cikeas/adddab_cikeas';
        $this->load->view('lemahabang/template', $data);
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
        redirect('lemahabang/dab_cikeas');
    }

    function ubahdab_cikeas() {
        $id = $this->uri->segment(3);
        $this->load->model(array('mdab_cikeas', 'mseksi','',''));
        $data['title'] = $this->uri->segment(4) . 'lemahabang:: Ubah Data Debet Air Bendung Cikeas';
        $data['header'] = 'lemahabang/header';
        $data['footer'] = 'lemahabang/footer';
        $data['dab_cikeas'] = $this->mdab_cikeas->getdab_cikeasid($id);
        $data['page'] = 'lemahabang/dab_cikeas/editdab_cikeas';
        $this->load->view('lemahabang/template', $data);
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
        redirect('lemahabang/dab_cikeas');
    }

    function hapusdab_cikeas() {
        $id = $this->uri->segment(3);
        $this->load->model(array('mdab_cikeas'));
        $this->mdab_cikeas->deldab_cikeas($id);
        redirect('lemahabang/dab_cikeas');
        echo $id;
    }

    /* DAB CIPAMINGKIS */

    function dab_cipamingkis() {
        $data['title'] = 'lemahabang:: Debet Air Bendung Cipamingkis';
        $data['header'] = 'lemahabang/header';
        $data['footer'] = 'lemahabang/footer';
        $data['page'] = 'lemahabang/dab_cipamingkis/listdab_cipamingkis';
        $data['dab_cipamingkis'] = $this->mdab_cipamingkis->getdab_cipamingkis();
        $this->load->view('lemahabang/template', $data);
    }

    function tambahdab_cipamingkis() {
        $this->load->model(array('mdab_cipamingkis', 'mseksi','',''));
        $data['title'] = 'lemahabang:: Tambah Data Debet Air Bendung Cipamingkis';
        $data['header'] = 'lemahabang/header';
        $data['footer'] = 'lemahabang/footer';
        $data['page'] = 'lemahabang/dab_cipamingkis/adddab_cipamingkis';
        $this->load->view('lemahabang/template', $data);
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
        redirect('lemahabang/dab_cipamingkis');
    }

    function ubahdab_cipamingkis() {
        $id = $this->uri->segment(3);
        $this->load->model(array('mdab_cipamingkis', 'mseksi','',''));
        $data['title'] = $this->uri->segment(4) . 'lemahabang:: Ubah Data Debet Air Bendung Cipamingkis';
        $data['header'] = 'lemahabang/header';
        $data['footer'] = 'lemahabang/footer';
        $data['dab_cipamingkis'] = $this->mdab_cipamingkis->getdab_cipamingkisid($id);
        $data['page'] = 'lemahabang/dab_cipamingkis/editdab_cipamingkis';
        $this->load->view('lemahabang/template', $data);
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
        redirect('lemahabang/dab_cipamingkis');
    }

    function hapusdab_cipamingkis() {
        $id = $this->uri->segment(3);
        $this->load->model(array('mdab_cipamingkis'));
        $this->mdab_cipamingkis->deldab_cipamingkis($id);
        redirect('lemahabang/dab_cipamingkis');
        echo $id;
    }
    
    
/* DAB JEMBATAN BOJONG */

    function dab_jembatan_bojong() {
        $data['title'] = 'lemahabang:: Debet Air Jembatan Bojong';
        $data['header'] = 'lemahabang/header';
        $data['footer'] = 'lemahabang/footer';
        $data['page'] = 'lemahabang/dab_jembatan_bojong/listdab_jembatan_bojong';
        $data['dab_jembatan_bojong'] = $this->mdab_jembatan_bojong->getdab_jembatan_bojong();
        $this->load->view('lemahabang/template', $data);
    }

    function tambahdab_jembatan_bojong() {
        $this->load->model(array('mdab_jembatan_bojong', 'mseksi','',''));
        $data['title'] = 'lemahabang:: Tambah Data Debet Air Jembatan Bojong';
        $data['header'] = 'lemahabang/header';
        $data['footer'] = 'lemahabang/footer';
        $data['page'] = 'lemahabang/dab_jembatan_bojong/adddab_jembatan_bojong';
        $this->load->view('lemahabang/template', $data);
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
        redirect('lemahabang/dab_jembatan_bojong');
    }

    function ubahdab_jembatan_bojong() {
        $id = $this->uri->segment(3);
        $this->load->model(array('mdab_jembatan_bojong', 'mseksi','',''));
        $data['title'] = $this->uri->segment(4) . 'lemahabang:: Ubah Data Debet Air Jembatan Bojong';
        $data['header'] = 'lemahabang/header';
        $data['footer'] = 'lemahabang/footer';
        $data['dab_jembatan_bojong'] = $this->mdab_jembatan_bojong->getdab_jembatan_bojongid($id);
        $data['page'] = 'lemahabang/dab_jembatan_bojong/editdab_jembatan_bojong';
        $this->load->view('lemahabang/template', $data);
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
        redirect('lemahabang/dab_jembatan_bojong');
    }

    function hapusdab_jembatan_bojong() {
        $id = $this->uri->segment(3);
        $this->load->model(array('mdab_jembatan_bojong'));
        $this->mdab_jembatan_bojong->deldab_jembatan_bojong($id);
        redirect('lemahabang/dab_jembatan_bojong');
        echo $id;
    }

    
/* DAB LEMAHABANG*/

    function dab_lemahabang() {
        $data['title'] = 'lemahabang:: Debet Air Bendung Lemahabang';
        $data['header'] = 'lemahabang/header';
        $data['footer'] = 'lemahabang/footer';
        $data['page'] = 'lemahabang/dab_lemahabang/listdab_lemahabang';
        $data['dab_lemahabang'] = $this->mdab_lemahabang->getdab_lemahabang();
        $this->load->view('lemahabang/template', $data);
    }

    function tambahdab_lemahabang() {
        $this->load->model(array('mdab_lemahabang', 'mseksi','',''));
        $data['title'] = 'lemahabang:: Tambah Data Debet Air Bendung Lemahabang';
        $data['header'] = 'lemahabang/header';
        $data['footer'] = 'lemahabang/footer';
        $data['page'] = 'lemahabang/dab_lemahabang/adddab_lemahabang';
        $this->load->view('lemahabang/template', $data);
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
        redirect('lemahabang/dab_lemahabang');
    }

    function ubahdab_lemahabang() {
        $id = $this->uri->segment(3);
        $this->load->model(array('mdab_lemahabang', 'mseksi','',''));
        $data['title'] = $this->uri->segment(4) . 'lemahabang:: Ubah Data Debet Air Bendung Lemahabang';
        $data['header'] = 'lemahabang/header';
        $data['footer'] = 'lemahabang/footer';
        $data['dab_lemahabang'] = $this->mdab_lemahabang->getdab_lemahabangid($id);
        $data['page'] = 'lemahabang/dab_lemahabang/editdab_lemahabang';
        $this->load->view('lemahabang/template', $data);
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
        redirect('lemahabang/dab_lemahabang');
    }

    function hapusdab_lemahabang() {
        $id = $this->uri->segment(3);
        $this->load->model(array('mdab_lemahabang'));
        $this->mdab_lemahabang->deldab_lemahabang($id);
        redirect('lemahabang/dab_lemahabang');
        echo $id;
    }   
    
/* DAB BENDUNG BEKASI */

    function dab_bekasi() {
        $data['title'] = 'lemahabang:: Debet Air Bendung Bekasi';
        $data['header'] = 'lemahabang/header';
        $data['footer'] = 'lemahabang/footer';
        $data['page'] = 'lemahabang/dab_bekasi/listdab_bekasi';
        $data['dab_bekasi'] = $this->mdab_bekasi->getdab_bekasi();
        $this->load->view('lemahabang/template', $data);
    }

    function tambahdab_bekasi() {
        $this->load->model(array('mdab_bekasi', 'mseksi','',''));
        $data['title'] = 'lemahabang:: Tambah Data Debet Air Bendung Bekasi';
        $data['header'] = 'lemahabang/header';
        $data['page'] = 'lemahabang/dab_bekasi/adddab_bekasi';
        $this->load->view('lemahabang/template', $data);
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
        redirect('lemahabang/dab_bekasi');
    }

    function ubahdab_bekasi() {
        $id = $this->uri->segment(3);
        $this->load->model(array('mdab_bekasi', 'mseksi','',''));
        $data['title'] = $this->uri->segment(4) . 'lemahabang:: Ubah Data Debet Air Bendung Bekasi';
        $data['header'] = 'lemahabang/header';
        $data['footer'] = 'lemahabang/footer';
        $data['dab_bekasi'] = $this->mdab_bekasi->getdab_bekasiid($id);
        $data['page'] = 'lemahabang/dab_bekasi/editdab_bekasi';
        $this->load->view('lemahabang/template', $data);
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
        redirect('lemahabang/dab_bekasi');
    }

    function hapusdab_bekasi() {
        $id = $this->uri->segment(3);
        $this->load->model(array('mdab_bekasi'));
        $this->mdab_bekasi->deldab_bekasi($id);
        redirect('lemahabang/dab_bekasi');
        echo $id;
    } 
    

/* DAB BENDUNG CIBEET */

    function dab_cibeet() {
        $data['title'] = 'lemahabang:: Debet Air Bendung Cibeet';
        $data['header'] = 'lemahabang/header';
        $data['footer'] = 'lemahabang/footer';
        $data['page'] = 'lemahabang/dab_cibeet/listdab_cibeet';
        $data['dab_cibeet'] = $this->mdab_cibeet->getdab_cibeet();
        $this->load->view('lemahabang/template', $data);
    }

    function tambahdab_cibeet() {
        $this->load->model(array('mdab_cibeet', 'mseksi','',''));
        $data['title'] = 'lemahabang:: Tambah Data Debet Air Bendung Cibeet';
        $data['header'] = 'lemahabang/header';
        $data['footer'] = 'lemahabang/footer';
        $data['page'] = 'lemahabang/dab_cibeet/adddab_cibeet';
        $this->load->view('lemahabang/template', $data);
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
        redirect('lemahabang/dab_cibeet');
    }

    function ubahdab_cibeet() {
        $id = $this->uri->segment(3);
        $this->load->model(array('mdab_cibeet', 'mseksi','',''));
        $data['title'] = $this->uri->segment(4) . 'lemahabang:: Ubah Data Debet Air Bendung Cibeet';
        $data['header'] = 'lemahabang/header';
        $data['footer'] = 'lemahabang/footer';
        $data['dab_cibeet'] = $this->mdab_cibeet->getdab_cibeetid($id);
        $data['page'] = 'lemahabang/dab_cibeet/editdab_cibeet';
        $this->load->view('lemahabang/template', $data);
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
        redirect('lemahabang/dab_cibeet');
    }

    function hapusdab_cibeet() {
        $id = $this->uri->segment(3);
        $this->load->model(array('mdab_cibeet'));
        $this->mdab_cibeet->deldab_cibeet($id);
        redirect('lemahabang/dab_cibeet');
        echo $id;
    }   

    
/* DAB BENDUNG CIKARANG */

    function dab_cikarang() {
        $data['title'] = 'lemahabang:: Debet Air Bendung Cikarang';
        $data['header'] = 'lemahabang/header';
        $data['footer'] = 'lemahabang/footer';
        $data['page'] = 'lemahabang/dab_cikarang/listdab_cikarang';
        $data['dab_cikarang'] = $this->mdab_cikarang->getdab_cikarang();
        $this->load->view('lemahabang/template', $data);
    }

    function tambahdab_cikarang() {
        $this->load->model(array('mdab_cikarang', 'mseksi','',''));
        $data['title'] = 'lemahabang:: Tambah Data Debet Air Bendung Cikarang';
        $data['header'] = 'lemahabang/header';
        $data['footer'] = 'lemahabang/footer';
        $data['page'] = 'lemahabang/dab_cikarang/adddab_cikarang';
        $this->load->view('lemahabang/template', $data);
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
        redirect('lemahabang/dab_cikarang');
    }

    function ubahdab_cikarang() {
        $id = $this->uri->segment(3);
        $this->load->model(array('mdab_cikarang', 'mseksi','',''));
        $data['title'] = $this->uri->segment(4) . 'lemahabang:: Ubah Data Debet Air Bendung Cikarang';
        $data['header'] = 'lemahabang/header';
        $data['footer'] = 'lemahabang/footer';
        $data['dab_cikarang'] = $this->mdab_cikarang->getdab_cikarangid($id);
        $data['page'] = 'lemahabang/dab_cikarang/editdab_cikarang';
        $this->load->view('lemahabang/template', $data);
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
        redirect('lemahabang/dab_cikarang');
    }

    function hapusdab_cikarang() {
        $id = $this->uri->segment(3);
        $this->load->model(array('mdab_cikarang'));
        $this->mdab_cikarang->deldab_cikarang($id);
        redirect('lemahabang/dab_cikarang');
        echo $id;
    }       

    
    
    
/* LAPORAN */
    
    function laporancurahhujan() {
        $data['title'] = 'Laporan Curah Hujan';
        $data['header'] = 'lemahabang/header';
        $data['footer'] = 'lemahabang/footer';
        $data['page'] = 'lemahabang/laporan/lap_curahhujan';
        $this->load->view('lemahabang/template', $data);
    }

    function cetaklaporancurahhujan($seksi = '', $tgl1 = '', $tgl2 = '') {
        $data['title'] = 'Cetak Laporan Curah Hujan';
        $data['seksi'] = $seksi;
        $data['tgl1'] = date('Y-m-d', strtotime($tgl1));
        $data['tgl2'] = date('Y-m-d', strtotime($tgl2));
        $data['page'] = $this->load->view('lemahabang/laporan/cetak_lap_curahhujan', $data);
        $this->load->view('lemahabang/laporan/template', $data);
    }

    
    function laporankejadian() {
        $data['title'] = 'Laporan Curah Hujan';
        $data['header'] = 'lemahabang/header';
        $data['footer'] = 'lemahabang/footer';
        $data['page'] = 'lemahabang/laporan/lap_kejadian';
        $this->load->view('lemahabang/template', $data);
    }

    function cetaklaporankejadian($seksi = '', $tgl1 = '', $tgl2 = '') {
        $data['title'] = 'Cetak Laporan Curah Hujan';
        $data['seksi'] = $seksi;
        $data['tgl1'] = date('Y-m-d', strtotime($tgl1));
        $data['tgl2'] = date('Y-m-d', strtotime($tgl2));
        $data['page'] = $this->load->view('lemahabang/laporan/cetak_lap_kejadian', $data);
        $this->load->view('lemahabang/laporan/template', $data);
    }
    
    
    function laporanprogrespekerjaan() {
        $data['title'] = 'Laporan Progres Pekerjaan';
        $data['header'] = 'lemahabang/header';
        $data['footer'] = 'lemahabang/footer';
        $data['page'] = 'lemahabang/laporan/lap_laporanprogrespekerjaan';
        $this->load->view('lemahabang/template', $data);
    }

    function cetaklaporanprogrespekerjaan( $tgl1 = '', $tgl2 = '') {
        $data['title'] = 'Cetak Laporan Progres Pekerjaan';
      //  $data['seksi'] = $seksi;
        $data['tgl1'] = date('Y-m-d', strtotime($tgl1));
        $data['tgl2'] = date('Y-m-d', strtotime($tgl2));
        $data['page'] = $this->load->view('lemahabang/laporan/cetak_lap_laporanprogrespekerjaan', $data);
        $this->load->view('lemahabang/laporan/template', $data);
    }   
    
    function laporanpemakaianair() {
        $data['title'] = 'Laporan Pemakaian Air';
        $data['header'] = 'lemahabang/header';
        $data['footer'] = 'lemahabang/footer';
        $data['page'] = 'lemahabang/laporan/lap_laporanpemakaianair';
        $this->load->view('lemahabang/template', $data);
    }
    function cetaklaporanpemakaianair($balai = '', $seksi='',$tgl1 = '', $tgl2 = '') {
        $data['title'] = 'Cetak Laporan Laporan Pemakaian Air';
        $data['balai'] = $balai;
        $data['seksi'] = $seksi;
        $data['tgl1'] = date('Y-m-d', strtotime($tgl1));
        $data['tgl2'] = date('Y-m-d', strtotime($tgl2));
        $data['page'] = $this->load->view('lemahabang/laporan/cetak_lap_laporanpemakaianair', $data);
        $this->load->view('lemahabang/laporan/template', $data);
    }
    

    function laporanpemberianair() {
        $data['title'] = 'Laporan Pemberian Air';
        $data['header'] = 'lemahabang/header';
        $data['footer'] = 'lemahabang/footer';
        $data['page'] = 'lemahabang/laporan/lap_laporanpemberianair';
        $this->load->view('lemahabang/template', $data);
    }
    function cetaklaporanpemberianair($saluran_sekunder = '', $seksi='',$tgl1 = '', $tgl2 = '') {
        $data['title'] = 'Cetak Laporan Laporan Pemberian Air';
        $data['saluran_sekunder'] = $saluran_sekunder;
        $data['seksi'] = $seksi;
        $data['tgl1'] = date('Y-m-d', strtotime($tgl1));
        $data['tgl2'] = date('Y-m-d', strtotime($tgl2));
        $data['page'] = $this->load->view('lemahabang/laporan/cetak_lap_laporanpemberianair', $data);
        $this->load->view('lemahabang/laporan/template', $data);
    }

    
    function laporaninventarea() {
        $data['title'] = 'Laporan Pemberian Air';
        $data['header'] = 'lemahabang/header';
        $data['footer'] = 'lemahabang/footer';
        $data['page'] = 'lemahabang/laporan/lap_laporaninventarea';
        $this->load->view('lemahabang/template', $data);
    }
    function cetaklaporaninventarea($saluran_sekunder = '', $seksi='',$tgl1 = '', $tgl2 = '') {
        $data['title'] = 'Cetak Laporan Pemberian Air';
        $data['saluran_sekunder'] = $saluran_sekunder;
        $data['seksi'] = $seksi;
        $data['tgl1'] = date('Y-m-d', strtotime($tgl1));
        $data['tgl2'] = date('Y-m-d', strtotime($tgl2));
        $data['page'] = $this->load->view('lemahabang/laporan/cetak_lap_laporaninventarea', $data);
        $this->load->view('lemahabang/laporan/template', $data);
    }    
    
    function laporantanamrendeng() {
        $data['title'] = 'Laporan Tanam Rendeng';
        $data['header'] = 'lemahabang/header';
        $data['footer'] = 'lemahabang/footer';
        $data['page'] = 'lemahabang/laporan/lap_laporantanamrendeng';
        $this->load->view('lemahabang/template', $data);
    }
    
	function cetaklaporantanamrendeng($saluran_tanam = '', $seksi='',$tgl1 = '', $tgl2 = '') {
        $data['title'] = 'Cetak Laporan Tanam Rendeng';
        $data['saluran_tanam'] = $saluran_tanam;
        $data['seksi'] = $seksi;
        $data['tgl1'] = date('Y-m-d', strtotime($tgl1));
        $data['tgl2'] = date('Y-m-d', strtotime($tgl2));
        $data['page'] = $this->load->view('lemahabang/laporan/cetak_lap_laporantanamrendeng', $data);
        $this->load->view('lemahabang/laporan/template', $data);
    }    

    
    function laporantanamgadu() {
        $data['title'] = 'Laporan Tanam Gadu';
        $data['header'] = 'lemahabang/header';
        $data['footer'] = 'lemahabang/footer';
        $data['page'] = 'lemahabang/laporan/lap_laporantanamgadu';
        $this->load->view('lemahabang/template', $data);
    }
    
	function cetaklaporantanamgadu($saluran_tanam = '', $seksi='',$tgl1 = '', $tgl2 = '') {
        $data['title'] = 'Cetak Laporan Tanam Gadu';
        $data['saluran_tanam'] = $saluran_tanam;
        $data['seksi'] = $seksi;
        $data['tgl1'] = date('Y-m-d', strtotime($tgl1));
        $data['tgl2'] = date('Y-m-d', strtotime($tgl2));
        $data['page'] = $this->load->view('lemahabang/laporan/cetak_lap_laporantanamgadu', $data);
        $this->load->view('lemahabang/laporan/template', $data);
    }    
    
/* LAPORAN DEBET AIR*/   
    
    
function laporan_dab_lemahabang() {
        $data['title'] = 'Laporan Debet Air Bendung Lemahabang';
        $data['header'] = 'lemahabang/header';
        $data['footer'] = 'lemahabang/footer';
        $data['page'] = 'lemahabang/laporan/lap_dab_lemahabang';
        $this->load->view('lemahabang/template', $data);
    }

    function cetaklaporan_dab_lemahabang( $tgl1 = '', $tgl2 = '') {
        $data['title'] = 'Cetak Laporan Debet Air Bendung Lemahabang';
      //  $data['seksi'] = $seksi;
        $data['tgl1'] = date('Y-m-d', strtotime($tgl1));
        $data['tgl2'] = date('Y-m-d', strtotime($tgl2));
        $data['page'] = $this->load->view('lemahabang/laporan/cetak_lap_dab_lemahabang', $data);
        $this->load->view('lemahabang/laporan/template', $data);
    }   
function laporan_dab_jembatan_bojong() {
        $data['title'] = 'Laporan Debet Air Jembatan Bojong';
        $data['header'] = 'lemahabang/header';
        $data['footer'] = 'lemahabang/footer';
        $data['page'] = 'lemahabang/laporan/lap_dab_jembatan_bojong';
        $this->load->view('lemahabang/template', $data);
    }

    function cetaklaporan_dab_jembatan_bojong( $tgl1 = '', $tgl2 = '') {
        $data['title'] = 'Cetak Laporan Debet Air Bendung Jembatan Bojong';
      //  $data['seksi'] = $seksi;
        $data['tgl1'] = date('Y-m-d', strtotime($tgl1));
        $data['tgl2'] = date('Y-m-d', strtotime($tgl2));
        $data['page'] = $this->load->view('lemahabang/laporan/cetak_lap_dab_jembatan_bojong', $data);
        $this->load->view('lemahabang/laporan/template', $data);
    }   
        
	
}
