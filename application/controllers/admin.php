<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model(array('msaluran_sekunder','msaluran_tanam','mgolongan_tanam','mtanam_rendeng','mtanam_gadu',
                                'mprogres_pekerjaan', 'mseksi','mcurah_hujan', 'mpengguna', 'mhakakses', 'mpegawai', 'mpengamat', 
                                'mpelanggan', 'minvent_area', 'mpemakaian_air','mpemberian_air', 'mbalai','mbendung',
                                'mdab_cbl','mdab_cikeas','mdab_cipamingkis','mdab_jembatan_bojong','mdab_lemahabang',
                                 'mdab_bekasi','mdab_cibeet','mdab_cikarang','mkejadian','mmata_anggaran',
            'mprogres_pekerjaan_investasi','mpengguna_lahan','mperpanjang_lahan','mpopulasi_lahan','mrealisasi_air',
            'mtransaksi_air'));
        if (!$this->session->userdata('logged_in') && !$this->session->userdata('pengguna'))
            redirect(base_url(), 'refresh');
    }

    function index() {
        $data['title'] = 'Admin:: Aplikasi Database DPA I PJTII';
        $data['header'] = 'admin/header';
        $data['slider'] = 'admin/slider';
        $data['page'] = 'admin/page/home';
        $data['footer'] = 'admin/footer';
        $this->load->view('admin/template', $data);
    }

    function logout() {
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('pengguna');
        $this->session->unset_userdata('jenis');
        $this->session->unset_userdata('bagian');
        $this->session->unset_userdata('logged_in');
        redirect(site_url());
    }

    
    
/* Pegawai   */
    function datapegawai() {
        $data['title'] = 'Admin:: Data Pegawai';
        $data['header'] = 'admin/header';
        $data['pegawai'] = $this->mpegawai->getpegawai();
        $data['page'] = 'admin/pegawai/listpegawai';
        $data['footer'] = 'admin/footer';
        $this->load->view('admin/template', $data);
    }
    	

    function tambahpegawai() {
        $this->load->model(array('mpegawai', 'mseksi', '', ''));
        $data['title'] = 'Admin:: Tambah Pegawai';
        $data['header'] = 'admin/header';
        $data['page'] = 'admin/pegawai/addpegawai';
        $data['footer'] = 'admin/footer';
        $this->load->view('admin/template', $data);
    }

    function simpanpegawai() {
        $this->load->model(array('mpegawai', '', '', 'mseksi'));
        $nip = $this->input->post('nip', TRUE);
        $nama = $this->input->post('nama', TRUE);
        $tempat_lahir = $this->input->post('tempat_lahir', TRUE);
        $tanggal_lahir = $this->input->post('tanggal_lahir', TRUE);
        $alamat = $this->input->post('alamat', TRUE);
        $seksi = $this->input->post('seksi', TRUE);
	$this->mpegawai->addpegawai($nip, $nama, $tempat_lahir, $tanggal_lahir, $alamat, $seksi);
        redirect('admin/datapegawai');
    }

    function ubahpegawai() {
        $id = $this->uri->segment(3);
        $this->load->model(array('mpegawai', 'mseksi', '', ''));
        $data['title'] = 'Admin:: Ubah Pegawai';
        $data['header'] = 'admin/header';
        $data['pegawai'] = $this->mpegawai->getpegawaiid($id);
        $data['page'] = 'admin/pegawai/editpegawai';
        $data['footer'] = 'admin/footer';
        $this->load->view('admin/template', $data);
    }

    function simpanubahpegawai() {
        $this->load->model(array('mpegawai', 'mseksi', '', ''));
        $id = $this->input->post('id', TRUE);
        $nip = $this->input->post('nip', TRUE);
        $nama = $this->input->post('nama', TRUE);
        $tempat_lahir = $this->input->post('tempat_lahir', TRUE);
        $tanggal_lahir = $this->input->post('tanggal_lahir', TRUE);
        $alamat = $this->input->post('alamat', TRUE);
        $seksi = $this->input->post('seksi', TRUE);

        $this->mpegawai->updatepegawai($id, $nip, $nama, $tempat_lahir, $tanggal_lahir, $alamat, $seksi);
        redirect('admin/datapegawai');
    }

    function hapuspegawai() {
        $id = $this->uri->segment(3);
        $this->load->model(array('mpegawai'));
        $this->mpegawai->delpegawai($id);
        redirect('admin/datapegawai');
    }

    
    /*     * Seksi */

    function seksi() {

        $data['title'] = 'Admin:: Data Seksi';
        $data['header'] = 'admin/header';
        $data['page'] = 'admin/seksi/listseksi';
        $data['footer'] = 'admin/footer';
        $data['seksi'] = $this->mseksi->getseksi();
        $this->load->view('admin/template', $data);
    }

    function tambahseksi() {
        $this->load->model('mseksi');
        $data['title'] = 'Admin:: Tambah Seksi';
        $data['header'] = 'admin/header';
        $data['page'] = 'admin/seksi/addseksi';
        $data['footer'] = 'admin/footer';
        $this->load->view('admin/template', $data);
    }

    function simpanseksi() {
        $this->load->model('mseksi');
        $seksi = $this->input->post('seksi', TRUE);
        $this->mseksi->addseksi($seksi);
        redirect('admin/seksi');
    }

    function ubahseksi() {
        $id = $this->uri->segment(3);
        $this->load->model('mseksi');
        $data['title'] = 'Admin:: Ubah Seksi';
        $data['header'] = 'admin/header';
        $data['seksi'] = $this->mseksi->getseksiid($id);
        $data['page'] = 'admin/seksi/editseksi';
        $data['footer'] = 'admin/footer';
        $this->load->view('admin/template', $data);
    }

    function simpanubahseksi() {
        $this->load->model('mseksi');
        $id = $this->input->post('id', TRUE);
        $seksi = $this->input->post('seksi', TRUE);
        $this->mseksi->updateseksi($id, $seksi);
        redirect('admin/seksi');
    }

    function hapusseksi() {
        $id = $this->uri->segment(3);
        $this->load->model(array('mseksi', 'mpegawai'));
        $this->mseksi->delseksi($id);
        redirect('admin/seksi');
    }

    
/*     * Pengamat */

    function pengamat() {

        $data['title'] = 'Admin:: Data Pengamat';
        $data['header'] = 'admin/header';
        $data['page'] = 'admin/pengamat/listpengamat';
        $data['footer'] = 'admin/footer';
        $data['pengamat'] = $this->mpengamat->getpengamat();
        $this->load->view('admin/template', $data);
    }

    function tambahpengamat() {
        $this->load->model('mpengamat');
        $data['title'] = 'Admin:: Tambah Pengamat';
        $data['header'] = 'admin/header';
        $data['page'] = 'admin/pengamat/addpengamat';
        $data['footer'] = 'admin/footer';
        $this->load->view('admin/template', $data);
    }

    function simpanpengamat() {
        $this->load->model('mpengamat');
        $pengamat = $this->input->post('pengamat', TRUE);
        $this->mpengamat->addpengamat($pengamat);
        redirect('admin/pengamat');
    }

    function ubahpengamat() {
        $id = $this->uri->segment(3);
        $this->load->model('mpengamat');
        $data['title'] = 'Admin:: Ubah Pengamat';
        $data['header'] = 'admin/header';
        $data['pengamat'] = $this->mpengamat->getpengamatid($id);
        $data['page'] = 'admin/pengamat/editpengamat';
        $data['footer'] = 'admin/footer';
        $this->load->view('admin/template', $data);
    }

    function simpanubahpengamat() {
        $this->load->model('mpengamat');
        $id = $this->input->post('id', TRUE);
        $pengamat = $this->input->post('pengamat', TRUE);
        $this->mpengamat->updatepengamat($id, $pengamat);
        redirect('admin/pengamat');
    }

    function hapuspengamat() {
        $id = $this->uri->segment(3);
        $this->load->model(array('mpengamat'));
        $this->mpengamat->delpengamat($id);
        redirect('admin/pengamat');
        echo $id;
    }

/* pengguna */

    function pengguna() {
        $data['title'] = 'Admin:: Data Pengguna';
        $data['header'] = 'admin/header';
        $data['page'] = 'admin/pengguna/listpengguna';
        $data['footer'] = 'admin/footer';
        $data['pengguna'] = $this->mpengguna->getpengguna();
        $this->load->view('admin/template', $data);
    }

    function tambahpengguna() {
        $this->load->model(array('mpengguna', 'mhakakses'));
        $data['title'] = 'Admin:: Tambah Pengguna';
        $data['header'] = 'admin/header';
        $data['page'] = 'admin/pengguna/addpengguna';
        $data['footer'] = 'admin/footer';
        $this->load->view('admin/template', $data);
    }

    function simpanpengguna() {
        $this->load->model(array('mpengguna', 'mhakakses'));
        $pengguna = $this->input->post('pengguna', TRUE);
        $katakunci = $this->input->post('katakunci', TRUE);
        $jenis = $this->input->post('jenis', TRUE);
        $seksi = $this->input->post('seksi', TRUE);
        $pegawai = $this->input->post('pegawai', TRUE);
        $this->mpengguna->addpengguna($pengguna, $katakunci, $jenis, $seksi, $pegawai);
        redirect('admin/pengguna');
    }

    function ubahpengguna() {
        $id = $this->uri->segment(3);
        $this->load->model(array('mpengguna', 'mhakakses'));
        $data['title'] = $this->uri->segment(4) . 'Admin:: Ubah Pengguna';
        $data['header'] = 'admin/header';
        $data['pengguna'] = $this->mpengguna->getpenggunaid($id);
        $data['page'] = 'admin/pengguna/editpengguna';
        $data['footer'] = 'admin/footer';
        $this->load->view('admin/template', $data);
    }

    function simpanubahpengguna() {
        $this->load->model(array('mpengguna', 'mhakakses'));
        $id = $this->input->post('id', TRUE);
        $pengguna = $this->input->post('pengguna', TRUE);
        $katakunci = $this->input->post('katakunci', TRUE);
        $jenis = $this->input->post('jenis', TRUE);
        $seksi= $this->input->post('seksi', TRUE);
        $pegawai = $this->input->post('pegawai',TRUE);
        $this->mpengguna->updatepengguna($id, $pengguna, $katakunci, $jenis, $seksi, $pegawai);
        redirect('admin/pengguna');
    }

    function hapuspengguna() {
        $id = $this->uri->segment(3);
        $this->load->model(array('mpengguna'));
        $this->mpengguna->delpengguna($id);
        redirect('admin/pengguna');
        echo $id;
    }
    
    
    /*     * Pelanggan */

    function pelanggan() {

        $data['title'] = 'Admin:: Data Pelanggan';
        $data['header'] = 'admin/header';
        $data['page'] = 'admin/pelanggan/listpelanggan';
        $data['footer'] = 'admin/footer';
        $data['pelanggan'] = $this->mpelanggan->getpelanggan();
        $this->load->view('admin/template', $data);
    }

    function tambahpelanggan() {
        $this->load->model('mpelanggan');
        $data['title'] = 'Admin:: Tambah Pelanggan';
        $data['header'] = 'admin/header';
        $data['page'] = 'admin/pelanggan/addpelanggan';
        $data['footer'] = 'admin/footer';
        $this->load->view('admin/template', $data);
    }

    function simpanpelanggan() {
        $this->load->model('mpelanggan');
        $pelanggan= $this->input->post('pelanggan', TRUE);
        $this->mpelanggan->addpelanggan($pelanggan);
        redirect('admin/pelanggan');
    }

    function ubahpelanggan() {
        $id = $this->uri->segment(3);
        $this->load->model('mpelanggan');
        $data['title'] = 'Admin:: Ubah Pelanggan';
        $data['header'] = 'admin/header';
        $data['pelanggan'] = $this->mpelanggan->getpelangganid($id);
        $data['page'] = 'admin/pelanggan/editpelanggan';
        $data['footer'] = 'admin/footer';
        $this->load->view('admin/template', $data);
    }

    function simpanubahpelanggan() {
        $this->load->model('mpelanggan');
        $id = $this->input->post('id', TRUE);
        $pelanggan= $this->input->post('pelanggan', TRUE);
        $this->mpelanggan->updatepelanggan($id, $pelanggan);
        redirect('admin/pelanggan');
    }

    function hapuspelanggan() {
        $id = $this->uri->segment(3);
        $this->load->model(array('mpelanggan'));
        $this->mpelanggan->delpelanggan($id);
        redirect('admin/pelanggan');
        echo $id;
    }

/* SALURAN SEKUNDER */
    
function saluran_sekunder() {

        $data['title'] = 'Admin:: Data Saluran Sekunder';
        $data['header'] = 'admin/header';
        $data['page'] = 'admin/saluran_sekunder/listsaluran_sekunder';
        $data['footer'] = 'admin/footer';
        $data['saluran_sekunder'] = $this->msaluran_sekunder->getsaluran_sekunder();
        $this->load->view('admin/template', $data);
    }

    function tambahsaluran_sekunder() {
        $this->load->model('msaluran_sekunder');
        $data['title'] = 'Admin:: Tambah Saluran Sekunder';
        $data['header'] = 'admin/header';
        $data['page'] = 'admin/saluran_sekunder/addsaluran_sekunder';
        $data['footer'] = 'admin/footer';
        $this->load->view('admin/template', $data);
    }

    function simpansaluran_sekunder() {
        $this->load->model('msaluran_sekunder');
        $saluran_sekunder= $this->input->post('saluran_sekunder', TRUE);
        $this->msaluran_sekunder->addsaluran_sekunder($saluran_sekunder);
        redirect('admin/saluran_sekunder');
    }

    function ubahsaluran_sekunder() {
        $id = $this->uri->segment(3);
        $this->load->model('msaluran_sekunder');
        $data['title'] = 'Admin:: Ubah Saluran Sekunder';
        $data['header'] = 'admin/header';
        $data['saluran_sekunder'] = $this->msaluran_sekunder->getsaluran_sekunderid($id);
        $data['page'] = 'admin/saluran_sekunder/editsaluran_sekunder';
        $data['footer'] = 'admin/footer';
        $this->load->view('admin/template', $data);
    }

    function simpanubahsaluran_sekunder() {
        $this->load->model('msaluran_sekunder');
        $id = $this->input->post('id', TRUE);
        $saluran_sekunder= $this->input->post('saluran_sekunder', TRUE);
        $this->msaluran_sekunder->updatesaluran_sekunder($id, $saluran_sekunder);
        redirect('admin/saluran_sekunder');
    }

    function hapussaluran_sekunder() {
        $id = $this->uri->segment(3);
        $this->load->model(array('msaluran_sekunder'));
        $this->msaluran_sekunder->delsaluran_sekunder($id);
        redirect('admin/saluran_sekunder');
        echo $id;
    }
    

/* SALURAN TANAM */
    
function saluran_tanam() {

        $data['title'] = 'Admin:: Data Saluran Tanam';
        $data['header'] = 'admin/header';
        $data['page'] = 'admin/saluran_tanam/listsaluran_tanam';
        $data['footer'] = 'admin/footer';
        $data['saluran_tanam'] = $this->msaluran_tanam->getsaluran_tanam();
        $this->load->view('admin/template', $data);
    }

    function tambahsaluran_tanam() {
        $this->load->model('msaluran_tanam');
        $data['title'] = 'Admin:: Tambah Saluran Tanam';
        $data['header'] = 'admin/header';
        $data['page'] = 'admin/saluran_tanam/addsaluran_tanam';
        $data['footer'] = 'admin/footer';
        $this->load->view('admin/template', $data);
    }

    function simpansaluran_tanam() {
        $this->load->model('msaluran_tanam');
        $saluran_tanam= $this->input->post('saluran_tanam', TRUE);
        $this->msaluran_tanam->addsaluran_tanam($saluran_tanam);
        redirect('admin/saluran_tanam');
    }

    function ubahsaluran_tanam() {
        $id = $this->uri->segment(3);
        $this->load->model('msaluran_tanam');
        $data['title'] = 'Admin:: Ubah Saluran Tanam';
        $data['header'] = 'admin/header';
        $data['saluran_tanam'] = $this->msaluran_tanam->getsaluran_tanamid($id);
        $data['page'] = 'admin/saluran_tanam/editsaluran_tanam';
        $data['footer'] = 'admin/footer';
        $this->load->view('admin/template', $data);
    }

    function simpanubahsaluran_tanam() {
        $this->load->model('msaluran_tanam');
        $id = $this->input->post('id', TRUE);
        $saluran_tanam= $this->input->post('saluran_tanam', TRUE);
        $this->msaluran_tanam->updatesaluran_tanam($id, $saluran_tanam);
        redirect('admin/saluran_tanam');
    }

    function hapussaluran_tanam() {
        $id = $this->uri->segment(3);
        $this->load->model(array('msaluran_tanam'));
        $this->msaluran_tanam->delsaluran_tanam($id);
        redirect('admin/saluran_tanam');
        echo $id;
    }
    

/* GOLONGAN TANAM */
    
function golongan_tanam() {

        $data['title'] = 'Admin:: Data Golongan Tanam';
        $data['header'] = 'admin/header';
        $data['page'] = 'admin/golongan_tanam/listgolongan_tanam';
        $data['footer'] = 'admin/footer';
        $data['golongan_tanam'] = $this->mgolongan_tanam->getgolongan_tanam();
        $this->load->view('admin/template', $data);
    }

    function tambahgolongan_tanam() {
        $this->load->model('mgolongan_tanam');
        $data['title'] = 'Admin:: Tambah Golonagn Tanam';
        $data['header'] = 'admin/header';
        $data['page'] = 'admin/golongan_tanam/addgolongan_tanam';
        $data['footer'] = 'admin/footer';
        $this->load->view('admin/template', $data);
    }

    function simpangolongan_tanam() {
        $this->load->model('mgolongan_tanam');
        $golongan_tanam= $this->input->post('golongan_tanam', TRUE);
        $this->mgolongan_tanam->addgolongan_tanam($golongan_tanam);
        redirect('admin/golongan_tanam');
    }

    function ubahgolongan_tanam() {
        $id = $this->uri->segment(3);
        $this->load->model('mgolongan_tanam');
        $data['title'] = 'Admin:: Ubah Golongan Tanam';
        $data['header'] = 'admin/header';
        $data['golongan_tanam'] = $this->mgolongan_tanam->getgolongan_tanamid($id);
        $data['page'] = 'admin/golongan_tanam/editgolongan_tanam';
        $data['footer'] = 'admin/footer';
        $this->load->view('admin/template', $data);
    }

    function simpanubahgolongan_tanam() {
        $this->load->model('mgolongan_tanam');
        $id = $this->input->post('id', TRUE);
        $golongan_tanam= $this->input->post('golongan_tanam', TRUE);
        $this->mgolongan_tanam->updategolongan_tanam($id, $golongan_tanam);
        redirect('admin/golongan_tanam');
    }

    function hapusgolongan_tanam() {
        $id = $this->uri->segment(3);
        $this->load->model(array('mgolongan_tanam'));
        $this->mgolongan_tanam->delgolongan_tanam($id);
        redirect('admin/golongan_tanam');
        echo $id;
    }

    
/* BENDUNG */
    
function bendung () {

        $data['title'] = 'Admin:: Data Bendung di DPA I';
        $data['header'] = 'admin/header';
        $data['page'] = 'admin/bendung/listbendung';
        $data['footer'] = 'admin/footer';
        $data['bendung'] = $this->mbendung->getbendung();
        $this->load->view('admin/template', $data);
    }

    function tambahbendung() {
        $this->load->model('mbendung');
        $data['title'] = 'Admin:: Tambah Data Bendung di DPA I';
        $data['header'] = 'admin/header';
        $data['page'] = 'admin/bendung/addbendung';
        $data['footer'] = 'admin/footer';
        $this->load->view('admin/template', $data);
    }

    function simpanbendung() {
        $this->load->model('mbendung');
        $bendung = $this->input->post('bendung', TRUE);
        $id_seksi = $this->input->post('id_seksi', TRUE);
        $this->mbendung->addbendung($bendung, $id_seksi);
        redirect('admin/bendung');
    }

    function ubahbendung() {
        $id = $this->uri->segment(3);
        $this->load->model('mbendung');
        $this->load->model('msaluran_sekunder');
        $data['title'] = 'Admin:: Ubah Saluran Sekunder';
        $data['header'] = 'admin/header';
        $data['bendung'] = $this->mbendung->getbendungid($id);
        $data['page'] = 'admin/bendung/editbendung';
        $data['footer'] = 'admin/footer';
        $this->load->view('admin/template', $data);
    }

    function simpanubahbendung() {
        $this->load->model('mbendung');
        $id = $this->input->post('id', TRUE);
        $bendung= $this->input->post('bendung', TRUE);
        $id_seksi = $this->input->post('id_seksi', TRUE);
        $this->mbendung->updatebendung($id, $bendung, $id_seksi);
        redirect('admin/bendung');
    }

    function hapusbendung() {
        $id = $this->uri->segment(3);
        $this->load->model(array('mbendung'));
        $this->mbendung->delbendung($id);
        redirect('admin/bendung');
        echo $id;
    }

/* BALAI */
    
function mata_anggaran () {

        $data['title'] = 'Admin:: Data Saluran Sekunder';
        $data['header'] = 'admin/header';
        $data['page'] = 'admin/mata_anggaran/listmata_anggaran';
        $data['footer'] = 'admin/footer';
        $data['mata_anggaran'] = $this->mmata_anggaran->getmata_anggaran();
        $this->load->view('admin/template', $data);
    }

    function tambahmata_anggaran() {
        $this->load->model('mmata_anggaran');
        $data['title'] = 'Admin:: Tambah Saluran Sekunder';
        $data['header'] = 'admin/header';
        $data['page'] = 'admin/mata_anggaran/addmata_anggaran';
        $data['footer'] = 'admin/footer';
        $this->load->view('admin/template', $data);
    }

    function simpanmata_anggaran() {
        $this->load->model('mmata_anggaran');
        $mata_anggaran= $this->input->post('mata_anggaran', TRUE);
        $this->mmata_anggaran->addmata_anggaran($mata_anggaran);
        redirect('admin/mata_anggaran');
    }

    function ubahmata_anggaran() {
        $id = $this->uri->segment(3);
        $this->load->model('mmata_anggaran');
        $this->load->model('msaluran_sekunder');
        $data['title'] = 'Admin:: Ubah Saluran Sekunder';
        $data['header'] = 'admin/header';
        $data['mata_anggaran'] = $this->mmata_anggaran->getmata_anggaranid($id);
        $data['page'] = 'admin/mata_anggaran/editmata_anggaran';
        $data['footer'] = 'admin/footer';
        $this->load->view('admin/template', $data);
    }

    function simpanubahmata_anggaran() {
        $this->load->model('mmata_anggaran');
        $id = $this->input->post('id', TRUE);
        $mata_anggaran= $this->input->post('mata_anggaran', TRUE);
        $this->mmata_anggaran->updatemata_anggaran($id, $mata_anggaran);
        redirect('admin/mata_anggaran');
    }

    function hapusmata_anggaran() {
        $id = $this->uri->segment(3);
        $this->load->model(array('mmata_anggaran'));
        $this->mmata_anggaran->delmata_anggaran($id);
        redirect('admin/mata_anggaran');
        echo $id;
    }    
    
/* MATA ANGGARAN */
    
function balai () {

        $data['title'] = 'Admin:: Data Saluran Sekunder';
        $data['header'] = 'admin/header';
        $data['page'] = 'admin/balai/listbalai';
        $data['footer'] = 'admin/footer';
        $data['balai'] = $this->mbalai->getbalai();
        $this->load->view('admin/template', $data);
    }

    function tambahbalai() {
        $this->load->model('mbalai');
        $data['title'] = 'Admin:: Tambah Saluran Sekunder';
        $data['header'] = 'admin/header';
        $data['page'] = 'admin/balai/addbalai';
        $data['footer'] = 'admin/footer';
        $this->load->view('admin/template', $data);
    }

    function simpanbalai() {
        $this->load->model('mbalai');
        $balai = $this->input->post('balai', TRUE);
        $this->mbalai->addbalai($balai);
        redirect('admin/balai');
    }

    function ubahbalai() {
        $id = $this->uri->segment(3);
        $this->load->model('mbalai');
        $this->load->model('msaluran_sekunder');
        $data['title'] = 'Admin:: Ubah Saluran Sekunder';
        $data['header'] = 'admin/header';
        $data['balai'] = $this->mbalai->getbalaiid($id);
        $data['page'] = 'admin/balai/editbalai';
        $data['footer'] = 'admin/footer';
        $this->load->view('admin/template', $data);
    }

    function simpanubahbalai() {
        $this->load->model('mbalai');
        $id = $this->input->post('id', TRUE);
        $balai= $this->input->post('balai', TRUE);
        $this->mbalai->updatebalai($id, $balai);
        redirect('admin/balai');
    }

    function hapusbalai() {
        $id = $this->uri->segment(3);
        $this->load->model(array('mbalai'));
        $this->mbalai->delbalai($id);
        redirect('admin/balai');
        echo $id;
    }    

    
    /* INVENTARIS AREA LAHAN */

    function invent_area() {
        $data['title'] = 'Admin:: Data Inventaris Area Lahan Tanam';
        $data['header'] = 'admin/header';
        $data['page'] = 'admin/invent_area/listinvent_area';
        $data['footer'] = 'admin/footer';
        $data['invent_area'] = $this->minvent_area->getinvent_area();
        $this->load->view('admin/template', $data);
    }

    function tambahinvent_area() {
        $this->load->model(array('minvent_area', 'mseksi','mpengamat','msaluran_sekunder'));
        $data['title'] = 'Admin:: Tambah Data Inventaris Area Lahan Tanam';
        $data['header'] = 'admin/header';
        $data['page'] = 'admin/invent_area/addinvent_area';
        $data['footer'] = 'admin/footer';
        $this->load->view('admin/template', $data);
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
        redirect('admin/invent_area');
    }

    function ubahinvent_area() {
        $id = $this->uri->segment(3);
        $this->load->model(array('minvent_area', 'mseksi','mpengamat','msaluran_sekunder'));
        $data['title'] = $this->uri->segment(4) . 'Admin:: Ubah Data Inventaris Area Lahan Tanam';
        $data['header'] = 'admin/header';
        $data['invent_area'] = $this->minvent_area->getinvent_areaid($id);
        $data['page'] = 'admin/invent_area/editinvent_area';
        $data['footer'] = 'admin/footer';
        $this->load->view('admin/template', $data);
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
        redirect('admin/invent_area');
    }

    function hapusinvent_area() {
        $id = $this->uri->segment(3);
        $this->load->model(array('minvent_area'));
        $this->minvent_area->delinvent_area($id);
        redirect('admin/invent_area');
        echo $id;
    }
    

/* ============================ MULAI USAHA AIR ===================== */    

/* PEMAKAI AIR (USAHA AIR) */

    function pemakaian_air() {
        $data['title'] = 'Admin:: Data Pemakaian Air Kepada Pelanggan';
        $data['header'] = 'admin/header';
        $data['page'] = 'admin/usaha_air/pemakaian_air/listpemakaian_air';
        $data['footer'] = 'admin/footer';
        $data['pemakaian_air'] = $this->mpemakaian_air->getpemakaian_air();
        $this->load->view('admin/template', $data);
    }

    function tambahpemakaian_air() {
        $this->load->model(array('mpemakaian_air', 'mseksi','mpelanggan','mbalai'));
        $data['title'] = 'Admin:: Tambah Data Pemakaian Air Oleh Perusahaan';
        $data['header'] = 'admin/header';
        $data['page'] = 'admin/usaha_air/pemakaian_air/addpemakaian_air';
        $data['footer'] = 'admin/footer';
        $this->load->view('admin/template', $data);
    }

    function simpanpemakaian_air() {
        $this->load->model(array('mpemakaian_air', 'mseksi','mpelanggan','mbalai'));
        $tanggal_input= $this->input->post('tanggal_input', TRUE);
        $pelanggan = $this->input->post('pelanggan', TRUE);
        $alamat = $this->input->post('alamat', TRUE);
        $lokasi_pengambilan = $this->input->post('lokasi_pengambilan', TRUE);
	$id_balai= $this->input->post('id_balai', TRUE);
        $id_seksi= $this->input->post('id_seksi', TRUE);
        $berlaku_mulai= $this->input->post('berlaku_mulai', TRUE);
        $sppa_mulai= $this->input->post('sppa_mulai', TRUE);
        $berlaku_akhir = $this->input->post('berlaku_akhir', TRUE);
        $sppa_akhir = $this->input->post('sppa_akhir', TRUE);
        $debet_maks = $this->input->post('debet_maks', TRUE);
        $debet_min = $this->input->post('debet_min', TRUE);
        $this->mpemakaian_air->addpemakaian_air($tanggal_input, $pelanggan, $alamat, $lokasi_pengambilan, $id_balai, $id_seksi, 
            $berlaku_mulai, $sppa_mulai, $berlaku_akhir, $sppa_akhir, $debet_maks, $debet_min);
        redirect('admin/pemakaian_air');
    }

    function ubahpemakaian_air() {
        $id = $this->uri->segment(3);
        $this->load->model(array('mpemakaian_air', 'mseksi','mpelanggan','mbalai'));
        $data['title'] = $this->uri->segment(4) . 'Admin:: Ubah Data Pemakaian Air Oleh Pelanggan';
        $data['header'] = 'admin/header';
        $data['pemakaian_air'] = $this->mpemakaian_air->getpemakaian_airid($id);
        $data['page'] = 'admin/usaha_air/pemakaian_air/editpemakaian_air';
        $data['footer'] = 'admin/footer';
        $this->load->view('admin/template', $data);
    }

    function simpanubahpemakaian_air() {
        $this->load->model(array('mpemakaian_air', 'mseksi','mpelanggan','mbalai'));
        $id = $this->input->post('id', TRUE);
        $tanggal_input= $this->input->post('tanggal_input', TRUE);
        $pelanggan = $this->input->post('pelanggan', TRUE);
        $alamat = $this->input->post('alamat', TRUE);
        $lokasi_pengambilan = $this->input->post('lokasi_pengambilan', TRUE);
	$id_balai= $this->input->post('id_balai', TRUE);
        $id_seksi= $this->input->post('id_seksi', TRUE);
        $berlaku_mulai= $this->input->post('berlaku_mulai', TRUE);
        $sppa_mulai= $this->input->post('sppa_mulai', TRUE);
        $berlaku_akhir = $this->input->post('berlaku_akhir', TRUE);
        $sppa_akhir = $this->input->post('sppa_akhir', TRUE);
        $debet_maks = $this->input->post('debet_maks', TRUE);
        $debet_min = $this->input->post('debet_min', TRUE);
        $this->mpemakaian_air->updatepemakaian_air($id, $tanggal_input, $pelanggan, $alamat, $lokasi_pengambilan, $id_balai, $id_seksi, 
            $berlaku_mulai, $sppa_mulai, $berlaku_akhir, $sppa_akhir, $debet_maks, $debet_min);
        redirect('admin/pemakaian_air');
    }

    function hapuspemakaian_air() {
        $id = $this->uri->segment(3);
        $this->load->model(array('mpemakaian_air'));
        $this->mpemakaian_air->delpemakaian_air($id);
        redirect('admin/pemakaian_air');
        echo $id;
    }

/* PERPANJANG (USAHA AIR) */
/* REALISASI (USAHA AIR) */

    function realisasi_air() {
        $data['title'] = 'Admin:: Data Pemakai Air';
        $data['header'] = 'admin/header';
        $data['footer'] = 'admin/footer';
        $data['page'] = 'admin/usaha_air/realisasi_air/listrealisasi_air';
        $data['realisasi_air'] = $this->mrealisasi_air->getrealisasi_air();
        $this->load->view('admin/template', $data);
    }

    function tambahrealisasi_air() {
        $this->load->model(array('mrealisasi_air', ''));
        $data['title'] = 'Admin:: Tambah Absensi Pegawai';
        $data['header'] = 'admin/header';
        $data['footer'] = 'admin/footer';
        $data['page'] = 'admin/usaha_air/realisasi_air/addrealisasi_air';
        $this->load->view('admin/template', $data);
    }

    function simpanrealisasi_air() {
        $this->load->model(array('mrealisasi_air', ''));
        $pelanggan = $this->input->post('pelanggan', TRUE);
        $realisasi = $this->input->post('realisasi', TRUE);
        $keterangan = $this->input->post('keterangan', TRUE);
        $this->mrealisasi_air->addrealisasi_air($pelanggan, $realisasi, $keterangan);
        redirect('admin/realisasi_air');
    }

    function ubahrealisasi_air() {
        $id = $this->uri->segment(3);
        $this->load->model(array('mrealisasi_air', ''));
        $data['title'] = 'Admin:: Ubah Realisasi';
        $data['header'] = 'admin/header';
        $data['footer'] = 'admin/footer';
        $data['realisasi_air'] = $this->mrealisasi_air->getrealisasi_airid($id);
        $data['page'] = 'admin/usaha_air/realisasi_air/editrealisasi_air';
        $this->load->view('admin/template', $data);
    }

    function simpanubahrealisasi_air() {
        $this->load->model(array('mrealisasi_air', ''));
        $id = $this->input->post('id', TRUE);
        $pelanggan = $this->input->post('pelanggan', TRUE);
        $realisasi = $this->input->post('realisasi', TRUE);
        $keterangan = $this->input->post('keterangan', TRUE);
        $this->mrealisasi_air->updaterealisasi_air($id, $pelanggan, $realisasi, $keterangan);
        redirect('admin/realisasi_air');
    }

    function hapusrealisasi_air() {
        $id = $this->uri->segment(3);
        $this->load->model(array('mrealisasi_air'));
        $this->mrealisasi_air->delrealisasi_air($id);
        redirect('admin/realisasi_air');
    }

/* TRANSAKSI (USAHA AIR) */
    function transaksi_air() {
        $data['title'] = 'Admin:: Data Pemakai Air';
        $data['header'] = 'admin/header';
        $data['footer'] = 'admin/footer';
        $data['page'] = 'admin/usaha_air/transaksi_air/listtransaksi_air';
        $data['transaksi_air'] = $this->mtransaksi_air->gettransaksi_air();
        $this->load->view('admin/template', $data);
    }

    function tambahtransaksi_air() {
        $this->load->model(array('mtransaksi_air', ''));
        $data['title'] = 'Admin:: Tambah Absensi Pegawai';
        $data['header'] = 'admin/header';
        $data['footer'] = 'admin/footer';
        $data['page'] = 'admin/usaha_air/transaksi_air/addtransaksi_air';
        $this->load->view('admin/template', $data);
    }

    function simpantransaksi_air() {
        $this->load->model(array('mtransaksi_air', ''));
        $pelanggan = $this->input->post('pelanggan', TRUE);
        $tgl_faktur = $this->input->post('tgl_faktur', TRUE);
        $nomor_faktur = $this->input->post('nomor_faktur', TRUE);
        $tarif = $this->input->post('tarif', TRUE);
        $titipan = $this->input->post('titipan', TRUE);
        $fee = $this->input->post('fee', TRUE);
        $materai = $this->input->post('materai', TRUE);
        $jumlah_tagihan = ($tarif * $realisasi) + $titipan + $fee + $materai ;
        $this->mtransaksi_air->addtransaksi_air($pelanggan, $tgl_faktur, $nomor_faktur, $tarif, $titipan, $fee, 
                $jumlah_tagihan, $materai );
        redirect('admin/transaksi_air');
    }

    function ubahtransaksi_air() {
        $id = $this->uri->segment(3);
        $this->load->model(array('mtransaksi_air', ''));
        $data['title'] = 'Admin:: Ubah Realisasi';
        $data['header'] = 'admin/header';
        $data['footer'] = 'admin/footer';
        $data['transaksi_air'] = $this->mtransaksi_air->gettransaksi_airid($id);
        $data['page'] = 'admin/usaha_air/transaksi_air/edittransaksi_air';
        $this->load->view('admin/template', $data);
    }

    function simpanubahtransaksi_air() {
        $this->load->model(array('mtransaksi_air', ''));
        $id = $this->input->post('id', TRUE);
        $pelanggan = $this->input->post('pelanggan', TRUE);
        $tgl_faktur = $this->input->post('tgl_faktur', TRUE);
        $nomor_faktur = $this->input->post('nomor_faktur', TRUE);
        $tarif = $this->input->post('tarif', TRUE);
        $titipan = $this->input->post('titipan', TRUE);
        $fee = $this->input->post('fee', TRUE);
        $materai = $this->input->post('materai', TRUE);
        $jumlah_tagihan = $this->input->post('jumlah_tagihan', TRUE);
        $this->mtransaksi_air->updatetransaksi_air($id, $pelanggan, $tgl_faktur, $nomor_faktur, $tarif, $titipan, $fee, 
                $jumlah_tagihan, $materai);
        redirect('admin/transaksi_air');
    }

    function hapustransaksi_air() {
        $id = $this->uri->segment(3);
        $this->load->model(array('mtransaksi_air'));
        $this->mtransaksi_air->deltransaksi_air($id);
        redirect('admin/transaksi_air');
    }

    
/* PEMBAYARAN (USAHA AIR) */

/* DETAIL POPULASI USAHA AIR (USAHA AIR) */
function realisasi_airperpemakaian_air() {
        $id = $this->uri->segment(3);
        $id_pemakaian_air = $id;
        $data['title'] = 'Admin:: Detail Absensi Per Pegawai';
        $data['header'] = 'header';
        $data['page'] = 'admin/pegawai/detailrealisasi_air';
        $data['detailpemakaian_air'] = $this->mpemakaian_air->getdetailpemakaian_air($id_pemakaian_air);
        $data['detailrealisasi_air'] = $this->mrealisasi_air->getrealisasi_airidpemakaian_air($id_pemakaian_air);
        $this->load->view('admin/template', $data);
    }
    
/* ============================ TUTUP USAHA AIR ===================== */    
    
    
/* PEMBERIAN AIR */

    function pemberian_air() {
        $data['title'] = 'Admin:: Data Pemberian Air';
        $data['header'] = 'admin/header';
        $data['page'] = 'admin/pemberian_air/listpemberian_air';
        $data['footer'] = 'admin/footer';
        $data['pemberian_air'] = $this->mpemberian_air->getpemberian_air();
        $this->load->view('admin/template', $data);
    }

    function tambahpemberian_air() {
        $this->load->model(array('mpemberian_air','mseksi','msaluran_sekunder',''));
        $data['title'] = 'Admin:: Tambah Data Pemberian Air';
        $data['header'] = 'admin/header';
        $data['page'] = 'admin/pemberian_air/addpemberian_air';
        $data['footer'] = 'admin/footer';
        $this->load->view('admin/template', $data);
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
        redirect('admin/pemberian_air');
    }

    function ubahpemberian_air() {
        $id = $this->uri->segment(3);
        $this->load->model(array('mpemberian_air', 'mseksi','msaluran_sekunder',''));
        $data['title'] = $this->uri->segment(4) . 'Admin:: Ubah Data Pemberian Air';
        $data['header'] = 'admin/header';
        $data['pemberian_air'] = $this->mpemberian_air->getpemberian_airid($id);
        $data['page'] = 'admin/pemberian_air/editpemberian_air';
        $data['footer'] = 'admin/footer';
        $this->load->view('admin/template', $data);
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
        redirect('admin/pemberian_air');
    }

    function hapuspemberian_air() {
        $id = $this->uri->segment(3);
        $this->load->model(array('mpemberian_air'));
        $this->mpemberian_air->delpemberian_air($id);
        redirect('admin/pemberian_air');
        echo $id;
    }

    
/* PROGRES PEKERJAAN */

    function progres_pekerjaan() {
        $data['title'] = 'Admin:: Data Progres Pekerjaan';
        $data['header'] = 'admin/header';
        $data['page'] = 'admin/progres_pekerjaan/listprogres_pekerjaan';
        $data['footer'] = 'admin/footer';
        $data['progres_pekerjaan'] = $this->mprogres_pekerjaan->getprogres_pekerjaan();
        $this->load->view('admin/template', $data);
    }

    function tambahprogres_pekerjaan() {
        $this->load->model(array('mprogres_pekerjaan', '','',''));
        $data['title'] = 'Admin:: Tambah Data Progres Pekerjaan';
        $data['header'] = 'admin/header';
        $data['page'] = 'admin/progres_pekerjaan/addprogres_pekerjaan';
        $data['footer'] = 'admin/footer';
        $this->load->view('admin/template', $data);
    }

    function simpanprogres_pekerjaan() {
        $this->load->model(array('mprogres_pekerjaan', 'mseksi','mpelanggan','mbalai'));
        $id_mata_anggaran= $this->input->post('id_mata_anggaran', TRUE);
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
        $this->mprogres_pekerjaan->addprogres_pekerjaan($id_mata_anggaran, $uraian_pekerjaan, $biaya_program, $biaya_realisasi, $biaya_sisa, $nomor_kontrak, $tanggal_kontrak, $rekanan, $waktu, $progres, $keterangan);
        redirect('admin/progres_pekerjaan');
    }

    function ubahprogres_pekerjaan() {
        $id = $this->uri->segment(3);
        $this->load->model(array('mprogres_pekerjaan', '','',''));
        $data['title'] = $this->uri->segment(4) . 'Admin:: Ubah Data Progres Pekerjaan';
        $data['header'] = 'admin/header';
        $data['progres_pekerjaan'] = $this->mprogres_pekerjaan->getprogres_pekerjaanid($id);
        $data['page'] = 'admin/progres_pekerjaan/editprogres_pekerjaan';
        $data['footer'] = 'admin/footer';
        $this->load->view('admin/template', $data);
    }

    function simpanubahprogres_pekerjaan() {
        $this->load->model(array('mprogres_pekerjaan', 'mseksi','mpelanggan','mbalai'));
        $id = $this->input->post('id', TRUE);
        $id_mata_anggaran= $this->input->post('id_mata_anggaran', TRUE);
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
        $this->mprogres_pekerjaan->updateprogres_pekerjaan($id, $id_mata_anggaran, $uraian_pekerjaan, $biaya_program, $biaya_realisasi, $biaya_sisa, $nomor_kontrak, $tanggal_kontrak, $rekanan, $waktu, $progres, $keterangan);
        redirect('admin/progres_pekerjaan');
    }

    function hapusprogres_pekerjaan() {
        $id = $this->uri->segment(3);
        $this->load->model(array('mprogres_pekerjaan'));
        $this->mprogres_pekerjaan->delprogres_pekerjaan($id);
        redirect('admin/progres_pekerjaan');
        echo $id;
    }    

/* PROGRES PEKERJAAN INVESTASI*/

    function progres_pekerjaan_investasi() {
        $data['title'] = 'Admin:: Data Progres Pekerjaan';
        $data['header'] = 'admin/header';
        $data['page'] = 'admin/progres_pekerjaan_investasi/listprogres_pekerjaan_investasi';
        $data['footer'] = 'admin/footer';
        $data['progres_pekerjaan_investasi'] = $this->mprogres_pekerjaan_investasi->getprogres_pekerjaan_investasi();
        $this->load->view('admin/template', $data);
    }

    function tambahprogres_pekerjaan_investasi() {
        $this->load->model(array('mprogres_pekerjaan_investasi', '','',''));
        $data['title'] = 'Admin:: Tambah Data Progres Pekerjaan';
        $data['header'] = 'admin/header';
        $data['page'] = 'admin/progres_pekerjaan_investasi/addprogres_pekerjaan_investasi';
        $data['footer'] = 'admin/footer';
        $this->load->view('admin/template', $data);
    }

    function simpanprogres_pekerjaan_investasi() {
        $this->load->model(array('mprogres_pekerjaan_investasi', 'mseksi','mpelanggan','mbalai'));
        $id_mata_anggaran= $this->input->post('id_mata_anggaran', TRUE);
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
        $this->mprogres_pekerjaan_investasi->addprogres_pekerjaan_investasi($id_mata_anggaran, $uraian_pekerjaan, $biaya_program, $biaya_realisasi, $biaya_sisa, $nomor_kontrak, $tanggal_kontrak, $rekanan, $waktu, $progres, $keterangan);
        redirect('admin/progres_pekerjaan_investasi');
    }

    function ubahprogres_pekerjaan_investasi() {
        $id = $this->uri->segment(3);
        $this->load->model(array('mprogres_pekerjaan_investasi', '','',''));
        $data['title'] = $this->uri->segment(4) . 'Admin:: Ubah Data Progres Pekerjaan';
        $data['header'] = 'admin/header';
        $data['progres_pekerjaan_investasi'] = $this->mprogres_pekerjaan_investasi->getprogres_pekerjaan_investasiid($id);
        $data['page'] = 'admin/progres_pekerjaan_investasi/editprogres_pekerjaan_investasi';
        $data['footer'] = 'admin/footer';
        $this->load->view('admin/template', $data);
    }

    function simpanubahprogres_pekerjaan_investasi() {
        $this->load->model(array('mprogres_pekerjaan_investasi', 'mseksi','mpelanggan','mbalai'));
        $id = $this->input->post('id', TRUE);
        $id_mata_anggaran= $this->input->post('id_mata_anggaran', TRUE);
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
        $this->mprogres_pekerjaan_investasi->updateprogres_pekerjaan_investasi($id, $id_mata_anggaran, $uraian_pekerjaan, $biaya_program, $biaya_realisasi, $biaya_sisa, $nomor_kontrak, $tanggal_kontrak, $rekanan, $waktu, $progres, $keterangan);
        redirect('admin/progres_pekerjaan_investasi');
    }

    function hapusprogres_pekerjaan_investasi() {
        $id = $this->uri->segment(3);
        $this->load->model(array('mprogres_pekerjaan_investasi'));
        $this->mprogres_pekerjaan_investasi->delprogres_pekerjaan_investasi($id);
        redirect('admin/progres_pekerjaan_investasi');
        echo $id;
    }    

    
    
/* CURAH HUJAN  */

    function curah_hujan() {
        $data['title'] = 'Admin:: Data Curah Hujan';
        $data['header'] = 'admin/header';
        $data['page'] = 'admin/curah_hujan/listcurah_hujan';
        $data['footer'] = 'admin/footer';
        $data['curah_hujan'] = $this->mcurah_hujan->getcurah_hujan();
        $this->load->view('admin/template', $data);
    }

    function tambahcurah_hujan() {
        $this->load->model(array('mcurah_hujan', 'mseksi','',''));
        $data['title'] = 'Admin:: Tambah Data Curah Hujan';
        $data['header'] = 'admin/header';
        $data['page'] = 'admin/curah_hujan/addcurah_hujan';
        $data['footer'] = 'admin/footer';
        $this->load->view('admin/template', $data);
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
        redirect('admin/curah_hujan');
    }

    function ubahcurah_hujan() {
        $id = $this->uri->segment(3);
        $this->load->model(array('mcurah_hujan', 'mseksi','',''));
        $data['title'] = $this->uri->segment(4) . 'Admin:: Ubah Data Curah Hujan';
        $data['header'] = 'admin/header';
        $data['curah_hujan'] = $this->mcurah_hujan->getcurah_hujanid($id);
        $data['page'] = 'admin/curah_hujan/editcurah_hujan';
        $data['footer'] = 'admin/footer';
        $this->load->view('admin/template', $data);
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
        redirect('admin/curah_hujan');
    }

    function hapuscurah_hujan() {
        $id = $this->uri->segment(3);
        $this->load->model(array('mcurah_hujan'));
        $this->mcurah_hujan->delcurah_hujan($id);
        redirect('admin/curah_hujan');
        echo $id;
    }

/* KEJADIAN  */

    function kejadian() {
        $data['title'] = 'Admin:: Data Curah Hujan';
        $data['header'] = 'admin/header';
        $data['page'] = 'admin/kejadian/listkejadian';
        $data['footer'] = 'admin/footer';
        $data['kejadian'] = $this->mkejadian->getkejadian();
        $this->load->view('admin/template', $data);
    }

    function tambahkejadian() {
        $this->load->model(array('mkejadian', 'mseksi','mbendung',''));
        $data['title'] = 'Admin:: Tambah Data Curah Hujan';
        $data['header'] = 'admin/header';
        $data['page'] = 'admin/kejadian/addkejadian';
        $data['footer'] = 'admin/footer';
        $this->load->view('admin/template', $data);
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
        redirect('admin/kejadian');
    }

    function ubahkejadian() {
        $id = $this->uri->segment(3);
        $this->load->model(array('mkejadian', 'mseksi','mbendung',''));
        $data['title'] = $this->uri->segment(4) . 'Admin:: Ubah Data Curah Hujan';
        $data['header'] = 'admin/header';
        $data['kejadian'] = $this->mkejadian->getkejadianid($id);
        $data['page'] = 'admin/kejadian/editkejadian';
        $data['footer'] = 'admin/footer';
        $this->load->view('admin/template', $data);
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
        redirect('admin/kejadian');
    }

    function hapuskejadian() {
        $id = $this->uri->segment(3);
        $this->load->model(array('mkejadian'));
        $this->mkejadian->delkejadian($id);
        redirect('admin/kejadian');
        echo $id;
    }    

/* TANAM RENDENG  */

    function tanam_rendeng() {
        $data['title'] = 'Admin:: Data Tanam Rendeng ';
        $data['header'] = 'admin/header';
        $data['page'] = 'admin/tanam_rendeng/listtanam_rendeng';
        $data['footer'] = 'admin/footer';
        $data['tanam_rendeng'] = $this->mtanam_rendeng->gettanam_rendeng();
        $this->load->view('admin/template', $data);
    }

    function tambahtanam_rendeng() {
        $this->load->model(array('mtanam_rendeng', 'mseksi','msaluran_tanam','mgolongan_tanam'));
        $data['title'] = 'Admin:: Tambah Data Tanam Rendeng';
        $data['header'] = 'admin/header';
        $data['page'] = 'admin/tanam_rendeng/addtanam_rendeng';
        $data['footer'] = 'admin/footer';
        $this->load->view('admin/template', $data);
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
        redirect('admin/tanam_rendeng');
    }

    function ubahtanam_rendeng() {
        $id = $this->uri->segment(3);
        $this->load->model(array('mtanam_rendeng', 'mseksi','msaluran_tanam','mgolongan_tanam'));
        $data['title'] = $this->uri->segment(4) . 'Admin:: Ubah Data Tanam Rendeng';
        $data['header'] = 'admin/header';
        $data['tanam_rendeng'] = $this->mtanam_rendeng->gettanam_rendengid($id);
        $data['page'] = 'admin/tanam_rendeng/edittanam_rendeng';
        $data['footer'] = 'admin/footer';
        $this->load->view('admin/template', $data);
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
        redirect('admin/tanam_rendeng');
    }

    function hapustanam_rendeng() {
        $id = $this->uri->segment(3);
        $this->load->model(array('mtanam_rendeng'));
        $this->mtanam_rendeng->deltanam_rendeng($id);
        redirect('admin/tanam_rendeng');
        echo $id;
    }    


/* TANAM GADU  */

    function tanam_gadu() {
        $data['title'] = 'Admin:: Data Tanam Gadu ';
        $data['header'] = 'admin/header';
        $data['page'] = 'admin/tanam_gadu/listtanam_gadu';
        $data['footer'] = 'admin/footer';
        $data['tanam_gadu'] = $this->mtanam_gadu->gettanam_gadu();
        $this->load->view('admin/template', $data);
    }

    function tambahtanam_gadu() {
        $this->load->model(array('mtanam_gadu', 'mseksi','msaluran_tanam','mgolongan_tanam'));
        $data['title'] = 'Admin:: Tambah Data Tanam Gadu';
        $data['header'] = 'admin/header';
        $data['page'] = 'admin/tanam_gadu/addtanam_gadu';
        $data['footer'] = 'admin/footer';
        $this->load->view('admin/template', $data);
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
        redirect('admin/tanam_gadu');
    }

    function ubahtanam_gadu() {
        $id = $this->uri->segment(3);
        $this->load->model(array('mtanam_gadu', 'mseksi','msaluran_tanam','mgolongan_tanam'));
        $data['title'] = $this->uri->segment(4) . 'Admin:: Ubah Data Tanam Gadu';
        $data['header'] = 'admin/header';
        $data['tanam_gadu'] = $this->mtanam_gadu->gettanam_gaduid($id);
        $data['page'] = 'admin/tanam_gadu/edittanam_gadu';
        $data['footer'] = 'admin/footer';
        $this->load->view('admin/template', $data);
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
        redirect('admin/tanam_gadu');
    }

    function hapustanam_gadu() {
        $id = $this->uri->segment(3);
        $this->load->model(array('mtanam_gadu'));
        $this->mtanam_gadu->deltanam_gadu($id);
        redirect('admin/tanam_gadu');
        echo $id;
    }    

/* DAB CBL */

    function dab_cbl() {
        $data['title'] = 'Admin:: Debet Air Bendung CBL';
        $data['header'] = 'admin/header';
        $data['page'] = 'admin/dab_cbl/listdab_cbl';
        $data['footer'] = 'admin/footer';
        $data['dab_cbl'] = $this->mdab_cbl->getdab_cbl();
        $this->load->view('admin/template', $data);
    }

    function tambahdab_cbl() {
        $this->load->model(array('mdab_cbl', 'mseksi','',''));
        $data['title'] = 'Admin:: Tambah Data Debet Air Bendung CBL';
        $data['header'] = 'admin/header';
        $data['page'] = 'admin/dab_cbl/adddab_cbl';
        $data['footer'] = 'admin/footer';
        $this->load->view('admin/template', $data);
    }

    function simpandab_cbl() {
        $this->load->model(array('mdab_cbl', 'mseksi','',''));
   //     $id_seksi = $this->input->post('id_seksi', TRUE);
   //     $id_bendung = $this->input->post('id_bendung', TRUE);
        $tanggal_input= $this->input->post('tanggal_input', TRUE);
        $jam = $this->input->post('jam', TRUE);
        $limpasan= $this->input->post('limpasan', TRUE);
        $debet_air = $this->input->post('debet_air', TRUE);
        $disukatani_bsh1 = $this->input->post('disukatani_bsh1', TRUE);
        //  $jumlah = $this->input->post('jumlah', TRUE);
        
        $jumlah = $debet_air + $disukatani_bsh1;
        
      
        $keterangan = $this->input->post('keterangan', TRUE);
        $this->mdab_cbl->adddab_cbl($tanggal_input, $jam, $limpasan, $debet_air, $disukatani_bsh1, $jumlah, 
                                    $keterangan);
        redirect('admin/dab_cbl');
    }

    function ubahdab_cbl() {
        $id = $this->uri->segment(3);
        $this->load->model(array('mdab_cbl', 'mseksi','',''));
        $data['title'] = $this->uri->segment(4) . 'Admin:: Ubah Data Debet Air Bendung CBL';
        $data['header'] = 'admin/header';
        $data['dab_cbl'] = $this->mdab_cbl->getdab_cblid($id);
        $data['page'] = 'admin/dab_cbl/editdab_cbl';
        $data['footer'] = 'admin/footer';
        $this->load->view('admin/template', $data);
    }

    function simpanubahdab_cbl() {
        $this->load->model(array('mdab_cbl', 'mseksi','',''));
        $id = $this->input->post('id', TRUE);
     //   $id_seksi = $this->input->post('id_seksi', TRUE);
     //   $id_bendung = $this->input->post('id_bendung', TRUE);
        $tanggal_input= $this->input->post('tanggal_input', TRUE);
        $jam = $this->input->post('jam', TRUE);
        $limpasan= $this->input->post('limpasan', TRUE);
        $debet_air = $this->input->post('debet_air', TRUE);
        $disukatani_bsh1 = $this->input->post('disukatani_bsh1', TRUE);
      //  $jumlah = $this->input->post('jumlah', TRUE);
        
        $jumlah = $debet_air + $disukatani_bsh1;
        
        $keterangan = $this->input->post('keterangan', TRUE);
        $this->mdab_cbl->updatedab_cbl($id ,$tanggal_input, $jam, $limpasan, $debet_air, $disukatani_bsh1, $jumlah, 
                                    $keterangan);
        redirect('admin/dab_cbl');
    }

    function hapusdab_cbl() {
        $id = $this->uri->segment(3);
        $this->load->model(array('mdab_cbl'));
        $this->mdab_cbl->deldab_cbl($id);
        redirect('admin/dab_cbl');
        echo $id;
    }
        
/* DAB CIKEAS */

    function dab_cikeas() {
        $data['title'] = 'Admin:: Debet Air Bendung Cikeas';
        $data['header'] = 'admin/header';
        $data['page'] = 'admin/dab_cikeas/listdab_cikeas';
        $data['footer'] = 'admin/footer';
        $data['dab_cikeas'] = $this->mdab_cikeas->getdab_cikeas();
        $this->load->view('admin/template', $data);
    }

    function tambahdab_cikeas() {
        $this->load->model(array('mdab_cikeas', 'mseksi','',''));
        $data['title'] = 'Admin:: Tambah Data Debet Air Bendung Cikeas';
        $data['header'] = 'admin/header';
        $data['page'] = 'admin/dab_cikeas/adddab_cikeas';
        $data['footer'] = 'admin/footer';
        $this->load->view('admin/template', $data);
    }

    function simpandab_cikeas() {
        $this->load->model(array('mdab_cikeas', 'mseksi','',''));
      //  $id_seksi = $this->input->post('id_seksi', TRUE);
        $tanggal_input= $this->input->post('tanggal_input', TRUE);
        $jam = $this->input->post('jam', TRUE);
        $pelimpas_kiri= $this->input->post('pelimpas_kiri', TRUE);
        $pelimpas_kanan = $this->input->post('pelimpas_kanan', TRUE);
      //  $jumlah = $this->input->post('jumlah', TRUE);
        
        $jumlah = $pelimpas_kiri + $pelimpas_kanan ;
        
        $keterangan = $this->input->post('keterangan', TRUE);
        $this->mdab_cikeas->adddab_cikeas( $tanggal_input, $jam, $pelimpas_kiri, $pelimpas_kanan, $jumlah, $keterangan);
        redirect('admin/dab_cikeas');
    }

    function ubahdab_cikeas() {
        $id = $this->uri->segment(3);
        $this->load->model(array('mdab_cikeas', 'mseksi','',''));
        $data['title'] = $this->uri->segment(4) . 'Admin:: Ubah Data Debet Air Bendung Cikeas';
        $data['header'] = 'admin/header';
        $data['dab_cikeas'] = $this->mdab_cikeas->getdab_cikeasid($id);
        $data['page'] = 'admin/dab_cikeas/editdab_cikeas';
        $data['footer'] = 'admin/footer';
        $this->load->view('admin/template', $data);
    }

    function simpanubahdab_cikeas() {
        $this->load->model(array('mdab_cikeas', 'mseksi','',''));
        $id = $this->input->post('id', TRUE);
       // $id_seksi = $this->input->post('id_seksi', TRUE);
        $tanggal_input= $this->input->post('tanggal_input', TRUE);
        $jam = $this->input->post('jam', TRUE);
        $pelimpas_kiri= $this->input->post('pelimpas_kiri', TRUE);
        $pelimpas_kanan = $this->input->post('pelimpas_kanan', TRUE);
      //  $jumlah = $this->input->post('jumlah', TRUE);
        
        $jumlah = $pelimpas_kiri + $pelimpas_kanan ;
        
        $keterangan = $this->input->post('keterangan', TRUE);
        $this->mdab_cikeas->updatedab_cikeas($id,  $tanggal_input, $jam, $pelimpas_kiri, $pelimpas_kanan, $jumlah, $keterangan);
        redirect('admin/dab_cikeas');
    }

    function hapusdab_cikeas() {
        $id = $this->uri->segment(3);
        $this->load->model(array('mdab_cikeas'));
        $this->mdab_cikeas->deldab_cikeas($id);
        redirect('admin/dab_cikeas');
        echo $id;
    }

    /* DAB CIPAMINGKIS */

    function dab_cipamingkis() {
        $data['title'] = 'Admin:: Debet Air Bendung Cipamingkis';
        $data['header'] = 'admin/header';
        $data['page'] = 'admin/dab_cipamingkis/listdab_cipamingkis';
        $data['footer'] = 'admin/footer';
        $data['dab_cipamingkis'] = $this->mdab_cipamingkis->getdab_cipamingkis();
        $this->load->view('admin/template', $data);
    }

    function tambahdab_cipamingkis() {
        $this->load->model(array('mdab_cipamingkis', 'mseksi','',''));
        $data['title'] = 'Admin:: Tambah Data Debet Air Bendung Cipamingkis';
        $data['header'] = 'admin/header';
        $data['page'] = 'admin/dab_cipamingkis/adddab_cipamingkis';
        $data['footer'] = 'admin/footer';
        $this->load->view('admin/template', $data);
    }

    function simpandab_cipamingkis() {
        $this->load->model(array('mdab_cipamingkis', 'mseksi','',''));
       // $id_seksi = $this->input->post('id_seksi', TRUE);
        $tanggal_input= $this->input->post('tanggal_input', TRUE);
        $jam = $this->input->post('jam', TRUE);
        $limpasan= $this->input->post('limpasan', TRUE);
        $saluran_induk_kiri = $this->input->post('saluran_induk_kiri', TRUE);
        $saluran_induk_kanan = $this->input->post('saluran_induk_kanan', TRUE);
        
        $q1 = $saluran_induk_kiri + $saluran_induk_kanan ;
        $q2 = $limpasan + $q1 ;
        
        $keterangan = $this->input->post('keterangan', TRUE);
        $this->mdab_cipamingkis->adddab_cipamingkis( $tanggal_input, $jam, $limpasan, $saluran_induk_kiri, $saluran_induk_kanan, 
            $q1, $q2, $keterangan);
        redirect('admin/dab_cipamingkis');
    }

    function ubahdab_cipamingkis() {
        $id = $this->uri->segment(3);
        $this->load->model(array('mdab_cipamingkis', 'mseksi','',''));
        $data['title'] = $this->uri->segment(4) . 'Admin:: Ubah Data Debet Air Bendung Cipamingkis';
        $data['header'] = 'admin/header';
        $data['dab_cipamingkis'] = $this->mdab_cipamingkis->getdab_cipamingkisid($id);
        $data['page'] = 'admin/dab_cipamingkis/editdab_cipamingkis';
        $data['footer'] = 'admin/footer';
        $this->load->view('admin/template', $data);
    }

    function simpanubahdab_cipamingkis() {
        $this->load->model(array('mdab_cipamingkis', 'mseksi','',''));
        $id = $this->input->post('id', TRUE);
      //  $id_seksi = $this->input->post('id_seksi', TRUE);
        $tanggal_input= $this->input->post('tanggal_input', TRUE);
        $jam = $this->input->post('jam', TRUE);
        $limpasan= $this->input->post('limpasan', TRUE);
        $saluran_induk_kiri = $this->input->post('saluran_induk_kiri', TRUE);
        $saluran_induk_kanan = $this->input->post('saluran_induk_kanan', TRUE);
        
        $q1 = $saluran_induk_kiri + $saluran_induk_kanan ;
        $q2 = $limpasan + $q1 ;
        
        $keterangan = $this->input->post('keterangan', TRUE);
        $this->mdab_cipamingkis->updatedab_cipamingkis($id,  $tanggal_input, $jam, $limpasan, $saluran_induk_kiri, $saluran_induk_kanan, 
            $q1, $q2, $keterangan);
        redirect('admin/dab_cipamingkis');
    }

    function hapusdab_cipamingkis() {
        $id = $this->uri->segment(3);
        $this->load->model(array('mdab_cipamingkis'));
        $this->mdab_cipamingkis->deldab_cipamingkis($id);
        redirect('admin/dab_cipamingkis');
        echo $id;
    }
    
    
/* DAB JEMBATAN BOJONG */

    function dab_jembatan_bojong() {
        $data['title'] = 'Admin:: Debet Air Jembatan Bojong';
        $data['header'] = 'admin/header';
        $data['page'] = 'admin/dab_jembatan_bojong/listdab_jembatan_bojong';
        $data['footer'] = 'admin/footer';
        $data['dab_jembatan_bojong'] = $this->mdab_jembatan_bojong->getdab_jembatan_bojong();
        $this->load->view('admin/template', $data);
    }

    function tambahdab_jembatan_bojong() {
        $this->load->model(array('mdab_jembatan_bojong', 'mseksi','',''));
        $data['title'] = 'Admin:: Tambah Data Debet Air Jembatan Bojong';
        $data['header'] = 'admin/header';
        $data['page'] = 'admin/dab_jembatan_bojong/adddab_jembatan_bojong';
        $data['footer'] = 'admin/footer';
        $this->load->view('admin/template', $data);
    }

    function simpandab_jembatan_bojong() {
        $this->load->model(array('mdab_jembatan_bojong', 'mseksi','',''));
       // $id_seksi = $this->input->post('id_seksi', TRUE);
        $tanggal_input= $this->input->post('tanggal_input', TRUE);
        $jam = $this->input->post('jam', TRUE);
        $tma= $this->input->post('tma', TRUE);
        $debet = $this->input->post('debet', TRUE);
        $keterangan = $this->input->post('keterangan', TRUE);
        $this->mdab_jembatan_bojong->adddab_jembatan_bojong( $tanggal_input, $jam, $tma, $debet, $keterangan);
        redirect('admin/dab_jembatan_bojong');
    }

    function ubahdab_jembatan_bojong() {
        $id = $this->uri->segment(3);
        $this->load->model(array('mdab_jembatan_bojong', 'mseksi','',''));
        $data['title'] = $this->uri->segment(4) . 'Admin:: Ubah Data Debet Air Jembatan Bojong';
        $data['header'] = 'admin/header';
        $data['dab_jembatan_bojong'] = $this->mdab_jembatan_bojong->getdab_jembatan_bojongid($id);
        $data['page'] = 'admin/dab_jembatan_bojong/editdab_jembatan_bojong';
        $data['footer'] = 'admin/footer';
        $this->load->view('admin/template', $data);
    }

    function simpanubahdab_jembatan_bojong() {
        $this->load->model(array('mdab_jembatan_bojong', 'mseksi','',''));
        $id = $this->input->post('id', TRUE);
    //    $id_seksi = $this->input->post('id_seksi', TRUE);
        $tanggal_input= $this->input->post('tanggal_input', TRUE);
        $jam = $this->input->post('jam', TRUE);
        $tma= $this->input->post('tma', TRUE);
        $debet = $this->input->post('debet', TRUE);
        $keterangan = $this->input->post('keterangan', TRUE);
        $this->mdab_jembatan_bojong->updatedab_jembatan_bojong($id, $tanggal_input, $jam, $tma, $debet, $keterangan);
        redirect('admin/dab_jembatan_bojong');
    }

    function hapusdab_jembatan_bojong() {
        $id = $this->uri->segment(3);
        $this->load->model(array('mdab_jembatan_bojong'));
        $this->mdab_jembatan_bojong->deldab_jembatan_bojong($id);
        redirect('admin/dab_jembatan_bojong');
        echo $id;
    }

    
/* DAB LEMAHABANG*/

    function dab_lemahabang() {
        $data['title'] = 'Admin:: Debet Air Bendung Lemahabang';
        $data['header'] = 'admin/header';
        $data['page'] = 'admin/dab_lemahabang/listdab_lemahabang';
        $data['footer'] = 'admin/footer';
        $data['dab_lemahabang'] = $this->mdab_lemahabang->getdab_lemahabang();
        $this->load->view('admin/template', $data);
    }

    function tambahdab_lemahabang() {
        $this->load->model(array('mdab_lemahabang', 'mseksi','',''));
        $data['title'] = 'Admin:: Tambah Data Debet Air Bendung Lemahabang';
        $data['header'] = 'admin/header';
        $data['page'] = 'admin/dab_lemahabang/adddab_lemahabang';
        $data['footer'] = 'admin/footer';
        $this->load->view('admin/template', $data);
    }

    function simpandab_lemahabang() {
        $this->load->model(array('mdab_lemahabang', 'mseksi','',''));
       // $id_seksi = $this->input->post('id_seksi', TRUE);
        $tanggal_input= $this->input->post('tanggal_input', TRUE);
        $jam = $this->input->post('jam', TRUE);
        $tma= $this->input->post('tma', TRUE);
        $debet = $this->input->post('debet', TRUE);
        $keterangan = $this->input->post('keterangan', TRUE);
        $this->mdab_lemahabang->adddab_lemahabang( $tanggal_input, $jam, $tma, $debet, $keterangan);
        redirect('admin/dab_lemahabang');
    }

    function ubahdab_lemahabang() {
        $id = $this->uri->segment(3);
        $this->load->model(array('mdab_lemahabang', 'mseksi','',''));
        $data['title'] = $this->uri->segment(4) . 'Admin:: Ubah Data Debet Air Bendung Lemahabang';
        $data['header'] = 'admin/header';
        $data['dab_lemahabang'] = $this->mdab_lemahabang->getdab_lemahabangid($id);
        $data['page'] = 'admin/dab_lemahabang/editdab_lemahabang';
        $data['footer'] = 'admin/footer';
        $this->load->view('admin/template', $data);
    }

    function simpanubahdab_lemahabang() {
        $this->load->model(array('mdab_lemahabang', 'mseksi','',''));
        $id = $this->input->post('id', TRUE);
       // $id_seksi = $this->input->post('id_seksi', TRUE);
        $tanggal_input= $this->input->post('tanggal_input', TRUE);
        $jam = $this->input->post('jam', TRUE);
        $tma= $this->input->post('tma', TRUE);
        $debet = $this->input->post('debet', TRUE);
        $keterangan = $this->input->post('keterangan', TRUE);
        $this->mdab_lemahabang->updatedab_lemahabang($id, $tanggal_input, $jam, $tma, $debet, $keterangan);
        redirect('admin/dab_lemahabang');
    }

    function hapusdab_lemahabang() {
        $id = $this->uri->segment(3);
        $this->load->model(array('mdab_lemahabang'));
        $this->mdab_lemahabang->deldab_lemahabang($id);
        redirect('admin/dab_lemahabang');
        echo $id;
    }   
    
/* DAB BENDUNG BEKASI */

    function dab_bekasi() {
        $data['title'] = 'Admin:: Debet Air Bendung Bekasi';
        $data['header'] = 'admin/header';
        $data['page'] = 'admin/dab_bekasi/listdab_bekasi';
        $data['footer'] = 'admin/footer';
        $data['dab_bekasi'] = $this->mdab_bekasi->getdab_bekasi();
        $this->load->view('admin/template', $data);
    }

    function tambahdab_bekasi() {
        $this->load->model(array('mdab_bekasi', 'mseksi','',''));
        $data['title'] = 'Admin:: Tambah Data Debet Air Bendung Bekasi';
        $data['header'] = 'admin/header';
        $data['page'] = 'admin/dab_bekasi/adddab_bekasi';
        $data['footer'] = 'admin/footer';
        $this->load->view('admin/template', $data);
    }

    function simpandab_bekasi() {
        $this->load->model(array('mdab_bekasi', 'mseksi','',''));
       // $id_seksi = $this->input->post('id_seksi', TRUE);
        $tanggal_input= $this->input->post('tanggal_input', TRUE);
        $jam = $this->input->post('jam', TRUE);
     //  $tanggal_input =  NOW('Y-m-d', TRUE);
     // $jam = NOW('H:i:s',TRUE);
        $limpasan = $this->input->post('limpasan', TRUE);
        $suplesi_dari_btb45b= $this->input->post('suplesi_dari_btb45b', TRUE);
        $dimanfaatkan_ke_dki = $this->input->post('dimanfaatkan_ke_dki', TRUE);
        $dimanfaatkan_ke_bekasiutara = $this->input->post('dimanfaatkan_ke_bekasiutara', TRUE);
        $q1_dimanfaatkan = $dimanfaatkan_ke_dki + $dimanfaatkan_ke_bekasiutara ;
        $q2 = $limpasan + $q1_dimanfaatkan;
        $sumber_setempat = $q2 - $suplesi_dari_btb45b ;
        $keterangan = $this->input->post('keterangan', TRUE);
        $this->mdab_bekasi->adddab_bekasi($tanggal_input, $jam, $limpasan ,$suplesi_dari_btb45b, $sumber_setempat, $dimanfaatkan_ke_dki, 
            $dimanfaatkan_ke_bekasiutara, $q1_dimanfaatkan, $q2, $keterangan);
        redirect('admin/dab_bekasi');
    }

    function ubahdab_bekasi() {
        $id = $this->uri->segment(3);
        $this->load->model(array('mdab_bekasi', 'mseksi','',''));
        $data['title'] = $this->uri->segment(4) . 'Admin:: Ubah Data Debet Air Bendung Bekasi';
        $data['header'] = 'admin/header';
        $data['dab_bekasi'] = $this->mdab_bekasi->getdab_bekasiid($id);
        $data['page'] = 'admin/dab_bekasi/editdab_bekasi';
        $data['footer'] = 'admin/footer';
        $this->load->view('admin/template', $data);
    }

    function simpanubahdab_bekasi() {
        $this->load->model(array('mdab_bekasi', 'mseksi','',''));
        $id = $this->input->post('id', TRUE);
        //$id_seksi = $this->input->post('id_seksi', TRUE);
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
        $this->mdab_bekasi->updatedab_bekasi($id, $tanggal_input, $jam, $limpasan ,$suplesi_dari_btb45b, $sumber_setempat, $dimanfaatkan_ke_dki, 
            $dimanfaatkan_ke_bekasiutara, $q1_dimanfaatkan, $q2, $keterangan);
        redirect('admin/dab_bekasi');
    }

    function hapusdab_bekasi() {
        $id = $this->uri->segment(3);
        $this->load->model(array('mdab_bekasi'));
        $this->mdab_bekasi->deldab_bekasi($id);
        redirect('admin/dab_bekasi');
        echo $id;
    } 
    

/* DAB BENDUNG CIBEET */

    function dab_cibeet() {
        $data['title'] = 'Admin:: Debet Air Bendung Cibeet';
        $data['header'] = 'admin/header';
        $data['page'] = 'admin/dab_cibeet/listdab_cibeet';
        $data['footer'] = 'admin/footer';
        $data['dab_cibeet'] = $this->mdab_cibeet->getdab_cibeet();
        $this->load->view('admin/template', $data);
    }

    function tambahdab_cibeet() {
        $this->load->model(array('mdab_cibeet', 'mseksi','',''));
        $data['title'] = 'Admin:: Tambah Data Debet Air Bendung Cibeet';
        $data['header'] = 'admin/header';
        $data['page'] = 'admin/dab_cibeet/adddab_cibeet';
        $data['footer'] = 'admin/footer';
        $this->load->view('admin/template', $data);
    }

    function simpandab_cibeet() {
        $this->load->model(array('mdab_cibeet', 'mseksi','',''));
       // $id_seksi = $this->input->post('id_seksi', TRUE);
        $tanggal_input= $this->input->post('tanggal_input', TRUE);
        $jam = $this->input->post('jam', TRUE);
        $limpasan = $this->input->post('limpasan', TRUE);
        $bocoran= $this->input->post('bocoran', TRUE);
        $q1_suplesi_ketarumbarat = $this->input->post('q1_suplesi_ketarumbarat', TRUE);
        $q2_kalicibeet = $limpasan + $bocoran + $q1_suplesi_ketarumbarat;
        $keterangan = $this->input->post('keterangan', TRUE);
        $this->mdab_cibeet->adddab_cibeet( $tanggal_input, $jam, $limpasan, $bocoran, $q1_suplesi_ketarumbarat, 
            $q2_kalicibeet, $keterangan);
        redirect('admin/dab_cibeet');
    }

    function ubahdab_cibeet() {
        $id = $this->uri->segment(3);
        $this->load->model(array('mdab_cibeet', 'mseksi','',''));
        $data['title'] = $this->uri->segment(4) . 'Admin:: Ubah Data Debet Air Bendung Cibeet';
        $data['header'] = 'admin/header';
        $data['dab_cibeet'] = $this->mdab_cibeet->getdab_cibeetid($id);
        $data['page'] = 'admin/dab_cibeet/editdab_cibeet';
        $data['footer'] = 'admin/footer';
        $this->load->view('admin/template', $data);
    }

    function simpanubahdab_cibeet() {
        $this->load->model(array('mdab_bekasi', 'mseksi','',''));
        $id = $this->input->post('id', TRUE);
        //$id_seksi = $this->input->post('id_seksi', TRUE);
        $tanggal_input= $this->input->post('tanggal_input', TRUE);
        $jam = $this->input->post('jam', TRUE);
        $limpasan = $this->input->post('limpasan', TRUE);
        $bocoran= $this->input->post('bocoran', TRUE);
        $q1_suplesi_ketarumbarat = $this->input->post('q1_suplesi_ketarumbarat', TRUE);
        $q2_kalicibeet = $limpasan + $bocoran + $q1_suplesi_ketarumbarat;
        $keterangan = $this->input->post('keterangan', TRUE);
        $this->mdab_cibeet->updatedab_cibeet($id, $tanggal_input, $jam, $limpasan, $bocoran, $q1_suplesi_ketarumbarat, 
            $q2_kalicibeet, $keterangan);
        redirect('admin/dab_cibeet');
    }

    function hapusdab_cibeet() {
        $id = $this->uri->segment(3);
        $this->load->model(array('mdab_cibeet'));
        $this->mdab_cibeet->deldab_cibeet($id);
        redirect('admin/dab_cibeet');
        echo $id;
    }   

    
/* DAB BENDUNG CIKARANG */

    function dab_cikarang() {
        $data['title'] = 'Admin:: Debet Air Bendung Cikarang';
        $data['header'] = 'admin/header';
        $data['page'] = 'admin/dab_cikarang/listdab_cikarang';
        $data['footer'] = 'admin/footer';
        $data['dab_cikarang'] = $this->mdab_cikarang->getdab_cikarang();
        $this->load->view('admin/template', $data);
    }

    function tambahdab_cikarang() {
        $this->load->model(array('mdab_cikarang', 'mseksi','',''));
        $data['title'] = 'Admin:: Tambah Data Debet Air Bendung Cikarang';
        $data['header'] = 'admin/header';
        $data['page'] = 'admin/dab_cikarang/adddab_cikarang';
        $data['footer'] = 'admin/footer';
        $this->load->view('admin/template', $data);
    }

    function simpandab_cikarang() {
        $this->load->model(array('mdab_cikarang', 'mseksi','',''));
       // $id_seksi = $this->input->post('id_seksi', TRUE);
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
        $this->mdab_cikarang->adddab_cikarang( $tanggal_input, $jam, $limpasan, $bocoran, $pintu_penguras, $suplesi_dari_btb34b, 
            $sumber_setempat, $dimanfaatkan_ke_bekasibarat, $dimanfaatkan_ke_sukatani, $q1_dimanfaatkan, $q2 ,$keterangan);
        redirect('admin/dab_cikarang');
    }

    function ubahdab_cikarang() {
        $id = $this->uri->segment(3);
        $this->load->model(array('mdab_cikarang', 'mseksi','',''));
        $data['title'] = $this->uri->segment(4) . 'Admin:: Ubah Data Debet Air Bendung Cikarang';
        $data['header'] = 'admin/header';
        $data['dab_cikarang'] = $this->mdab_cikarang->getdab_cikarangid($id);
        $data['page'] = 'admin/dab_cikarang/editdab_cikarang';
        $data['footer'] = 'admin/footer';
        $this->load->view('admin/template', $data);
    }

    function simpanubahdab_cikarang() {
        $this->load->model(array('mdab_cikarang', 'mseksi','',''));
        $id = $this->input->post('id', TRUE);
   //     $id_seksi = $this->input->post('id_seksi', TRUE);
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
        $this->mdab_cikarang->updatedab_cikarang($id, $tanggal_input, $jam, $limpasan, $bocoran, $pintu_penguras, $suplesi_dari_btb34b, 
            $sumber_setempat, $dimanfaatkan_ke_bekasibarat, $dimanfaatkan_ke_sukatani, $q1_dimanfaatkan, $q2 ,$keterangan);
        redirect('admin/dab_cikarang');
    }

    function hapusdab_cikarang() {
        $id = $this->uri->segment(3);
        $this->load->model(array('mdab_cikarang'));
        $this->mdab_cikarang->deldab_cikarang($id);
        redirect('admin/dab_cikarang');
        echo $id;
    }       

/* PENGGUNA LAHAN  */

    function pengguna_lahan() {
        $data['title'] = 'Admin:: Data Curah Hujan';
        $data['header'] = 'admin/header';
        $data['page'] = 'admin/usaha_lahan_sppls/pengguna_lahan/listpengguna_lahan';
        $data['footer'] = 'admin/footer';
        $data['pengguna_lahan'] = $this->mpengguna_lahan->getpengguna_lahan();
        $this->load->view('admin/template', $data);
    }

    function tambahpengguna_lahan() {
        $this->load->model(array('mpengguna_lahan', 'mseksi','mbendung',''));
        $data['title'] = 'Admin:: Tambah Data Curah Hujan';
        $data['header'] = 'admin/header';
        $data['page'] = 'admin/usaha_lahan_sppls/pengguna_lahan/addpengguna_lahan';
        $data['footer'] = 'admin/footer';
        $this->load->view('admin/template', $data);
    }

    function simpanpengguna_lahan() {
        $this->load->model(array('mpengguna_lahan', 'mseksi','',''));
        $nama= $this->input->post('nama', TRUE);
	$alamat = $this->input->post('alamat', TRUE);
        $berlaku_mulai = $this->input->post('berlaku_mulai', TRUE);
        $berlaku_akhir = $this->input->post('berlaku_akhir', TRUE);
        $id_seksi = $this->input->post('id_seksi', TRUE);
        $lokasi = $this->input->post('lokasi', TRUE);
        $no_sipls = $this->input->post('no_sipls', TRUE);
        
        $penggunaan_1 = $this->input->post('penggunaan_1', TRUE);
        $luas_1 = $this->input->post('luas_1', TRUE);
        $tarif_1 = $this->input->post('tarif_1', TRUE);
        $penggunaan_2 = $this->input->post('penggunaan_2', TRUE);
        $luas_2 = $this->input->post('luas_2', TRUE);
        $tarif_2 = $this->input->post('tarif_2', TRUE);
        $penggunaan_3 = $this->input->post('penggunaan_3', TRUE);
        $luas_3 = $this->input->post('luas_3', TRUE);
        $tarif_3 = $this->input->post('tarif_3', TRUE);
        $penggunaan_4 = $this->input->post('penggunaan_4', TRUE);
        $luas_4 = $this->input->post('luas_4', TRUE);
        $tarif_4 = $this->input->post('tarif_4', TRUE);
        $penggunaan_5 = $this->input->post('penggunaan_5', TRUE);
        $luas_5 = $this->input->post('luas_5', TRUE);
        $tarif_5 = $this->input->post('tarif_5', TRUE);
        
        $jumlah = ($luas_1 * $tarif_1) + ($luas_2 * $tarif_2) + ($luas_3 * $tarif_3) + ($luas_4 * $tarif_4) + ($luas_5 * $tarif_5);
        $ppn = $jumlah * 10 / 100;
        $administrasi = $this->input->post('administrasi', TRUE);
        $jumlah_sewa = $jumlah - $ppn + $administrasi;
        
        $this->mpengguna_lahan->addpengguna_lahan($nama, $alamat, $berlaku_mulai, $berlaku_akhir, $id_seksi, $lokasi, 
                $no_sipls, $penggunaan_1, $luas_1, $tarif_1, $penggunaan_2, $luas_2, $tarif_2, $penggunaan_3, $luas_3,
                $tarif_3, $penggunaan_4, $luas_4, $tarif_4, $penggunaan_5, $luas_5, $tarif_5, $jumlah, $ppn, $administrasi,
                $jumlah_sewa);
        redirect('admin/pengguna_lahan');
    }

    function ubahpengguna_lahan() {
        $id = $this->uri->segment(3);
        $this->load->model(array('mpengguna_lahan', 'mseksi','',''));
        $data['title'] = $this->uri->segment(4) . 'Admin:: Ubah Data Curah Hujan';
        $data['header'] = 'admin/header';
        $data['pengguna_lahan'] = $this->mpengguna_lahan->getpengguna_lahanid($id);
        $data['page'] = 'admin/usaha_lahan_sppls/pengguna_lahan/editpengguna_lahan';
        $data['footer'] = 'admin/footer';
        $this->load->view('admin/template', $data);
    }

    function simpanubahpengguna_lahan() {
        $this->load->model(array('mpengguna_lahan', 'mseksi','mbendung',''));
        $id = $this->input->post('id', TRUE);
        $nama= $this->input->post('nama', TRUE);
	$alamat = $this->input->post('alamat', TRUE);
        $berlaku_mulai = $this->input->post('berlaku_mulai', TRUE);
        $berlaku_akhir = $this->input->post('berlaku_akhir', TRUE);
        $id_seksi = $this->input->post('id_seksi', TRUE);
        $lokasi = $this->input->post('lokasi', TRUE);
        $no_sipls = $this->input->post('no_sipls', TRUE);
        
        $penggunaan_1 = $this->input->post('penggunaan_1', TRUE);
        $luas_1 = $this->input->post('luas_1', TRUE);
        $tarif_1 = $this->input->post('tarif_1', TRUE);
        $penggunaan_2 = $this->input->post('penggunaan_2', TRUE);
        $luas_2 = $this->input->post('luas_2', TRUE);
        $tarif_2 = $this->input->post('tarif_2', TRUE);
        $penggunaan_3 = $this->input->post('penggunaan_3', TRUE);
        $luas_3 = $this->input->post('luas_3', TRUE);
        $tarif_3 = $this->input->post('tarif_3', TRUE);
        $penggunaan_4 = $this->input->post('penggunaan_4', TRUE);
        $luas_4 = $this->input->post('luas_4', TRUE);
        $tarif_4 = $this->input->post('tarif_4', TRUE);
        $penggunaan_5 = $this->input->post('penggunaan_5', TRUE);
        $luas_5 = $this->input->post('luas_5', TRUE);
        $tarif_5 = $this->input->post('tarif_5', TRUE);
        
        $jumlah = ($luas_1 * $tarif_1) + ($luas_2 * $tarif_2) + ($luas_3 * $tarif_3) + ($luas_4 * $tarif_4) + ($luas_5 * $tarif_5);
        $ppn = $jumlah * 10 / 100;
        $administrasi = $this->input->post('administrasi', TRUE);
        $jumlah_sewa = $jumlah - $ppn + $administrasi;
        
        $this->mpengguna_lahan->updatepengguna_lahan($id, $nama, $alamat, $berlaku_mulai, $berlaku_akhir, $id_seksi, 
                $lokasi, $no_sipls, $penggunaan_1, $luas_1, $tarif_1, $penggunaan_2, $luas_2, $tarif_2, $penggunaan_3, $luas_3,
                $tarif_3, $penggunaan_4, $luas_4, $tarif_4, $penggunaan_5, $luas_5, $tarif_5, $jumlah, $ppn, $administrasi,
                $jumlah_sewa);
        redirect('admin/pengguna_lahan');
    }

    
/* PERPANJANG  */

    function perpanjang_lahan() {
        $data['title'] = 'Admin:: Data Perpanjang';
        $data['header'] = 'admin/header';
        $data['page'] = 'admin/usaha_lahan_sppls/perpanjang_lahan/listperpanjang_lahan';
        $data['footer'] = 'admin/footer';
        $data['perpanjang_lahan'] = $this->mperpanjang_lahan->getperpanjang_lahan();
        $this->load->view('admin/template', $data);
    }

    function tambahperpanjang_lahan() {
        $this->load->model(array('mperpanjang_lahan', '','',''));
        $data['title'] = 'Admin:: Tambah Data Perpanjang';
        $data['header'] = 'admin/header';
        $data['page'] = 'admin/usaha_lahan_sppls/perpanjang_lahan/addperpanjang_lahan';
        $data['footer'] = 'admin/footer';
        $this->load->view('admin/template', $data);
    }

    function simpanperpanjang_lahan() {
        $this->load->model(array('mperpanjang_lahan', '','',''));
        $no_sipls = $this->input->post('no_sipls', TRUE);
        $sipls = $this->input->post('sipls', TRUE);
        $tgl_perpanjang = $this->input->post('tgl_perpanjang', TRUE);
        $this->mperpanjang_lahan->addperpanjang_lahan($no_sipls, $sipls, $tgl_perpanjang);
        redirect('admin/perpanjang_lahan');
    }

    function ubahperpanjang_lahan() {
        $id = $this->uri->segment(3);
        $this->load->model(array('mperpanjang_lahan', '','',''));
        $data['title'] = $this->uri->segment(4) . 'Admin:: Ubah Data Perpanjang';
        $data['header'] = 'admin/header';
        $data['perpanjang_lahan'] = $this->mperpanjang_lahan->getperpanjang_lahanid($id);
        $data['page'] = 'admin/usaha_lahan_sppls/perpanjang_lahan/editperpanjang_lahan';
        $data['footer'] = 'admin/footer';
        $this->load->view('admin/template', $data);
    }

    function simpanubahperpanjang_lahan() {
        $this->load->model(array('mperpanjang_lahan', '','',''));
        $id = $this->input->post('id', TRUE);
        $no_sipls = $this->input->post('no_sipls', TRUE);
        $sipls = $this->input->post('sipls', TRUE);
        $tgl_perpanjang = $this->input->post('tgl_perpanjang', TRUE);
        $this->mperpanjang_lahan->updateperpanjang_lahan($id, $no_sipls, $sipls, $tgl_perpanjang);
        redirect('admin/perpanjang_lahan');
    }
    
   
    function hapusperpanjang_lahan() {
        $id = $this->uri->segment(3);
        $this->load->model(array('mperpanjang_lahan'));
        $this->mperpanjang_lahan->delperpanjang_lahan($id);
        redirect('admin/perpanjang_lahan');
    }
    
/* POPULASI LAHAN  */

    function populasi_lahan() {
        $data['title'] = 'Admin:: Data Populasi Lahan';
        $data['header'] = 'admin/header';
        $data['page'] = 'admin/usaha_lahan_sppls/populasi_lahan/listpopulasi_lahan';
        $data['footer'] = 'admin/footer';
        $data['populasi_lahan'] = $this->mpopulasi_lahan->getpopulasi_lahan();
        $this->load->view('admin/template', $data);
    }
    
/* LAPORAN */
    
    function laporancurahhujan() {
        $data['title'] = 'Laporan Curah Hujan';
        $data['header'] = 'admin/header';
        $data['footer'] = 'admin/footer';
        $data['page'] = 'admin/laporan/lap_curahhujan';
        $this->load->view('admin/template', $data);
    }

    function cetaklaporancurahhujan($seksi = '', $tgl1 = '', $tgl2 = '') {
        $data['title'] = 'Cetak Laporan Curah Hujan';
        $data['seksi'] = $seksi;
        $data['tgl1'] = date('Y-m-d', strtotime($tgl1));
        $data['tgl2'] = date('Y-m-d', strtotime($tgl2));
        $data['page'] = $this->load->view('admin/laporan/cetak_lap_curahhujan', $data);
        $this->load->view('admin/laporan/template', $data);
    }
    
    function laporankejadian() {
        $data['title'] = 'Laporan Kejadian';
        $data['header'] = 'admin/header';
        $data['footer'] = 'admin/footer';
        $data['page'] = 'admin/laporan/lap_kejadian';
        $this->load->view('admin/template', $data);
    }

    function cetaklaporankejadian($seksi = '', $tgl1 = '', $tgl2 = '') {
        $data['title'] = 'Cetak Laporan Kejadian';
        $data['seksi'] = $seksi;
        $data['tgl1'] = date('Y-m-d', strtotime($tgl1));
        $data['tgl2'] = date('Y-m-d', strtotime($tgl2));
        $data['page'] = $this->load->view('admin/laporan/cetak_lap_kejadian', $data);
        $this->load->view('admin/laporan/template', $data);
    }
   
    
    function laporanprogrespekerjaan() {
        $data['title'] = 'Laporan Progres Pekerjaan';
        $data['header'] = 'admin/header';
        $data['footer'] = 'admin/footer';
        $data['page'] = 'admin/laporan/lap_laporanprogrespekerjaan';
        $this->load->view('admin/template', $data);
    }

    function cetaklaporanprogrespekerjaan( $mata_anggaran ='', $tgl1 = '', $tgl2 = '') {
        $data['title'] = 'Cetak Laporan Progres Pekerjaan';
        $data['mata_anggaran'] = $mata_anggaran;
        $data['tgl1'] = date('Y-m-d', strtotime($tgl1));
        $data['tgl2'] = date('Y-m-d', strtotime($tgl2));
        $data['page'] = $this->load->view('admin/laporan/cetak_lap_laporanprogrespekerjaan', $data);
        $this->load->view('admin/laporan/template', $data);
    }
    
    function laporanprogrespekerjaaninvestasi() {
        $data['title'] = 'Laporan Progres Pekerjaan Investasi';
        $data['header'] = 'admin/header';
        $data['footer'] = 'admin/footer';
        $data['page'] = 'admin/laporan/lap_laporanprogrespekerjaaninvestasi';
        $this->load->view('admin/template', $data);
    }

    function cetaklaporanprogrespekerjaaninvestasi( $mata_anggaran ='', $tgl1 = '', $tgl2 = '') {
        $data['title'] = 'Cetak Laporan Progres Pekerjaan Investasi';
        $data['mata_anggaran'] = $mata_anggaran;
        $data['tgl1'] = date('Y-m-d', strtotime($tgl1));
        $data['tgl2'] = date('Y-m-d', strtotime($tgl2));
        $data['page'] = $this->load->view('admin/laporan/cetak_lap_laporanprogrespekerjaaninvestasi', $data);
        $this->load->view('admin/laporan/template', $data);
    }
    
    
    function laporanpemakaianair() {
        $data['title'] = 'Laporan Pemakaian Air';
        $data['header'] = 'admin/header';
        $data['footer'] = 'admin/footer';
        $data['page'] = 'admin/laporan/lap_laporanpemakaianair';
        $this->load->view('admin/template', $data);
    }
    function cetaklaporanpemakaianair($balai = '', $seksi='',$tgl1 = '', $tgl2 = '') {
        $data['title'] = 'Cetak Laporan Laporan Pemakaian Air';
        $data['balai'] = $balai;
        $data['seksi'] = $seksi;
        $data['tgl1'] = date('Y-m-d', strtotime($tgl1));
        $data['tgl2'] = date('Y-m-d', strtotime($tgl2));
        $data['page'] = $this->load->view('admin/laporan/cetak_lap_laporanpemakaianair', $data);
        $this->load->view('admin/laporan/template', $data);
    }
    

    function laporanpemberianair() {
        $data['title'] = 'Laporan Pemberian Air';
        $data['header'] = 'admin/header';
        $data['footer'] = 'admin/footer';
        $data['page'] = 'admin/laporan/lap_laporanpemberianair';
        $this->load->view('admin/template', $data);
    }
    function cetaklaporanpemberianair($saluran_sekunder = '', $seksi='',$tgl1 = '', $tgl2 = '') {
        $data['title'] = 'Cetak Laporan Laporan Pemberian Air';
        $data['saluran_sekunder'] = $saluran_sekunder;
        $data['seksi'] = $seksi;
        $data['tgl1'] = date('Y-m-d', strtotime($tgl1));
        $data['tgl2'] = date('Y-m-d', strtotime($tgl2));
        $data['page'] = $this->load->view('admin/laporan/cetak_lap_laporanpemberianair', $data);
        $this->load->view('admin/laporan/template', $data);
    }

    
    function laporaninventarea() {
        $data['title'] = 'Laporan Inventaris Areal Tanam';
        $data['header'] = 'admin/header';
        $data['footer'] = 'admin/footer';
        $data['page'] = 'admin/laporan/lap_laporaninventarea';
        $this->load->view('admin/template', $data);
    }
    function cetaklaporaninventarea($saluran_sekunder = '', $seksi='',$tgl1 = '', $tgl2 = '') {
        $data['title'] = 'Cetak Laporan Inventaris Areal Tanam';
        $data['saluran_sekunder'] = $saluran_sekunder;
        $data['seksi'] = $seksi;
        $data['tgl1'] = date('Y-m-d', strtotime($tgl1));
        $data['tgl2'] = date('Y-m-d', strtotime($tgl2));
        $data['page'] = $this->load->view('admin/laporan/cetak_lap_laporaninventarea', $data);
        $this->load->view('admin/laporan/template', $data);
    }    
    
    function laporantanamrendeng() {
        $data['title'] = 'Laporan Tanam Rendeng';
        $data['header'] = 'admin/header';
        $data['footer'] = 'admin/footer';
        $data['page'] = 'admin/laporan/lap_laporantanamrendeng';
        $this->load->view('admin/template', $data);
    }
    
	function cetaklaporantanamrendeng($saluran_tanam = '', $seksi='',$tgl1 = '', $tgl2 = '') {
        $data['title'] = 'Cetak Laporan Tanam Rendeng';
        $data['saluran_tanam'] = $saluran_tanam;
        $data['seksi'] = $seksi;
        $data['tgl1'] = date('Y-m-d', strtotime($tgl1));
        $data['tgl2'] = date('Y-m-d', strtotime($tgl2));
        $data['page'] = $this->load->view('admin/laporan/cetak_lap_laporantanamrendeng', $data);
        $this->load->view('admin/laporan/template', $data);
    }    

    
    function laporantanamgadu() {
        $data['title'] = 'Laporan Tanam Gadu';
        $data['header'] = 'admin/header';
        $data['footer'] = 'admin/footer';
        $data['page'] = 'admin/laporan/lap_laporantanamgadu';
        $this->load->view('admin/template', $data);
    }
    
	function cetaklaporantanamgadu($saluran_tanam = '', $seksi='',$tgl1 = '', $tgl2 = '') {
        $data['title'] = 'Cetak Laporan Tanam Gadu';
        $data['saluran_tanam'] = $saluran_tanam;
        $data['seksi'] = $seksi;
        $data['tgl1'] = date('Y-m-d', strtotime($tgl1));
        $data['tgl2'] = date('Y-m-d', strtotime($tgl2));
        $data['page'] = $this->load->view('admin/laporan/cetak_lap_laporantanamgadu', $data);
        $this->load->view('admin/laporan/template', $data);
    }    
    
        
       
/* LAPORAN DEBET AIR*/   
    
    
function laporan_dab_cbl() {
        $data['title'] = 'Laporan Debet Air Bendung CBL';
        $data['header'] = 'admin/header';
        $data['footer'] = 'admin/footer';
        $data['page'] = 'admin/laporan/lap_dab_cbl';
        $this->load->view('admin/template', $data);
    }

    function cetaklaporan_dab_cbl( $tgl1 = '', $tgl2 = '') {
        $data['title'] = 'Cetak Laporan Debet Air Bendung CBL';
      //  $data['seksi'] = $seksi;
        $data['tgl1'] = date('Y-m-d', strtotime($tgl1));
        $data['tgl2'] = date('Y-m-d', strtotime($tgl2));
        $data['page'] = $this->load->view('admin/laporan/cetak_lap_dab_cbl', $data);
        $this->load->view('admin/laporan/template', $data);
    }   

    function laporan_dab_bekasi() {
        $data['title'] = 'Laporan Debet Air Bendung Bekasi';
        $data['header'] = 'admin/header';
        $data['footer'] = 'admin/footer';
        $data['page'] = 'admin/laporan/lap_dab_bekasi';
        $this->load->view('admin/template', $data);
    }

    function cetaklaporan_dab_bekasi( $tgl1 = '', $tgl2 = '') {
        $data['title'] = 'Cetak Laporan Debet Air Bendung Bekasi';
      //  $data['seksi'] = $seksi;
        $data['tgl1'] = date('Y-m-d', strtotime($tgl1));
        $data['tgl2'] = date('Y-m-d', strtotime($tgl2));
        $data['page'] = $this->load->view('admin/laporan/cetak_lap_dab_bekasi', $data);
        $this->load->view('admin/laporan/template', $data);
    }   

   function laporan_dab_cikarang() {
        $data['title'] = 'Laporan Debet Air Bendung Cikarang';
        $data['header'] = 'admin/header';
        $data['footer'] = 'admin/footer';
        $data['page'] = 'admin/laporan/lap_dab_cikarang';
        $this->load->view('admin/template', $data);
    }

    function cetaklaporan_dab_cikarang( $tgl1 = '', $tgl2 = '') {
        $data['title'] = 'Cetak Laporan Debet Air Bendung Cikarang';
      //  $data['seksi'] = $seksi;
        $data['tgl1'] = date('Y-m-d', strtotime($tgl1));
        $data['tgl2'] = date('Y-m-d', strtotime($tgl2));
        $data['page'] = $this->load->view('admin/laporan/cetak_lap_dab_cikarang', $data);
        $this->load->view('admin/laporan/template', $data);
    }   
    
      function laporan_dab_cibeet() {
        $data['title'] = 'Laporan Debet Air Bendung Cibeet';
        $data['header'] = 'admin/header';
        $data['footer'] = 'admin/footer';
        $data['page'] = 'admin/laporan/lap_dab_cibeet';
        $this->load->view('admin/template', $data);
    }

    function cetaklaporan_dab_cibeet( $tgl1 = '', $tgl2 = '') {
        $data['title'] = 'Cetak Laporan Debet Air Bendung Cibeet';
      //  $data['seksi'] = $seksi;
        $data['tgl1'] = date('Y-m-d', strtotime($tgl1));
        $data['tgl2'] = date('Y-m-d', strtotime($tgl2));
        $data['page'] = $this->load->view('admin/laporan/cetak_lap_dab_cibeet', $data);
        $this->load->view('admin/laporan/template', $data);
    }   
    
    
    
      function laporan_dab_cikeas() {
        $data['title'] = 'Laporan Debet Air Bendung Cikeas';
        $data['header'] = 'admin/header';
        $data['footer'] = 'admin/footer';
        $data['page'] = 'admin/laporan/lap_dab_cikeas';
        $this->load->view('admin/template', $data);
    }

    function cetaklaporan_dab_cikeas( $tgl1 = '', $tgl2 = '') {
        $data['title'] = 'Cetak Laporan Debet Air Bendung Cikeas';
      //  $data['seksi'] = $seksi;
        $data['tgl1'] = date('Y-m-d', strtotime($tgl1));
        $data['tgl2'] = date('Y-m-d', strtotime($tgl2));
        $data['page'] = $this->load->view('admin/laporan/cetak_lap_dab_cikeas', $data);
        $this->load->view('admin/laporan/template', $data);
    }   
    
    
    
      function laporan_dab_cipamingkis() {
        $data['title'] = 'Laporan Debet Air Bendung Cipamingkis';
        $data['header'] = 'admin/header';
        $data['footer'] = 'admin/footer';
        $data['page'] = 'admin/laporan/lap_dab_cipamingkis';
        $this->load->view('admin/template', $data);
    }

    function cetaklaporan_dab_cipamingkis( $tgl1 = '', $tgl2 = '') {
        $data['title'] = 'Cetak Laporan Debet Air Bendung Cipamingkis';
      //  $data['seksi'] = $seksi;
        $data['tgl1'] = date('Y-m-d', strtotime($tgl1));
        $data['tgl2'] = date('Y-m-d', strtotime($tgl2));
        $data['page'] = $this->load->view('admin/laporan/cetak_lap_dab_cipamingkis', $data);
        $this->load->view('admin/laporan/template', $data);
    } 
    
    
    
      function laporan_dab_jembatan_bojong() {
        $data['title'] = 'Laporan Debet Air Bendung Jembatan Bojong';
        $data['header'] = 'admin/header';
        $data['footer'] = 'admin/footer';
        $data['page'] = 'admin/laporan/lap_dab_jembatan_bojong';
        $this->load->view('admin/template', $data);
    }

    function cetaklaporan_dab_jembatan_bojong( $tgl1 = '', $tgl2 = '') {
        $data['title'] = 'Cetak Laporan Debet Air Bendung Jembatan Bojong';
      //  $data['seksi'] = $seksi;
        $data['tgl1'] = date('Y-m-d', strtotime($tgl1));
        $data['tgl2'] = date('Y-m-d', strtotime($tgl2));
        $data['page'] = $this->load->view('admin/laporan/cetak_lap_dab_jembatan_bojong', $data);
        $this->load->view('admin/laporan/template', $data);
    } 
    
    
          function laporan_dab_lemahabang() {
        $data['title'] = 'Laporan Debet Air Bendung Lemahabang';
        $data['header'] = 'admin/header';
        $data['footer'] = 'admin/footer';
        $data['page'] = 'admin/laporan/lap_dab_lemahabang';
        $this->load->view('admin/template', $data);
    }

    function cetaklaporan_dab_lemahabang( $tgl1 = '', $tgl2 = '') {
        $data['title'] = 'Cetak Laporan Debet Air Bendung Lemahabang';
      //  $data['seksi'] = $seksi;
        $data['tgl1'] = date('Y-m-d', strtotime($tgl1));
        $data['tgl2'] = date('Y-m-d', strtotime($tgl2));
        $data['page'] = $this->load->view('admin/laporan/cetak_lap_dab_lemahabang', $data);
        $this->load->view('admin/laporan/template', $data);
    } 


    
    
    
    
}
 