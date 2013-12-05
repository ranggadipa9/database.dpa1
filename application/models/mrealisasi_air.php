<?php

class Mrealisasi_air extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getrealisasi_air() {
        //return $this->db->query('SELECT realisasi_air.* , pemakaian_air.nip, pemakaian_air.nama 
		//	FROM sipeg.realisasi_air INNER JOIN sipeg.pemakaian_air ON (realisasi_air.id_pemakaian_air = pemakaian_air.id)');
		$query = "SELECT
    realisasi_air.*
    , pemakaian_air.*
    , seksi.seksi
    , balai.balai
    , pemakaian_air.pelanggan
FROM
    dpa1.realisasi_air
    LEFT JOIN dpa1.pemakaian_air 
        ON (realisasi_air.id_pemakaian_air = pemakaian_air.id)
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
	
		$query .= " ORDER BY pemakaian_air.pelanggan ";
		return $this->db->query($query);
    }

    function addrealisasi_air($pelanggan, $realisasi, $keterangan) {
        $data = array('id_pemakaian_air' => $pelanggan,
            'realisasi' => $realisasi,
            'keterangan' => $keterangan);
        $this->db->insert('realisasi_air', $data);
    }

    function updaterealisasi_air($id, $pelanggan, $realisasi, $keterangan) {
        $data = array('id_pemakaian_air' => $pelanggan,
            'realisasi' => $realisasi,
            'ketarangan' => $keterangan);
        $this->db->where('id', $id);
        $this->db->update('realisasi_air', $data);
    }

    function getrealisasi_airid($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('realisasi_air');
        return $query;
    }
    function getrealisasi_airidpemakaian_air($id_pemakaian_air){
        $this->db->where('id_pemakaian_air', $id_pemakaian_air);
        $query = $this->db->get('realisasi_air');
        return $query;
        
    }

    function delrealisasi_air($id) {
        $this->db->delete('realisasi_air', array('id' => $id));
    }

}

?>