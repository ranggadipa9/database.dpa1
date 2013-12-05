<?php

class Mperpanjang_lahan extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getperpanjang_lahan() {
    $query = "SELECT
    pengguna_lahan.*
    , seksi.seksi
FROM
    dpa1.pengguna_lahan
    LEFT JOIN dpa1.seksi 
        ON (pengguna_lahan.id_seksi = seksi.id) ";
		
    
               if ($this->session->userdata('jenis') == 'stb') {
			$seksi = $this->session->userdata('seksi');
			$query .= " WHERE seksi.seksi = '$seksi' ";			
		}
                if ($this->session->userdata('jenis') == 'pab') {
			$seksi = $this->session->userdata('seksi');
			$query .= " WHERE seksi.seksi = '$seksi' ";			
		}
                if ($this->session->userdata('jenis') == 'cipamingkis') {
			$seksi = $this->session->userdata('seksi');
			$query .= " WHERE seksi.seksi = '$seksi' ";			
		}
                 if ($this->session->userdata('jenis') == 'lemahabang') {
			$seksi = $this->session->userdata('seksi');
			$query .= " WHERE seksi.seksi = '$seksi' ";			
		}
                 if ($this->session->userdata('jenis') == 'bekasi') {
			$seksi = $this->session->userdata('seksi');
			$query .= " WHERE seksi.seksi = '$seksi' ";			
		}
		//if ($this->session->userdata('jenis') == 'admin') {
		//	$id_pemakaian_air = $this->session->userdata('id_pemakaian_air');
		//	$query .= " WHERE pemakaian_air.id = '$id_pemakaian_air' "; 
		//}
		$query .= " ORDER BY pengguna_lahan.no_sipls ";
                return $this->db->query($query);
    }

    function addperpanjang_lahan($no_sipls, $sipls, $tgl_perpanjang) {
        $data = array('no_sipls' => $no_sipls,
            'sipls' => $sipls,
            'tgl_perpanjang' => $tgl_perpanjang);
        $this->db->insert('perpanjang_lahan', $data);
    }

    function updateperpanjang_lahan($id, $no_sipls, $sipls, $tgl_perpanjang) {
        $data = array('no_sipls' => $no_sipls,
            'sipls' => $sipls,
            'tgl_perpanjang' => $tgl_perpanjang);
        $this->db->where('id', $id);
        $this->db->update('perpanjang_lahan', $data);
    }

    function getperpanjang_lahanid($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('perpanjang_lahan');
        return $query;
    }

    function delperpanjang_lahan($id) {
        $this->db->delete('perpanjang_lahan', array('id' => $id));
    }

}

?>