<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Mlogin extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    
    function cek_user($pengguna, $kata_kunci) {
        $this->db->where('pengguna', $pengguna);
        $this->db->where('kata_kunci', $kata_kunci);
        $query = $this->db->get('pengguna');
        if ($query->num_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}