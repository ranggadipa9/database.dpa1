<?php

class Mpemakaian_air extends CI_Model {

    function __construct() {
        parent::__construct();
    }
function getpemakaian_air() {
		$query = "SELECT
    pemakaian_air.*
    , seksi.seksi
    , balai.balai
FROM
    dpa1.pemakaian_air
    LEFT JOIN dpa1.seksi 
        ON (pemakaian_air.id_seksi = seksi.id)
    LEFT JOIN dpa1.balai 
        ON (pemakaian_air.id_balai = balai.id) ";
                
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
		$query .= " ORDER BY pemakaian_air.id ";
                return $this->db->query($query); 
    }
    
    
    function addpemakaian_air($tanggal_input, $pelanggan, $alamat, $lokasi_pengambilan, $id_balai, $id_seksi, 
            $berlaku_mulai, $sppa_mulai, $berlaku_akhir, $sppa_akhir, $debet_maks, $debet_min) {
        $data = array('tanggal_input' => $tanggal_input,
            'pelanggan' => $pelanggan,
            'alamat' => $alamat,
            'lokasi_pengambilan' => $lokasi_pengambilan,
            'id_balai' => $id_balai,
            'id_seksi' => $id_seksi,
            'berlaku_mulai' => $berlaku_mulai,
            'sppa_mulai' => $sppa_mulai,
            'berlaku_akhir' => $berlaku_akhir,
            'sppa_akhir' => $sppa_akhir,
            'debet_maks' => $debet_maks,
            'debet_min' => $debet_min);
        $this->db->insert('pemakaian_air', $data);
    }

    function getpemakaian_airid($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('pemakaian_air');
        return $query;
    }

    function updatepemakaian_air($id, $tanggal_input, $pelanggan, $alamat, $lokasi_pengambilan, $id_balai, $id_seksi, 
            $berlaku_mulai, $sppa_mulai, $berlaku_akhir, $sppa_akhir, $debet_maks, $debet_min) {
        $data = array('tanggal_input' => $tanggal_input,
            'pelanggan' => $pelanggan,
            'alamat' => $alamat,
            'lokasi_pengambilan' => $lokasi_pengambilan,
            'id_balai' => $id_balai,
            'id_seksi' => $id_seksi,
            'berlaku_mulai' => $berlaku_mulai,
            'sppa_mulai' => $sppa_mulai,
            'berlaku_akhir' => $berlaku_akhir,
            'sppa_akhir' => $sppa_akhir,
            'debet_maks' => $debet_maks,
            'debet_min' => $debet_min);
        $this->db->where('id', $id);
        $this->db->update('pemakaian_air', $data);
    }

    function delpemakaian_air($id) {
        $this->db->delete('pemakaian_air', array('id' => $id));
    }

}

?>