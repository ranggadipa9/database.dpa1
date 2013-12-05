<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Site extends CI_Controller {

    //put your code here
    function __construct() {
        parent::__construct();
        $this->load->model('mlogin');
    }

    function index() {
        $data['title'] = 'Login: Aplikasi DPA1 PJT II';
        $this->load->view('login', $data);
    }

    function login() {
        $pengguna = $this->input->post('username', TRUE);
        $kata_kunci = $this->input->post('password', TRUE);

        $this->db->where('pengguna', $pengguna);
        $this->db->where('kata_kunci', $kata_kunci);
        $this->db->select('pengguna.id, pengguna.id_pegawai, pengguna.pengguna, hak_akses.jenis, seksi.seksi');
        $this->db->from('pengguna');
        $this->db->join('hak_akses', 'hak_akses.id = pengguna.id_hak_akses');
        $this->db->join('seksi', 'seksi.id = pengguna.id_seksi');
        $hasil = $this->db->get();
        if ($hasil->num_rows() == 1) {
            foreach ($hasil->result() as $row) {
                $jenis = $row->jenis;
                $seksi = $row->seksi;
                $id_pegawai = $row->id_pegawai;
                $id = $row->id;
            }
        }
        $user = $this->mlogin->cek_user($pengguna, $kata_kunci);
        if ($user == TRUE) {
            $data = array('id' => $id, 'pengguna' => $pengguna, 'jenis' => $jenis, 'seksi' => $seksi, 'id_pegawai' => $id_pegawai, 'logged_in' => TRUE);
            $this->session->set_userdata($data);
            redirect($jenis);
        } else {
            $this->session->set_flashdata('pengguna', $username);
            $this->session->set_flashdata('login_message', '<div class="error">Pengguna atau Kata Kunci Anda Tidak Sesuai</div>');
            redirect(site_url());
        }
    }

}